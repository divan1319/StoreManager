<div>
    <div class="flex flex-row p-6">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg><a href="{{ route('pedidos.show') }}" class="text-sm mt-1 uppercase font-semibold">Regresar</a>
    </div>
    <div>
        <h2 class="text-2xl uppercase font-bold text-center text-gray-700 mt-8">Detalle Pedido: <span
                class="font-extrabold  text-cyan-700">{{ $pedido }}</span></h2>
        <p class="text-center text-sm uppercase font-medium">Pedido para:
            @foreach ($orders as $order)
                @php
                    Carbon\Carbon::setLocale('es');
                    $fecha = Carbon\Carbon::parse($order->fecha_entrega);
                    $formattedDate = $fecha->format('l d \d\e F \d\e Y');
                @endphp
                {{ $formattedDate }}
            @endforeach
        </p>
    </div>

    <form wire:submit.prevent='addDetails' class="md:p-10 p-5 mt-1" novalidate>
        <div class="inputs-container" id="inputs-container" class="my-4 ">
            <div class="md:flex md:flex-row  gap-8 mb-5 ">
                <div class="flex flex-col w-full">
                    <label for="" class="mx-1 font-bold text-xs uppercase mb-2">Producto:</label>
                    <input type="text" wire:model="producto" id=""
                        class="border border-slate-300 rounded p-2 w-full focus:outline-none shadow-lg mb-4"
                        placeholder="Nombre Producto">
                    @error('producto')
                        <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-0 mb-3"
                            role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <label for="" class="mx-1 font-bold text-xs uppercase mb-2">Precio:</label>
                    <input type="number" wire:model="precio" id=""
                        class="border border-slate-300 rounded p-2  focus:outline-none shadow-lg mb-4"
                        placeholder="Precio Producto">
                    @error('precio')
                        <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-0 mb-3"
                            role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <label for="" class="mx-1 font-bold text-xs uppercase mb-2">Cantidad:</label>
                    <input type="number" wire:model="cantidad" id=""
                        class="border border-slate-300 rounded p-2 w-full focus:outline-none shadow-lg mb-4"
                        placeholder="Cantidad">
                    @error('cantidad')
                        <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-0 mb-3"
                            role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            @if (session()->has('mensaje'))
                <div class="text-sm bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-0 mb-4"
                    role="alert">
                    <strong class="font-bold">Genial!</strong>
                    <span class="block sm:inline">{{ session('mensaje') }}</span>
                </div>
            @endif
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Agregar
        </button>
    </form>
    <div class="overflow-x-auto -mt-4 md:p-10 p-5">
        <table class="w-full text-left rounded-lg">
            <thead>
                <tr class="text-gray-800 border border-b-0">

                    <th class="px-4 py-3">Producto</th>
                    <th class="px-4 py-3">Precio</th>
                    <th class="px-4 py-3 ">Cantidad </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                    <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border">
                        <td class="px-4 py-4">{{ $detail->producto }}</td>
                        <td class="px-4 py-4">{{ $detail->precio }}</td>
                        <td class="px-4 py-4">{{ $detail->cantidad }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
