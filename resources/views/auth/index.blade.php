@extends('layouts.app')


@section('contenido')
<div class="bg-white dark:bg-gray-800 min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white">
            Iniciar sesión
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md shadow-2xl">
        @if (session()->has('mensaje'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">¡Error!</strong>
            <span class="block sm:inline">{{session('mensaje')}}</span>
          </div>
        @endif

        <div class="bg-white dark:bg-gray-900 py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="{{route('login.store')}}" method="POST" novalidate>
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">
                        Correo electrónico
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="appearance-none block w-full px-3 py-2 border dark:border-gray-700 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                            @error('email')
                            <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">¡Error!</strong>
                                <span class="block sm:inline">{{$message}}</span>
                              </div>
                            @enderror
                    </div>

                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-white">
                        Contraseña
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password"
                            required
                            class="appearance-none block w-full px-3 py-2 border dark:border-gray-700 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                            @error('password')
                            <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">¡Error!</strong>
                                <span class="block sm:inline">{{$message}}</span>
                              </div>
                            @enderror
                    </div>

                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 dark:border-gray-700 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900 dark:text-white">
                            Recuérdame
                        </label>
                    </div>

                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-600 dark:hover:bg-gray-700">
                        Iniciar sesión </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

