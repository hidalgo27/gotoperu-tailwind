@props(['paquete', 'variant' => 'default'])

@if($variant === 'home-featured')
    @php
        // Reuse the standard card's tour / three-star package pricing source.
        $featuredPrices = $paquete['is_p_t'] == 0
            ? collect([$paquete['precio_tours']])
            : collect($paquete['precio_paquetes'])->where('estrellas', 3)->pluck('precio_d');
        $featuredDestinations = collect($paquete['paquetes_destinos']);
    @endphp
    <article class="h-full" data-package-id="{{ $paquete->id }}" data-package-slug="{{ $paquete->url }}" data-package-name="{{ $paquete->titulo }}">
        <a href="{{ route('packages.detail', $paquete) }}" data-home-action="package"
           class="group home-featured-card focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary">
            <img src="{{ $paquete->imagen }}" alt="" loading="lazy" decoding="async"
                 class="home-card-photo absolute inset-0">
            <div class="relative isolate px-5 pb-5 pt-24 md:px-6 md:pb-6">
                <span class="home-card-shade from-tertiary via-tertiary/70 to-transparent" aria-hidden="true"></span>
                @if($featuredDestinations->isNotEmpty())
                    <p class="mb-3 text-xs leading-relaxed text-white/70">
                        @foreach($featuredDestinations->take(2) as $paquete_destino)
                            {{ $paquete_destino['destinos']['nombre'] }}@unless($loop->last) · @endunless
                        @endforeach
                        @if($featuredDestinations->count() > 2)
                            <span aria-label="{{ $featuredDestinations->count() - 2 }} more destinations"> · +{{ $featuredDestinations->count() - 2 }}</span>
                        @endif
                    </p>
                @endif
                <p class="mb-3 inline-flex items-center rounded-full bg-secondary px-2.5 py-1 text-xs font-semibold uppercase text-tertiary">
                    {{ $paquete['duracion'] }} {{ __('message.pack_par4') }}
                </p>
                <h3 class="home-featured-title">{{ $paquete['titulo'] }}</h3>
                <div class="mt-4 flex flex-wrap items-center justify-between gap-3">
                    <div class="text-sm">
                        @forelse($featuredPrices as $price)
                            @if($price > 0)
                                <p><span class="text-xs text-white/80">From</span> <strong class="font-medium">${{ $price }}</strong> <span class="text-xs text-white/80">USD</span></p>
                            @else
                                <p class="font-medium">{{ __('message.pack_par6') }}</p>
                            @endif
                        @empty
                            <p class="font-medium">{{ __('message.pack_par6') }}</p>
                        @endforelse
                    </div>
                    <span class="inline-flex shrink-0 items-center gap-2 text-xs font-medium text-white/90 transition-colors duration-300 group-hover:text-secondary">
                        View trip
                        <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-4 w-4" aria-hidden="true" />
                    </span>
                </div>
            </div>
        </a>
    </article>
