<x-statistics>
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
                <!-- This is an example component -->
                    <div class="col-span-6 sm:col-span-4">
                        <label class="block font-medium text-sm text-gray-700" for="cases">
                            Ciudades
                        </label>
                        <div class="relative inline-flex">
                            <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                <select class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" id="city_id" name="city_id">
                                  @foreach($cities as $city)
                                      <option value="{{ $city->id}}" selected> {{$city->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-6 gap-6">
                        <!-- <div class="relative">
                            <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="specie_id" name="specie_id" >
                            @foreach($cities as $city)
                                <option value="{{ $city->id}}" selected> {{$city->name}}</option>
                            @endforeach
                            </select>
                        </div>     -->
                        <div class="mt-5 col-span-6 sm:col-span-4">
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
</x-statistics>