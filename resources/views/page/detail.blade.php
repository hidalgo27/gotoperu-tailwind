@extends('layouts.page-layout')
@section('content')
    @foreach($paquetes as $paquete)
        <section class="-mt-32 h-80vh -z-1 relative">
            @foreach($paquete['imagen_paquetes'] as $imagen)
                <img src="{{$imagen['nombre']}}" alt="{{$paquete['titulo']}}" class="h-full w-full object-cover">
            @endforeach

            <div class="absolute w-full bottom-0 left-0 p-12">
{{--                <h1 class="text-3xl md:text-5xl font-semibold mb-3 text-gray-50">{{ $paquete['titulo'] }}</h1>--}}

                <div class="container">
                    <div class="grid grid-cols-3 justify-items-end">
                        <div class="col-span-3  md:w-1/2">
                            <div class="flex gap-3 mb-3">
                                <div class="flex-1 border p-3 flex bg-white text-xl items-center justify-center">
                                    {{ $paquete['duracion'] }} {{__('message.pack_par4')}}
                                </div>
                                @if($paquete['is_p_t'] == 1)
                                    <div class="flex-1 border bg-white p-3 flex items-center">
                                        @foreach($paquete['precio_paquetes'] as $precio)
                                            @if($precio['estrellas'] == 2)
                                                @if($precio['precio_d'] > 0)
                                                    <div class="text-xl font-semibold text-gray-600">
                                                        <span> {{__('message.pack_par5')}} </span>
                                                        <span>${{$precio['precio_d']}}</span>
                                                        <span class="text-xs"> usd</span>
                                                    </div>
                                                @else
                                                    <span class="text-red-500 font-bold">{{__('message.button_inquire')}}</span>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                @else
                                    <div class="flex-1 border bg-white p-3 flex items-center text-center">
                                        @if($paquete['precio_tours'])
                                            <div class="text-xl font-semibold text-gray-600">
                                                {{--                                                <span> {{__('message.pack_par5')}} </span>--}}
                                                <span>${{$paquete['precio_tours']}}</span>
                                                <span class="text-xs"> usd</span>
                                            </div>
                                        @else
                                            <span class="text-red-500 font-bold">{{__('message.button_inquire')}}</span>
                                        @endif

                                    </div>
                                @endif
                            </div>
                            <div class="p-6 bg-white border">
                                <h2 class="text-2xl font-bold text-gray-600"> {{$paquete['titulo']}}</h2>
                                <div class="mt-3 text-sm text-gray-600">
                                    @foreach($paquete['paquetes_destinos'] as $paquete_destino)
                                        {{$paquete_destino['destinos']['nombre']}}
                                        @if ($loop->iteration < count($paquete['paquetes_destinos'])) , @else . @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>


        <section class="container" x-data="{ openTab: 1 }">
            <div class=" mt-6 " >
                <ul class="grid  md:grid-cols-5 gap-3">
                    <li @click="openTab = 1" class="inline-block border py-2 px-4 font-medium w-full cursor-pointer text-center transition duration-300 py-3" :class="openTab == 1 ? 'bg-primary text-white' : 'bg-white hover:text-primary'">
                        <div class=" ">Overview</div>
                    </li>
                    <li @click="openTab = 2" class="inline-block border py-2 px-4 font-medium w-full cursor-pointer text-center transition duration-300 py-3" :class="openTab == 2 ? 'bg-primary text-white' : 'bg-white hover:text-primary'">
                        <div class="">Full Itinerary</div>
                    </li>
                    <li>
                        <a href="#prices" class="inline-block border py-2 px-4 font-medium w-full cursor-pointer text-center transition duration-300 py-3" :class="openTab == 3 ? 'bg-primary text-white' : 'bg-white hover:text-primary'">Price</a>
                    </li>
                    <li>
                        <a href="{{route('hotels')}}" target="_blank" class="inline-block border py-2 px-4 font-medium w-full cursor-pointer text-center transition duration-300 py-3">Hotels</a>
                    </li>
                    <li>
                        <a href="#reviews" class="inline-block border py-2 px-4 font-medium w-full cursor-pointer text-center transition duration-300 py-3">Reviews</a>
                    </li>
                </ul>
            </div>

            <section class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="col-span-2 order-2 md:order-1">
                    <div x-show="openTab === 1" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                        <div class="flex mb-3 items-center text-lg text-gray-700 font-bold gap-2">
                            <div class="">
{{--                                <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span>--}}
{{--                                <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span>--}}
                                <span class="inline-block w-5 h-2.5 bg-secondary"></span>
                            </div> {{__('message.pack_deta_par1')}}
                        </div>
                        <div class="">
                            {!! $paquete['descripcion'] !!}
                        </div>

                        <div class="flex items-center text-lg text-gray-700 font-bold gap-2 mt-12">
                            <div class="c">
                                {{--                        <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span>--}}
                                {{--                        <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span>--}}
                                <span class="inline-block w-5 h-2.5 bg-secondary"></span>
                            </div> {{__('message.pack_deta_par2')}}
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-1 mt-6">

                                {{--                    <div class="flex-shrink">--}}

                                {{--                    </div>--}}
                                @php $i = 1; @endphp
{{--                                <div class="grid grid-cols-2 place-content-between md:gap-3">--}}
{{--                                    @foreach($paquete['paquetes_destinos'] as $paquete_destino)--}}
{{--                                        @foreach($paquete_destino['destinos']['destino_imagen'] as $destino_imagen)--}}
{{--                                            <div class="relative @if (count($paquete['paquetes_destinos'])%2 != 0 AND $i == 1) col-span-2 @endif">--}}
{{--                                                <img src="{{$destino_imagen['nombre']}}" alt="" class="@if (count($paquete['paquetes_destinos'])%2 != 0 AND $i == 1) object-cover h-80 object-bottom w-full @endif">--}}
{{--                                                <div class=" inset-x-0 bottom-0 text-sm tracking-wide text- p-2 font-medium">--}}
{{--                                                    {{$paquete_destino['destinos']['nombre']}}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            @php $i++ @endphp--}}
{{--                                        @endforeach--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}

                                <div class="grid grid-cols-3 place-content-between md:gap-3">
                                    @foreach($paquete['paquetes_destinos'] as $paquete_destino)
                                        @foreach($paquete_destino['destinos']['destino_imagen'] as $destino_imagen)
                                            <div class="flex items-center @if (count($paquete['paquetes_destinos'])%2 != 0 AND $i == 1) col-span-2 @endif">
                                                <img src="{{$destino_imagen['nombre']}}" alt="" class="rounded-full h-10 w-10 ">
                                                <div class=" inset-x-0 bottom-0 text-sm tracking-wide text- p-2 font-medium">
                                                    {{$paquete_destino['destinos']['nombre']}}
                                                </div>
                                            </div>
                                            @php $i++ @endphp
                                        @endforeach
                                    @endforeach
                                </div>

                            {{--                    <div class="grid grid-cols-2 bg-primary flex items-center bg-opacity-30 p-6">--}}
                            {{--                        @foreach($paquete['paquetes_destinos'] as $paquete_destino)--}}
                            {{--                        <div class="">--}}

                            {{--                                <h3 class="font-semibold mt-3">{{$paquete_destino['destinos']['nombre']}}</h3>--}}
                            {{--                                <div class="text-sm">--}}
                            {{--                                    {!! $paquete_destino['destinos']['resumen'] !!}--}}
                            {{--                                </div>--}}

                            {{--                        </div>--}}
                            {{--                        @endforeach--}}

                            {{--                    </div>--}}
                        </div>

                        <div class="flex mb-3 items-center text-lg text-gray-700 font-bold gap-2 mt-12">
                            <div class="">
{{--                                <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span>--}}
{{--                                <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span>--}}
                                <span class="inline-block w-5 h-2.5 bg-secondary"></span>
                            </div> Outline
                        </div>

                        <div class="grid">
                            <div class="col-span-4 md:col-span-4">

                                @foreach($paquete->paquete_itinerario as $section)

                                    <h2 class="font-semibold text-sm text-gray-600 mb-4"><span class="capitalize text-white bg-primary py-1 px-2 rounded-md">Day {{$loop->iteration}}:</span> {{ucfirst(strtolower($section->itinerarios->titulo))}}</h2>
{{--                                    <p class="text-sm">{!! $section->itinerarios->descripcion !!}</p>--}}
{{--                                    <article class="mb-4"--}}
{{--                                             @if($loop->first)--}}
{{--                                             x-data="{ open: true }"--}}
{{--                                             @else--}}
{{--                                             x-data="{ open: false }"--}}
{{--                                        @endif--}}
{{--                                    >--}}
{{--                                        <header class="border border-gray-200 px-4 py-2 flex justify-between cursor-pointer bg-gray-100" x-on:click="open = !open">--}}
{{--                                            <h1 class="font-semibold text-sm text-gray-600 "><span class="capitalize">Day {{$loop->iteration}}:</span> {{ucfirst(strtolower($section->itinerarios->titulo))}}</h1>--}}

{{--                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />--}}
{{--                                            </svg>--}}
{{--                                        </header>--}}
{{--                                        <div class="bg-white py-2 px-4 border mt-1" x-show="open" x-transition>--}}
{{--                                            <div class="grid grid-cols-1 gap-2 text-sm">--}}
{{--                                                {!! $section->itinerarios->descripcion !!}--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </article>--}}
                                @endforeach



                            </div>

                        </div>
                        <div class="my-12">

                            <div class="flex mb-3 items-center text-lg text-gray-700 font-bold gap-2">
                                <div class="">
                                    {{--                                <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span>--}}
                                    {{--                                <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span>--}}
                                    <span class="inline-block w-5 h-2.5 bg-secondary"></span>
                                </div> {{__('message.pack_deta_par7')}}
                            </div>
                            <div class="">
                                {!! $paquete['incluye'] !!}
                            </div>

                        </div>

                        <section class="my-12">
                            <div class="flex mb-3 items-center text-lg text-gray-700 font-bold gap-2">
                                <div class="">
                                    {{--                                <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span>--}}
                                    {{--                                <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span>--}}
                                    <span class="inline-block w-5 h-2.5 bg-secondary"></span>
                                </div> {{__('message.pack_deta_par8')}}
                            </div>
                            <div class="">
                                {!! $paquete['noincluye'] !!}
                            </div>
                        </section>
                    </div>



                    <div x-show="openTab === 2" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                        <div class="flex mb-3 items-center text-lg text-gray-700 font-bold gap-2">
                            <div class="">
                                <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span>
                                <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span>
                                <span class="inline-block w-5 h-2.5 bg-secondary"></span>
                            </div> {{__('message.pack_deta_par3')}}
                        </div>

                        <div class="grid">
                            <div class="col-span-4 md:col-span-4">

                                @foreach($paquete->paquete_itinerario as $section)

                                    <article class="mb-4"
                                             @if($loop->first)
                                             x-data="{ open: true }"
                                             @else
                                             x-data="{ open: false }"
                                        @endif
                                    >
                                        <header class="border border-gray-200 px-4 py-2 flex justify-between cursor-pointer bg-gray-100" x-on:click="open = !open">
                                            <h1 class="font-semibold text-sm text-gray-600 "><span class="capitalize">Day {{$loop->iteration}}:</span> {{ucfirst(strtolower($section->itinerarios->titulo))}}</h1>

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </header>
                                        <div class="bg-white py-2 px-4 border mt-1" x-show="open" x-transition>
                                            <div class="grid grid-cols-1 gap-2 text-sm">
                                                {!! $section->itinerarios->descripcion !!}
                                            </div>
                                        </div>
                                    </article>
                                @endforeach



                            </div>

                        </div>
                    </div>

                    @if($paquete['is_p_t'] == 1)
                        <section class="my-12 flex flex-col gap-4" id="prices">

                            <div class="flex mb-3 items-center text-lg text-gray-700 font-bold gap-2">
                                <div class="">
{{--                                    <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span>--}}
{{--                                    <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span>--}}
                                    <span class="inline-block w-5 h-2.5 bg-secondary"></span>
                                </div> {{__('message.pack_deta_par4')}}
                            </div>
                            <p class="font-semibold text-secondary">{{__('message.pack_deta_par5')}}</p>
                            <div class="overflow-hidden">
                                <table class="table-auto min-w-full divide-y divide-gray-200 overflow-x-scroll">
                                    <thead class="bg-gray-50">
                                    <tr>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 font-bold uppercase tracking-wider">
                                            {{__('message.pack_deta_par9')}}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 font-bold uppercase tracking-wider">
                                            {{__('message.pack_deta_par10')}}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 font-bold uppercase tracking-wider">
                                            {{__('message.pack_deta_par11')}}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 font-bold uppercase tracking-wider">
                                            {{__('message.pack_deta_par12')}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-secondary bg-opacity-10 divide-y divide-gray-200">
                                    <tr>

                                        @foreach($paquete['precio_paquetes'] as $precio)
                                            @if($precio['precio_s'] > 0)
                                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500">${{$precio['precio_s']}}<small>USD</small></td>
                                            @else
                                                <td class="px-6 py-4 whitespace-nowrap font-bold text-red-500">{{__('message.button_inquire')}}</td>
                                            @endif
                                        @endforeach

                                    </tr>

                                    <!-- More people... -->
                                    </tbody>
                                </table>
                                <hr class="my-5">
                                <p class="font-semibold text-primary mt-2">Prices are based on double occupancy.</p>
                                <table class="table-auto min-w-full divide-y divide-gray-200 overflow-x-scroll">
                                    <thead class="bg-gray-200">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 font-bold uppercase tracking-wider">
                                            {{__('message.pack_deta_par9')}}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 font-bold uppercase tracking-wider">
                                            {{__('message.pack_deta_par10')}}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 font-bold uppercase tracking-wider">
                                            {{__('message.pack_deta_par11')}}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 font-bold uppercase tracking-wider">
                                            {{__('message.pack_deta_par12')}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-primary bg-opacity-10 divide-y divide-gray-200">

                                    <tr>

                                        @foreach($paquete['precio_paquetes'] as $precio)
                                            @if($precio['precio_d'] > 0)
                                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500">${{$precio['precio_d']}}<small>USD</small></td>
                                            @else
                                                <td class="px-6 py-4 whitespace-nowrap font-bold text-red-500">{{__('message.button_inquire')}}</td>
                                            @endif
                                        @endforeach

                                    </tr>


                                    <!-- More people... -->
                                    </tbody>
                                </table>
                                <hr class="my-5">
                                <p class="font-semibold text-gray-500 mt-2">Prices are based on triple occupancy.</p>
                                <table class="table-auto min-w-full divide-y divide-gray-200 overflow-x-scroll">
                                    <thead class="bg-gray-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white font-bold uppercase tracking-wider">
                                            {{__('message.pack_deta_par9')}}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white font-bold uppercase tracking-wider">
                                            {{__('message.pack_deta_par10')}}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white font-bold uppercase tracking-wider">
                                            {{__('message.pack_deta_par11')}}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white font-bold uppercase tracking-wider">
                                            {{__('message.pack_deta_par12')}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-gray-50 divide-y divide-gray-200">

                                    <tr>

                                        @foreach($paquete['precio_paquetes'] as $precio)
                                            @if($precio['precio_t'] > 0)
                                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500">${{$precio['precio_t']}}<small>USD</small></td>
                                            @else
                                                <td class="px-6 py-4 whitespace-nowrap font-bold text-red-500">{{__('message.button_inquire')}}</td>
                                            @endif
                                        @endforeach

                                    </tr>

                                    <!-- More people... -->
                                    </tbody>
                                </table>

                                <p class="text-sm mt-5 text-gray-500">{{__('message.pack_deta_par6')}}</p>
                            </div>

                        </section>
                    @endif




                </div>
                <div class="flex flex-col gap-3 order-1 md:order-2">
                    <div class="flex flex-col gap-3 sticky top-0 top-12">

                        <div class="">
                            <a href="#form-dream-adventure" class="btn-secondary font-bold text-center w-full block">{{__('message.button_inquire')}}</a>
                            @if($paquete['codigo_f'])
                                <button class="wtrvl-checkout_button btn-primary block mt-2 w-full mb-2" id="wetravel_button_widget" data-env="https://www.wetravel.com" data-version="v0.2" data-uid="239346" data-uuid="{{$paquete['codigo_f']}}" href="https://www.wetravel.com/checkout_embed?uuid={{$paquete['codigo_f']}}" >Book Now</button>
                            @endif
                        </div>

                            <div class="flex gap-3">
                                <div class="flex-1 border p-3 flex text-xl items-center justify-center">
                                    @foreach($paquete['paquetes_categoria'] as $category_p)
                                        <div class="text-xl font-semibold text-gray-600">
                                            <span class="text-xs">Travel Style</span>
                                            <span class="block text-base">   {{ucwords(strtolower($category_p['categoria']['nombre']))}}</span>
                                        </div>

                                    @endforeach
                                </div>

                                <div class="flex-1 border py-2 px-3 flex items-center">

                                        <div class="text-xl font-semibold text-gray-600">
                                            <span class="text-xs">Physical Rating</span>
                                            @foreach($paquete['paquetes_dificultad'] as $dificultad)
                                            <span class="block text-base">   {{ucwords(strtolower($dificultad['dificultad']['nombre']))}}</span>
                                            @endforeach
                                        </div>


                                </div>
                            </div>

                            <div class="flex gap-3">
                                <div class="flex-1 border p-3 flex text-xl items-center justify-center">

                                    <div class="text-xl font-semibold text-gray-600">
                                        <span class="text-xs">Group Size</span>
                                        <span class="block text-base">{{$paquete['group_size']}}</span>
                                    </div>


                                </div>

                                <a href="#reviews" class="flex-1 border py-2 px-3 flex items-center">


                                        <div class="text-xl font-semibold text-gray-600">
                                            <span class="text-xs">Reviews</span>
                                            {{--                                    <span class="block text-base"></span>--}}
                                        </div>

                                </a>
                            </div>







                        <img src="{{$paquete['mapa']}}" alt="" class="w-full mt-2">
                    </div>



                </div>


            </section>

        </section>


{{--        <div class="container mt-12 hidden mb-3">--}}
{{--            <div class="flex items-center text-lg text-gray-700 font-bold gap-2">--}}
{{--                <div class="c">--}}
{{--                    <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span>--}}
{{--                    <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span>--}}
{{--                    <span class="inline-block w-5 h-2.5 bg-secondary"></span>--}}
{{--                </div> Destinations--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <section class="flex flex-col hidden gap-4">--}}

{{--            <div class="grid grid-cols-1 md:grid-cols-6 md:gap-3">--}}
{{--                <div class="col-span-4 md:col-span-4 flex md:gap-3">--}}
{{--                    --}}{{--                    <div class="flex-shrink">--}}

{{--                    --}}{{--                    </div>--}}
{{--                    @php $i = 1; @endphp--}}
{{--                    <div class="grid grid-cols-2 place-content-between md:gap-3">--}}
{{--                        @foreach($paquete['paquetes_destinos'] as $paquete_destino)--}}
{{--                            @foreach($paquete_destino['destinos']['destino_imagen'] as $destino_imagen)--}}
{{--                                <div class="relative @if (count($paquete['paquetes_destinos'])%2 != 0 AND $i == 1) col-span-2 @endif">--}}
{{--                                    <img src="{{$destino_imagen['nombre']}}" alt="" class="@if (count($paquete['paquetes_destinos'])%2 != 0 AND $i == 1) object-cover h-80 object-bottom w-full @endif">--}}
{{--                                    <div class="absolute inset-x-0 bottom-0 text-sm tracking-wide text-white p-2 font-medium">--}}
{{--                                        {{$paquete_destino['destinos']['nombre']}}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @php $i++ @endphp--}}
{{--                            @endforeach--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-span-2 md:col-span-2 bg-primary flex items-center bg-opacity-30 p-6">--}}
{{--                    <div class="">--}}
{{--                        @foreach($paquete['paquetes_destinos'] as $paquete_destino)--}}
{{--                            <h3 class="font-semibold mt-3">{{$paquete_destino['destinos']['nombre']}}</h3>--}}
{{--                            <div class="text-sm">--}}
{{--                                {!! $paquete_destino['destinos']['resumen'] !!}--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

        <section class="container hidden md:block" id="reviews">

            <div class="flex mb-3 items-center text-lg text-gray-700 font-bold gap-2">
                <span class="inline-block w-5 h-2.5 bg-secondary"></span> {{__('message.subtitle5')}}
            </div>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <div class="col-span-2 flex gap-4 flex-wrap content-between overflow-hidden">
                    <div class="w-full">
                        <div class="grid grid-cols-2 w-full items-center text-center text-gray-700 dark:text-gray-300 gap-2">
                            <div class="border p-4 w-full">
                                <p class="block text-4xl font-bold">97%</p>
                                <p class="text-xs">{{__('message.social_con1')}}</p>
                            </div>
                            <div class="border p-4 w-full">
                                <p class="block text-3xl font-bold">9000 +</p>
                                <p class="text-xs">{{__('message.social_con2')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        {{--            <div class="bg-fixed bg-cover bg-center bg-no-repeat" style="background-image: url({{asset('images/hotels-t.jpg')}})">--}}
                        {{--                <img src="{{asset('images/hotels-t.jpg')}}" alt="" class="h-full object-cover min-w-full transition duration-500 ease-in-out transform hover:-translate-x-0 hover:scale-105">--}}
                        <div class="flex items-center justify-center">
                            <div class="border bg-white p-6 dark:bg-gray-800 text-gray-800 dark:text-gray-300">
                                <p class="mb-2 flex inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{__('message.social_li1')}}
                                </p>
                                <p class="mb-2 flex inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{__('message.social_li2')}}
                                </p>
                                <p class="mb-2 flex inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{__('message.social_li3')}}
                                </p>
                                <p class="mb-2 flex inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{__('message.social_li4')}}
                                </p>
                                <p class="mb-2 flex inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{__('message.social_li5')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex inline-flex items-center text-2xl text-gray-700 font-bold gap-3">
                        <div class="border">
                            <a href="https://www.tripadvisor.com.pe/Attraction_Review-g294314-d15202262-Reviews-Gotoperu-Cusco_Cusco_Region.html" target="_blank"><img src="https://gotoperu.com.mx/images/icons/tripadvisor.png" alt="" class="p-4 dark:filter dark:grayscale dark:invert"></a>
                        </div>
                        <div class="border">
                            <a href="https://www.yelp.com/biz/gotoperu-washington?osq=gotoperu.com" target="_blank"><img src="https://gotoperu.com.mx/images/icons/yelp.png" alt="" class="p-4 dark:filter dark:grayscale dark:invert"></a>
                        </div>
                        <div class="border">
                            <a href="https://www.trustpilot.com/review/gotoperu.com"><img src="https://gotoperu.com.mx/images/icons/trust.png" alt="" class="p-4 dark:filter dark:grayscale dark:invert"></a>
                        </div>
                    </div>


                </div>
                <div class="col-span-3 grid grid-cols-1 items-center relative overflow-hidden bg-center bg-no-repeat bg-cover" style="background-image: url('{{asset('images/banners/redes.jpg')}}')">
                    {{--            <img src="{{asset('images/hotels-t.jpg')}}" alt="" class="h-full object-cover min-w-full transition duration-500 ease-in-out transform hover:-translate-x-0 hover:scale-105">--}}

                    {{--            <div class="absolute flex items-center inset-0 ">--}}
                    <div class="md:mx-16">
                        <div class="w-full swiper-container mySwiper">
                            <div class="swiper-wrapper">
                                @foreach($testinomials as $testinomial)
                                    <div class="swiper-slide p-12">
                                        <div class="my-10 mx-16 w-full mx-auto rounded-lg bg-gray-100 dark:bg-gray-800 shadow-lg px-5 pt-5 pb-10 text-gray-800 dark:text-gray-300">
                                            <div class="w-full pt-1 text-center pb-5 -mt-16 mx-auto">
                                                <a href="#" class="block relative">
                                                    <img alt="profil" src="https://gotoperu.com.mx/images/video-testimonial/2.jpg" class="mx-auto object-cover rounded-full h-20 w-20 z-30"/>
                                                </a>
                                            </div>
                                            <div class="w-full mb-6">
                                                <div class="text-3xl text-indigo-500 text-left leading-tight h-3">
                                                    “
                                                </div>
                                                <p class="text-sm text-gray-600 dark:text-gray-100 text-center px-5">
                                                    {{ Str::limit($testinomial->contenido, 150) }}
                                                </p>
                                                <div class="text-3xl text-indigo-500 text-right leading-tight h-3 -mt-3">
                                                    ”
                                                </div>
                                            </div>
                                            <div class="w-full text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto cursor-pointer text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>

                                                <p class="text-md text-indigo-500 font-bold text-center">
                                                    {{ $testinomial->nombre }}
                                                </p>
                                                <p class="text-xs text-gray-500 dark:text-gray-300 text-center">
                                                    {{ $testinomial->ciudad }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next btn-next"></div>
                            <div class="swiper-button-prev btn-prev"></div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="container mt-6 mb-12 ">
            {{--        <div class="flex mb-3 items-center text-2xl text-gray-700 dark:text-primary font-bold gap-2">--}}
            {{--            <div class="">--}}
            {{--                <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span>--}}
            {{--                <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span>--}}
            {{--                <span class="inline-block w-5 h-2.5 bg-secondary"></span>--}}
            {{--            </div> Social Media--}}
            {{--        </div>--}}

            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <div class="col-span-3 grid grid-cols-1 items-center relative bg-fixed bg-center bg-no-repeat bg-cover" style="background-image: url({{asset('images/hotels-t.jpg')}})">
                    <div class="flex relative">
                        {{--                    <div class="elfsight-app-ba7c9526-9468-4d5b-b378-68ec76259e00"></div>--}}
                        <img src="{{asset('images/banners/social.jpg')}}" alt="" class="object-cover h-full w-full">
                        <div class="absolute inset-0 gradient-cicle-gray"></div>
                    </div>
                </div>
                <div class="col-span-2 flex gap-4 flex-col justify-between content-between overflow-hidden">
                    <div class="">
                        <div class="flex items-center text-center text-gray-700 dark:text-gray-300 gap-2">
                            <div class="border p-4 w-1/2">
                                <p class="block text-4xl font-bold">30 000</p>
                                <p class="text-xs">FACEBOOK FANS</p>
                            </div>
                            <div class="border p-4 w-1/2">
                                <p class="block text-3xl font-bold">#gotoperu</p>
                                <p class="text-xs">INSTAGRAM HASHTAG</p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        {{--            <div class="bg-fixed bg-cover bg-center bg-no-repeat" style="background-image: url({{asset('images/hotels-t.jpg')}})">--}}

                        <div class="bg-gray-500 bg-opacity-10 text-center p-12">
                            <img src="https://gotoperu-com.s3-us-west-1.amazonaws.com/logos/logo-gotoperu-black.png" alt="" class="mx-auto py-4">
                            <h3>{{__('message.revi_subtitle1')}}</h3>
                            <p>{{__('message.revi_par3')}}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-4 items-center text-2xl text-gray-700 font-bold gap-3">
                        <div class="border">
                            <a href="https://www.instagram.com/go.to.peru/" target="_blank"><img src="{{asset('images/logos/instagram.png')}}" alt="" class="p-6"></a>
                        </div>
                        <div class="border">
                            <a href="https://www.facebook.com/GOTOPERUcom/" target="_blank"><img src="{{asset('images/logos/facebook.png')}}" alt="" class="p-6"></a>
                        </div>
                        <div class="border">
                            <a href="https://www.youtube.com/channel/UCWjJ10j-_BfNTDnmjBug8Ng" target="_blank"><img src="{{asset('images/logos/youtube.png')}}" alt="" class="p-6"></a>
                        </div>
                        <div class="border">
                            <a href="https://www.tiktok.com/@gotoperu" target="_blank"><img src="{{asset('images/logos/tiktok.png')}}" alt="" class="p-6"></a>
                        </div>
                    </div>


                </div>
            </div>

        </section>



        @livewire('page.form-footer-detail', ['paquete' => $paquete['titulo']], key('paquete'.$paquete['id']))
    @endforeach

    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    @endpush
    @push('scripts')
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="https://cdn.wetravel.com/master/core-app/assets/embed_checkout.js"></script>
        <script>
            var swiper = new Swiper(".mySwiper", {
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
            var swiper = new Swiper(".slider-featured", {
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        </script>

    @endpush

@endsection
