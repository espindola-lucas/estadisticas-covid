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
          <h1 class="text-4xl underline"> Covid-19 </h1>

          <div class="p-2 bg-blue-200 text-center xl:max-w-2xl xl:h-40 mx-auto mt-6">
            Considerando el diferente impacto en la dinamica de transmision del virus, la diversidad
            geografica, socieconomica y demografica, a travez del Decreto 754/2020 y hasta el 25 de
            octubre de 2020 se establece un abordaje en materia epidemiologica que contempla las distantas
            realidades del pais.
            <div class="text-center xl:max-w-2xl mx-auto text-blue-800">
              • Aislamiento Social, Preventivo y Obligatorio.
            </div>
            <div class="text-center xl:max-w-2xl mx-auto text-blue-800">
              • Distanciamiento Social, Preventivo y Obligatorio.
            </div>
          </div>

          <!-- component -->
          @foreach ($cities as $city)
          <div class="flex flex-wrap md items-center h-auto mt-4">
            <div class="bg-white w-full md:w-1/2 h-auto">
              <div class="mx-32">
                <h1 class="text-6xl font-mono mt-16">{{ $city->name }}</h1>

                <!-- country region island -->
                <div class="flex mt-16 font-mono text-gray-500">
                  <div class="pr-4">
                    <span class="uppercase">Population</span>
                    <p class="text-2xl text-gray-900 font-semibold pt-2 bg-green-300 text-green-800 rounded-full py-2 px-4">{{ $city->population }}</p>
                  </div>
                  @foreach ($city->statistics as $statistic)
                  <div class="pr-4">
                    <span class="uppercase">Cases</span>
                    <p class="text-2xl text-gray-900 font-semibold pt-2 bg-blue-300 text-blue-800 rounded-full py-2 px-4">{{ $statistic->cases }}</p>
                  </div>
                  <div class="pr-4">
                    <span class="uppercase">Dead</span>
                    <p class="text-2xl text-gray-900 font-semibold pt-2 bg-red-300 text-red-800 rounded-full py-2 px-4">{{ $statistic->dead }}</p>
                  </div>
                </div>
                <div class="pr-4 mt-4 text-gray-500">
                  <span class="uppercase">Creation Statistic</span>
                  <p class="text-2xl text-gray-900 font-semibold pt-2 bg-yellow-300 text-yellow-800 rounded-full py-2 px-4">
                    {{ $statistic->created_at->format('Y-m-d') }}
                </div>
                @endforeach

                <!-- description -->
                <div class="description w-full sm: md:w-2/3 mt-16 text-lg text-center font-mono ml-14">
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto quas autem obcaecati cumque!...
                </div>
              </div>
            </div>
            <div class="bg-red-600 w-full md:w-1/2 h-auto">
              <img src="{{Storage::url($city-> image)}}" class="h-auto w-full" alt="imagen de ciudad" />
            </div>
          </div>
          @endforeach
        </div>
      </main>
  </body>
</x-guest-layout>

</html>
