<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div  class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">Editar ciudad</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Completar con ciudad, poblacion e imagen.
                            </p>
                        </div>
                    </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            @if (session('success'))
                <div class="sm:rounded-md mb-2 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                  <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                      <p class="font-bold">{{ session('success') }}</p>
                    </div>
                  </div>
                </div>
            @endif
        <form method='POST' action="{{ route('statistic.update', $statistic) }}">
            @csrf
            @method('PUT')
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="cases">
                                Ciudades
                            </label>
                            <div class="relative inline-flex">
                                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                    <select class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" id="city_id" name="city_id">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id}}" @if ($city->id == $statistic->city_id) 
                                            selected 
                                            @endif> 
                                            {{$city->name}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="cases">
                                Casos
                            </label>
                            <input  class="form-input rounded-md shadow-sm mt-1 block w-full" id="cases" name="cases" type="text" value="{{ $statistic->cases }}">
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="dead">
                                Fallecidos
                            </label>
                            <input  class="form-input rounded-md shadow-sm mt-1 block w-full" id="dead" name="dead" type="text" value="{{ $statistic->dead }}">
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button dusk="edit" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Editar ciudad
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</x-app-layout>
