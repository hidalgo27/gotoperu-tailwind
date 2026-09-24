{{--/Users/hidalgoponce/Laravel/gotoperu-tailwind/resources/views/page/partials/package/body.blade.php--}}
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

        $precios = collect($paquete->precio_paquetes ?? ($paquete['precio_paquetes'] ?? []));
        $byStars = $precios->keyBy(fn($p) => is_array($p) ? $p['estrellas'] ?? null : $p->estrellas ?? null);
        $packageCategoryPrices = [
            2 => (int) ($paquete->precio_tours ?? 0),
            3 => (int) data_get($byStars->get(3), 'precio_d', 0),
            4 => (int) data_get($byStars->get(4), 'precio_d', 0),
            5 => (int) data_get($byStars->get(5), 'precio_d', 0),
        ];
        $hasPackagePrices = collect($packageCategoryPrices)->contains(fn($price) => $price > 0);

        // Campaign presentation is local to this view; package fields and prices stay unchanged.
        $campaign = $campaign ?? null;
        $heroTitle = filled($campaign->headline ?? null) ? $campaign->headline : $paquete['titulo'];
        $heroCtaLabel = filled($campaign->cta_label ?? null) ? $campaign->cta_label : 'Request a Quote';
        $heroImages = filled($campaign->hero_image ?? null)
            ? collect([['nombre' => $campaign->hero_image]])
            : $paquete['imagen_paquetes'];
        $hasCampaignPrice = is_numeric($campaign->offer_price ?? null) && $campaign->offer_price > 0;
        $displayPrice = $hasCampaignPrice ? $campaign->offer_price : $heroPrice;
        $hasDisplayPrice = is_numeric($displayPrice) && $displayPrice > 0;
        $showPriceCategories = !($campaign && $hasCampaignPrice && !$hasPackagePrices
            && $campaign->price_category === null);
        $campaignOriginalPrice = $hasCampaignPrice && is_numeric($campaign->original_price ?? null)
            && $campaign->original_price > $displayPrice ? $campaign->original_price : null;
        // Match the existing pricing grid: 2 uses precio_tours; 3/4/5 use estrellas + precio_d.
        $campaignCategoryKey = (string) ($campaign->price_category ?? '');
        $campaignCategoryKey = in_array($campaignCategoryKey, ['2', '3', '4', '5'], true)
            ? (int) $campaignCategoryKey : null;
        $campaignPriceCategory = $hasCampaignPrice
            ? ([2 => 'Tour without hotels', 3 => 'Tourist / 3-star hotels', 4 => 'Superior / 4-star hotels', 5 => 'Luxury / 5-star hotels'][$campaignCategoryKey] ?? null)
            : null;
        $campaignSavings = $campaignOriginalPrice !== null
            ? round((float) $campaignOriginalPrice - (float) $displayPrice, 2) : null;
        $formatDisplayPrice = static function ($price) {
            $price = (float) $price;
            return '$' . number_format($price, $price == (int) $price ? 0 : 2, '.', ',');
        };

        $campaignItems = static function ($items) {
            return collect(is_array($items) ? $items : [])->filter(static function ($item) {
                return is_array($item) && is_string($item['title'] ?? null) && trim($item['title']) !== '';
            })->values();
        };
        $campaignHighlights = $campaignItems(data_get($campaign, 'config.highlights', []));
        $campaignSpecialInclusions = $campaignItems(data_get($campaign, 'config.special_inclusions', []));
        // A normal package checkout must not be presented as accepting different offer terms.
        $showPackageBooking = !empty($paquete['codigo_f'])
            && !($campaign && ($hasCampaignPrice || $campaignSpecialInclusions->isNotEmpty()));
    @endphp

    @include('page.partials.package.hero')

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

    @include('page.partials.campaign.highlights')

    <section class="package-story" x-data="{ openTab: 1 }">
        <div class="container">
            <div class="package-journey grid grid-cols-1 xl:grid-cols-12 items-start gap-7 pt-9 lg:pt-12 xl:gap-x-10 xl:gap-y-0">
                <section id="package-overview" data-analytics-section="overview" class="package-overview xl:col-span-8 xl:col-start-1 xl:row-start-1" aria-labelledby="package-overview-title" x-show="openTab === 1"
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
                    <div class="package-itinerary" data-analytics-section="itinerary">
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
                            @if ($campaignOriginalPrice !== null)
                                <p class="mt-3 text-xs text-white/80">Was <del>{{ $formatDisplayPrice($campaignOriginalPrice) }}</del></p>
                            @endif
                            @if ($hasDisplayPrice)
                                <p class="package-commercial__price text-white">
                                    <span class="text-xs">{{ $campaignOriginalPrice !== null ? 'Now' : 'From' }}</span>
                                    <strong class="text-5xl md:text-6xl font-semibold leading-tight">{{ $formatDisplayPrice($displayPrice) }}</strong>
                                    <span class="text-xs">per person USD</span>
                                </p>
                                @if ($campaignSavings > 0)
                                    <p class="mt-3 text-xs text-white/80">Save {{ $formatDisplayPrice($campaignSavings) }} per person</p>
                                @endif
                            @else
                                <p class="package-commercial__price-note text-sm text-white/80">Contact us for pricing</p>
                            @endif
                            @if ($heroDestinations->isNotEmpty())
                                <p class="package-commercial__destinations text-xs text-white/80">{{ $heroDestinations->implode(' • ') }}</p>
                            @endif
                            <div class="package-commercial__actions">
                                <a href="#form-dream-adventure" data-quote-source="rail" class="btn-secondary text-center">Request a Quote</a>
                                @if ($showPackageBooking)
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
                            @if ($showPriceCategories)
                            <li>
                                <a href="#package-prices" class="text-base text-gray-500 hover:text-tertiary">
                                    <span class="package-section-nav__marker bg-secondary" aria-hidden="true"></span>
                                    <x-heroicon-o-star class="package-section-nav__icon h-5 w-5 flex-shrink-0 text-primary" aria-hidden="true" />
                                    <span>Prices &amp; Hotels</span>
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="#package-included" class="text-base text-gray-500 hover:text-tertiary">
                                    <span class="package-section-nav__marker bg-secondary" aria-hidden="true"></span>
                                    <x-heroicon-o-check class="package-section-nav__icon h-5 w-5 flex-shrink-0 text-primary" aria-hidden="true" />
                                    <span>What's Included</span>
                                </a>
                            </li>
                            @if (!$showPriceCategories)
                                <li>
                                    <a href="#hotels" class="text-base text-gray-500 hover:text-tertiary">
                                        <span class="package-section-nav__marker bg-secondary" aria-hidden="true"></span>
                                        <x-heroicon-o-star class="package-section-nav__icon h-5 w-5 flex-shrink-0 text-primary" aria-hidden="true" />
                                        <span>Hotels</span>
                                    </a>
                                </li>
                            @endif
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

                @if ($showPriceCategories)
                <div id="package-prices" data-analytics-section="prices" class="package-prices xl:col-span-8 xl:col-start-1 xl:row-start-3">
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

                            $priceRaw = $packageCategoryPrices[$star];

                            $price = $fmt($priceRaw) ?? 'Inquire Now';
                            $hasPrice = $priceRaw > 0;
                            $isCampaignCategory = $hasCampaignPrice && $campaignCategoryKey === $star;
                        @endphp

                        <div class="col-span-12 md:col-span-6 lg:col-span-3 min-w-0 border-gray-200 p-4 text-center transition-colors duration-200 lg:border-t-0 lg:hover:bg-gray-50
                            {{ $loop->first ? '' : 'border-t lg:border-l' }}
                            {{ $loop->iteration <= 2 ? 'md:border-t-0' : '' }}
                            {{ $loop->even ? 'md:border-l' : '' }}{{ $isCampaignCategory ? ' bg-secondary/5' : '' }}">
                            <div class="flex min-h-12 flex-col items-center justify-center gap-1">
                                <h3 class="text-base font-semibold leading-snug text-tertiary">{{ $labels[$star] ?? $star . ' Stars' }}</h3>
                                @if ($star !== 2 && $row)
                                    <p class="flex items-center gap-1 text-xs font-normal text-primary">
                                        <x-heroicon-o-star class="h-3.5 w-3.5 flex-shrink-0" aria-hidden="true" />
                                        <span>{{ $star }}-star hotels</span>
                                    </p>
                                @endif
                            </div>

                            @if ($isCampaignCategory)
                                <div class="mt-3">
                                    <p class="mb-2 flex items-center justify-center gap-2 text-xs font-semibold uppercase tracking-wider text-tertiary">
                                        <span aria-hidden="true" class="h-2 w-2 bg-secondary"></span>
                                        Special offer
                                    </p>
                                    @if ($campaignOriginalPrice !== null)
                                        <p class="mb-1 text-xs text-tertiary/60">Was <del>{{ $formatDisplayPrice($campaignOriginalPrice) }}</del></p>
                                    @endif
                                    <p class="text-2xl font-semibold leading-8 tabular-nums text-secondary">
                                        {{ $formatDisplayPrice($displayPrice) }}
                                    </p>
                                    <p class="mt-1 min-h-10 text-sm font-normal leading-5 text-gray-500">
                                        @if ($star === 2)
                                            per person
                                        @else
                                            per person <span class="block text-xs leading-5">(double/triple)</span>
                                        @endif
                                    </p>
                                </div>
                            @else
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
                            @endif
                        </div>
                    @endforeach
                </div>

                <p class="mt-4 text-xs leading-relaxed text-gray-500 lg:mx-4">
                    Prices shown in USD per person. Subject to availability and change without prior notice.
                </p>
            </section>

                </div>
                @endif
            </div>
        </div>
    </section>

    @include('page.partials.campaign.special-inclusions')

    @php
        $hasIncluye = !empty($paquete['incluye']);
        $hasNoIncluye = !empty($paquete['noincluye']);

        // Add Blade Heroicons without replacing the stored list content or its emphasis.
        $renderCoverageList = static function ($html, $icon, $color) {
            $marker = svg($icon, 'package-coverage__marker ' . $color, ['aria-hidden' => 'true'])->toHtml();

            return preg_replace_callback('/<li\b[^>]*>/i', static fn($match) => $match[0] . $marker, $html);
        };

    @endphp

    <section id="package-included" data-analytics-section="included" class="relative bg-gray-50" aria-labelledby="package-coverage-title">
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
                                <a href="#form-dream-adventure" data-quote-source="final" class="inline-flex items-start gap-2 transition-colors duration-200 hover:text-secondary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-secondary">
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

    <section class="bg-white" x-data="{ openDes: 1 }" id="hotels" data-analytics-section="recommended_hotels" aria-labelledby="package-hotels-title">
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


    @livewire('page.form-footer-detail', [
        'paquete' => $paquete['titulo'],
        'packageId' => (int) $paquete['id'],
        'packageSlug' => $paquete['url'],
        'campaignId' => $campaign ? (int) $campaign->id : null,
        'campaignSlug' => $campaign->slug ?? null,
    ], key('paquete' . $paquete['id'] . ($campaign ? '-campaign-' . $campaign->id : '')))


