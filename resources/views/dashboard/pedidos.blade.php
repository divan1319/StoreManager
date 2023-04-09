@extends('layouts.dash')

@section('content')
    <div class="flex flex-row p-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg><a href="{{route('dashboard.index')}}" class="text-sm mt-1 uppercase font-semibold">Regresar</a>
    </div>
    <h2 class="text-2xl uppercase font-bold text-center text-gray-700 mt-8">Pedidos</h2>
    <form method="POST" action="{{ route('pedidos.store') }}" class="md:mx-96 mt-10 p-7 bg-white rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="proveedor">Proveedor</label>
            <select class="w-full p-3 rounded-lg border border-gray-300" id="proveedor" name="proveedor">
                <option value="">Escoge un proveedor</option>
                @foreach ($providers as $provider)
                    <option value="{{ $provider->id }}">{{ $provider->proveedor }}</option>
                @endforeach
            </select>
            @error('proveedor')
                <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2"
                    role="alert">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="fecha_entrega">Fecha de entrega del pedido</label>
            <input class="w-full p-3 rounded-lg border border-gray-300" type="date" id="fecha_entrega"
                name="fecha_entrega" value="{{ old('fecha_entrega') }}">
            @error('fecha_entrega')
                <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2"
                    role="alert">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
            type="submit">
            Guardar
        </button>
        @if (session()->has('mensaje'))
            <div class="text-sm bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-2"
                role="alert">
                <strong class="font-bold">Genial!</strong>
                <span class="block sm:inline">{{ session('mensaje') }}</span>
            </div>
        @endif
    </form>
    <div class="overflow-x-auto mt-10 p-2">
        <table class="w-full text-left rounded-lg">
            <thead>
                <tr class="text-gray-800 border border-b-0">
                    <th class="px-4 py-3">Proveedor</th>
                    <th class="px-4 py-3">Total a pagar</th>
                    <th class="px-4 py-3">Fecha de Entrega</th>
                    <th class="px-4 py-3 {{ auth()->user()->rol != 1 ? 'text-center' : '' }}"
                        colspan="{{ auth()->user()->rol != 1 ? '2' : '' }}">Opciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border">
                        <td class="px-4 py-4">{{ $order->provider->proveedor }}</td>
                        <td class="px-4 py-4">{{ $order->total }}</td>
                        <td class="px-4 py-4">{{ $order->fecha_entrega }}</td>
                        @if (auth()->user()->rol != 1)
                            <td class="px-4 py-4">
                                <form action=""><button
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline">Eliminar</button>
                                </form>
                            </td>
                        @endif
                        <td class="px-4 py-4"><a
                                href="{{ route('pedidos.details', [$order->provider->proveedor, $order->id]) }}"
                                class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Detalle</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
