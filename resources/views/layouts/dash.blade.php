<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda</title>
    @vite('resources/css/app.css')
    @livewireStyles
    
</head>

<body>
    <div class="bg-white shadow">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <a class="font-normal text-xl text-gray-800" href="{{ route('dashboard.index') }}">Tienda<span
                        class="font-extrabold">Iris</span></a>
            </div>
            <form action="{{ route('login.logout') }}" method="POST" class="flex items-center">
                <div class="relative">
                    <div class="flex items-center text-gray-600 hover:text-gray-700 ml-4 p-2">

                        <span class="ml-2 text-sm">{{auth()->user()->name}}</span>
                    </div>
                </div>

                @csrf
                <button type="submit"
                    class="border border-gray-400 rounded-md py-2 px-4 text-gray-600 mr-2 hover:bg-gray-200">
                    Cerrar Sesion
                </button>
                </>
            </form>
        </div>
    </div>
    <div class="bg-gray-100 h-screen flex flex-col">
    @yield('content')
    </div>
    @livewireScripts
    <wireui:scripts />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @yield('script')

</body>

</html>
