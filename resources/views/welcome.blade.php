<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-guest-layout>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Covid-19</title>

    </head>
    <body class="antialiased">

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
                </div>
            @endif
    <!-- component -->

    <main class="flex-grow flex justify-center items-center">

        <div class="mx-auto px-4 sm:px-8 py-2 text-center">

          <div class="text-center max-w-lg mx-auto mt-6">
            <div class="h-4 bg-gray-500 w-40 block mx-auto rounded-sm"></div>
            <div class="h-2 bg-gray-400 w-64 mt-4 block mx-auto rounded-sm"></div>
            <div class="h-2 bg-gray-400 w-48 mt-2 block mx-auto rounded-sm"></div>
          </div>

          <div class="grid grid-cols-6 gap-4 items-start mt-8 mx-auto px-8">
            @foreach ($cities as $city)
            <div class="col-span-6 sm:col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
              <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
                <div class="mx-auto h-40 bg-gray-200 rounded-md">
                <img src="image/tandil.jpg" alt="mountains" class="w-full h-64 rounded-lg rounded-b-none"></div>
                <h2 class="mt-40 font-bold text-2xl text-gray-800 tracking-normal">{{ $city->name }}</h2>
                <div class="h-6 bg-gray-200 w-40 mt-8 block mx-auto rounded-sm">Poblacion: {{ $city->population }}</div>
                <div class="flex justify-center mt-10">
                  @foreach ($city->statistics as $statistic)
                  <div class="rounded-sm h-8 w-40 px-4 bg-blue-300 text-blue-800 mr-2">Casos: {{ $statistic->cases }}</div>
                  <div class="rounded-sm h-8 w-40 px-4 bg-red-300 text-red-800 mr-2">Fallecidos: {{ $statistic->dead }}</div>
                  @endforeach
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>

    </main>
    </body>
</x-guest-layout>
</html>