@elseif($variant === 'home')
    @php
        $cardDestinations = collect($paquete['paquetes_destinos']);
    @endphp
    <article class="group flex h-full flex-col overflow-hidden rounded-md border border-gray-200 bg-white"
             data-package-id="{{ $paquete->id }}" data-package-slug="{{ $paquete->url }}" data-package-name="{{ $paquete->titulo }}">
        <div class="home-standard-media">
            <a href="{{ route('packages.detail', $paquete) }}" data-home-action="package"
               class="relative block h-full w-full focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary">
                <img src="{{ $paquete->imagen }}" alt="{{ $paquete['titulo'] }}" loading="lazy" decoding="async"
                     class="home-card-photo">
                <div class="absolute inset-x-0 top-0 flex flex-wrap gap-1 p-3">
                    @foreach($cardDestinations->take(3) as $paquete_destino)
                        <span class="rounded-full bg-white/90 px-2 py-1 text-xs leading-snug text-tertiary">{{ $paquete_destino['destinos']['nombre'] }}</span>
                    @endforeach
                    @if($cardDestinations->count() > 3)
                        <span class="rounded-full bg-white/90 px-2 py-1 text-xs leading-snug text-tertiary" aria-label="{{ $cardDestinations->count() - 3 }} more destinations">+{{ $cardDestinations->count() - 3 }}</span>
                    @endif
                </div>
                <span class="absolute bottom-3 right-3 inline-flex items-center gap-1 rounded-full bg-secondary px-2.5 py-1 text-xs font-semibold uppercase text-tertiary">
                    <x-heroicon-o-calendar class="h-4 w-4 shrink-0" aria-hidden="true" />
                    {{ $paquete['duracion'] }} {{ __('message.pack_par4') }}
                </span>
            </a>
        </div>
        <div class="flex flex-1 flex-col p-3">
            <h3 class="mb-2 text-base font-semibold leading-snug text-tertiary">
                <a href="{{ route('packages.detail', $paquete) }}" class="hover:underline focus-visible:outline-primary" data-home-action="package">{{ $paquete['titulo'] }}</a>
            </h3>
            <div class="mt-auto grid grid-cols-2 items-center gap-4 border-t border-gray-100 pt-2">
                <div class="flex h-full min-w-0 flex-col justify-center">
                    @if($paquete['is_p_t'] == 0)
                        @if($paquete['precio_tours'] > 0)
                            <p class="mb-1 text-xs font-semibold uppercase tracking-widest text-gray-500">Price from</p>
                            <p class="flex items-baseline gap-1">
                                <span class="text-2xl font-semibold leading-tight text-tertiary">${{ $paquete['precio_tours'] }}</span>
                                <span class="text-xs font-medium text-gray-500">USD</span>
                            </p>
                        @else
                            <p class="text-lg font-semibold text-primary">{{ __('message.pack_par6') }}</p>
                        @endif
                    @else
                        @forelse(collect($paquete['precio_paquetes'])->where('estrellas', 3) as $precio)
                            @if($precio['precio_d'] > 0)
                                <p class="mb-1 text-xs font-semibold uppercase tracking-widest text-gray-500">Price from</p>
                                <p class="flex items-baseline gap-1">
                                    <span class="text-2xl font-semibold leading-tight text-tertiary">${{ $precio['precio_d'] }}</span>
                                    <span class="text-xs font-medium text-gray-500">USD</span>
                                </p>
                            @else
                                <p class="text-lg font-semibold text-primary">{{ __('message.pack_par6') }}</p>
                            @endif
                        @empty
                            <p class="text-lg font-semibold text-primary">{{ __('message.pack_par6') }}</p>
                        @endforelse
                    @endif
                </div>
                <div class="flex w-full min-w-0 flex-col items-stretch justify-center gap-2">
                    <a href="{{ route('packages.detail', $paquete) }}" class="home-card-action w-full border border-primary bg-primary text-xs font-semibold text-white transition-colors duration-200 hover:bg-primary/90" data-home-action="package">
                        View Itinerary
                    </a>
                    <a href="{{ route('packages.detail', $paquete) }}#form-dream-adventure"
                       class="group/quote relative inline-flex w-full items-center justify-center gap-1.5 overflow-hidden px-1 py-2 text-center text-xs font-medium text-tertiary focus-visible:outline-primary"
                       data-home-action="package-quote" data-quote-source="packages">
                        <span>Request a Quote</span>
                        <x-heroicon-o-arrow-narrow-right class="h-3 w-3 shrink-0 motion-safe:transition-transform motion-safe:duration-300 motion-safe:ease-out motion-safe:group-hover/quote:translate-x-1 motion-safe:group-focus-visible/quote:translate-x-1" aria-hidden="true" />
                        <span class="absolute inset-x-0 bottom-1 h-px origin-left scale-x-0 bg-secondary group-hover/quote:scale-x-100 group-focus-visible/quote:scale-x-100 motion-safe:transition-transform motion-safe:duration-300 motion-safe:ease-out" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
    </article>
