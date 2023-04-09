@extends('layouts.dash')

@section('content')
    <!-- Sección de estadísticas -->
    <div class="container mx-auto my-10 px-6">
        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <div class="bg-green-100 border-b-4 border-green-500 rounded-lg shadow-md p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <a href="{{route('compras.index')}}" class="font-bold uppercase text-gray-600">Compras</a>
                            <!---h3 class="font-bold text-3xl">$ <span class="text-green-500">5,500</span></h3> --->
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <div class="bg-yellow-100 border-b-4 border-yellow-500 rounded-lg shadow-md p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-users fa-2x fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <a href="{{ route('pedidos.show') }}" class="font-bold uppercase text-gray-600">Pedidos</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <div class="bg-blue-100 border-b-4 border-blue-500 rounded-lg shadow-md p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-chart-line fa-2x fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <a href="{{ route('recargas.index') }}" class="font-bold uppercase text-gray-600">Recargas</a>
                        </div>
                    </div>
                </div>
            </div>
            @if (auth()->user()->rol != 1)
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <div class="bg-slate-100-100 border-b-4 border-slate-500 rounded-lg shadow-md p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-slate-600"><i class="fas fa-users fa-2x fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Tareas</h5>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <div class="bg-lime-100-100 border-b-4 border-lime-500 rounded-lg shadow-md p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-lime-600"><i class="fas fa-users fa-2x fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Proveedores</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <div class="bg-orange-100 border-b-4 border-orange-500 rounded-lg shadow-md p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-orange-600"><i class="fas fa-users fa-2x fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Companias</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
    @if (auth()->user()->rol !== 1)
        <!-- Sección de gráficos -->
        <div class="container mx-auto my-10 px-6">
            <div class="md:flex bg-white rounded-lg p-6">
                <div class="md:flex-shrink-0">
                    <div class="h-48 md:h-full md:w-48 bg-gray-400 rounded-lg"></div>
                </div>
                <div class="mt-4 md:mt-0 md:ml-6">
                    <div class="uppercase tracking-wide text-sm text-indigo-600 font-bold">Análisis de ventas</div>
                    <a href="#"
                        class="block mt-1 text-lg leading-tight font-semibold text-gray-900 hover:underline">Informe
                        Mensual</a>
                    <p class="mt-2 text-gray-600">Un análisis detallado de las ventas de su tienda durante el último mes.
                    </p>
                </div>
            </div>
        </div>
    @endif
<!--TODO: Mostrar las tareas a realizar-->
    <!-- Sección de tarjetas -->
    <div class="container mx-auto my-10 px-6">
        <div class="flex flex-col md:flex-row">
            <div class="md:ml-6 mt-10 md:mt-0 flex-1 bg-white rounded-lg shadow-lg p-8">
                <div class="flex flex-col sm:flex-row items-center">
                    <h2 class="font-semibold text-lg mr-auto">Tareas pendientes</h2>
                    <a href="#" class="text-sm text-gray-400 hover:text-gray-500">Ver todas</a>
                </div>
                {{--
                <div class="flex flex-col mt-5">
                    <div class="bg-gray-200 rounded-lg p-5">
                        <h3 class="font-bold text-lg mb-2">Hacer la compra</h3>
                        <p class="text-gray-700 leading-normal">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit.
                            Vestibulum sit amet leo feugiat, vestibulum urna eget, porttitor ante. Morbi finibus mi sed
                            velit bibendum hendrerit.</p>
                    </div>
                    <div class="bg-gray-200 rounded-lg p-5 mt-5">
                        <h3 class="font-bold text-lg mb-2">Enviar correo electrónico</h3>
                        <p class="text-gray-700 leading-normal">Maecenas eleifend, nulla ac euismod porttitor, nunc
                            odio
                            pellentesque risus, a facilisis quam mauris et tellus. Pellentesque habitant morbi tristique
                            senectus et netus et malesuada fames ac turpis egestas.</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

  
@endsection
