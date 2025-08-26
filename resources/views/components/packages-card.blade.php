@props(['paquete'])

<a href="{{ route('packages.detail', $paquete) }}" class="group   border hover:border-primary transition duration-500 hover:shadow-xl ">
    <div class="overflow-hidden relative">
        <div class="relative z-0">
            <img src="{{ $paquete->imagen }}" alt="{{ $paquete['titulo'] }}" class="object-cover h-96 w-full transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105"/>
            <div class="absolute inset-0 gradient-cicle-gray z-0"></div>
            <div class="absolute top-0 left-0 p-4 z-50 flex flex-wrap gap-1">

                @foreach($paquete['paquetes_destinos'] as $paquete_destino)
                    <div class="rounded-full bg-primary bg-opacity-40 text-white text-xs font-semibold px-2 py-1">
                        {{ $paquete_destino['destinos']['nombre'] }}
{{--                        @if ($loop->iteration < count($paquete['paquetes_destinos'])) , @else . @endif--}}
                    </div>
                @endforeach
            </div>
        </div>

{{--        <div class="absolute inset-x-0 bottom-0 w-full p-6">--}}
{{--            <div class="bg-primary bg-opacity-95 p-4 text-gray-50 group-hover:bg-opacity-100 transition duration-500 rounded-lg shadow-xl">--}}
{{--                --}}{{-- Título --}}
{{--                <h2 class="text-xl font-bold">{{ $paquete['titulo'] }}</h2>--}}



{{--                --}}{{-- Destinos en línea --}}
{{--                <p class="text-xs mt-2">--}}
{{--                    @foreach($paquete['paquetes_destinos'] as $paquete_destino)--}}
{{--                        {{ $paquete_destino['destinos']['nombre'] }}--}}
{{--                        @if ($loop->iteration < count($paquete['paquetes_destinos'])) , @else . @endif--}}
{{--                    @endforeach--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <div class="px-4">

        <div class="">
            @php
                $categorias = $paquete['paquetes_categoria'] ?? [];
            @endphp
            @if(!empty($categorias))
                <div class="flex flex-wrap gap-1 mt-3 overflow-x-auto">
                    @foreach($categorias as $pc)
                        @php $nombreCat = $pc['categoria']['nombre'] ?? null; @endphp
                        @if($nombreCat)
                            <span class="px-2 py-0.5  text-primary text-xs border rounded-full">
                                    {{ strtolower($nombreCat) }}
                                </span>
                        @endif
                    @endforeach
                </div>
            @endif

            <h2 class="pt-2 font-bold whitespace-nowrap truncate">{{ $paquete['titulo'] }}</h2>
        </div>



        {{-- Destinos en línea --}}
        <p class="text-xs mt-2">

        </p>

        <div class="font-bold text-gray-500 dark:text-gray-300 text-lg mb-4">

            {{-- Iconografía (as-is) --}}


            {{-- Duración + Precio --}}
            {{ $paquete['duracion'] }} {{ __('message.pack_par4') }} /
            @if($paquete['is_p_t'] == 0)
                @if($paquete['precio_tours'] > 0)
                    ${{ $paquete['precio_tours'] }} <span class="text-sm text-secondary">usd</span>
                @else
                    <span class="text-red-500">{{ __('message.pack_par6') }}</span>
                @endif
            @else
                @foreach($paquete['precio_paquetes'] as $precio)
                    @if($precio['estrellas'] == 3)
                        @if($precio['precio_d'] > 0)
                            ${{ $precio['precio_d'] }} <span class="text-sm text-secondary">usd</span>
                        @else
                            <span class="text-red-500">{{ __('message.pack_par6') }}</span>
                        @endif
                    @endif
                @endforeach
            @endif
        </div>

        {{-- Botones --}}
{{--        @if($paquete['codigo_f'])--}}
{{--            <button--}}
{{--                class="wtrvl-checkout_button btn-primary block w-full mb-2"--}}
{{--                id="wetravel_button_widget"--}}
{{--                data-env="https://www.wetravel.com"--}}
{{--                data-version="v0.2"--}}
{{--                data-uid="239346"--}}
{{--                data-uuid="{{ $paquete['codigo_f'] }}"--}}
{{--                href="https://www.wetravel.com/checkout_embed?uuid={{ $paquete['codigo_f'] }}"--}}
{{--            >--}}
{{--                {{ __('message.button_book') }}--}}
{{--            </button>--}}
{{--        @endif--}}

{{--        <a href="{{ route('packages.detail', $paquete) }}" class="btn-secondary block">--}}
{{--            {{ __('message.button_detail') }}--}}
{{--        </a>--}}
    </div>
</a>
