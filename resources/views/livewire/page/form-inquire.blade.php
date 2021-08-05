<div>

    <!-- Modal -->
    <div x-data="{ showModal : false }">
        <!-- Button -->
            <button type="button" @click="showModal = !showModal" class="btn-primary text-center w-full block">Inquire Now</button>


        <!-- Modal Background -->
        <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-gray-800 bg-opacity-90 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <!-- Modal -->
            <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 sm:w-10/12 md:w-1/2 mx-4 sm:mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                <!-- Title -->
                <h3 class="text-2xl text-center font-bold text-gray-500">Almost There!! </h3>
                <p class="text-center">We need a bit more info to create your itinerary:</p>
                <!-- Some beer 🍺 -->
                <form wire:submit.prevent="store">
                    <div class="grid grid-cols-1 md:col-grid-2 mt-6 gap-4">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="">
                                <div class="text-xs font-medium text-gray-500 mb-1">Name</div>
                                <input wire:model="name" class="form-input text-sm leading-6" placeholder="Please input name" type="text">
                                @error('name')
                                <span class="text-xs text-red-500">(*{{$message}})</span>
                                @enderror

                            </div>
                            <div class="">
                                <div class="text-xs font-medium text-gray-500 mb-1">Email</div>
                                <input wire:model="email" class="form-input text-sm leading-6" placeholder="Please input email" type="email">
                                @error('email')
                                <span class="text-xs text-red-500">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="w-full relative" x-data="{open: false}">
                                <span class="text-xs font-medium text-gray-400 float-left mb-1">Destinations</span>
                                <div class="form-input flex cursor-pointer" x-on:click="open = true">
                                    <div class="flex flex-1 text-sm">
                                        <div class="">
                                            @php
                                                $arrrr = array_diff($values_destinations, array("",0,null));
                                            @endphp
                                            @if($arrrr)
                                                <span class="p-2 py-1 rounded text-blue-500 text-sm bg-blue-100 border border-blue-300">{{ str_replace(',', ' ', reset($arrrr)) }}</span>
                                            @else
                                                Destinations
                                            @endif
                                        </div>
                                        <div class="ml-2 truncate">
                                            @if((count(array_diff($values_destinations, array("",0,null))) - 1) > 0)
                                                <span class="px-2 py-1 rounded text-blue-500 text-sm bg-blue-100 border text-sm border-blue-300">+ {{count(array_diff($values_destinations, array("",0,null))) - 1}} destinations</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>

                                </div>
                                {{--    <input class="form-input" type="text" value="{{$seleccionados}}">--}}
                                <div x-show="open" x-transition class="absolute inset-x-0 top-0 mt-14 mx-auto w-11/12 z-10 bg-white border rounded-lg shadow-lg" x-on:click.away="open = false">
                                    @foreach($destinations as $index => $destination)
                                        <div>
                                            <label class="w-full text-left transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white">
                                                <input wire:model="values_destinations.{{ $index }}" type="checkbox" class="form-checkbox" value="{{$destination->nombre.','}}">
                                                <span class="ml-2">{{ $destination->nombre }}</span>
                                            </label>
                                        </div>

                                    @endforeach
                                </div>

                            </div>
                            <div class="w-full relative" x-data="{open: false}">
                            <span class="text-xs font-medium text-gray-400 float-left mb-1">Travel style</span>
                            <div class="form-input flex cursor-pointer" x-on:click="open = true">
                                <div class="flex flex-1 text-sm">
                                    <div class="">
                                        @php
                                            $arrrr = array_diff($values_categories, array("",0,null));
                                        @endphp
                                        @if($arrrr)
                                            <span class="p-2 py-1 rounded text-blue-500 text-sm bg-blue-100 border border-blue-300">{{ str_replace(',', ' ', reset($arrrr)) }}</span>
                                        @else
                                            Travel Style
                                        @endif
                                    </div>
                                    <div class="ml-2 truncate">
                                        @if((count(array_diff($values_categories, array("",0,null))) - 1) > 0)
                                            <span class="px-2 py-1 rounded text-blue-500 text-sm bg-blue-100 border border-blue-300">+ {{count(array_diff($values_categories, array("",0,null))) - 1}} categories</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>

                            </div>
                            {{--    <input class="form-input" type="text" value="{{$seleccionados}}">--}}
                            <div x-show="open" x-transition class="absolute inset-x-0 top-0 mt-14 mx-auto w-11/12 z-10 bg-white border rounded-lg shadow-lg" x-on:click.away="open = false">
                                @foreach($categories as $index => $category)
                                    <div>
                                        <label class="w-full text-left transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white">
                                            <input wire:model="values_categories.{{ $index }}" type="checkbox" class="form-checkbox" value="{{$category->nombre.','}}">
                                            <span class="ml-2">{{ $category->nombre }}</span>
                                        </label>
                                    </div>

                                @endforeach
                            </div>

                        </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="">
                                <span class="text-xs font-medium text-gray-400 float-left mb-1">Number phone</span>
                                <input wire:model="phone" type="text" class="form-input">
                            </div>
                            <div class="">
                                <span class="text-xs font-medium text-gray-400 float-left mb-1">Number of travelers</span>
                                <input wire:model="number_travelers" type="text" class="form-input">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="">
                                <span class="text-xs font-medium text-gray-400 float-left mb-1">Travel day</span>
                                <input wire:model="travel_day" type="date" class="form-input">
                            </div>

                            <div class="hidden sm:block">
                                <span class="text-xs font-medium text-gray-400 float-left mb-1">What stage of planning are you in?</span>
                                <select wire:model="planning" class="form-input rounded-none text-sm appearance-none p-12">
                                    <option value="Still dreaming / researching">Still dreaming / researching</option>
                                    <option value="Definitely traveling, not sure which country yet">Definitely traveling, not sure which country yet</option>
                                    <option value="I want to book a trip">I want to book a trip</option>
                                </select>
                            </div>
                        </div>

                        <div class="hidden sm:block">
                            <div class="">
                                <span class="text-xs font-medium text-gray-400 float-left mb-1">Comment</span>
                                <textarea wire:model="comment" class="form-input"></textarea>
                            </div>
                        </div>

                        @if ($success)
                            <div class="col-span-2 inline-flex w-full overflow-hidden bg-gray-100 shadow-sm">
                                <div class="flex items-center justify-center w-12 bg-green-500">
                                </div>
                                <div class="px-3 py-2 text-left w-full flex justify-between items-center">
                                    <div>
                                        <span class="font-semibold text-green-500">Success</span>
                                        <p class="mb-1 text-sm leading-none text-gray-500">{{$success}}</p>
                                    </div>
                                    <div class="">
                                        <span @click="showModal = !showModal" class="p-2 py-1 rounded text-green-500 text-sm bg-green-200 border border-green-300 cursor-pointer">OK</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>


                    <!-- Buttons -->
                    <div class="text-right space-x-5 mt-5 grid grid-cols-2">
                        <button type="button" @click="showModal = !showModal" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary" wire:click="load_submit">
                            send <span wire:loading wire:target="load_submit"><div class="lds-hourglass"></div></span>
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
