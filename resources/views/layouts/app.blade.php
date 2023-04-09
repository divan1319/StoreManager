<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda</title>
    @vite('resources/css/app.css')
    <wireui:scripts />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    @yield('navbar')
    @yield('contenido')
    <!-- Sección de pie de página -->
    <footer class="bg-white">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-center text-gray-800">
                <p>© 2023 Nombre de la empresa. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

</body>
</html>
