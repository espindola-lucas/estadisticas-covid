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
                            <h3 class="text-lg font-medium text-gray-900">Crear estadistica</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Completar con ciudad, fecha, poblacion, casos y muertos.
                            </p>
                        </div>
                    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form method='POST' action="{{ route('statistics.store') }} ">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="name">
                                Ciudad
                            </label>
                            <input  class="form-input rounded-md shadow-sm mt-1 block w-full" id="name" name="name" type="text">
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="city_id">
                                Id Ciudad
                            </label>
                            <input  class="form-input rounded-md shadow-sm mt-1 block w-full" id="city_id" name="city_id" type="text">
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="population">
                                Poblacion
                            </label>
                            <input  class="form-input rounded-md shadow-sm mt-1 block w-full" id="population" name="population" type="text">
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="cases">
                                Casos
                            </label>
                            <input  class="form-input rounded-md shadow-sm mt-1 block w-full" id="cases" name="cases" type="text">
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="dead">
                                Muertos
                            </label>
                            <input  class="form-input rounded-md shadow-sm mt-1 block w-full" id="dead" name="dead" type="text">
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Crear estadistica
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</x-app-layout>
