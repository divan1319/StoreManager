@extends('layouts.dash')
@section('content')
    <div class="flex flex-row p-6">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg><a href="{{ route('dashboard.index') }}" class="text-sm mt-1 uppercase font-semibold">Regresar</a>
    </div>
    <form class=" md:mx-96 mt-10 p-7 bg-white rounded-lg shadow-md" action="{{ route('recargas.store') }}" method="POST"
        novalidate>
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="company">
                Selecciona una compañia:
            </label>
            <select
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="company" name="company">
                <option value="">Compañia</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->compania }}</option>
                @endforeach
            </select>
            @error('company')
                <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2"
                    role="alert">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="total">
                Total a pagar:
            </label>
            <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="total" name="total" type="number" placeholder="$0.00" value="{{ old('total') }}">
            @error('total')
                <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2"
                    role="alert">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <div class="flex items-center justify-center">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
                type="submit">
                Guardar
            </button>
        </div>
        @if (session()->has('mensaje'))
            <div class="text-sm bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-2"
                role="alert">
                <strong class="font-bold">Genial!</strong>
                <span class="block sm:inline">{{ session('mensaje') }}</span>
            </div>
        @endif
    </form>
    <div>
        <div class=" sm:-mx-6 lg:-mx-8 p-5">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Compañia</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total
                                    Pago
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($fechas as $fecha)
                                @php
                                    $date1 = Carbon\Carbon::createFromDate(date('Y-m-d'));
                                    $date2 = Carbon\Carbon::createFromDate(date('Y-m-d', strtotime($fecha->created_at)));
                                    $diffDays = $date1->diff($date2)->days;
                                    
                                @endphp
                                @if ($diffDays == 0)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $fecha->company->compania }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $fecha->total }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
