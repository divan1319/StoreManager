<div>
    <div class="flex flex-row p-6">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg><a href="{{ route('compras.index') }}" class="text-sm mt-1 uppercase font-semibold">Regresar</a>
    </div>
    <h2 class="text-2xl uppercase font-bold text-center text-gray-700 mt-8">Compras Externas</h2>
    <form wire:submit.prevent="AgregarCompraExterna" class="md:mx-96 mt-10 p-7 bg-white rounded-lg shadow-md"
        novalidate>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="vendedor">Vendedor:</label>
            <input class="w-full p-3 rounded-lg border border-gray-300" id="vendedor" wire:model="vendedor">
            @error('vendedor')
                <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2"
                    role="alert">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="total">Total a pagar:</label>
            <input class="w-full p-3 rounded-lg border border-gray-300" type="number" id="total"
                wire:model="total">
            @error('total')
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
</div>
