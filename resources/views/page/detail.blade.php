@extends('layouts.page-layout')
@section('content')
    @php
        $heroDestinations = collect($paquete['paquetes_destinos'] ?? [])
            ->map(function ($destination) {
                $name = data_get($destination, 'destinos.nombre');
                return is_string($name) ? trim($name) : null;
            })
            ->filter()
            ->unique(fn($name) => mb_strtolower($name))
            ->values();

        $heroPrice = ($paquete['is_p_t'] ?? null) == 1
            ? data_get(collect($paquete['precio_paquetes'] ?? [])->firstWhere('estrellas', 3), 'precio_d')
            : ($paquete['precio_tours'] ?? null);
        $hasHeroPrice = is_numeric($heroPrice) && $heroPrice > 0;
    @endphp

    <section class="package-hero bg-gray-900 text-gray-50" aria-labelledby="package-hero-title">
        <div class="swiper mySwiper2 package-hero__gallery">
            <div class="swiper-wrapper">
                @foreach ($paquete['imagen_paquetes'] as $destino_imagen)
                    <div class="swiper-slide">
                        <img src="{{ $destino_imagen['nombre'] }}" alt="{{ $paquete['titulo'] }}"
                            class="w-full h-full object-cover">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="package-hero__shade" aria-hidden="true"></div>

        <div class="container package-shell package-hero__content">
            <div class="package-hero__identity">
                <p class="package-hero__duration inline-flex items-center gap-2 text-sm font-semibold">
                    <x-heroicon-o-calendar class="h-5 w-5 flex-shrink-0 text-secondary" aria-hidden="true" />
                    {{ $paquete['duracion'] }} {{ __('message.pack_par4') }}
                </p>
                <h1 id="package-hero-title" class="package-hero__title font-semibold drop-shadow">{{ $paquete['titulo'] }}</h1>
                @if ($heroDestinations->isNotEmpty())
                    <div class="package-hero__destinations flex items-start gap-2 leading-relaxed">
                        <x-heroicon-o-location-marker class="h-5 w-5 flex-shrink-0" aria-hidden="true" />
                        <p>{{ $heroDestinations->implode(' • ') }}</p>
                    </div>
                @endif

                <div class="package-hero__offer text-sm">
                    @if ($hasHeroPrice)
                        <p class="flex flex-wrap items-baseline gap-2">
                            <span>From</span>
                            <strong class="text-2xl font-semibold">${{ number_format((float) $heroPrice, (float) $heroPrice == (int) $heroPrice ? 0 : 2, '.', ',') }}</strong>
                            <span>per person <span class="text-xs">USD</span></span>
                        </p>
                    @else
                        <p class="package-hero__pricing-note text-xs">Contact us for pricing</p>
                    @endif
                </div>

                <div class="package-hero__actions">
                    <a href="#form-dream-adventure" class="btn-secondary text-center">Request a Quote</a>
                    @if ($paquete['codigo_f'])
                        <button class="wtrvl-checkout_button btn-white inline-flex items-center justify-center" id="wetravel_button_widget"
                            data-env="https://www.wetravel.com" data-version="v0.2" data-uid="239346"
                            data-uuid="{{ $paquete['codigo_f'] }}"
                            href="https://www.wetravel.com/checkout_embed?uuid={{ $paquete['codigo_f'] }}">Book
                            Now</button>
                    @endif
                </div>

                <a href="#package-journey" class="package-hero__scroll inline-flex items-center gap-3 text-xs hover:text-secondary">
                    <span>Explore the journey</span>
                    <x-heroicon-o-arrow-down class="h-5 w-5" aria-hidden="true" />
                </a>
            </div>
        </div>

        <div class="package-hero__gallery-controls">
            @foreach ($paquete['imagen_paquetes'] as $destino_imagen)
                <a class="venobox @if ($loop->first) btn-white inline-flex items-center gap-2 @endif"
                    data-gall="packageHeroGallery" href="{{ $destino_imagen['nombre'] }}"
                    data-title="{{ $paquete['titulo'] }}" @if (!$loop->first) hidden @endif>
                    @if ($loop->first)
                        <x-heroicon-o-view-grid class="h-4 w-4 flex-shrink-0" aria-hidden="true" />
                        View Gallery
                    @endif
                </a>
            @endforeach
            <div class="package-hero__pagination text-xs font-semibold" role="group" aria-label="Gallery position" hidden>
                <span data-package-slide-current></span>
                <span class="package-hero__progress" aria-hidden="true"><span class="package-hero__progress-fill bg-secondary"></span></span>
                <span data-package-slide-total></span>
            </div>
        </div>
    </section>

    <section id="package-journey" class="package-bridge" aria-labelledby="package-glance-title">
        <div class="container package-shell package-bridge__layout">
            <div class="package-bridge__backdrop bg-gray-700" aria-hidden="true"></div>
            <aside class="package-expert bg-gray-700 text-gray-50" aria-labelledby="package-expert-title">
                <div class="package-expert__terrain bg-line-cover" aria-hidden="true"></div>
                <div class="package-expert__copy">
                    <p class="package-expert__eyebrow text-secondary font-semibold">Book With Confidence</p>
                    <h2 id="package-expert-title" class="package-expert__title font-semibold leading-tight mt-3">
                        <a href="#form-dream-adventure" class="hover:text-secondary">
                            Plan with our Peru experts
                            <x-heroicon-o-arrow-right class="inline-block h-5 w-5" aria-hidden="true" />
                        </a>
                    </h2>
                    <p class="mt-3 text-xs leading-relaxed">Customize this itinerary with our travel advisors.</p>
                </div>
                <img src="/images/team/angie.png" alt="GoToPeru team" class="package-expert__portrait" width="436" height="577">
            </aside>
            <div class="package-glance bg-gray-50" data-package-reveal>
                <div class="package-glance__terrain bg-line-cover" aria-hidden="true"></div>
                <h2 id="package-glance-title" class="flex items-center gap-3 text-lg font-bold text-gray-700 mb-6">
                    <span aria-hidden="true" class="inline-flex items-center gap-1"><span class="inline-block w-1 h-2.5 bg-secondary"></span><span class="inline-block w-3 h-2.5 bg-secondary"></span><span class="inline-block w-5 h-2.5 bg-secondary"></span></span> Trip at a glance
                </h2>
                <dl class="package-glance__facts grid grid-cols-2 gap-6">
                    <div class="flex items-center gap-2">
                        <span class="rounded-full bg-primary text-white p-2"><x-heroicon-o-calendar class="h-5 w-5 flex-shrink-0" aria-hidden="true" /></span>
                        <div>
                            <dt class="text-xs text-gray-500">Duration</dt>
                            <dd class="text-sm font-semibold text-gray-700 mt-1">{{ $paquete['duracion'] }} {{ __('message.pack_par4') }}</dd>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="rounded-full bg-primary text-white p-2"><x-heroicon-o-location-marker class="h-5 w-5 flex-shrink-0" aria-hidden="true" /></span>
                        <div>
                            <dt class="text-xs text-gray-500">Travel Style</dt>
                            <dd class="text-sm font-semibold text-gray-700 mt-1">ESCORTED TOURS</dd>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="rounded-full bg-primary text-white p-2"><x-heroicon-o-calendar class="h-5 w-5 flex-shrink-0" aria-hidden="true" /></span>
                        <div>
                            <dt class="text-xs text-gray-500">Season</dt>
                            <dd class="text-sm font-semibold text-gray-700 mt-1">JAN - DEC</dd>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="rounded-full bg-primary text-white p-2"><x-heroicon-o-flag class="h-5 w-5 flex-shrink-0" aria-hidden="true" /></span>
                        <div>
                            <dt class="text-xs text-gray-500">Departure</dt>
                            <dd class="text-sm font-semibold text-gray-700 mt-1">Daily</dd>
                        </div>
                    </div>
                </dl>
                <p class="package-glance__interest flex items-start gap-2 border-t border-gray-200 text-xs leading-relaxed text-gray-500">
                    <span class="text-primary"><x-heroicon-o-star class="h-5 w-5 flex-shrink-0" aria-hidden="true" /></span>
                    <span><span class="font-semibold text-gray-700">Interest:</span> Culture, history, Adventure</span>
                </p>
            </div>
        </div>
    </section>

    <section class="package-story" x-data="{ openTab: 1 }">
        <div class="container">
            <div class="package-journey grid grid-cols-1 xl:grid-cols-12 items-start gap-7 pt-9 lg:pt-12 xl:gap-x-10 xl:gap-y-0">
                <section id="package-overview" class="package-overview xl:col-span-8 xl:col-start-1 xl:row-start-1" aria-labelledby="package-overview-title" x-show="openTab === 1"
                    x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                    <div class="package-overview__copy bg-white" data-package-reveal>
                        <span aria-hidden="true" class="inline-flex items-center gap-1 mb-6"><span class="inline-block w-1 h-2.5 bg-secondary"></span><span class="inline-block w-3 h-2.5 bg-secondary"></span><span class="inline-block w-5 h-2.5 bg-secondary"></span></span>
                        <h2 id="package-overview-title" class="package-overview__title text-3xl font-semibold text-gray-700 mb-4">{{ __('message.pack_deta_par1') }}</h2>
                        <div class="package-overview__text text-base leading-relaxed text-gray-600">
                            {!! $paquete['descripcion'] !!}
                        </div>
                    </div>
                </section>
                <section id="package-itinerary" class="package-route bg-white xl:col-span-8 xl:col-start-1 xl:row-start-2" aria-labelledby="package-itinerary-title" x-show="openTab === 1">
                    <figure class="package-route__map" data-package-reveal>
                        <figcaption class="package-route__label inline-flex items-center gap-2 text-xs font-bold tracking-wider uppercase text-primary">
                            <span aria-hidden="true" class="inline-block w-3 h-2.5 bg-secondary"></span>
                            The journey
                        </figcaption>
                        <a class="venobox" data-gall="myGallery" href="{{ $paquete['mapa'] }}"><img
                                src="{{ $paquete['mapa'] }}" class="w-full object-contain" /></a>
                    </figure>
                    <div class="package-itinerary">
                        <div class="package-itinerary__layout">
                            <div class="package-itinerary__intro">
                                <div data-package-reveal>
                                    <span aria-hidden="true" class="inline-flex items-center gap-1 mb-6"><span class="inline-block w-1 h-2.5 bg-secondary"></span><span class="inline-block w-3 h-2.5 bg-secondary"></span><span class="inline-block w-5 h-2.5 bg-secondary"></span></span>
                                    <div class="package-itinerary__heading">
                                        <h2 id="package-itinerary-title" class="package-itinerary__title text-3xl font-semibold text-gray-700">{{ __('message.pack_deta_par3') }}</h2>
                                        <p class="package-itinerary__duration text-primary">
                                            <x-heroicon-o-calendar class="h-5 w-5 flex-shrink-0" aria-hidden="true" />
                                            <strong class="font-medium">{{ $paquete['duracion'] }}</strong>
                                            {{ __('message.pack_par4') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="package-itinerary__days" x-data="{ selected: 1 }" data-package-reveal>
                                @foreach ($paquete->paquete_itinerario as $section)
                                    @php
                                        $dayImages = $section->itinerarios->itinerario_imagen->filter(fn ($image) => filled($image->nombre));
                                    @endphp
                                    <article class="package-itinerary__day"
                                        :class="{ 'is-open': selected === {{ $loop->iteration }} }">
                                        @unless ($loop->last)
                                            <span class="pointer-events-none absolute inset-0 flex lg:grid lg:grid-cols-12 lg:gap-x-4" aria-hidden="true">
                                                <span class="relative flex w-9 flex-shrink-0 justify-center lg:col-span-1 lg:w-auto">
                                                    <span class="package-itinerary__rail absolute w-px bg-tertiary/20"></span>
                                                    <span class="package-itinerary__route-segment absolute w-px bg-secondary"></span>
                                                </span>
                                            </span>
                                        @endunless
                                        <h3 class="relative">
                                            <button type="button" id="package-day-trigger-{{ $loop->iteration }}"
                                                class="package-itinerary__trigger group flex items-start gap-3 py-4 text-tertiary lg:grid lg:grid-cols-12 lg:gap-x-4"
                                                :aria-expanded="selected === {{ $loop->iteration }}"
                                                aria-controls="package-day-panel-{{ $loop->iteration }}"
                                                @click="selected !== {{ $loop->iteration }} ? selected = {{ $loop->iteration }} : selected = null">
                                                <span class="relative flex h-9 w-9 flex-shrink-0 items-center justify-center lg:col-span-1 lg:h-11 lg:w-auto">
                                                    <span class="package-itinerary__number relative inline-flex h-9 w-9 flex-col items-center justify-center gap-0 rounded-full border motion-safe:transition-all motion-safe:duration-300 motion-safe:ease-out"
                                                        :class="selected === {{ $loop->iteration }} ? 'bg-secondary border-secondary text-tertiary lg:h-11 lg:w-11' : 'bg-white border-tertiary/10 text-tertiary lg:h-10 lg:w-10 lg:group-hover:border-primary/30'">
                                                        <span class="text-sm font-semibold leading-none lg:text-base lg:leading-none">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                                        <span class="text-xss font-medium uppercase tracking-wider leading-none text-tertiary/60">Day</span>
                                                        <span class="pointer-events-none absolute left-full top-1/2 h-px w-3 motion-safe:transition-colors motion-safe:duration-300" aria-hidden="true"
                                                            :class="selected === {{ $loop->iteration }} ? 'bg-secondary' : 'bg-tertiary/20 lg:group-hover:bg-primary/40'"></span>
                                                    </span>
                                                </span>
                                                <span class="flex min-h-9 min-w-0 flex-1 items-center gap-3 lg:col-span-11 lg:min-h-11">
                                                    <span class="package-itinerary__day-title min-w-0 flex-1 text-base leading-snug text-tertiary"
                                                        :class="selected === {{ $loop->iteration }} ? 'font-semibold lg:text-lg' : 'font-medium'">{{ ucfirst(strtolower($section->itinerarios->titulo)) }}</span>
                                                    <span class="package-itinerary__toggle flex flex-shrink-0 items-center justify-end lg:group-hover:text-secondary motion-safe:transition-colors motion-safe:duration-300" aria-hidden="true"
                                                        :class="selected === {{ $loop->iteration }} ? 'text-secondary' : 'text-primary'">
                                                        <x-heroicon-o-chevron-down class="package-itinerary__chevron h-5 w-5" />
                                                    </span>
                                                </span>
                                            </button>
                                        </h3>
                                        <div id="package-day-panel-{{ $loop->iteration }}" class="package-itinerary__panel"
                                            role="region" aria-labelledby="package-day-trigger-{{ $loop->iteration }}"
                                            :aria-hidden="selected !== {{ $loop->iteration }}"
                                            :inert="selected !== {{ $loop->iteration }}">
                                            <div class="package-itinerary__panel-inner grid grid-cols-1 pl-12 lg:grid-cols-12 lg:gap-x-4 lg:pl-0">
                                                <div class="package-itinerary__body relative lg:col-span-11 lg:col-start-2">
                                                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-12 lg:gap-6">
                                                        <div class="package-itinerary__text font-normal text-gray-600 {{ $dayImages->isNotEmpty() ? 'lg:col-span-8' : 'lg:col-span-12' }}">
                                                            {!! $section->itinerarios->descripcion !!}
                                                        </div>
                                                        @if ($dayImages->isNotEmpty())
                                                            <div class="space-y-3 lg:col-span-4">
                                                                @foreach ($dayImages as $imagen)
                                                                    <img src="{{ $imagen->nombre }}" alt="{{ $imagen->alt }}" class="aspect-[4/3] w-full object-cover" loading="lazy">
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                <aside class="package-commercial xl:col-span-4 xl:col-start-9 xl:row-start-1 xl:row-span-3" aria-labelledby="package-trip-title">
                    <div class="package-commercial__content bg-gray-50">
                        <div class="package-commercial__summary bg-tertiary text-white p-6 md:p-8">
                            <h2 id="package-trip-title" class="package-commercial__eyebrow text-xs font-bold tracking-wider uppercase text-secondary">Plan your journey</h2>
                            <p class="package-commercial__duration text-sm font-semibold tracking-wider uppercase text-white">{{ $paquete['duracion'] }} {{ __('message.pack_par4') }}</p>
                            @if ($hasHeroPrice)
                                <p class="package-commercial__price text-white">
                                    <span class="text-xs">From</span>
                                    <strong class="text-5xl md:text-6xl font-semibold leading-tight">${{ number_format((float) $heroPrice, (float) $heroPrice == (int) $heroPrice ? 0 : 2, '.', ',') }}</strong>
                                    <span class="text-xs">per person USD</span>
                                </p>
                            @else
                                <p class="package-commercial__price-note text-sm text-white/80">Contact us for pricing</p>
                            @endif
                            @if ($heroDestinations->isNotEmpty())
                                <p class="package-commercial__destinations text-xs text-white/80">{{ $heroDestinations->implode(' • ') }}</p>
                            @endif
                            <div class="package-commercial__actions">
                                <a href="#form-dream-adventure" class="btn-secondary text-center">Request a Quote</a>
                                @if ($paquete['codigo_f'])
                                    <button type="button" class="package-commercial__book text-xs text-white/80 underline hover:text-secondary"
                                        @click="document.getElementById('wetravel_button_widget').click()">Book Now</button>
                                @endif
                            </div>
                        </div>



                        <div class="package-commercial__availability p-6 md:p-8">
                            <h3 class="flex items-center gap-3 text-lg font-bold text-tertiary">
                                <span aria-hidden="true" class="inline-flex items-center gap-1"><span class="inline-block w-1 h-2.5 bg-secondary"></span><span class="inline-block w-3 h-2.5 bg-secondary"></span></span>
                                Availability
                            </h3>
                            <div class="text-sm text-gray-600">
                                <div class="pb-3 text-xs text-gray-500">
                                    <div class="">
                                        Available through
                                    </div>
                                    <div class="mt-1 text-lg font-semibold text-tertiary">
                                        December 2026
                                    </div>
                                </div>

                                <div class="package-commercial__status">

                                    <div class="package-commercial__status-label">
                                        Group Tours
                                    </div>

                                    <div class="package-commercial__status-value text-sm font-semibold text-primary">
                                        Available
                                    </div>

                                </div>


                                <div class="package-commercial__status">

                                    <div
                                        class="package-commercial__status-label">
                                        Private Tours
                                    </div>

                                    <div class="package-commercial__status-value text-sm font-semibold text-primary">
                                        Available
                                    </div>
                                </div>

                                <div class="package-commercial__status">

                                    <div
                                        class="package-commercial__status-label"> Solo Travelers
                                    </div>

                                    <div class="package-commercial__status-value text-sm font-semibold text-primary">
                                        @foreach ($paquete['precio_paquetes'] as $precio)
                                            @if ($precio['estrellas'] == 3)
                                                @if ($precio['precio_s'] > 0)
                                                    <div class="text-4xl font-semibold text-gray-600">
                                                        {{--                                                                            <span> {{__('message.pack_par5')}} </span> --}}
                                                        {{--                                                        From${{$precio['precio_d']}}usd --}}
                                                    </div>
                                                @else
                                                    <span
                                                        class="text-gray-600 font-semibold">{{ __('message.button_inquire') }}</span>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="package-commercial__trust text-primary">
                        <div class="package-commercial__trust-strip" aria-label="Independent review platforms">
                            <a href="https://www.tripadvisor.com.pe/Attraction_Review-g294314-d15202262-Reviews-Gotoperu-Cusco_Cusco_Region.html"
                                target="_blank" rel="noopener noreferrer" aria-label="GoToPeru reviews on Tripadvisor">
                                <img src="https://www.tripadvisor.com.pe/img/cdsi/img2/branding/v2/Tripadvisor_lockup_horizontal_secondary_registered-18034-2.svg"
                                    alt="Tripadvisor" loading="lazy">
                            </a>
                            <a href="https://www.trustpilot.com/review/gotoperu.com" target="_blank" rel="noopener noreferrer"
                                aria-label="GoToPeru reviews on Trustpilot">
                                <span class="package-commercial__trust-wordmark">
                                    <img src="{{ asset('images/logos/trust2.png') }}" alt="Trustpilot" width="385" height="230" loading="lazy">
                                </span>
                            </a>
                            <a href="https://www.google.com/search?hl=es-419&amp;gl=pe&amp;q=GOTOPERU,+Av.+El+Sol+449,+Cusco+08001"
                                target="_blank" rel="noopener noreferrer" class="text-xs font-semibold text-gray-600 hover:text-primary">
                                Google Reviews
                            </a>
                        </div>
                    </div>
                    <nav class="package-section-nav text-tertiary" aria-label="Explore this trip">
                        <p class="flex items-center gap-3 text-base font-bold tracking-wider uppercase text-tertiary">
                            <span aria-hidden="true" class="inline-flex items-center gap-1"><span class="inline-block w-1 h-2.5 bg-secondary"></span><span class="inline-block w-3 h-2.5 bg-secondary"></span></span>
                            Explore this trip
                        </p>
                        <ul class="package-section-nav__links border-l border-gray-200">
                            <li>
                                <a href="#package-overview" class="text-base text-gray-500 hover:text-tertiary" aria-current="location">
                                    <span class="package-section-nav__marker bg-secondary" aria-hidden="true"></span>
                                    <x-heroicon-o-flag class="package-section-nav__icon h-5 w-5 flex-shrink-0 text-primary" aria-hidden="true" />
                                    <span>Overview</span>
                                </a>
                            </li>
                            <li>
                                <a href="#package-itinerary" class="text-base text-gray-500 hover:text-tertiary">
                                    <span class="package-section-nav__marker bg-secondary" aria-hidden="true"></span>
                                    <x-heroicon-o-calendar class="package-section-nav__icon h-5 w-5 flex-shrink-0 text-primary" aria-hidden="true" />
                                    <span>Itinerary</span>
                                </a>
                            </li>
                            <li>
                                <a href="#package-prices" class="text-base text-gray-500 hover:text-tertiary">
                                    <span class="package-section-nav__marker bg-secondary" aria-hidden="true"></span>
                                    <x-heroicon-o-star class="package-section-nav__icon h-5 w-5 flex-shrink-0 text-primary" aria-hidden="true" />
                                    <span>Prices &amp; Hotels</span>
                                </a>
                            </li>
                            <li>
                                <a href="#package-included" class="text-base text-gray-500 hover:text-tertiary">
                                    <span class="package-section-nav__marker bg-secondary" aria-hidden="true"></span>
                                    <x-heroicon-o-check class="package-section-nav__icon h-5 w-5 flex-shrink-0 text-primary" aria-hidden="true" />
                                    <span>What's Included</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                        {{--                            <div class="flex gap-3"> --}}
                        {{--                                <div class="flex-1 border p-3 flex text-xl items-center justify-center"> --}}
                        {{--                                    @foreach ($paquete['paquetes_categoria'] as $category_p) --}}
                        {{--                                        <div class="text-xl font-semibold text-gray-600"> --}}
                        {{--                                            <span class="text-xs">Travel Style</span> --}}
                        {{--                                            <span class="block text-base">   {{ucwords(strtolower($category_p['categoria']['nombre']))}}</span> --}}
                        {{--                                        </div> --}}

                        {{--                                    @endforeach --}}
                        {{--                                </div> --}}

                        {{--                                <div class="flex-1 border py-2 px-3 flex items-center"> --}}

                        {{--                                        <div class="text-xl font-semibold text-gray-600"> --}}
                        {{--                                            <span class="text-xs">Physical Rating</span> --}}
                        {{--                                            @foreach ($paquete['paquetes_dificultad'] as $dificultad) --}}
                        {{--                                            <span class="block text-base">   {{ucwords(strtolower($dificultad['dificultad']['nombre']))}}</span> --}}
                        {{--                                            @endforeach --}}
                        {{--                                        </div> --}}


                        {{--                                </div> --}}
                        {{--                            </div> --}}

                        {{--                            <div class="flex gap-3"> --}}
                        {{--                                <div class="flex-1 border p-3 flex text-xl items-center justify-center"> --}}

                        {{--                                    <div class="text-xl font-semibold text-gray-600"> --}}
                        {{--                                        <span class="text-xs">Group Size</span> --}}
                        {{--                                        <span class="block text-base">{{$paquete['group_size']}}</span> --}}
                        {{--                                    </div> --}}


                        {{--                                </div> --}}

                        {{--                                <a href="#reviews" class="flex-1 border py-2 px-3 flex items-center"> --}}


                        {{--                                        <div class="text-xl font-semibold text-gray-600"> --}}
                        {{--                                            <span class="text-xs">Reviews</span> --}}
                        {{--                                            --}}{{--                                    <span class="block text-base"></span> --}}
                        {{--                                        </div> --}}

                        {{--                                </a> --}}
                        {{--                            </div> --}}







                        {{--                        <img src="{{$paquete['mapa']}}" alt="" class="w-full mt-2"> --}}



                </aside>


            {{--            <div class=" mt-6 " > --}}
            {{--                <ul class="grid  md:grid-cols-5 gap-3"> --}}
            {{--                    <li @click="openTab = 1" class="inline-block border py-2 px-4 font-medium w-full cursor-pointer text-center transition duration-300 py-3" :class="openTab == 1 ? 'bg-primary text-white' : 'bg-white hover:text-primary'"> --}}
            {{--                        <div class=" ">Overview</div> --}}
            {{--                    </li> --}}
            {{--                    <li @click="openTab = 2" class="inline-block border py-2 px-4 font-medium w-full cursor-pointer text-center transition duration-300 py-3" :class="openTab == 2 ? 'bg-primary text-white' : 'bg-white hover:text-primary'"> --}}
            {{--                        <div class="">Full Itinerary</div> --}}
            {{--                    </li> --}}
            {{--                    <li> --}}
            {{--                        <a href="#prices" class="inline-block border py-2 px-4 font-medium w-full cursor-pointer text-center transition duration-300 py-3" :class="openTab == 3 ? 'bg-primary text-white' : 'bg-white hover:text-primary'">Price</a> --}}
            {{--                    </li> --}}
            {{--                    <li> --}}
            {{--                        <a href="#hotels"  class="inline-block border py-2 px-4 font-medium w-full cursor-pointer text-center transition duration-300 py-3">Hotels</a> --}}
            {{--                    </li> --}}
            {{--                    <li> --}}
            {{--                        <a href="#reviews" class="inline-block border py-2 px-4 font-medium w-full cursor-pointer text-center transition duration-300 py-3">Reviews</a> --}}
            {{--                    </li> --}}
            {{--                </ul> --}}
            {{--            </div> --}}

                <div id="package-prices" class="package-prices xl:col-span-8 xl:col-start-1 xl:row-start-3">
            <section class="hidden">
                @if ($paquete['is_p_t'] == 1)
                    <section class="my-12 flex flex-col gap-4" id="prices">

                        <div class="flex mb-3 items-center text-lg text-gray-700 font-bold gap-2 dark:text-gray-400">
                            <div class="">
                                <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span>
                                <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span>
                                <span class="inline-block w-5 h-2.5 bg-secondary"></span>
                            </div> {{ __('message.pack_deta_par4') }}
                        </div>


                        {{--                            <div class="grid md:grid-cols-2 gap-4"> --}}
                        {{--                                <div class="overflow-x-scroll"> --}}
                        {{--                                    <p class="font-semibold text-secondary text-center">{{__('message.pack_deta_par5')}}</p> --}}
                        {{--                                <table class="table-auto min-w-full divide-y divide-gray-200 overflow-x-scroll"> --}}
                        {{--                                    <thead class="bg-secondary dark:text-white"> --}}
                        {{--                                    <tr> --}}
                        {{--                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium font-bold uppercase tracking-wider"> --}}
                        {{--                                            {{__('message.pack_deta_par9')}} --}}
                        {{--                                        </th> --}}
                        {{--                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium font-bold uppercase tracking-wider"> --}}
                        {{--                                            {{__('message.pack_deta_par10')}} --}}
                        {{--                                        </th> --}}
                        {{--                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium font-bold uppercase tracking-wider"> --}}
                        {{--                                            {{__('message.pack_deta_par11')}} --}}
                        {{--                                        </th> --}}
                        {{--                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium font-bold uppercase tracking-wider"> --}}
                        {{--                                            {{__('message.pack_deta_par12')}} --}}
                        {{--                                        </th> --}}
                        {{--                                    </tr> --}}
                        {{--                                    </thead> --}}
                        {{--                                    <tbody class="bg-secondary bg-opacity-10 divide-y divide-gray-200"> --}}
                        {{--                                    <tr> --}}

                        {{--                                        @foreach ($paquete['precio_paquetes'] as $precio) --}}
                        {{--                                            @if ($precio['precio_s'] > 0) --}}
                        {{--                                                <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800 dark:text-white">${{$precio['precio_s']}}<small>USD</small></td> --}}
                        {{--                                            @else --}}
                        {{--                                                <td class="px-6 py-4 whitespace-nowrap font-medium text-red-500">{{__('message.button_inquire')}}</td> --}}
                        {{--                                            @endif --}}
                        {{--                                        @endforeach --}}

                        {{--                                    </tr> --}}

                        {{--                                    <!-- More people... --> --}}
                        {{--                                    </tbody> --}}
                        {{--                                </table> --}}
                        {{--                                </div> --}}
                        {{--                                <div class="overflow-x-scroll"> --}}
                        {{--                                    <p class="font-semibold text-primary text-center">Prices are based on double occupancy.</p> --}}
                        {{--                                <table class="table-auto min-w-full divide-y divide-gray-200 overflow-x-scroll"> --}}
                        {{--                                    <thead class="bg-primary text-white"> --}}
                        {{--                                    <tr> --}}
                        {{--                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium font-bold uppercase tracking-wider"> --}}
                        {{--                                            {{__('message.pack_deta_par9')}} --}}
                        {{--                                        </th> --}}
                        {{--                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium font-bold uppercase tracking-wider"> --}}
                        {{--                                            {{__('message.pack_deta_par10')}} --}}
                        {{--                                        </th> --}}
                        {{--                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium font-bold uppercase tracking-wider"> --}}
                        {{--                                            {{__('message.pack_deta_par11')}} --}}
                        {{--                                        </th> --}}
                        {{--                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium font-bold uppercase tracking-wider"> --}}
                        {{--                                            {{__('message.pack_deta_par12')}} --}}
                        {{--                                        </th> --}}
                        {{--                                    </tr> --}}
                        {{--                                    </thead> --}}
                        {{--                                    <tbody class="bg-primary bg-opacity-10 divide-y divide-gray-200"> --}}

                        {{--                                    <tr> --}}

                        {{--                                        @foreach ($paquete['precio_paquetes'] as $precio) --}}
                        {{--                                            @if ($precio['precio_d'] > 0) --}}
                        {{--                                                <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800 dark:text-white">${{$precio['precio_d']}}<small>USD</small></td> --}}
                        {{--                                            @else --}}
                        {{--                                                <td class="px-6 py-4 whitespace-nowrap font-medium text-red-500">{{__('message.button_inquire')}}</td> --}}
                        {{--                                            @endif --}}
                        {{--                                        @endforeach --}}

                        {{--                                    </tr> --}}


                        {{--                                    <!-- More people... --> --}}
                        {{--                                    </tbody> --}}
                        {{--                                </table> --}}
                        {{--                                </div> --}}

                        {{--                            </div> --}}
                        <div class="grid md:grid-cols-2 gap-4 md:mt-5">
                            <div class="overflow-x-scroll">
                                <p class="font-semibold text-gray-500 text-center">Prices are based on triple occupancy.</p>
                                <table class="table-auto min-w-full divide-y divide-gray-200 overflow-x-scroll">
                                    <thead class="bg-gray-700 text-white">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium font-bold uppercase tracking-wider">
                                                {{ __('message.pack_deta_par9') }}
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium font-bold uppercase tracking-wider">
                                                {{ __('message.pack_deta_par10') }}
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium font-bold uppercase tracking-wider">
                                                {{ __('message.pack_deta_par11') }}
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium font-bold uppercase tracking-wider">
                                                {{ __('message.pack_deta_par12') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-50 divide-y divide-gray-200">

                                        <tr>

                                            @foreach ($paquete['precio_paquetes'] as $precio)
                                                @if ($precio['precio_t'] > 0)
                                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800">
                                                        ${{ $precio['precio_t'] }}<small>USD</small></td>
                                                @else
                                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-red-500">
                                                        {{ __('message.button_inquire') }}</td>
                                                @endif
                                            @endforeach

                                        </tr>

                                        <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <p class="text-sm text-gray-500">{{ __('message.pack_deta_par6') }}</p>


                    </section>
                @endif
            </section>





        {{--    @php --}}
        {{--        $precios = collect($paquete->precio_paquetes ?? ($paquete['precio_paquetes'] ?? [])) --}}
        {{--                    ->sortBy('estrellas'); --}}

        {{--        $fmt = fn($v) => (int)$v > 0 ? '$'.number_format((int)$v, 0).' usd' : '—'; --}}

        {{--        // Mapa solicitado (respetando mayúsculas/minúsculas que pediste) --}}
        {{--        $labelMap = [ --}}
        {{--            2 => 'without hotels', --}}
        {{--            3 => 'Tourist', --}}
        {{--            4 => 'superior', --}}
        {{--            5 => 'Luxury', --}}
        {{--        ]; --}}
        {{--    @endphp --}}

        {{--    <section class="my-8 container"> --}}
        {{--        <h2 class="text-xl md:text-2xl font-extrabold mb-4">Prices by hotel category</h2> --}}
        {{--        <div class="flex mb-3 items-center text-lg text-gray-700 font-bold gap-2 dark:text-gray-400"> --}}
        {{--            <div class=""> --}}
        {{--                <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span> --}}
        {{--                <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span> --}}
        {{--                <span class="inline-block w-5 h-2.5 bg-secondary"></span> --}}
        {{--            </div> Prices by hotel category --}}
        {{--        </div> --}}

        {{--        <div class="overflow-x-auto rounded-lg border"> --}}
        {{--            <table class="min-w-full text-sm"> --}}
        {{--                <thead class="bg-gray-50"> --}}
        {{--                <tr class="text-gray-700"> --}}
        {{--                    <th class="p-3 text-left font-semibold">Hotel category</th> --}}
        {{--                    <th class="p-3 text-right font-semibold">Single (SGL)</th> --}}
        {{--                    <th class="p-3 text-right font-semibold">Double (DBL)</th> --}}
        {{--                    <th class="p-3 text-right font-semibold">Triple (TPL)</th> --}}
        {{--                </tr> --}}
        {{--                </thead> --}}

        {{--                <tbody class="divide-y"> --}}
        {{--                @forelse($precios as $p) --}}
        {{--                    @php --}}
        {{--                        // Soporta acceso como objeto o array --}}
        {{--                        $stars   = is_array($p) ? ($p['estrellas'] ?? null) : ($p->estrellas ?? null); --}}
        {{--                        $ps      = is_array($p) ? ($p['precio_s'] ?? null)   : ($p->precio_s ?? null); --}}
        {{--                        $pd      = is_array($p) ? ($p['precio_d'] ?? null)   : ($p->precio_d ?? null); --}}
        {{--                        $pt      = is_array($p) ? ($p['precio_t'] ?? null)   : ($p->precio_t ?? null); --}}
        {{--                    @endphp --}}

        {{--                    <tr> --}}
        {{--                        @php --}}
        {{--                            $stars = (int)(is_array($p) ? ($p['estrellas'] ?? 0) : ($p->estrellas ?? 0)); --}}
        {{--                            $label = $labelMap[$stars] ?? null; --}}
        {{--                        @endphp --}}

        {{--                        <td class="p-3"> --}}
        {{--                            --}}{{-- número + estrella + etiqueta --}}
        {{--                            <span class="font-semibold text-gray-800">{{ $stars }}★</span> --}}
        {{--                            @if ($label) --}}
        {{--                                <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded bg-gray-100 text-gray-700 text-xs"> --}}
        {{--      {{ $label }} --}}
        {{--    </span> --}}
        {{--                            @endif --}}
        {{--                        </td> --}}
        {{--                        <td class="p-3 text-right">{{ $fmt($ps) }}</td> --}}
        {{--                        <td class="p-3 text-right">{{ $fmt($pd) }}</td> --}}
        {{--                        <td class="p-3 text-right">{{ $fmt($pt) }}</td> --}}
        {{--                    </tr> --}}
        {{--                @empty --}}
        {{--                    <tr> --}}
        {{--                        <td colspan="4" class="p-3 text-center text-gray-500"> --}}
        {{--                            No prices available for this package. --}}
        {{--                        </td> --}}
        {{--                    </tr> --}}
        {{--                @endforelse --}}
        {{--                </tbody> --}}
        {{--            </table> --}}
        {{--        </div> --}}

        {{--        --}}{{-- Nota opcional --}}
        {{--        <p class="text-xs text-gray-500 mt-2"> --}}
        {{--            Prices shown in USD. Subject to availability and change without prior notice. --}}
        {{--        </p> --}}
        {{--    </section> --}}


            @php
                // precios por estrellas
                $precios = collect($paquete->precio_paquetes ?? ($paquete['precio_paquetes'] ?? []));
                $byStars = $precios->keyBy(fn($p) => is_array($p) ? $p['estrellas'] ?? null : $p->estrellas ?? null);

                // orden como tu imagen
                $order = [2, 3, 4, 5];

                // etiquetas
                $labels = [
                    2 => 'Tour (without Hotels)',
                    3 => 'Tourist',
                    4 => 'Superior',
                    5 => 'Luxury',
                ];

                // formateo
                $fmt = function ($n) {
                    $n = (int) $n;
                    return $n > 0 ? '$' . number_format($n, 0) : null; // null => "Inquire Now"
                };
            @endphp

            <section class="mt-10 mb-10 lg:mt-12 lg:mb-12" aria-labelledby="package-prices-title">
                <div class="bg-tertiary px-5 py-6 lg:px-6 lg:pt-7 lg:pb-10">
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-secondary">Prices per person</p>
                    <h2 id="package-prices-title" class="text-3xl font-semibold text-white">Prices by hotel category</h2>
                </div>
                <div class="relative grid grid-cols-12 gap-0 mt-4 overflow-hidden rounded-sm border border-gray-200 bg-white lg:-mt-4 lg:mx-4">
                    @foreach ($order as $star)
                        @php
                            $row = $byStars->get($star);

                            // Solo TRIPLE (TPL) para 3★,4★,5★. Para 2★ usar precio_tours (por persona)
                            $priceRaw =
                                $star === 2
                                    ? (int) ($paquete->precio_tours ?? 0)
                                    : (int) (is_array($row) ? $row['precio_d'] ?? 0 : $row->precio_d ?? 0);

                            $price = $fmt($priceRaw) ?? 'Inquire Now';
                            $hasPrice = $priceRaw > 0;
                        @endphp

                        <div class="col-span-12 md:col-span-6 lg:col-span-3 min-w-0 border-gray-200 p-4 text-center transition-colors duration-200 lg:border-t-0 lg:hover:bg-gray-50
                            {{ $loop->first ? '' : 'border-t lg:border-l' }}
                            {{ $loop->iteration <= 2 ? 'md:border-t-0' : '' }}
                            {{ $loop->even ? 'md:border-l' : '' }}">
                            <div class="flex min-h-12 flex-col items-center justify-center gap-1">
                                <h3 class="text-base font-semibold leading-snug text-tertiary">{{ $labels[$star] ?? $star . ' Stars' }}</h3>
                                @if ($star !== 2 && $row)
                                    <p class="flex items-center gap-1 text-xs font-normal text-primary">
                                        <x-heroicon-o-star class="h-3.5 w-3.5 flex-shrink-0" aria-hidden="true" />
                                        <span>{{ $star }}-star hotels</span>
                                    </p>
                                @endif
                            </div>

                            <div class="mt-3">
                                <div class="mb-1 h-4 text-xs font-normal text-gray-500">
                                    @if ($hasPrice)
                                        From
                                    @endif
                                </div>
                                <p class="font-semibold leading-8 tabular-nums {{ $hasPrice ? 'text-2xl text-secondary' : 'text-lg text-primary' }}">
                                    {{ $price }}
                                </p>
                                <p class="mt-1 min-h-10 text-sm font-normal leading-5 text-gray-500">
                                    @if ($star === 2)
                                        per person
                                    @else
                                        per person <span class="block text-xs leading-5">(double/triple)</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <p class="mt-4 text-xs leading-relaxed text-gray-500 lg:mx-4">
                    Prices shown in USD per person. Subject to availability and change without prior notice.
                </p>
            </section>

                </div>
            </div>
        </div>
    </section>
    @php
        $hasIncluye = !empty($paquete['incluye']);
        $hasNoIncluye = !empty($paquete['noincluye']);

        // Add Blade Heroicons without replacing the stored list content or its emphasis.
        $renderCoverageList = static function ($html, $icon, $color) {
            $marker = svg($icon, 'package-coverage__marker ' . $color, ['aria-hidden' => 'true'])->toHtml();

            return preg_replace_callback('/<li\b[^>]*>/i', static fn($match) => $match[0] . $marker, $html);
        };

    @endphp

    <section id="package-included" class="relative bg-gray-50" aria-labelledby="package-coverage-title">
        <div class="container">
            <div class="relative z-10 py-16 lg:py-20 xl:pb-0">
                <header class="package-coverage__intro mb-10" data-package-reveal>
                    <span aria-hidden="true" class="inline-flex items-center gap-1 mb-6"><span class="inline-block w-1 h-2.5 bg-secondary"></span><span class="inline-block w-3 h-2.5 bg-secondary"></span><span class="inline-block w-5 h-2.5 bg-secondary"></span></span>
                    <h2 id="package-coverage-title" class="text-3xl font-semibold text-tertiary mb-4">What's included in your Peru journey</h2>
                </header>

                <div class="package-coverage__details grid grid-cols-12 items-stretch gap-y-8 xl:gap-x-6" data-package-reveal>
                    <div class="package-coverage__included col-span-12 {{ $hasNoIncluye ? 'xl:col-span-5' : 'xl:col-span-9' }} min-w-0 xl:pb-20">
                        <div class="mb-6 flex items-center gap-3">
                            <x-heroicon-o-check-circle class="h-6 w-6 flex-shrink-0 text-primary" aria-hidden="true" />
                            <h3 class="text-2xl font-semibold text-tertiary">Included</h3>
                        </div>
                        @if ($hasIncluye)
                            <div class="package-coverage__content text-base font-normal leading-relaxed text-gray-600">
                                {!! $renderCoverageList($paquete['incluye'], 'heroicon-o-check', 'text-primary') !!}
                            </div>
                        @else
                            <div class="grid grid-cols-2 gap-x-4 gap-y-5 text-center sm:grid-cols-4">
                                <div class="space-y-2">
                                    <img src="{{ asset('images/include/assistances.png') }}"
                                        alt="{{ __('message.serv_item2') }}" class="mx-auto h-10 w-10 object-contain">
                                    <p class="text-xs">{{ __('message.serv_item2') }}</p>
                                </div>
                                <div class="space-y-2">
                                    <img src="{{ asset('images/include/breakfast.png') }}"
                                        alt="{{ __('message.serv_item3') }}" class="mx-auto h-10 w-10 object-contain">
                                    <p class="text-xs">{{ __('message.serv_item3') }}</p>
                                </div>
                                <div class="space-y-2">
                                    <img src="{{ asset('images/include/entrances.png') }}"
                                        alt="{{ __('message.serv_item4') }}" class="mx-auto h-10 w-10 object-contain">
                                    <p class="text-xs">{{ __('message.serv_item4') }}</p>
                                </div>

                                <div class="space-y-2">
                                    <img src="{{ asset('images/include/hotels.png') }}" alt="{{ __('message.serv_item6') }}"
                                        class="mx-auto h-10 w-10 object-contain">
                                    <p class="text-xs">{{ __('message.serv_item6') }}</p>
                                </div>
                                <div class="space-y-2">
                                    <img src="{{ asset('images/include/tours.png') }}" alt="{{ __('message.serv_item7') }}"
                                        class="mx-auto h-10 w-10 object-contain">
                                    <p class="text-xs">{{ __('message.serv_item7') }}</p>
                                </div>
                                <div class="space-y-2">
                                    <img src="{{ asset('images/include/trains.png') }}" alt="{{ __('message.serv_item8') }}"
                                        class="mx-auto h-10 w-10 object-contain">
                                    <p class="text-xs">{{ __('message.serv_item8') }}</p>
                                </div>
                                <div class="space-y-2">
                                    <img src="{{ asset('images/include/transfers.png') }}"
                                        alt="{{ __('message.serv_item9') }}" class="mx-auto h-10 w-10 object-contain">
                                    <p class="text-xs">{{ __('message.serv_item9') }}</p>
                                </div>

                                <div class="space-y-2">
                                    <img src="{{ asset('images/include/flight.png') }}" alt="{{ __('message.serv_item5') }}"
                                        class="mx-auto h-10 w-10 object-contain grayscale">
                                    <p class="text-xs">{{ __('message.serv_item5') }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if ($hasNoIncluye)
                        <div class="package-coverage__excluded col-span-12 xl:col-span-4 min-w-0 border-t border-gray-200/60 pt-8 xl:border-t-0 xl:border-l xl:pt-0 xl:pl-6 xl:pb-20">
                            <div class="mb-6 flex items-center gap-3">
                                <x-heroicon-o-minus-circle class="h-6 w-6 flex-shrink-0 text-tertiary" aria-hidden="true" />
                                <h3 class="text-2xl font-semibold text-tertiary">Not Included</h3>
                            </div>
                            <div class="package-coverage__content text-base font-normal leading-relaxed text-gray-600">
                                {!! $renderCoverageList($paquete['noincluye'], 'heroicon-o-minus', 'text-gray-500') !!}
                            </div>
                        </div>
                    @endif

                    <aside class="relative col-span-12 xl:col-span-3 min-w-0 h-full overflow-hidden flex flex-col bg-tertiary text-white sm:flex-row xl:flex-col xl:self-stretch">
                        <div class="min-w-0 p-6 pb-0 sm:flex-1 sm:pb-6 xl:flex-none xl:pb-0">
                            <p class="text-xs font-semibold uppercase tracking-wider text-secondary">Personalized Service</p>
                            <h3 class="mt-2 text-lg font-semibold leading-snug">
                                <a href="#form-dream-adventure" class="inline-flex items-start gap-2 transition-colors duration-200 hover:text-secondary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-secondary">
                                    <span>Plan with our Peru experts</span>
                                    <x-heroicon-o-arrow-right class="mt-1 h-4 w-4 flex-shrink-0" aria-hidden="true" />
                                </a>
                            </h3>
                            <p class="mt-3 text-sm leading-relaxed text-white/75">Customize this itinerary with our travel advisors.</p>
                        </div>
                        <div class="mt-2 flex flex-1 items-end justify-center sm:mt-0 sm:flex-none sm:justify-end xl:mt-0 xl:block xl:h-96 xl:flex-none">
                            <img src="{{ asset('images/team/pabel2.png') }}" alt="Pabel, GoToPeru team"
                                class="block h-72 w-auto max-w-full object-contain object-bottom xl:absolute xl:bottom-0 xl:left-1/2 xl:h-80 xl:origin-bottom xl:-translate-x-1/2 xl:scale-110" width="433" height="577" loading="lazy">
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <div class="pointer-events-none absolute inset-0 bg-line-cover bg-cover bg-no-repeat opacity-10" aria-hidden="true"></div>
    </section>



    {{--    <section class="bg-secondary bg-opacity-60 my-12 py-12"> --}}
    {{--        <div class="container text-center grid  grid-cols-1 md:grid-cols-2 gap-6"> --}}
    {{--            <div class="text-center"> --}}

    {{--                <div class="flex mb-3 items-center text-center justify-center text-lg text-gray-700 font-bold gap-2"> --}}
    {{--                    <div class="text-center"> --}}
    {{--                        --}}{{--                                <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span> --}}
    {{--                        --}}{{--                                <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span> --}}
    {{--                        <span class="inline-block w-5 h-2.5 bg-secondary"></span> --}}
    {{--                    </div> {{__('message.pack_deta_par7')}} --}}
    {{--                </div> --}}
    {{--                <div class="dark:text-white"> --}}
    {{--                    {!! $paquete['incluye'] !!} --}}
    {{--                </div> --}}

    {{--            </div> --}}

    {{--            <section class="text-center"> --}}
    {{--                <div class="flex mb-3 items-center justify-center text-lg text-gray-700 font-bold gap-2"> --}}
    {{--                    <div class=""> --}}
    {{--                        --}}{{--                                <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span> --}}
    {{--                        --}}{{--                                <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span> --}}
    {{--                        <span class="inline-block w-5 h-2.5 bg-secondary"></span> --}}
    {{--                    </div> {{__('message.pack_deta_par8')}} --}}
    {{--                </div> --}}
    {{--                <div class="dark:text-white"> --}}
    {{--                    {!! $paquete['noincluye'] !!} --}}
    {{--                </div> --}}
    {{--            </section> --}}
    {{--        </div> --}}
    {{--    </section> --}}

    <section class="bg-white" x-data="{ openDes: 1 }" id="hotels" aria-labelledby="package-hotels-title">
        <div class="container">
            <div class="py-16 lg:py-20">
                <header class="grid grid-cols-12 items-end gap-y-2">
                    <div class="col-span-12 md:col-span-8">
                        <span aria-hidden="true" class="inline-flex items-center gap-1 mb-6"><span class="inline-block w-1 h-2.5 bg-secondary"></span><span class="inline-block w-3 h-2.5 bg-secondary"></span><span class="inline-block w-5 h-2.5 bg-secondary"></span></span>
                        <h2 id="package-hotels-title" class="text-3xl font-semibold text-tertiary mb-4">Recommended Hotels</h2>
                    </div>
                    <div class="col-span-12 flex min-w-0 md:col-span-4 md:justify-end md:pb-4">
                        @foreach ($paquete['paquetes_destinos'] as $paquete_destino)
                            <div class="flex items-center gap-4 text-tertiary" data-hotel-controls="{{ $loop->iteration }}"
                                x-show="openDes === {{ $loop->iteration }}" @if (!$loop->first) style="display: none;" @endif>
                                <span class="text-xs tabular-nums text-gray-500" data-hotel-counter aria-live="polite" aria-atomic="true">
                                    <span data-hotel-current>01</span><span class="mx-2 text-gray-300" aria-hidden="true">/</span><span data-hotel-total></span>
                                </span>
                                <div class="flex items-center gap-2">
                                    <button type="button" data-hotel-prev aria-label="Previous hotel"
                                        class="inline-flex h-10 w-10 items-center justify-center border border-gray-200 transition-colors duration-200 lg:hover:border-secondary lg:hover:text-secondary disabled:cursor-default disabled:opacity-30 focus-visible:outline focus-visible:outline-2 focus-visible:outline-secondary">
                                        <x-heroicon-o-arrow-left class="h-5 w-5" aria-hidden="true" />
                                    </button>
                                    <button type="button" data-hotel-next aria-label="Next hotel"
                                        class="inline-flex h-10 w-10 items-center justify-center border border-gray-200 transition-colors duration-200 lg:hover:border-secondary lg:hover:text-secondary disabled:cursor-default disabled:opacity-30 focus-visible:outline focus-visible:outline-2 focus-visible:outline-secondary">
                                        <x-heroicon-o-arrow-right class="h-5 w-5" aria-hidden="true" />
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </header>

                <nav class="mt-6 overflow-x-auto" aria-label="Hotel destinations">
                    <ul class="flex w-max min-w-full items-center">
                        @foreach ($paquete['paquetes_destinos'] as $paquete_destino)
                            <li class="flex flex-shrink-0 items-center">
                                <button type="button" id="hotel-destination-tab-{{ $loop->iteration }}"
                                    @click="openDes = {{ $loop->iteration }}; $nextTick(() => $dispatch('package-hotels-change', { destination: {{ $loop->iteration }} }))"
                                    :aria-pressed="openDes === {{ $loop->iteration }}"
                                    aria-controls="hotel-destination-panel-{{ $loop->iteration }}"
                                    class="relative inline-flex items-center whitespace-nowrap py-4 pl-8 pr-3 text-base transition-colors duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-secondary"
                                    :class="openDes === {{ $loop->iteration }} ? 'text-tertiary font-semibold' : 'text-gray-500 font-medium lg:hover:text-primary'">
                                    <span x-show="openDes === {{ $loop->iteration }}" @if (!$loop->first) style="display: none;" @endif class="absolute left-2 top-1/2 -translate-y-1/2" aria-hidden="true">
                                        <x-heroicon-o-location-marker class="h-4 w-4 text-primary" />
                                    </span>
                                    {{ $paquete_destino['destinos']['nombre'] }}
                                    <span aria-hidden="true" class="absolute inset-x-3 bottom-0 h-0.5 origin-left bg-secondary transition-transform duration-200 motion-reduce:transition-none"
                                        :class="openDes === {{ $loop->iteration }} ? 'scale-x-100' : 'scale-x-0'"></span>
                                </button>
                                @if (!$loop->last)
                                    <span class="mx-2 h-px w-6 flex-shrink-0 bg-gray-200 sm:mx-4 sm:w-10" aria-hidden="true"></span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </nav>

                @php
                    $hotelAmenityIcons = [
                        'internet' => 'heroicon-o-globe-alt',
                        'wifi' => 'heroicon-o-wifi',
                        'wi-fi' => 'heroicon-o-wifi',
                        'room service' => 'heroicon-o-bell',
                    ];
                @endphp

                <div class="relative isolate mt-10 grid grid-cols-12 lg:mt-14">
                    <div class="relative z-10 col-span-12 col-start-1 row-start-1 min-w-0">
                        @foreach ($paquete['paquetes_destinos'] as $paquete_destino)
                            <div id="hotel-destination-panel-{{ $loop->iteration }}" role="region"
                                data-hotel-destination="{{ $loop->iteration }}"
                                aria-labelledby="hotel-destination-tab-{{ $loop->iteration }}"
                                x-show="openDes === {{ $loop->iteration }}"
                                @if (!$loop->first) style="display: none;" @endif
                                x-transition:enter="transition duration-200 ease-out motion-reduce:transition-none"
                                x-transition:enter-start="opacity-0 motion-safe:translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="min-w-0">
                                <div class="package-hotels__carousel swiper min-w-0" aria-label="Hotels in {{ $paquete_destino['destinos']['nombre'] }}">
                                    <div class="swiper-wrapper">
                                        @foreach ($hoteles_destinos->where('iddestinos', $paquete_destino->destinos->id)->take(3) as $hoteles_destino)
                                            @php
                                                $hotel = $hoteles_destino->hotel;
                                                $services = array_filter(array_map('trim', explode(',', (string) $hotel->servicios)));
                                            @endphp
                                            <article class="swiper-slide group min-w-0">
                                                @if (filled($hotel->imagen))
                                                    <div class="aspect-[16/10] flex-shrink-0 overflow-hidden rounded-sm bg-gray-50">
                                                        <img src="{{ $hotel->imagen }}" alt="{{ $hotel->nombre }}" loading="lazy"
                                                            class="w-full h-full object-cover transition-transform duration-500 motion-reduce:transition-none motion-safe:lg:group-hover:scale-[1.02]">
                                                    </div>
                                                @endif
                                                <div class="relative z-10 w-11/12 self-start border border-gray-200/70 bg-white p-4 sm:w-5/6 sm:p-5 {{ filled($hotel->imagen) ? '-mt-6' : '' }}">
                                                    <h3 class="text-lg font-semibold leading-snug text-tertiary break-words">{{ $hotel->nombre }}</h3>
                                                    @if ($hotel->estrellas > 0)
                                                        <div class="mt-2 flex gap-1" role="img" aria-label="{{ $hotel->estrellas }} stars">
                                                            @for ($i = 0; $i < $hotel->estrellas; $i++)
                                                                <x-heroicon-s-star class="h-3.5 w-3.5 text-secondary" aria-hidden="true" />
                                                            @endfor
                                                        </div>
                                                    @endif
                                                    @if (filled($hotel->direccion))
                                                        <p class="mt-2.5 flex items-start gap-2 text-xs leading-relaxed text-gray-500 sm:text-sm">
                                                            <x-heroicon-o-location-marker class="mt-0.5 h-4 w-4 flex-shrink-0 text-primary" aria-hidden="true" />
                                                            <span>{{ $hotel->direccion }}</span>
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="flex min-w-0 flex-1 flex-col pt-5">
                                                    <div class="line-clamp-4 text-base font-normal leading-relaxed text-gray-600 [&_p+p]:mt-3 [&_ul]:list-disc [&_ul]:pl-5 [&_ol]:list-decimal [&_ol]:pl-5">
                                                        {!! $hotel->descripcion !!}
                                                    </div>
                                                    @if ($services)
                                                        <ul class="mt-5 flex flex-wrap gap-x-3 gap-y-2" aria-label="Hotel amenities">
                                                            @foreach ($services as $service)
                                                                @php $amenityIcon = $hotelAmenityIcons[mb_strtolower($service, 'UTF-8')] ?? null; @endphp
                                                                <li class="inline-flex min-w-0 max-w-full items-baseline gap-3 text-sm font-medium leading-6 text-gray-600">
                                                                    <span class="inline-flex min-w-0 items-center gap-2">
                                                                        @if ($amenityIcon)
                                                                            {!! svg($amenityIcon, 'h-4 w-4 flex-shrink-0 text-primary', ['aria-hidden' => 'true'])->toHtml() !!}
                                                                        @endif
                                                                        <span class="min-w-0 break-words">{{ $service }}</span>
                                                                    </span>
                                                                    @if (!$loop->last)
                                                                        <span class="flex-shrink-0 text-primary/50" aria-hidden="true">·</span>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                    @if (filled($hotel->url))
                                                        <div class="mt-auto pt-6">
                                                            <a href="{{ $hotel->url }}" target="_blank" rel="noopener noreferrer"
                                                                class="group/hotel-link inline-flex items-center gap-2 text-sm font-semibold text-primary underline-offset-4 decoration-primary/40 transition-colors duration-200 hover:underline hover:text-tertiary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">
                                                                View hotel
                                                                <x-heroicon-o-arrow-right class="h-4 w-4 transition-transform duration-200 motion-safe:group-hover/hotel-link:translate-x-0.5" aria-hidden="true" />
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-10 text-center lg:mt-12">
                    <a href="{{ route('hotels') }}" class="btn-secondary inline-flex">View more hotels</a>
                </div>
            </div>
        </div>
    </section>

{{--    <section class="my-12">--}}
{{--        <div class="container">--}}
{{--            <div class="grid bg-gray-100 py-3">--}}
{{--                <div class="px-4 py-3 flex rounded-t-lg dark:bg-gray-900">--}}
{{--                    <img src="https://source.unsplash.com/50x50/?portrait?2" alt=""--}}
{{--                        class="w-12 h-12 bg-center bg-cover rounded-full dark:bg-gray-500 mr-5">--}}
{{--                    <p class="relative py-1 italic text-center dark:text-gray-100 ">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"--}}
{{--                            class="absolute left-0-0 top-0 w-8 h-8 dark:text-violet-400">--}}
{{--                            <path d="M232,246.857V16H16V416H54.4ZM48,48H200V233.143L48,377.905Z"></path>--}}
{{--                            <path d="M280,416h38.4L496,246.857V16H280ZM312,48H464V233.143L312,377.905Z"></path>--}}
{{--                        </svg>--}}
{{--                        @foreach ($testinomials_r as $testinomial)--}}
{{--                            <span class="px-9 block">{{ Str::limit($testinomial->contenido, 150) }} <span--}}
{{--                                    class="text-right font-bold text-sm text-secondary">{{ $testinomial->nombre }} /--}}
{{--                                    {{ $testinomial->ciudad }}</span></span>--}}
{{--                        @endforeach--}}

{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"--}}
{{--                            class="absolute right-0 bottom-0 w-8 h-8 dark:text-violet-400">--}}
{{--                            <path d="M280,185.143V416H496V16H457.6ZM464,384H312V198.857L464,54.1Z"></path>--}}
{{--                            <path d="M232,16H193.6L16,185.143V416H232ZM200,384H48V198.857L200,54.1Z"></path>--}}
{{--                        </svg>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <div class="elfsight-app-d1e14e4b-52d0-4ad9-9068-f94e0de6bf50" data-elfsight-app-lazy></div>--}}

    {{--        <div class="container mt-12 hidden mb-3"> --}}
    {{--            <div class="flex items-center text-lg text-gray-700 font-bold gap-2"> --}}
    {{--                <div class="c"> --}}
    {{--                    <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span> --}}
    {{--                    <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span> --}}
    {{--                    <span class="inline-block w-5 h-2.5 bg-secondary"></span> --}}
    {{--                </div> Destinations --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--        <section class="flex flex-col hidden gap-4"> --}}

    {{--            <div class="grid grid-cols-1 md:grid-cols-6 md:gap-3"> --}}
    {{--                <div class="col-span-4 md:col-span-4 flex md:gap-3"> --}}
    {{--                    --}}{{--                    <div class="flex-shrink"> --}}

    {{--                    --}}{{--                    </div> --}}
    {{--                    @php $i = 1; @endphp --}}
    {{--                    <div class="grid grid-cols-2 place-content-between md:gap-3"> --}}
    {{--                        @foreach ($paquete['paquetes_destinos'] as $paquete_destino) --}}
    {{--                            @foreach ($paquete_destino['destinos']['destino_imagen'] as $destino_imagen) --}}
    {{--                                <div class="relative @if (count($paquete['paquetes_destinos']) % 2 != 0 and $i == 1) col-span-2 @endif"> --}}
    {{--                                    <img src="{{$destino_imagen['nombre']}}" alt="" class="@if (count($paquete['paquetes_destinos']) % 2 != 0 and $i == 1) object-cover h-80 object-bottom w-full @endif"> --}}
    {{--                                    <div class="absolute inset-x-0 bottom-0 text-sm tracking-wide text-white p-2 font-medium"> --}}
    {{--                                        {{$paquete_destino['destinos']['nombre']}} --}}
    {{--                                    </div> --}}
    {{--                                </div> --}}
    {{--                                @php $i++ @endphp --}}
    {{--                            @endforeach --}}
    {{--                        @endforeach --}}
    {{--                    </div> --}}
    {{--                </div> --}}
    {{--                <div class="col-span-2 md:col-span-2 bg-primary flex items-center bg-opacity-30 p-6"> --}}
    {{--                    <div class=""> --}}
    {{--                        @foreach ($paquete['paquetes_destinos'] as $paquete_destino) --}}
    {{--                            <h3 class="font-semibold mt-3">{{$paquete_destino['destinos']['nombre']}}</h3> --}}
    {{--                            <div class="text-sm"> --}}
    {{--                                {!! $paquete_destino['destinos']['resumen'] !!} --}}
    {{--                            </div> --}}
    {{--                        @endforeach --}}
    {{--                    </div> --}}

    {{--                </div> --}}
    {{--            </div> --}}
    {{--        </section> --}}

    {{--        <section class="container hidden md:block mt-4" id="reviews"> --}}

    {{--            <div class="flex mb-3 items-center text-lg text-gray-700 font-bold gap-2 dark:text-gray-400"> --}}
    {{--                <span class="inline-block w-5 h-2.5 bg-secondary"></span> {{__('message.subtitle5')}} --}}
    {{--            </div> --}}
    {{--            <div class="grid grid-cols-1 md:grid-cols-5 gap-4"> --}}
    {{--                <div class="col-span-2 flex gap-4 flex-wrap content-between overflow-hidden"> --}}
    {{--                    <div class="w-full"> --}}
    {{--                        <div class="grid grid-cols-2 w-full items-center text-center text-gray-700 dark:text-gray-300 gap-2"> --}}
    {{--                            <div class="border p-4 w-full"> --}}
    {{--                                <p class="block text-4xl font-bold">97%</p> --}}
    {{--                                <p class="text-xs">{{__('message.social_con1')}}</p> --}}
    {{--                            </div> --}}
    {{--                            <div class="border p-4 w-full"> --}}
    {{--                                <p class="block text-3xl font-bold">9000 +</p> --}}
    {{--                                <p class="text-xs">{{__('message.social_con2')}}</p> --}}
    {{--                            </div> --}}
    {{--                        </div> --}}
    {{--                    </div> --}}
    {{--                    <div class="relative"> --}}
    {{--                        --}}{{--            <div class="bg-fixed bg-cover bg-center bg-no-repeat" style="background-image: url({{asset('images/hotels-t.jpg')}})"> --}}
    {{--                        --}}{{--                <img src="{{asset('images/hotels-t.jpg')}}" alt="" class="h-full object-cover min-w-full transition duration-500 ease-in-out transform hover:-translate-x-0 hover:scale-105"> --}}
    {{--                        <div class="flex items-center justify-center"> --}}
    {{--                            <div class="border bg-white p-6 dark:bg-gray-800 text-gray-800 dark:text-gray-300"> --}}
    {{--                                <p class="mb-2 flex inline-flex"> --}}
    {{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"> --}}
    {{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /> --}}
    {{--                                    </svg> --}}
    {{--                                    {{__('message.social_li1')}} --}}
    {{--                                </p> --}}
    {{--                                <p class="mb-2 flex inline-flex"> --}}
    {{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"> --}}
    {{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /> --}}
    {{--                                    </svg> --}}
    {{--                                    {{__('message.social_li2')}} --}}
    {{--                                </p> --}}
    {{--                                <p class="mb-2 flex inline-flex"> --}}
    {{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"> --}}
    {{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /> --}}
    {{--                                    </svg> --}}
    {{--                                    {{__('message.social_li3')}} --}}
    {{--                                </p> --}}
    {{--                                <p class="mb-2 flex inline-flex"> --}}
    {{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"> --}}
    {{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /> --}}
    {{--                                    </svg> --}}
    {{--                                    {{__('message.social_li4')}} --}}
    {{--                                </p> --}}
    {{--                                <p class="mb-2 flex inline-flex"> --}}
    {{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"> --}}
    {{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /> --}}
    {{--                                    </svg> --}}
    {{--                                    {{__('message.social_li5')}} --}}
    {{--                                </p> --}}
    {{--                            </div> --}}
    {{--                        </div> --}}
    {{--                    </div> --}}
    {{--                    <div class="flex inline-flex items-center text-2xl text-gray-700 font-bold gap-3"> --}}
    {{--                        <div class="border"> --}}
    {{--                            <a href="https://www.tripadvisor.com.pe/Attraction_Review-g294314-d15202262-Reviews-Gotoperu-Cusco_Cusco_Region.html" target="_blank"><img src="https://gotoperu.com.mx/images/icons/tripadvisor.png" alt="" class="p-4 dark:filter dark:grayscale dark:invert"></a> --}}
    {{--                        </div> --}}
    {{--                        <div class="border"> --}}
    {{--                            <a href="https://www.yelp.com/biz/gotoperu-washington?osq=gotoperu.com" target="_blank"><img src="https://gotoperu.com.mx/images/icons/yelp.png" alt="" class="p-4 dark:filter dark:grayscale dark:invert"></a> --}}
    {{--                        </div> --}}
    {{--                        <div class="border"> --}}
    {{--                            <a href="https://www.trustpilot.com/review/gotoperu.com"><img src="https://gotoperu.com.mx/images/icons/trust.png" alt="" class="p-4 dark:filter dark:grayscale dark:invert"></a> --}}
    {{--                        </div> --}}
    {{--                    </div> --}}


    {{--                </div> --}}
    {{--                <div class="col-span-3 grid grid-cols-1 items-center relative overflow-hidden bg-center bg-no-repeat bg-cover" style="background-image: url('{{asset('images/banners/redes.jpg')}}')"> --}}
    {{--                    --}}{{--            <img src="{{asset('images/hotels-t.jpg')}}" alt="" class="h-full object-cover min-w-full transition duration-500 ease-in-out transform hover:-translate-x-0 hover:scale-105"> --}}

    {{--                    --}}{{--            <div class="absolute flex items-center inset-0 "> --}}
    {{--                    <div class="md:mx-16"> --}}
    {{--                        <div class="w-full swiper-container mySwiper"> --}}
    {{--                            <div class="swiper-wrapper"> --}}
    {{--                                @foreach ($testinomials as $testinomial) --}}
    {{--                                    <div class="swiper-slide p-12"> --}}
    {{--                                        <div class="my-10 mx-16 w-full mx-auto rounded-lg bg-gray-100 dark:bg-gray-800 shadow-lg px-5 pt-5 pb-10 text-gray-800 dark:text-gray-300"> --}}
    {{--                                            <div class="w-full pt-1 text-center pb-5 -mt-16 mx-auto"> --}}
    {{--                                                <a href="#" class="block relative"> --}}
    {{--                                                    <img alt="profil" src="https://gotoperu.com.mx/images/video-testimonial/2.jpg" class="mx-auto object-cover rounded-full h-20 w-20 z-30"/> --}}
    {{--                                                </a> --}}
    {{--                                            </div> --}}
    {{--                                            <div class="w-full mb-6"> --}}
    {{--                                                <div class="text-3xl text-indigo-500 text-left leading-tight h-3"> --}}
    {{--                                                    “ --}}
    {{--                                                </div> --}}
    {{--                                                <p class="text-sm text-gray-600 dark:text-gray-100 text-center px-5"> --}}
    {{--                                                    {{ Str::limit($testinomial->contenido, 150) }} --}}
    {{--                                                </p> --}}
    {{--                                                <div class="text-3xl text-indigo-500 text-right leading-tight h-3 -mt-3"> --}}
    {{--                                                    ” --}}
    {{--                                                </div> --}}
    {{--                                            </div> --}}
    {{--                                            <div class="w-full text-center"> --}}
    {{--                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto cursor-pointer text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"> --}}
    {{--                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" /> --}}
    {{--                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /> --}}
    {{--                                                </svg> --}}

    {{--                                                <p class="text-md text-indigo-500 font-bold text-center"> --}}
    {{--                                                    {{ $testinomial->nombre }} --}}
    {{--                                                </p> --}}
    {{--                                                <p class="text-xs text-gray-500 dark:text-gray-300 text-center"> --}}
    {{--                                                    {{ $testinomial->ciudad }} --}}
    {{--                                                </p> --}}
    {{--                                            </div> --}}
    {{--                                        </div> --}}
    {{--                                    </div> --}}
    {{--                                @endforeach --}}
    {{--                            </div> --}}
    {{--                            <div class="swiper-button-next btn-next"></div> --}}
    {{--                            <div class="swiper-button-prev btn-prev"></div> --}}
    {{--                        </div> --}}
    {{--                    </div> --}}
    {{--                </div> --}}
    {{--            </div> --}}

    {{--        </section> --}}
    {{--        <section class="container mt-6 mb-12 "> --}}
    {{--            --}}{{--        <div class="flex mb-3 items-center text-2xl text-gray-700 dark:text-primary font-bold gap-2"> --}}
    {{--            --}}{{--            <div class=""> --}}
    {{--            --}}{{--                <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span> --}}
    {{--            --}}{{--                <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span> --}}
    {{--            --}}{{--                <span class="inline-block w-5 h-2.5 bg-secondary"></span> --}}
    {{--            --}}{{--            </div> Social Media --}}
    {{--            --}}{{--        </div> --}}

    {{--            <div class="grid grid-cols-1 md:grid-cols-5 gap-4"> --}}
    {{--                <div class="col-span-3 grid grid-cols-1 items-center relative bg-fixed bg-center bg-no-repeat bg-cover" style="background-image: url({{asset('images/hotels-t.jpg')}})"> --}}
    {{--                    <div class="flex relative"> --}}
    {{--                        --}}{{--                    <div class="elfsight-app-ba7c9526-9468-4d5b-b378-68ec76259e00"></div> --}}
    {{--                        <img src="{{asset('images/banners/social.jpg')}}" alt="" class="object-cover h-full w-full"> --}}
    {{--                        <div class="absolute inset-0 gradient-cicle-gray"></div> --}}
    {{--                    </div> --}}
    {{--                </div> --}}
    {{--                <div class="col-span-2 flex gap-4 flex-col justify-between content-between overflow-hidden"> --}}
    {{--                    <div class=""> --}}
    {{--                        <div class="flex items-center text-center text-gray-700 dark:text-gray-300 gap-2"> --}}
    {{--                            <div class="border p-4 w-1/2"> --}}
    {{--                                <p class="block text-4xl font-bold">30 000</p> --}}
    {{--                                <p class="text-xs">FACEBOOK FANS</p> --}}
    {{--                            </div> --}}
    {{--                            <div class="border p-4 w-1/2"> --}}
    {{--                                <p class="block text-3xl font-bold">#gotoperu</p> --}}
    {{--                                <p class="text-xs">INSTAGRAM HASHTAG</p> --}}
    {{--                            </div> --}}
    {{--                        </div> --}}
    {{--                    </div> --}}
    {{--                    <div class=""> --}}
    {{--                        --}}{{--            <div class="bg-fixed bg-cover bg-center bg-no-repeat" style="background-image: url({{asset('images/hotels-t.jpg')}})"> --}}

    {{--                        <div class="bg-gray-500 bg-opacity-10 text-center p-12"> --}}
    {{--                            <img src="https://gotoperu-com.s3-us-west-1.amazonaws.com/logos/logo-gotoperu-black.png" alt="" class="mx-auto py-4"> --}}
    {{--                            <h3>{{__('message.revi_subtitle1')}}</h3> --}}
    {{--                            <p>{{__('message.revi_par3')}}</p> --}}
    {{--                        </div> --}}
    {{--                    </div> --}}
    {{--                    <div class="grid grid-cols-4 items-center text-2xl text-gray-700 font-bold gap-3"> --}}
    {{--                        <div class="border"> --}}
    {{--                            <a href="https://www.instagram.com/go.to.peru/" target="_blank"><img src="{{asset('images/logos/instagram.png')}}" alt="" class="p-6"></a> --}}
    {{--                        </div> --}}
    {{--                        <div class="border"> --}}
    {{--                            <a href="https://www.facebook.com/GOTOPERUcom/" target="_blank"><img src="{{asset('images/logos/facebook.png')}}" alt="" class="p-6"></a> --}}
    {{--                        </div> --}}
    {{--                        <div class="border"> --}}
    {{--                            <a href="https://www.youtube.com/channel/UCWjJ10j-_BfNTDnmjBug8Ng" target="_blank"><img src="{{asset('images/logos/youtube.png')}}" alt="" class="p-6"></a> --}}
    {{--                        </div> --}}
    {{--                        <div class="border"> --}}
    {{--                            <a href="https://www.tiktok.com/@gotoperu" target="_blank"><img src="{{asset('images/logos/tiktok.png')}}" alt="" class="p-6"></a> --}}
    {{--                        </div> --}}
    {{--                    </div> --}}


    {{--                </div> --}}
    {{--            </div> --}}

    {{--        </section> --}}



    <!-- Elfsight Instagram Feed | GOTOPERU -->


    @livewire('page.form-footer-detail', ['paquete' => $paquete['titulo']], key('paquete' . $paquete['id']))


    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <style>
            /* Local composition and motion; typography, palette and buttons belong to the site. */
            .package-shell { padding-inline: clamp(16px, 3vw, 48px); }
            .package-hero { position: relative; isolation: isolate; display: grid; min-height: 78vh; min-height: 78svh; }
            .package-hero__gallery { position: absolute; z-index: 0; inset: 0; width: 100%; height: 100%; min-width: 0; overflow: hidden; }
            .package-hero__gallery .swiper-wrapper,
            .package-hero__gallery .swiper-slide { width: 100%; height: 100%; }
            .package-hero__gallery img { object-position: center; }
            .package-hero__shade {
                position: absolute; z-index: 1; inset: 0; pointer-events: none;
                background: linear-gradient(0deg, rgba(17, 24, 39, .92) 0%, rgba(17, 24, 39, .65) 48%, transparent 90%),
                    linear-gradient(180deg, rgba(17, 24, 39, .3), transparent 28%);
            }
            .package-hero__content { position: relative; z-index: 2; align-self: end; width: 100%; min-width: 0; padding-top: 160px; padding-bottom: 36px; pointer-events: none; }
            .package-hero__identity { min-width: 0; max-width: 780px; pointer-events: auto; }
            .package-hero__title { margin-top: 18px; font-size: clamp(2.125rem, 7.8vw, 3.5rem); line-height: 1.08; letter-spacing: -.025em; overflow-wrap: anywhere; text-wrap: balance; }
            .package-hero__destinations { margin-top: 24px; font-size: .875rem; }
            .package-hero__destinations svg { margin-top: 2px; }
            .package-hero__offer { margin-top: 28px; }
            .package-hero__offer > p { opacity: .9; }
            .package-hero__offer > .package-hero__pricing-note { opacity: .72; }
            .package-hero__actions { display: flex; flex-wrap: wrap; align-items: center; gap: 12px; margin-top: 20px; }
            .package-hero__actions > a { flex-basis: 100%; }
            .package-hero__scroll { margin-top: 36px; gap: 16px; font-size: .8125rem; letter-spacing: .025em; }
            .package-hero__scroll svg { width: 24px; height: 24px; }
            .package-hero__gallery-controls { position: absolute; z-index: 3; top: 24px; right: clamp(20px, 3vw, 48px); display: flex; flex-direction: column; align-items: flex-end; gap: 20px; max-width: calc(100% - 40px); }
            .package-hero__pagination { display: flex; align-items: center; gap: 16px; font-size: .8125rem; font-variant-numeric: tabular-nums; line-height: 1; }
            .package-hero__pagination [data-package-slide-total] { opacity: .75; }
            .package-hero__pagination[hidden] { display: none; }
            .package-hero__progress { display: block; position: relative; width: 136px; height: 2px; background: rgba(249, 250, 251, .5); }
            .package-hero__progress-fill { display: block; position: absolute; inset: 0; transform: scaleX(var(--package-gallery-progress, 0)); transform-origin: left; }
            .package-bridge { position: relative; z-index: 4; scroll-margin-top: 32px; }
            .package-bridge__layout { --bridge-gutter: clamp(16px, 3vw, 48px); position: relative; isolation: isolate; display: grid; gap: 0; }
            .package-bridge__backdrop { display: none; }
            .package-expert { --expert-portrait-width: clamp(120px, 40vw, 184px); position: relative; isolation: isolate; margin-inline: calc(-1 * var(--bridge-gutter)); min-width: 0; min-height: 210px; }
            .package-expert__terrain { position: absolute; z-index: -1; inset: 0; opacity: .07; pointer-events: none; }
            .package-expert__copy { position: relative; z-index: 1; width: calc(100% - var(--expert-portrait-width) - var(--bridge-gutter)); max-width: 520px; padding: 24px 16px 24px var(--bridge-gutter); }
            .package-expert__eyebrow { font-size: .625rem; line-height: 1.5; letter-spacing: .1em; text-transform: uppercase; }
            .package-expert__title { font-size: clamp(1.125rem, 2vw, 1.375rem); line-height: 1.25; text-wrap: balance; }
            .package-expert__title svg { margin-left: 2px; vertical-align: middle; }
            .package-expert__portrait { position: absolute; right: var(--bridge-gutter); bottom: 0; width: var(--expert-portrait-width); max-width: none; height: auto; pointer-events: none; }
            .package-glance__terrain { position: absolute; z-index: -1; inset: 0 0 0 36%; opacity: .14; pointer-events: none; }
            .package-glance > h2 { margin-bottom: 20px; }
            .package-glance__facts { gap: 20px 16px; }
            .package-glance__interest { margin-top: 20px; padding-top: 14px; }
            .package-glance__interest svg { width: 16px; height: 16px; flex-shrink: 0; }
            .package-glance__facts > div { min-width: 0; }
            .package-glance__facts > div > span { flex-shrink: 0; }
            .package-glance { position: relative; isolation: isolate; min-width: 0; margin-inline: calc(-1 * var(--bridge-gutter)); padding: 24px var(--bridge-gutter); }
            .package-overview { position: relative; z-index: 1; display: flow-root; min-width: 0; }
            .package-overview__copy { position: relative; z-index: 2; min-width: 0; max-width: 680px; padding-bottom: 0; }
            .package-overview__copy > span[aria-hidden] { margin-bottom: 12px; }
            .package-overview__title { overflow-wrap: anywhere; }
            .package-overview__copy,
            .package-route__map { min-width: 0; }
            .package-overview__text { max-width: 64ch; }
            .package-route { position: relative; min-width: 0; }
            .package-route__map { position: relative; width: 100%; margin: 0; padding: 16px 12px 4px; }
            .package-route__label { margin: 0 4px 12px; }
            .package-route__map a { display: block; }
            .package-route__map img { display: block; width: 100%; height: auto; max-height: none; object-fit: contain; }
            /* Marker center: py-4 plus half of the fixed h-9 / lg:h-11 slot. */
            .package-itinerary { --itinerary-marker-center: 2.125rem; --itinerary-content-space: 32px; position: relative; z-index: 2; padding-top: 0; padding-bottom: 32px; }
            .package-itinerary__layout { display: flow-root; padding-inline: 20px; }
            .package-itinerary__intro { position: relative; width: 100%; padding: 0; }
            .package-itinerary__intro > div > span[aria-hidden] { margin-bottom: 12px; }
            .package-itinerary__heading { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 10px 20px; }
            .package-itinerary__title { overflow-wrap: anywhere; }
            .package-itinerary__days { margin-top: 12px; }
            .package-itinerary__day { position: relative; }
            .package-itinerary__rail,
            .package-itinerary__route-segment { top: var(--itinerary-marker-center); bottom: calc(-1 * var(--itinerary-marker-center)); }
            .package-itinerary__route-segment { transform-origin: top; transform: scaleY(0); opacity: 0; }
            .package-itinerary__day.is-open .package-itinerary__route-segment { transform: scaleY(1); opacity: 1; }
            .package-itinerary__intro,
            .package-itinerary__days { min-width: 0; }
            .package-itinerary__duration { display: flex; align-items: center; gap: 6px; font-size: .875rem; }
            .package-itinerary__duration strong { font-size: inherit; line-height: inherit; }
            .package-itinerary__trigger { width: 100%; min-height: 64px; text-align: left; cursor: pointer; }
            .package-itinerary__trigger:focus-visible { outline: 2px solid currentColor; outline-offset: 4px; }
            .package-itinerary__number { white-space: nowrap; }
            .package-itinerary__day-title { overflow-wrap: anywhere; }
            .package-itinerary__day.is-open .package-itinerary__chevron { transform: rotate(180deg); }
            .package-itinerary__panel { display: grid; grid-template-rows: 0fr; opacity: 0; }
            .package-itinerary__day.is-open .package-itinerary__panel { grid-template-rows: 1fr; opacity: 1; }
            .package-itinerary__panel-inner { min-height: 0; overflow: hidden; }
            .package-itinerary__body { padding-top: 12px; padding-bottom: var(--itinerary-content-space); }
            .package-itinerary__text { max-width: 68ch; font-size: 1rem; line-height: 1.8; overflow-wrap: anywhere; }
            .package-overview__text p + p,
            .package-itinerary__text p + p { margin-top: 1em; }
            .package-overview__text :is(ul, ol),
            .package-itinerary__text :is(ul, ol) { margin-block: 1em; padding-left: 1.3em; }
            .package-overview__text ul,
            .package-itinerary__text ul { list-style-type: disc; }
            .package-overview__text ol,
            .package-itinerary__text ol { list-style-type: decimal; }
            .package-hotels__carousel .swiper-wrapper { align-items: stretch; }
            .package-hotels__carousel .swiper-slide { display: flex; height: auto; flex-direction: column; }
            .package-prices { min-width: 0; }
            .package-coverage__content { overflow-wrap: anywhere; }
            .package-coverage__content :is(ul, ol) { display: grid; gap: 12px 24px; margin: 0; padding: 0; list-style: none; }
            .package-coverage__content li { position: relative; padding-left: 28px; list-style: none; }
            .package-coverage__content .package-coverage__marker { position: absolute; left: 0; top: 5px; width: 16px; height: 16px; pointer-events: none; }
            .package-coverage__content > :is(p, ul, ol) + :is(p, ul, ol),
            .package-coverage__content li > :is(ul, ol),
            .package-coverage__content li > p + p { margin-top: 12px; }
            .package-commercial { min-width: 0; width: 100%; padding: 0; }
            .package-commercial__duration { margin-top: 16px; }
            .package-commercial__price { display: grid; justify-items: start; gap: 4px; margin-top: 12px; }
            .package-commercial__price strong { overflow-wrap: anywhere; }
            .package-commercial__price-note { margin-top: 8px; }
            .package-commercial__destinations { margin-top: 14px; line-height: 1.65; overflow-wrap: anywhere; }
            .package-commercial__availability h3 { margin-bottom: 20px; }
            .package-commercial__status { display: flex; align-items: baseline; justify-content: space-between; gap: 16px; padding-block: 10px; }
            .package-commercial__status-label { min-width: 0; }
            .package-commercial__status-value { flex-shrink: 0; max-width: 50%; text-align: right; }
            .package-commercial__actions { display: flex; flex-direction: column; gap: 6px; padding-top: 18px; }
            .package-commercial__book { min-height: 36px; }
            .package-commercial__book:focus-visible { outline: 2px solid currentColor; outline-offset: 2px; }
            .package-commercial__trust { margin-block: 20px 28px; }
            .package-commercial__trust-strip { display: flex; align-items: center; gap: 12px; }
            .package-commercial__trust-strip a { display: flex; flex: 1; align-items: center; justify-content: center; min-width: 0; min-height: 40px; line-height: 20px; text-align: center; }
            .package-commercial__trust-strip img { display: block; width: 100%; max-width: 104px; height: auto; max-height: 18px; object-fit: contain; }
            /* Show the existing wordmark only; the asset's baked-in stars are not verified ratings. */
            .package-commercial__trust-wordmark { position: relative; display: block; width: 100%; max-width: 112px; aspect-ratio: 385 / 60; overflow: hidden; }
            .package-commercial__trust-wordmark img { position: absolute; inset: 0 auto auto 0; width: 100%; max-width: none; max-height: none; height: auto; transform: translateY(-28%); }
            .package-section-nav { display: none; margin-bottom: 24px; }
            .package-section-nav__links { margin-top: 16px; }
            .package-section-nav__links a { position: relative; display: flex; align-items: center; gap: 14px; min-height: 48px; padding: 12px 12px 12px 20px; }
            .package-section-nav__links a[aria-current="location"] { color: inherit; font-weight: 600; }
            .package-section-nav__marker { position: absolute; left: -2px; top: 10px; bottom: 10px; width: 4px; opacity: 0; }
            .package-section-nav__links a:not([aria-current="location"]) .package-section-nav__icon { color: inherit; opacity: .65; }
            .package-section-nav__links a:hover .package-section-nav__marker { opacity: .4; }
            .package-section-nav__links a[aria-current="location"] .package-section-nav__marker { opacity: 1; }
            .package-section-nav__links a[aria-current="location"] .package-section-nav__icon { stroke-width: 2; }
            .package-section-nav__links a:focus-visible,
            .package-commercial__trust-strip a:focus-visible { outline: 2px solid currentColor; outline-offset: 4px; }
            #package-overview, #package-itinerary, #package-prices, #package-included { scroll-margin-top: 112px; }
            @media (min-width: 640px) {
                .package-hero__actions > a { flex-basis: auto; }
                .package-hero__content { padding-bottom: 48px; }
                .package-hero__destinations { font-size: 1rem; }
            }
            @media (min-width: 1024px) {
                .package-hero { min-height: clamp(620px, 80vh, 850px); }
                .package-hero__shade {
                    background: linear-gradient(90deg, rgba(17, 24, 39, .78) 0%, rgba(17, 24, 39, .42) 40%, rgba(17, 24, 39, .08) 75%, transparent),
                        linear-gradient(0deg, rgba(17, 24, 39, .72), transparent 65%);
                }
                .package-hero__content { padding-top: 112px; padding-bottom: 120px; }
                .package-hero__identity { width: 70%; max-width: 900px; }
                .package-hero__title { font-size: clamp(3.5rem, 5vw, 4.5rem); }
                .package-hero__destinations { max-width: 680px; }
                .package-hero__gallery-controls { top: auto; bottom: 184px; gap: 24px; }
                .package-overview__copy { padding-right: 12px; }
                .package-route__map { padding: 18px 16px 4px; }
                .package-itinerary { --itinerary-marker-center: 2.375rem; --itinerary-content-space: 36px; padding-bottom: 40px; }
            }
            @media (min-width: 1280px) {
                .package-overview__copy { max-width: none; }
                .package-overview__text { max-width: 80ch; }
                .package-route { margin-top: 20px; }
                .package-section-nav { display: block; }
                /* The desktop navigation is about 76px tall; keep breathing room below it. */
                .package-commercial { --rail-top: 6rem; position: sticky; top: var(--rail-top); align-self: start; max-height: calc(100vh - var(--rail-top) - 24px); max-height: calc(100dvh - var(--rail-top) - 24px); overflow-y: auto; scrollbar-width: thin; }
                .package-hero__gallery-controls { bottom: 232px; }
                .package-bridge__layout { grid-template-columns: minmax(0, 1.25fr) minmax(0, 1fr); align-items: stretch; margin-top: -52px; }
                .package-bridge__backdrop { display: block; position: absolute; z-index: -1; top: 28px; right: var(--bridge-gutter); bottom: 0; left: calc(var(--bridge-gutter) + 28px); pointer-events: none; }
                .package-expert { --expert-portrait-width: clamp(268px, 21.25vw, 306px); grid-column: 2; grid-row: 1; margin: 28px 0 0; min-height: 204px; background-color: transparent; }
                .package-expert__copy { width: calc(100% - var(--expert-portrait-width)); padding: 24px 18px 24px 28px; }
                .package-expert__portrait { right: 0; }
                .package-glance { grid-column: 1; grid-row: 1; margin: 0 0 18px; padding: 24px 28px; }
                .package-glance__facts { grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 16px; }
                .package-glance__facts > div { flex-direction: column; align-items: flex-start; }
            }
            /* Mobile overrides stay in this view, including the shared floating actions. */
            @media (max-width: 767px) {
                .package-hero__gallery-controls > .venobox { display: none; }
                .package-hero__gallery-controls { top: calc(16px + var(--package-gallery-header-overlap, 0px)); right: max(16px, env(safe-area-inset-right, 0px)); gap: 0; max-width: calc(100% - 32px); }
                .package-hero__pagination { gap: 12px; font-size: .75rem; text-shadow: 0 1px 4px rgba(17, 24, 39, .6); }
                .package-hero__progress { width: clamp(80px, 24vw, 104px); }
                .package-hero__content { padding-top: 112px; padding-bottom: calc(92px + env(safe-area-inset-bottom, 0px)); }
                .package-hero__destinations p { min-width: 0; overflow-wrap: anywhere; }
                .package-hero__actions { gap: 14px; }
                .package-hero__actions > a,
                .package-hero__actions > button { flex: 0 0 100%; width: 100%; min-height: 44px; }
                .package-hero__scroll { margin-top: 32px; }

                .fixed.bottom-0:has(> a[href="#form-dream-adventure"]),
                .fixed.bottom-0:has(> a[href^="https://api.whatsapp.com/send"] > img) {
                    bottom: calc(12px + env(safe-area-inset-bottom, 0px));
                    z-index: 20;
                    margin: 0;
                    padding: 0;
                }
                .fixed.bottom-0:has(> a[href="#form-dream-adventure"]) {
                    left: max(12px, env(safe-area-inset-left, 0px));
                    right: auto;
                    max-width: calc(100% - 88px - env(safe-area-inset-left, 0px) - env(safe-area-inset-right, 0px));
                }
                .fixed.bottom-0 > a[href="#form-dream-adventure"] { display: flex; align-items: center; min-height: 48px; }
                .fixed.bottom-0 > a[href="#form-dream-adventure"] > div > span {
                    padding: 10px 18px 10px 12px;
                    margin-right: -12px;
                    font-size: .75rem;
                    line-height: 1.2;
                    white-space: nowrap;
                }
                .fixed.bottom-0 > a[href="#form-dream-adventure"] img { width: 48px; height: 48px; flex-shrink: 0; }
                .fixed.bottom-0:has(> a[href^="https://api.whatsapp.com/send"] > img) {
                    right: max(12px, env(safe-area-inset-right, 0px));
                    left: auto;
                }
                .fixed.bottom-0:has(> a[href^="https://api.whatsapp.com/send"] > img) > a {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 48px;
                    height: 48px;
                }
                .fixed.bottom-0 > a[href^="https://api.whatsapp.com/send"] > img { width: 48px; height: 48px; object-fit: contain; }
                /* The pulse has its own duplicate link; the actual WhatsApp action stays visible. */
                .fixed.bottom-0:has(> a[href^="https://api.whatsapp.com/send"] > span) { display: none; }
            }
            @media (prefers-reduced-motion: no-preference) {
                .package-hero__gallery { animation: package-photo-enter 1.1s ease-out both; }
                .package-hero__gallery img { transform: scale(1); transition: transform 7s ease-out; }
                .package-hero__gallery .swiper-slide-active img { transform: scale(1.045); }
                .package-hero__duration,
                .package-hero__title,
                .package-hero__destinations,
                .package-hero__offer,
                .package-hero__actions,
                .package-hero__scroll { animation: package-hero-enter .8s ease-out both; }
                .package-hero__duration { animation-delay: .12s; }
                .package-hero__title { animation-delay: .22s; }
                .package-hero__destinations { animation-delay: .34s; }
                .package-hero__offer { animation-delay: .4s; }
                .package-hero__actions { animation-delay: .5s; }
                .package-hero__scroll { animation-delay: .62s; }
                .package-hero__scroll svg { animation: package-scroll-cue 2.8s ease-in-out 3; }
                .package-hero__progress-fill { transition: transform .7s ease-out; }
                [data-package-reveal] { transition: opacity .7s ease-out, transform .7s ease-out; }
                .package-route__map[data-package-reveal] { transition-delay: .1s; }
                .package-coverage__details[data-package-reveal] { transition-delay: .1s; }
                .package-itinerary__panel { transition: grid-template-rows .3s ease-out, opacity .25s ease-out; }
                .package-itinerary__day.is-open .package-itinerary__panel { transition-delay: 0s, .15s; }
                .package-itinerary__route-segment { transition: transform .4s ease-out, opacity .2s ease-out; }
                .package-itinerary__day.is-open .package-itinerary__route-segment { transition-duration: .7s, .2s; transition-delay: 0s; }
                .package-itinerary__body { transform: translateY(-4px); transition: transform .3s ease-out; }
                .package-itinerary__day.is-open .package-itinerary__body { transform: translateY(0); transition-delay: .15s; }
                .package-itinerary__chevron { transition: transform .3s ease-out; }
                .package-itinerary__day-title { transition: color .18s ease; }
                .package-reveal-pending { opacity: 0; transform: translateY(16px); }
                .package-coverage__intro.package-reveal-pending,
                .package-coverage__details.package-reveal-pending { transform: translateY(10px); }
            }
            @keyframes package-scroll-cue { 0%, 100% { transform: translateY(0); opacity: .65; } 50% { transform: translateY(4px); opacity: 1; } }
            @keyframes package-photo-enter { from { opacity: .4; } to { opacity: 1; } }
            @keyframes package-hero-enter { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
        </style>
    @endpush
    @push('scripts')
        <script>
            (() => {
                const controls = document.querySelector('.package-hero__gallery-controls');
                const menu = document.querySelector('.menu-movil');
                if (!controls || !menu) return;
                const hero = controls.closest('.package-hero');
                const mobile = window.matchMedia('(max-width: 767px)');
                const positionCounter = () => {
                    if (!mobile.matches) {
                        controls.style.removeProperty('--package-gallery-header-overlap');
                        return;
                    }
                    // Keep the counter anchored to the photo, allowing for the fixed menu at page start.
                    const heroTop = hero.getBoundingClientRect().top + window.scrollY;
                    const overlap = menu.getClientRects().length
                        ? Math.max(0, menu.getBoundingClientRect().bottom - heroTop)
                        : 0;
                    controls.style.setProperty('--package-gallery-header-overlap', `${overlap}px`);
                };
                positionCounter();
                window.addEventListener('resize', positionCounter, { passive: true });
                window.addEventListener('load', positionCounter, { once: true });
            })();
        </script>
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="https://cdn.wetravel.com/master/core-app/assets/embed_checkout.js"></script>
        <script>
            new VenoBox({
                selector: '.venobox'
            });
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
            function updatePackageGallery(swiper) {
                const counter = swiper.el.closest('.package-hero').querySelector('.package-hero__pagination');
                const total = swiper.slides.length;
                counter.hidden = total === 0;
                if (!total) return;
                const current = swiper.realIndex + 1;
                counter.querySelector('[data-package-slide-current]').textContent = String(current).padStart(2, '0');
                counter.querySelector('[data-package-slide-total]').textContent = String(total).padStart(2, '0');
                counter.style.setProperty('--package-gallery-progress', current / total);
                counter.setAttribute('aria-label', `Image ${current} of ${total}`);
            }
            var swiper = new Swiper(".mySwiper2", {
                slidesPerView: 1,
                spaceBetween: 0,
                effect: 'fade',
                fadeEffect: { crossFade: true },
                speed: 900,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                on: {
                    init: updatePackageGallery,
                    slideChange: updatePackageGallery,
                },
            });
        </script>
        <script>
            (() => {
                const section = document.getElementById('hotels');
                if (!section || typeof Swiper === 'undefined') return;
                const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                const activateDestination = (destination) => {
                    const panel = section.querySelector(`[data-hotel-destination="${destination}"]`);
                    if (!panel) return;
                    const carousel = panel.querySelector('.package-hotels__carousel');
                    const controls = section.querySelector(`[data-hotel-controls="${destination}"]`);
                    if (carousel.swiper) {
                        carousel.swiper.update();
                        carousel.swiper.slideTo(0, 0);
                        return;
                    }
                    const updateCounter = (instance) => {
                        const total = instance.slides.length;
                        const current = total ? instance.realIndex + 1 : 0;
                        controls.hidden = total === 0;
                        const counter = controls.querySelector('[data-hotel-counter]');
                        counter.querySelector('[data-hotel-current]').textContent = String(current).padStart(2, '0');
                        counter.querySelector('[data-hotel-total]').textContent = String(total).padStart(2, '0');
                        counter.setAttribute('aria-label', `Hotel ${current} of ${total}`);
                    };
                    new Swiper(carousel, {
                        slidesPerView: 1,
                        spaceBetween: 24,
                        speed: reducedMotion ? 0 : 350,
                        watchOverflow: true,
                        breakpoints: {
                            768: { slidesPerView: 1.5, spaceBetween: 24 },
                            1024: { slidesPerView: 2, spaceBetween: 32 },
                        },
                        navigation: {
                            prevEl: controls.querySelector('[data-hotel-prev]'),
                            nextEl: controls.querySelector('[data-hotel-next]'),
                        },
                        on: {
                            init: updateCounter,
                            slideChange: updateCounter,
                        },
                    });
                };
                section.addEventListener('package-hotels-change', (event) => {
                    activateDestination(event.detail.destination);
                });
                activateDestination(1);
            })();
        </script>
        <script>
            (() => {
                if (!('IntersectionObserver' in window) || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) return;
                        entry.target.classList.remove('package-reveal-pending');
                        observer.unobserve(entry.target);
                    });
                }, { threshold: 0 });
                document.querySelectorAll('[data-package-reveal]').forEach((section) => {
                    if (section.getBoundingClientRect().top < window.innerHeight) return;
                    observer.observe(section);
                    section.classList.add('package-reveal-pending');
                });
            })();
        </script>
        <script>
            (() => {
                const nav = document.querySelector('.package-section-nav');
                if (!nav) return;
                const items = Array.from(nav.querySelectorAll('a[href^="#"]'))
                    .map(link => ({ link, section: document.getElementById(link.hash.slice(1)) }))
                    .filter(item => item.section);
                if (!items.length) return;
                const setActive = (active) => items.forEach(item => {
                    if (item === active) item.link.setAttribute('aria-current', 'location');
                    else item.link.removeAttribute('aria-current');
                });
                const updateActive = () => {
                    const marker = window.innerHeight * .4;
                    const active = items.filter(item => item.section.getBoundingClientRect().top <= marker).pop();
                    setActive(active || items[0]);
                };
                items.forEach(item => item.link.addEventListener('click', event => {
                    if (event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;
                    event.preventDefault();
                    setActive(item);
                    item.section.scrollIntoView({
                        behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth',
                        block: 'start'
                    });
                }));
                const desktop = window.matchMedia('(min-width: 1280px)');
                let observer;
                const observeSections = () => {
                    if (observer) observer.disconnect();
                    if (!desktop.matches) return;
                    updateActive();
                    if (!('IntersectionObserver' in window)) return;
                    observer = new IntersectionObserver(updateActive, { rootMargin: '0px 0px -60% 0px', threshold: 0 });
                    items.forEach(item => observer.observe(item.section));
                };
                desktop.addEventListener('change', observeSections);
                observeSections();
            })();
        </script>
    @endpush

@endsection