@else
<div  class="group   border hover:border-primary transition duration-500 hover:shadow-xl ">
    <div class="overflow-hidden relative">
        <a href="{{ route('packages.detail', $paquete) }}">
        <div class="relative z-0">

                <img src="{{ $paquete->imagen }}" alt="{{ $paquete['titulo'] }}" class="object-cover h-96 w-full transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105"/>

            <div class="absolute inset-0 gradient-cicle-gray z-0"></div>
            <div class="absolute top-0 left-0 p-4 z-50 flex flex-wrap gap-1">

                @foreach($paquete['paquetes_destinos'] as $paquete_destino)
                    <div class="rounded-full backdrop-blur-sm bg-primary/30 text-white text-xs font-semibold px-2 py-1">
                        {{ $paquete_destino['destinos']['nombre'] }}
{{--                        @if ($loop->iteration < count($paquete['paquetes_destinos'])) , @else . @endif--}}
                    </div>
                @endforeach
            </div>
        </div>
        </a>

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
        <div class="absolute inset-x-0 bottom-0 w-full p-4">
            @php
                $categorias = $paquete['paquetes_categoria'] ?? [];
            @endphp
            @if(!empty($categorias))
                <div class="flex flex-wrap gap-1  overflow-x-auto">
                    @foreach($categorias as $pc)
                        @php $nombreCat = $pc['categoria']['nombre'] ?? null; @endphp
                        @if($nombreCat)
                            <span class="px-2 py-0.5  text-white text-xs backdrop-blur-sm bg-secondary/30 rounded-full">
                                    {{ strtolower($nombreCat) }}
                                </span>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="px-4 ">

        <div class="">


            <h2 class="pt-2 font-bold whitespace-nowrap truncate">{{ $paquete['titulo'] }}</h2>
        </div>



        {{-- Destinos en línea --}}
        <p class="text-xs mt-2">

        </p>

        <div class="font-bold text-gray-800  dark:text-gray-300 text-lg mb-4">

            {{-- Iconografía (as-is) --}}


            {{-- Duración + Precio --}}
            <span class="text-gray-500">{{ $paquete['duracion'] }} {{ __('message.pack_par4') }} /</span>
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
                            <sup>from $ </sup><span class="text-3xl">{{ $precio['precio_d'] }}</span> <span class="text-sm ">usd</span>
                        @else
                            <span class="text-red-500">{{ __('message.pack_par6') }}</span>
                        @endif
                    @endif
                @endforeach
            @endif
        </div>

        <div class="grid grid-cols-2 gap-2 mb-4">
        {{-- Botones --}}
{{--            @if($paquete['codigo_f'])--}}
{{--                <button--}}
{{--                    class="wtrvl-checkout_button btn-primary whitespace-nowrap text-center !py-2 !px-0"--}}
{{--                    id="wetravel_button_widget"--}}
{{--                    data-env="https://www.wetravel.com"--}}
{{--                    data-version="v0.2"--}}
{{--                    data-uid="239346"--}}
{{--                    data-uuid="{{ $paquete['codigo_f'] }}"--}}
{{--                    href="https://www.wetravel.com/checkout_embed?uuid={{ $paquete['codigo_f'] }}"--}}
{{--                >--}}
{{--                    {{ __('message.button_book') }}--}}
{{--                </button>--}}
{{--            @endif--}}

            <a href="#form-dream-adventure" class="btn-primary whitespace-nowrap text-center !py-2 !px-0">
                Request a Quote
            </a>
            <a href="{{ route('packages.detail', $paquete) }}" class="btn-secondary whitespace-nowrap text-center !py-2 !px-0">
{{--                {{ __('message.button_detail') }}--}}
                View Itinerary
            </a>
        </div>
    </div>
</div>

@endif
