@extends('layouts.page-layout')
@section('home-intro')
    <section id="home-hero" data-analytics-section="hero" aria-labelledby="home-heading" class="flex min-w-0 flex-1 flex-col"
             x-data="{
                 playFilm: window.matchMedia('(min-width: 768px) and (prefers-reduced-motion: no-preference)').matches,
                 filmReady: false,
                 filmAvailable: false,
                 sendFilm(method, value) {
                     this.$refs.film?.contentWindow.postMessage({ method, value }, 'https://player.vimeo.com');
                 },
                 onFilmMessage(event) {
                     if (event.origin !== 'https://player.vimeo.com' || event.source !== this.$refs.film?.contentWindow) return;
                     let message;
                     try { message = typeof event.data === 'string' ? JSON.parse(event.data) : event.data; } catch (_) { return; }
                     if (!message) return;
                     if (message.event === 'ready' || message.method === 'ping') {
                         this.sendFilm('addEventListener', 'playing');
                         this.sendFilm('addEventListener', 'error');
                         this.sendFilm('getCurrentTime');
                     }
                     if (message.event === 'playing' || (message.method === 'getCurrentTime' && message.value > 0)) {
                         this.filmReady = this.filmAvailable = true;
                     }
                     if (message.event === 'error') {
                         this.filmReady = false;
                         this.playFilm = false;
                     }
                 }
             }" @message.window="onFilmMessage($event)">
        <div class="absolute inset-0 z-0 overflow-hidden" aria-hidden="true">
        <picture>
            <source media="(min-width: 768px)" srcset="{{ asset('images/banners/mapi.jpg') }}" width="2000" height="1267">
            <img src="{{ asset('images/p-cusco-1.jpg') }}" alt="" width="576" height="814"
                 fetchpriority="high" class="absolute inset-0 h-full w-full object-cover object-center">
        </picture>
        {{-- Keep the existing desktop film; mobile and reduced-motion visitors use the photo. --}}
        <div class="absolute inset-0 z-0 hidden opacity-0 md:block" :class="{ 'opacity-0': !filmReady }" aria-hidden="true">
            <template x-if="playFilm">
                <div class="vimeo-wrapper">
                    <iframe x-ref="film" @load="sendFilm('ping')" src="https://player.vimeo.com/video/381676880?background=1&amp;autoplay=1&amp;loop=1&amp;title=0&amp;byline=0&amp;portrait=0&amp;muted=1"
                            title="Peru travel scenes" tabindex="-1" allow="autoplay; fullscreen"></iframe>
                </div>
            </template>
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-tertiary/70 via-tertiary/30 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-tertiary/20 via-transparent to-transparent"></div>
        </div>
        <div class="container home-shell home-hero-content">
            <div class="max-w-2xl">
                <p class="mb-4 flex items-center gap-3 text-xs font-semibold uppercase tracking-wider text-secondary" data-package-enter="eyebrow">
                    <span class="inline-flex shrink-0 items-center gap-1" aria-hidden="true"><span class="h-2.5 w-1 bg-secondary"></span><span class="h-2.5 w-3 bg-secondary"></span><span class="h-2.5 w-5 bg-secondary"></span></span>
                    Peru journeys. Local experts.
                </p>
                <h1 id="home-heading" class="font-sans text-4xl font-semibold leading-tight tracking-tight drop-shadow sm:text-5xl md:text-6xl lg:text-7xl" data-package-enter="title">Peru travel,<br>made personal.</h1>
                <p class="mt-5 max-w-lg border-l-2 border-secondary/60 pl-4 text-base leading-relaxed text-white/90 md:text-lg" data-package-enter="description">
                    Private and customizable journeys designed by our local Peru travel experts.
                </p>
                <div class="home-hero-actions" data-package-enter="actions">
                    <a href="#popular-peru-trips" class="btn-secondary" data-home-action="hero-explore">
                        Explore Peru Travel Packages <x-heroicon-o-arrow-narrow-right class="h-5 w-5 shrink-0" aria-hidden="true" />
                    </a>
                    <a href="#form-dream-adventure" class="btn-white"
                       data-quote-source="hero" data-home-action="hero-quote">Plan My Trip</a>
                </div>
            </div>
            <template x-if="filmAvailable">
                <button type="button" @click="playFilm = !playFilm; filmReady = false" :aria-pressed="playFilm.toString()"
                        class="absolute bottom-4 right-12 z-10 hidden min-h-11 items-center border border-white/70 px-3 text-xs text-white focus-visible:outline-secondary md:inline-flex"
                        x-text="playFilm ? 'Pause video' : 'Play video'">Pause video</button>
            </template>
        </div>
    </section>

    @php
        // Original GoToPeru trust messages and icons, in their original order.
        $homeTrustItems = [
            ['icon' => 'images/icons/shield.png', 'title' => 'Book with Confidence', 'description' => 'Plan your travels with peace of mind'],
            ['icon' => 'images/icons/trusted.jpg', 'title' => 'Trusted local Peru travel experts', 'description' => 'Professional service from trusted local experts'],
            ['icon' => 'images/icons/tripadvisor.png', 'title' => 'Great Reviews', 'description' => 'We are proud of our service quality and great reviews'],
            ['icon' => 'images/icons/good.png', 'title' => 'You are in good hands', 'description' => 'While on your journey help is never out of reach'],
            ['icon' => 'images/icons/hassle.png', 'title' => 'Hassle-free experience', 'description' => 'We plan and book your entire Peru trip before you arrive.'],
            ['icon' => 'images/icons/tours.png', 'title' => 'Flexible tour options', 'description' => 'Our vacation packages are customisable to your needs.'],
            ['icon' => 'images/icons/good.png', 'title' => 'Hospitality at its finest', 'description' => 'Peruvian hospitality is worldwide known and we are proof of that.'],
            ['icon' => 'images/icons/secure.png', 'title' => 'Full Financial Protection', 'description' => 'Your payments are protected with financial safety as standard.'],
            ['icon' => 'images/icons/guarantee.png', 'title' => 'Value for Money', 'description' => 'Exceptional quality for your Money, no intermediaries.'],
        ];
    @endphp
    <section data-analytics-section="trust" aria-label="Why travel with GoToPeru" class="relative z-10" data-package-enter="trust">
        <div class="absolute inset-x-0 bottom-0 h-1/2 bg-white" aria-hidden="true"></div>
        <div class="container home-shell relative">
        <div class="flex items-center gap-1 border border-gray-200 bg-white px-1 shadow-sm md:gap-2 md:px-2">
            <button id="home-trust-prev" type="button" class="home-trust-control" aria-label="Previous trust messages" aria-controls="home-trust-slider">
                <x-heroicon-o-arrow-narrow-left class="h-5 w-5" aria-hidden="true" />
            </button>
            <div id="home-trust-slider" class="swiper slider-brands min-w-0 flex-1 overflow-hidden">
                <ul class="swiper-wrapper">
                    @foreach($homeTrustItems as $item)
                        <li class="swiper-slide">
                            <div class="home-trust-item">
                                <img src="{{ asset($item['icon']) }}" alt="" width="48" height="48" loading="lazy" class="h-12 w-12 shrink-0 object-contain">
                                <div class="min-w-0">
                                    <p class="text-sm font-semibold leading-snug text-tertiary">
                                        @if($item['title'] === 'Great Reviews')
                                            <a href="{{ route('reviews') }}" class="underline underline-offset-4 focus-visible:outline-primary">{{ $item['title'] }}</a>
                                        @else
                                            {{ $item['title'] }}
                                        @endif
                                    </p>
                                    <p class="mt-1 text-xs leading-relaxed text-gray-600">{{ $item['description'] }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <button id="home-trust-next" type="button" class="home-trust-control" aria-label="Next trust messages" aria-controls="home-trust-slider">
                <x-heroicon-o-arrow-narrow-right class="h-5 w-5" aria-hidden="true" />
            </button>
        </div>
        </div>
    </section>
@endsection

@section('content')
    @php
        // Presentation tabs map to existing collections; they do not create categories.
        $homeFeaturedPreview = $paquetes_features->take(5);
        $homeTripCards = collect();
        $homeTravelStyles = $homeCategories->whereIn('url', [
            'traveler-favorites', 'treks-tours', 'adventure-tours',
            'cultural-tours', 'gastronomy-tours', 'hot-deals-and-travel-offers',
        ]);
        $homeTripCollections = [
            'featured' => [
                'label' => 'FEATURED',
                'url' => route('packages.all'),
                'cta' => 'View all Peru trips',
                'ids' => $homeFeaturedPreview->pluck('id')->map(function ($id) { return (int) $id; })->values()->all(),
            ],
            'styles' => [
                'label' => 'TRAVEL STYLES',
                'url' => route('packages.all'),
                'cta' => '',
                'ids' => [],
            ],
        ];
        $homePackageTabs = [
            'luxury' => ['slug' => 'luxury', 'label' => 'LUXURY', 'cta' => 'View all Luxury Tours'],
            'multi-country' => ['slug' => 'multicountry', 'label' => 'MULTI-COUNTRY', 'cta' => 'View all Multi-Country trips'],
            'day-tours' => ['slug' => 'full-day-tours', 'label' => 'DAY TOURS', 'cta' => 'View all Day Tours'],
        ];
        foreach ($homePackageTabs as $key => $tab) {
            $cat = $homeCategories->firstWhere('url', $tab['slug']);
            if (!$cat) {
                continue;
            }
            $preview = $cat->paquetes->take(6);
            $homeTripCollections[$key] = [
                'label' => $tab['label'],
                'url' => route('category.show', $cat),
                'cta' => $tab['cta'],
                'category_id' => $cat->id,
                'category_slug' => $cat->url,
                'ids' => $preview->pluck('id')->map(function ($id) { return (int) $id; })->values()->all(),
            ];
            foreach ($preview as $trip) {
                if (!$homeTripCards->has($trip->id)) {
                    $homeTripCards->put($trip->id, $trip);
                }
            }
        }
    @endphp

    <section id="popular-peru-trips" data-analytics-section="packages" aria-labelledby="home-trips-heading" class="scroll-mt-24 bg-white"
             x-data="{
                 active: 'featured',
                 indicatorLeft: 0,
                 indicatorWidth: 0,
                 collections: {{ json_encode($homeTripCollections) }},
                 updateIndicator() {
                     const tab = this.$refs.tabs.querySelector('[aria-selected=true]');
                     if (!tab) return;
                     this.indicatorLeft = tab.offsetLeft;
                     this.indicatorWidth = tab.offsetWidth;
                 },
                 selectCollection(key) {
                     if (this.active === key) return;
                     this.active = key;
                     this.$nextTick(() => {
                         this.updateIndicator();
                         // Keep keyboard/reading order aligned with the selected collection.
                         this.collections[key].ids.forEach(id => {
                             const card = this.$refs.trips.querySelector('[data-home-trip=&quot;' + id + '&quot;]');
                             if (card) this.$refs.trips.append(card);
                         });
                         this.$refs.trips.scrollLeft = 0;
                         this.$refs.featured.scrollLeft = 0;
                         this.$refs.styles.scrollLeft = 0;
                         if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                             this.$refs.results.animate([{ opacity: 0 }, { opacity: 1 }], { duration: 200, easing: 'ease-out' });
                         }
                     });
                 },
                 moveTab(event) {
                     if (!['ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(event.key)) return;
                     const tabs = Array.from(event.currentTarget.querySelectorAll('[role=tab]'));
                     const index = tabs.indexOf(event.target);
                     if (index < 0) return;
                     event.preventDefault();
                     const next = event.key === 'Home' ? 0 : event.key === 'End' ? tabs.length - 1 : (index + (event.key === 'ArrowRight' ? 1 : -1) + tabs.length) % tabs.length;
                     tabs[next].focus({ preventScroll: true });
                     tabs[next].scrollIntoView({ block: 'nearest', inline: 'nearest' });
                     tabs[next].click();
                 }
             }"
             x-init="$nextTick(() => updateIndicator()); document.fonts.ready.then(() => updateIndicator())"
             @resize.window.debounce.100ms="updateIndicator()">
        <div class="home-content pt-14 md:pt-20">
            <div class="mx-auto max-w-3xl text-center" data-package-reveal>
                <p class="mb-5 inline-flex items-center gap-3 text-xs font-semibold uppercase tracking-widest text-primary">
                    <span class="h-px w-6 bg-primary/20 sm:w-10" aria-hidden="true"></span>
                    <span class="inline-flex items-center gap-1" aria-hidden="true"><span class="h-2.5 w-1 bg-secondary"></span><span class="h-2.5 w-3 bg-secondary"></span><span class="h-2.5 w-5 bg-secondary"></span></span>
                    Discover Peru
                    <span class="h-px w-6 bg-primary/20 sm:w-10" aria-hidden="true"></span>
                </p>
                <h2 id="home-trips-heading" class="font-sans text-4xl font-semibold leading-tight tracking-tight text-tertiary md:text-5xl">Peru Travel Packages</h2>
                <p class="mx-auto mt-6 max-w-xl text-sm leading-relaxed text-gray-600 md:text-base">Journeys and travel styles designed by our local Peru travel experts.</p>
            </div>
            <div id="explore-by-interest" x-ref="tabs" class="relative mt-10 flex snap-x gap-4 overflow-x-auto border-b border-gray-200 md:mt-12 md:justify-center md:gap-8"
                 role="tablist" aria-label="Peru travel collections" @keydown="moveTab($event)" data-package-reveal>
                @foreach($homeTripCollections as $key => $collection)
                    <button type="button" id="home-trip-tab-{{ $key }}" role="tab" aria-controls="home-trip-results"
                            aria-selected="{{ $key === 'featured' ? 'true' : 'false' }}" :aria-selected="(active === '{{ $key }}').toString()"
                            tabindex="{{ $key === 'featured' ? '0' : '-1' }}" :tabindex="active === '{{ $key }}' ? 0 : -1"
                            @click="selectCollection('{{ $key }}')" class="home-collection-tab"
                            @if(isset($collection['category_id'])) data-home-action="category" data-category-id="{{ $collection['category_id'] }}" data-category-slug="{{ $collection['category_slug'] }}" @endif>
                        {{ $collection['label'] }}
                    </button>
                @endforeach
                <span class="home-tab-indicator" aria-hidden="true"
                      :style="{ width: indicatorWidth + 'px', transform: 'translateX(' + indicatorLeft + 'px)' }"></span>
            </div>
        </div>
        <div class="bg-gray-50">
        <div class="home-content pb-10 pt-8 md:pb-12 md:pt-12">
            <p id="home-trips-hint" class="mb-4 text-xs text-gray-600 md:hidden" x-show="active !== 'styles'">Swipe to explore more trips →</p>
            <div id="home-trip-results" x-ref="results" role="tabpanel" aria-labelledby="home-trip-tab-featured" :aria-labelledby="'home-trip-tab-' + active"
                 class="focus-visible:outline-primary" data-package-reveal
                 aria-describedby="home-trips-hint" :aria-describedby="active === 'styles' ? null : 'home-trips-hint'" tabindex="0">
                <div x-ref="featured" x-show="active === 'featured'"
                     class="flex snap-x snap-mandatory gap-4 overflow-x-auto pb-4 md:grid md:grid-cols-6 md:gap-6 md:overflow-visible md:pb-0">
                    @foreach($homeFeaturedPreview as $paquete)
                        <div class="home-trip-item {{ $loop->iteration <= 3 ? 'md:col-span-2' : 'md:col-span-3' }}">
                            <x-packages-card :paquete="$paquete" variant="home-featured" />
                        </div>
                    @endforeach
                </div>
                <div x-ref="trips" x-show="active !== 'styles' && active !== 'featured'" style="display: none"
                     class="home-package-grid"
                     :class="{ 'home-package-grid-pair': collections[active].ids.length === 2, 'home-package-grid-single': collections[active].ids.length === 1 }">
                    @foreach($homeTripCards as $paquete)
                        <div class="home-trip-item" data-home-trip="{{ $paquete->id }}"
                             x-show="collections[active].ids.includes({{ (int) $paquete->id }})" style="display: none">
                            <x-packages-card :paquete="$paquete" variant="home" />
                        </div>
                    @endforeach
                </div>
                <div x-ref="styles" x-show="active === 'styles'" style="display: none"
                     class="grid grid-cols-2 gap-3 md:gap-6 lg:grid-cols-3">
                    @foreach($homeTravelStyles as $cat)
                        <div class="min-w-0">
                            <div class="relative h-52 overflow-hidden rounded-sm bg-tertiary sm:h-64 md:h-72 lg:h-80 2xl:h-96">
                                <a href="{{ route('category.show', $cat) }}" class="group absolute inset-0 block text-white focus-visible:outline-primary"
                                   data-home-action="category" data-category-id="{{ $cat->id }}" data-category-slug="{{ $cat->url }}">
                                    @if($cat->imagen || $cat->imagen_banner)
                                        <img src="{{ $cat->imagen ?: $cat->imagen_banner }}" alt="" loading="lazy" decoding="async"
                                             class="home-card-photo">
                                    @endif
                                    <div class="absolute inset-x-0 bottom-0 isolate px-3 pb-3 pt-10 md:px-5 md:pb-5 md:pt-12">
                                        <span class="home-card-shade from-tertiary/90 to-transparent" aria-hidden="true"></span>
                                        <div class="flex items-end justify-between gap-2 md:gap-3">
                                            <div class="min-w-0">
                                                <h3 class="text-sm font-semibold leading-snug md:text-xl">{{ ucwords(strtolower($cat->nombre)) }}</h3>
                                                <span class="mt-2 block h-px w-6 bg-secondary md:w-10" aria-hidden="true"></span>
                                            </div>
                                            <span class="home-card-arrow inline-flex shrink-0 items-center text-white" aria-hidden="true">
                                                <x-heroicon-o-arrow-narrow-right class="h-4 w-4 md:h-5 md:w-5" />
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-6 pb-0 text-center md:mt-16 md:pb-6">
                <p class="mb-5 text-xl font-medium text-tertiary"
                   x-text="active === 'featured' ? 'Want to see more of Peru?' : active === 'styles' ? 'Looking for more ways to experience Peru?' : active === 'luxury' ? 'Explore more Luxury journeys' : active === 'multi-country' ? 'Explore more journeys across South America' : 'Discover more experiences in Peru'">Want to see more of Peru?</p>
                <a href="{{ route('packages.all') }}" :href="collections[active].url"
                   class="group inline-flex w-full max-w-sm items-center justify-between border border-tertiary bg-transparent text-xs font-bold tracking-wider text-tertiary transition-colors duration-200 hover:bg-tertiary hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-secondary" data-home-action="all-trips">
                    <span class="flex-1 px-4 py-4" x-text="active === 'featured' || active === 'styles' ? 'Explore All Peru Travel Packages' : collections[active].cta">Explore All Peru Travel Packages</span>
                    <span class="inline-flex shrink-0 items-center justify-center border-l border-tertiary/20 px-4 py-2 text-secondary transition-colors duration-200 group-hover:border-secondary" aria-hidden="true">
                        <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-5 w-5" />
                    </span>
                </a>
            </div>
        </div>
        </div>
    </section>

{{--    <section class="grid md:grid-cols-2 sm:grid-cols-1 mx-auto gap-0">--}}

{{--        @foreach($category_block as $category_b)--}}
{{--            <div class="overflow-hidden relative group">--}}
{{--                <a href="{{ route('category.show', $category_b) }}">--}}
{{--                    <div class="relative">--}}
{{--                        <img src="{{$category_b->imagen_banner}}" alt="" class="object-cover min-w-full h-20r transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105">--}}
{{--                        <div class="absolute inset-0 gradient-cicle-gray"></div>--}}
{{--                    </div>--}}
{{--                    <div class="absolute w-full inset-x-0 bottom-0 p-3">--}}
{{--                        <div class="py-2 px-4 text-gray-100 shadow-lg rounded-lg mb-4">--}}
{{--                            <h2 class="text-lg font-semibold">{{$category_b->nombre}}</h2>--}}
{{--                            <div class="font-normal text-sm">--}}
{{--                                {!! $category_b->resumen !!}--}}
{{--                            </div>--}}
{{--                                                        <a href="" class="float-right ">View self-drive tours</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        @endforeach--}}

{{--    </section>--}}

{{--    <section class="grid md:grid-cols-5 sm:grid-cols-1">--}}
{{--        @foreach($category_footer as $category_f)--}}
{{--            <div class="overflow-hidden relative group">--}}
{{--                <a href="{{ route('category.show', $category_f) }}">--}}
{{--                    <div class="relative">--}}
{{--                        <img src="{{$category_f->imagen}}" alt="" class="h-20r object-cover min-w-full  transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105">--}}
{{--                        <div class="absolute inset-0 gradient-cicle-gray"></div>--}}
{{--                    </div>--}}
{{--                    <div class="absolute w-full bottom-0 inset-x-0 p-3">--}}
{{--                        <div class="py-2 px-4 text-gray-100 shadow-lg rounded-lg">--}}
{{--                            <h2 class="text-lg font-semibold">{{$category_f->nombre}}</h2>--}}
{{--                            <div class="font-normal text-sm">--}}
{{--                                {!! $category_f->resumen !!}--}}
{{--                            </div>--}}
{{--                                                    <a href="" class="float-right font-bold">View self-drive tours</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </section>--}}


{{--    <div class="bg-gray-100 pt-12  dark:bg-gray-800">--}}
{{--    <section class="px-6 container grid grid-cols-1 md:grid-cols-4">--}}
{{--        <div class="text-center w-full col-span-4 items-center text-2xl text-gray-700 dark:text-secondary font-bold gap-2">--}}
{{--            Recomended Travel Packages--}}
{{--            <div class="border-4 h-1 w-12 border-primary mx-auto mt-3"></div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <section class="px-6 mx-auto grid grid-cols-1 md:grid-cols-4 gap-6 py-12">--}}
{{--        @foreach($paquetes_features as $paquete)--}}
{{--            <x-packages-card :paquete="$paquete"></x-packages-card>--}}
{{--        @endforeach--}}


{{--    </section>--}}
{{--    </div>--}}

{{--    <div class="flex mb-3 px-6 block md:mt-12 sm:mt-0 items-center text-2xl text-gray-700 dark:text-secondary font-bold gap-2">--}}
{{--        <div class="">--}}
{{--            <span class="inline-block w-1 h-2.5 bg-secondary dark:bg-primary ml-1"></span>--}}
{{--            <span class="hidden md:inline-flex inline-block w-3 h-2.5 bg-secondary dark:bg-primary ml-1"></span>--}}
{{--            <span class="hidden md:inline-flex inline-block w-5 h-2.5 bg-secondary dark:bg-primary"></span>--}}
{{--        </div> {{__('message.subtitle6')}}--}}
{{--    </div>--}}
{{--    <section class="grid grid-cols-1 md:grid-cols-5">--}}
{{--        <div class="md:col-span-3 relative">--}}
{{--            <img src="{{asset('images/banners/confidence/experienced-tour-guides.jpg')}}" alt="" class="object-cover h-full w-full">--}}
{{--            <div class="absolute inset-0 gradient-cicle-gray flex items-center text-white text-center w-full">--}}
{{--                <div class="w-full text-center">--}}
{{--                    <h3 class="font-semibold block text-lg md:text-4xl">POPULAR: MACHUPICCHU FULL DAY</h3>--}}
{{--                    <p class="block mb-6">Book online and save up to 20%. All included: trains, entrances, buses, guide, transfers</p>--}}
{{--                    <div class="font-semibold text-white dark:text-gray-700 text-xs md:text-5xl mt-auto">--}}
{{--                        <div class="text-xs ">Price p.p. from</div>--}}
{{--                        $299 <span class="text-sm text-secondary">usd</span>--}}
{{--                    </div>--}}

{{--                    <div class="block mt-6">--}}
{{--                        <a href="peru-travel-packages/machu-picchu-full-day" class="btn-secondary">View Tours</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="md:col-span-2 bg-gray-800 text-white dark:bg-gray-700 dark:bg-opacity-90 p-6 dark:text-gray-50 flex items-center">--}}
{{--            <div class="">--}}
{{--                <h3 class="font-semibold text-2xl">--}}
{{--                    GET IN TOUCH WITH ONE OF OUR LOCAL TRAVEL EXPERTS--}}
{{--                </h3>--}}
{{--                <p class="block my-12">--}}
{{--                    Whatever your needs, we are here to help. If you have any questions about our packages or services, please do not hesitate to contact us.--}}
{{--                </p>--}}
{{--                <div class="flex justify-center gap-12">--}}
{{--                    <div class="text-center">--}}
{{--                        <a href="https://api.whatsapp.com/send?phone=12024911478" target="_blank">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />--}}
{{--                            </svg>--}}
{{--                            Chat--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="text-center">--}}
{{--                        <a href="mailto:info@gotoperu.com">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />--}}
{{--                            </svg>--}}
{{--                            Email--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="text-center">--}}
{{--                        <a href="https://api.whatsapp.com/send?phone=12024911478" target="_blank">--}}
{{--                            <img src="{{asset('images/whatsapp-i.png')}}" alt="" class="mx-auto w-14 h-10">--}}
{{--                            Whatsapp--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <a href="#" class="btn-primary">{{__('message.button_all')}}</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="px-6 container grid grid-cols-1 md:grid-cols-4 my-12">--}}
{{--        <div class="text-center w-full col-span-4 items-center text-2xl text-gray-700 dark:text-secondary font-bold gap-2">--}}
{{--            Recomended Travel Packages--}}
{{--            <div class="border-4 h-1 w-12 border-primary mx-auto mt-3"></div>--}}
{{--        </div>--}}
{{--        <div class="col-span-4 text-center mt-4">--}}
{{--            See and learn about our tours from our valued Peruvian Visitor customers.--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <section class="container hidden md:block mt-6">--}}

{{--        --}}{{--        <div class="flex items-center text-2xl text-gray-700 mb-4 dark:text-secondary font-bold gap-2">--}}
{{--        --}}{{--            <div class="border-4 h-1 w-12 border-secondary"></div> {{__('message.subtitle5')}}--}}
{{--        --}}{{--        </div>--}}
{{--        --}}{{--        <div class="dark:bg-primary">--}}
{{--        --}}{{--        <div class="elfsight-app-d1e14e4b-52d0-4ad9-9068-f94e0de6bf50"></div>--}}
{{--        --}}{{--        </div>--}}

{{--        <div class="mt-6 dark:bg-primary text-white">--}}
{{--            --}}{{--            <div class="elfsight-app-45e6b553-4db1-4009-9a37-a98b273413ec"></div>--}}
{{--            <div class="elfsight-app-de637865-6596-4396-8bba-ef0f7b50bc9e"></div>--}}
{{--        </div>--}}

{{--    </section>--}}


    @if($destination->isNotEmpty())
        <section id="explore-peru-destinations" data-analytics-section="destinations" aria-labelledby="home-destinations-heading" class="w-full bg-tertiary py-16 lg:py-20"
                 x-data="{
                     activeDestinationIndex: 0,
                     total: {{ $destination->count() }},
                     scrollFrame: null,
                     destinationCards() {
                         return Array.from(this.$refs.destinationRail.querySelectorAll('[data-destination-card]'));
                     },
                     updatePosition() {
                         if (this.scrollFrame !== null) return;
                         this.scrollFrame = requestAnimationFrame(() => {
                             this.scrollFrame = null;
                             const rail = this.$refs.destinationRail;
                             const end = Math.max(0, rail.scrollWidth - rail.clientWidth);
                             const left = Math.min(end, Math.max(0, rail.scrollLeft));
                             if (left <= 1) {
                                 this.activeDestinationIndex = 0;
                                 return;
                             }
                             if (end - left <= 1) {
                                 this.activeDestinationIndex = this.total - 1;
                                 return;
                             }
                             const center = left + rail.clientWidth / 2;
                             let nearestDistance = Infinity;
                             let nearestIndex = 0;
                             this.destinationCards().forEach((card, index) => {
                                 const distance = Math.abs(card.offsetLeft + card.offsetWidth / 2 - center);
                                 if (distance < nearestDistance) {
                                     nearestDistance = distance;
                                     nearestIndex = index;
                                 }
                             });
                             this.activeDestinationIndex = nearestIndex;
                         });
                     },
                     centerDestination(index, instant = false) {
                         const rail = this.$refs.destinationRail;
                         const card = this.destinationCards()[Math.max(0, Math.min(this.total - 1, index))];
                         if (!card) return;
                         rail.scrollTo({
                             left: card.offsetLeft + card.offsetWidth / 2 - rail.clientWidth / 2,
                             behavior: instant || window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'instant' : 'smooth'
                         });
                         this.updatePosition();
                     },
                     selectDestination(event, index) {
                         if (event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;
                         if (index !== this.activeDestinationIndex) {
                             event.preventDefault();
                             this.centerDestination(index);
                         }
                     },
                     destroy() {
                         if (this.scrollFrame !== null) cancelAnimationFrame(this.scrollFrame);
                     }
                 }"
                 x-init="$nextTick(() => centerDestination(activeDestinationIndex, true))"
                 @resize.window.debounce.150ms="centerDestination(activeDestinationIndex, true)">
            @php
                $destinationPhotos = [
                    'arequipa' => asset('images/destinations/arequipa.jpg'),
                    'puno' => asset('images/destinations/puno.jpg'),
                ];
            @endphp
            <div class="home-content">
                <div class="mb-8 max-w-3xl lg:mb-10">
                    <p class="mb-5 inline-flex items-center gap-3 text-xs font-semibold uppercase tracking-widest text-secondary">
                        <span class="inline-flex items-center gap-1" aria-hidden="true"><span class="h-2.5 w-1 bg-secondary"></span><span class="h-2.5 w-3 bg-secondary"></span><span class="h-2.5 w-5 bg-secondary"></span></span>
                        Discover Peru
                    </p>
                    <h2 id="home-destinations-heading" class="font-sans text-4xl font-semibold leading-tight tracking-tight text-white md:text-5xl">Explore by Destination</h2>
                    <p class="mt-5 max-w-xl text-sm leading-relaxed text-gray-300 md:text-base">Discover the places behind every journey.</p>
                </div>

                <div class="relative">
                    <ul id="home-destination-rail" x-ref="destinationRail" aria-label="Peru destinations" tabindex="0"
                        @scroll.passive="updatePosition()"
                        class="home-destination-rail relative flex min-w-0 snap-x snap-mandatory gap-2 overflow-x-auto scroll-smooth py-8 sm:gap-4 lg:gap-6 motion-reduce:scroll-auto focus-visible:outline focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-secondary">
                        @foreach($destination as $dest)
                            @php
                                $cover = $destinationPhotos[strtolower(trim($dest->nombre))]
                                    ?? (optional($dest->destino_imagen->first())->nombre ?: $dest->imagen);
                            @endphp
                            <li data-destination-card class="min-w-0 shrink-0 basis-4/5 snap-center sm:basis-2/3 lg:basis-1/2"
                                :class="activeDestinationIndex === {{ $loop->index }} ? 'z-10' : 'z-0'">
                                <a href="{{ route('destinations.show', $dest) }}"
                                   @click="selectDestination($event, {{ $loop->index }})"
                                   :class="activeDestinationIndex === {{ $loop->index }} ? 'scale-110 opacity-100' : 'scale-90 opacity-75'"
                                   class="group relative block h-80 overflow-hidden rounded-sm bg-tertiary lg:h-96 {{ $loop->first ? 'origin-left' : ($loop->last ? 'origin-right' : 'origin-center') }} motion-safe:transition-all motion-safe:duration-500 motion-safe:ease-out focus-visible:outline focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-secondary">
                                    @if($cover)
                                        <img src="{{ $cover }}" alt="{{ $dest->nombre }}" loading="lazy" decoding="async" class="home-destination-photo absolute inset-0">
                                    @endif
                                    <span :class="activeDestinationIndex === {{ $loop->index }} ? 'opacity-90' : 'opacity-100'"
                                          class="pointer-events-none absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-tertiary/90 via-tertiary/60 to-transparent motion-safe:transition-opacity motion-safe:duration-500 motion-safe:ease-out" aria-hidden="true"></span>
                                    <div class="absolute inset-x-0 bottom-0 p-6 lg:p-7">
                                        <p class="mb-3 text-xs font-medium tracking-wide text-secondary" aria-hidden="true">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>
                                        <h3 class="font-sans text-xl font-semibold leading-snug text-white lg:text-2xl">{{ $dest->nombre }}</h3>
                                        <span class="mt-3 block h-px w-8 bg-secondary motion-safe:transition-all motion-safe:duration-300 motion-safe:ease-out motion-safe:group-hover:w-12" aria-hidden="true"></span>
                                        <span class="mt-4 inline-flex items-center gap-3 text-xs font-medium text-white/90">
                                            Explore destination
                                            <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-4 w-4 shrink-0" aria-hidden="true" />
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mt-8 text-center lg:mt-10">
                    <a href="{{ route('destinations.all') }}"
                       class="group inline-flex w-full max-w-sm items-center justify-between border border-white/40 bg-transparent text-xs font-bold tracking-wider text-white transition-colors duration-200 hover:bg-white hover:text-tertiary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-secondary">
                        <span class="flex-1 px-4 py-4">View All Destinations</span>
                        <span class="inline-flex shrink-0 items-center justify-center border-l border-white/30 px-4 py-2 text-secondary transition-colors duration-200 group-hover:border-secondary" aria-hidden="true">
                            <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-5 w-5" />
                        </span>
                    </a>
                </div>
            </div>
        </section>
    @endif


    <section id="why-gotoperu" data-analytics-section="why_gotoperu" aria-labelledby="home-experts-heading"
             class="relative isolate overflow-hidden bg-white pt-20 font-sans text-tertiary lg:pt-28 xl:pt-32"
             x-data="{
                            landscapeFrame: null,
                            landscapeMotion: null,
                            landscapeTick: null,
                            motionChanged: null,
                            init() {
                                this.landscapeMotion = window.matchMedia('(min-width: 1024px) and (prefers-reduced-motion: no-preference)');
                                this.landscapeTick = () => this.queueLandscape();
                                this.motionChanged = () => {
                                    cancelAnimationFrame(this.landscapeFrame);
                                    this.landscapeFrame = null;
                                    if (this.landscapeMotion.matches) {
                                        window.addEventListener('scroll', this.landscapeTick, { passive: true });
                                        window.addEventListener('resize', this.landscapeTick);
                                        this.queueLandscape();
                                    } else {
                                        window.removeEventListener('scroll', this.landscapeTick);
                                        window.removeEventListener('resize', this.landscapeTick);
                                        this.$refs.landscape.style.removeProperty('transform');
                                    }
                                };
                                this.landscapeMotion.addEventListener('change', this.motionChanged);
                                this.$nextTick(() => this.motionChanged());
                            },
                            queueLandscape() {
                                if (!this.landscapeMotion.matches || this.landscapeFrame !== null) return;
                                this.landscapeFrame = requestAnimationFrame(() => {
                                    this.landscapeFrame = null;
                                    if (!this.landscapeMotion.matches) return;
                                    const bounds = this.$el.getBoundingClientRect();
                                    if (bounds.bottom <= 0 || bounds.top >= window.innerHeight) return;
                                    const progress = Math.max(0, Math.min(1, (window.innerHeight - bounds.top) / (window.innerHeight + bounds.height)));
                                    // Forty pixels of total travel; only the landscape moves.
                                    const offset = (progress - 0.5) * 40;
                                    this.$refs.landscape.style.transform = 'translate3d(0, ' + offset.toFixed(2) + 'px, 0)';
                                });
                            },
                            destroy() {
                                cancelAnimationFrame(this.landscapeFrame);
                                window.removeEventListener('scroll', this.landscapeTick);
                                window.removeEventListener('resize', this.landscapeTick);
                                this.landscapeMotion.removeEventListener('change', this.motionChanged);
                            }
                        }">
        {{-- One full-width landscape; all legibility and edge transitions belong to the section, not the team. --}}
        <div data-home-team-background data-package-reveal
             class="pointer-events-none absolute inset-0 h-full w-full !transform-none overflow-hidden" aria-hidden="true">
            <div x-ref="landscape" class="absolute -inset-y-4 inset-x-0">
                <img src="{{ asset('images/team/home/machupicchu.webp') }}" alt=""
                     width="2700" height="1620" loading="lazy" decoding="async"
                     class="h-full w-full object-cover object-center lg:scale-105 lg:object-right">
            </div>
            <div class="absolute inset-0 bg-white/80 lg:bg-transparent"></div>
            <div class="absolute inset-0 hidden bg-gradient-to-r from-white from-10% via-white/90 via-45% to-white/80 to-95% lg:block"></div>
            <div class="absolute inset-x-0 top-0 h-8 bg-gradient-to-b from-white to-transparent"></div>
            <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-b from-transparent via-gray-50/60 to-gray-50 lg:h-40"></div>
        </div>

        {{-- Bottom padding stays inside the container so the team can sit near the section base without moving the copy. --}}
        <div class="home-content relative grid grid-cols-1 pb-16 lg:grid-cols-12 lg:pb-20 xl:pb-24">
            <div class="relative z-30 min-w-0 motion-safe:!duration-500 lg:col-start-1 lg:col-end-6 lg:row-start-1 lg:pr-8" data-package-reveal>
                <p class="mb-5 inline-flex items-center gap-3 text-xs font-semibold uppercase tracking-wider text-primary">
                    <span class="inline-flex shrink-0 items-center gap-1" aria-hidden="true"><span class="h-2.5 w-1 bg-secondary"></span><span class="h-2.5 w-3 bg-secondary"></span><span class="h-2.5 w-5 bg-secondary"></span></span>
                    Why GOTOPERU
                </p>
                <h2 id="home-experts-heading" class="text-4xl font-semibold leading-tight tracking-tight sm:text-5xl lg:text-4xl xl:text-5xl 2xl:text-6xl">
                    Your Peruvian<br>
                    Travel Operator.
                </h2>
                <p class="mt-6 max-w-lg text-sm leading-relaxed text-gray-600 md:text-base">
                    Based in Cusco, our local team creates custom-made itineraries and supports you throughout your journey in Peru.
                </p>
            </div>

            <ol class="relative z-30 mt-8 space-y-6 motion-safe:!duration-500 lg:col-start-1 lg:col-end-5 lg:row-start-2 lg:pr-6" aria-label="Why travel with GoToPeru" data-package-reveal>
                <li class="flex items-start gap-4">
                    <span class="inline-flex shrink-0 items-center gap-3 pt-1 text-xs font-semibold tracking-wider text-primary" aria-hidden="true">01<span class="h-px w-6 bg-secondary"></span></span>
                    <div class="min-w-0">
                        <h3 class="text-base font-semibold">Local expertise</h3>
                        <p class="mt-1 text-sm leading-relaxed text-gray-600">Based in Cusco, with offices across Peru's main destinations.</p>
                    </div>
                </li>
                <li class="flex items-start gap-4">
                    <span class="inline-flex shrink-0 items-center gap-3 pt-1 text-xs font-semibold tracking-wider text-primary" aria-hidden="true">02<span class="h-px w-6 bg-secondary"></span></span>
                    <div class="min-w-0">
                        <h3 class="text-base font-semibold">Tailor-made journeys</h3>
                        <p class="mt-1 text-sm leading-relaxed text-gray-600">Custom-made itineraries shaped around your interests and way of travelling.</p>
                    </div>
                </li>
                <li class="flex items-start gap-4">
                    <span class="inline-flex shrink-0 items-center gap-3 pt-1 text-xs font-semibold tracking-wider text-primary" aria-hidden="true">03<span class="h-px w-6 bg-secondary"></span></span>
                    <div class="min-w-0">
                        <h3 class="text-base font-semibold">Personalized service</h3>
                        <p class="mt-1 text-sm leading-relaxed text-gray-600">Local representatives, guides and drivers support you throughout your trip.</p>
                    </div>
                </li>
            </ol>

            <div class="relative z-30 mt-8 flex flex-wrap items-center gap-x-6 gap-y-4 motion-safe:!duration-500 lg:col-start-1 lg:col-end-5 lg:row-start-3 lg:self-end lg:pr-6" data-package-reveal>
                <a href="#form-dream-adventure" data-quote-source="why_gotoperu" class="btn-primary group inline-flex min-h-12 items-center justify-center gap-3">
                    Plan My Trip
                    <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-4 w-4 shrink-0" aria-hidden="true" />
                </a>
                <a href="{{ route('about') }}" class="group inline-flex min-h-11 items-center gap-3 text-sm font-semibold text-tertiary transition-colors duration-300 hover:text-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary">
                    Meet Our Team
                    <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-4 w-4 shrink-0 text-secondary" aria-hidden="true" />
                </a>
            </div>

            {{-- Both visual layers share the team's bottom anchor; the image stays in normal flow on mobile. --}}
            <figure class="relative z-10 mt-10 w-full min-w-0 lg:absolute lg:bottom-6 lg:right-0 lg:mt-0 lg:w-2/3">
                <div class="relative">
                    <p class="pointer-events-none absolute left-0 top-0 z-10 !transform-none text-left text-6xl font-semibold leading-none tracking-tight text-primary/15 sm:text-8xl lg:-top-32 lg:left-16 xl:left-20 xl:text-9xl 2xl:left-24"
                       aria-hidden="true" data-package-reveal>LOCAL<br>EXPERTS</p>
                    <div class="relative z-20 motion-safe:!duration-500" data-package-reveal>
                        <img src="{{ asset('images/team/home/group-gtp.png') }}" alt="GoToPeru local travel team"
                             width="2000" height="853" loading="lazy" decoding="async"
                             class="block h-auto w-full max-w-none object-contain lg:origin-bottom-right lg:scale-90">
                    </div>
                </div>
            </figure>
        </div>
    </section>

    <section id="peru-in-motion" data-analytics-section="peru_in_motion" aria-labelledby="home-social-heading" class="bg-gray-50 pt-12 pb-16 font-sans text-tertiary lg:pt-16 lg:pb-20">
        <div class="home-content">
            <div class="home-social-header" data-package-reveal>
                <div class="max-w-2xl">
                    <p class="mb-5 inline-flex items-center gap-3 text-xs font-semibold uppercase tracking-wider text-primary">
                        <span class="inline-flex shrink-0 items-center gap-1" aria-hidden="true"><span class="h-2.5 w-1 bg-secondary"></span><span class="h-2.5 w-3 bg-secondary"></span><span class="h-2.5 w-5 bg-secondary"></span></span>
                        From Peru, Now
                    </p>
                    <h2 id="home-social-heading" class="text-3xl font-semibold leading-tight tracking-tight md:text-4xl">Peru, in motion.</h2>
                    <p class="mt-4 text-sm leading-relaxed text-gray-600 md:text-base">Recent moments, places and experiences from our journeys.</p>
                </div>
                <nav aria-label="Follow GOTOPERU" class="shrink-0 lg:text-right">
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-600">Follow GOTOPERU</p>
                    <ul class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-1 text-xs font-semibold">
                        <li>
                            <a href="https://www.instagram.com/goto.peru/" target="_blank" rel="noopener noreferrer" class="group inline-flex min-h-11 items-center gap-2 transition-colors duration-200 hover:text-secondary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary">
                                <img src="{{ asset('images/logos/instagram.png') }}" alt="" width="512" height="512" loading="lazy" decoding="async" class="h-4 w-4 object-contain transition-transform duration-200 group-hover:scale-105 motion-reduce:transition-none">
                                Instagram
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/GOTOPERUcom/" target="_blank" rel="noopener noreferrer" class="group inline-flex min-h-11 items-center gap-2 transition-colors duration-200 hover:text-secondary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary">
                                <img src="{{ asset('images/logos/facebook.png') }}" alt="" width="512" height="512" loading="lazy" decoding="async" class="h-4 w-4 object-contain transition-transform duration-200 group-hover:scale-105 motion-reduce:transition-none">
                                Facebook
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UCWjJ10j-_BfNTDnmjBug8Ng" target="_blank" rel="noopener noreferrer" class="group inline-flex min-h-11 items-center gap-2 transition-colors duration-200 hover:text-secondary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary">
                                <img src="{{ asset('images/logos/youtube.png') }}" alt="" width="512" height="512" loading="lazy" decoding="async" class="h-4 w-4 object-contain transition-transform duration-200 group-hover:scale-105 motion-reduce:transition-none">
                                YouTube
                            </a>
                        </li>
                        <li>
                            <a href="https://www.tiktok.com/@gotoperu" target="_blank" rel="noopener noreferrer" class="group inline-flex min-h-11 items-center gap-2 transition-colors duration-200 hover:text-secondary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary">
                                <img src="{{ asset('images/logos/tiktok.png') }}" alt="" width="512" height="512" loading="lazy" decoding="async" class="h-4 w-4 object-contain transition-transform duration-200 group-hover:scale-105 motion-reduce:transition-none">
                                TikTok
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            {{-- Elfsight owns the feed, carousel and playback; keep its container outside our reveal motion. --}}
            {{-- Configure the responsive carousel in Elfsight: desktop 3, tablet 2, mobile 1 with a peek where supported. --}}
            <div class="min-h-64 w-full min-w-0 md:min-h-80">
                <div class="elfsight-app-b65da1af-4fbc-4952-a82b-341db07f2409" data-elfsight-app-lazy></div>
            </div>

            {{-- Detail's bridge pattern: the backdrop is independent of the portrait and raised review panel. --}}
            <div class="home-social-bridge" data-analytics-section="advisor_reviews">
                <div class="home-social-bridge__backdrop" aria-hidden="true">
                    <div class="home-social-bridge__decoration !transform-none" data-package-reveal>
                        <span>Local</span>
                        <span>Travel Expert</span>
                    </div>
                </div>
                <div class="home-social-bridge__copy" data-package-reveal>
                    <span class="mb-5 block h-px w-8 bg-secondary" aria-hidden="true"></span>
                    <p class="mb-5 text-xs font-semibold uppercase tracking-wider text-white/70">Plan with a local Peru expert.</p>
                    <h3 id="home-advisor-heading" class="text-2xl font-semibold leading-snug">Inspired by something you saw?</h3>
                    <p class="mt-4 text-sm leading-relaxed text-white/80">Our local team can help shape your journey.</p>
                </div>
                <div class="home-social-bridge__person" data-package-reveal>
                    <picture class="block">
                        <source media="not all and (min-width: 768px)" srcset="{{ asset('images/team/home/pabel.webp') }}" width="768" height="1154">
                        <img src="{{ asset('images/team/home/pabel.png') }}" alt="Pabel, GOTOPERU team"
                             width="1023" height="1537" loading="lazy" decoding="async"
                             class="home-social-bridge__portrait">
                    </picture>
                </div>
                <div class="home-social-bridge__actions">
                    <a href="#form-dream-adventure" data-quote-source="advisor" class="group inline-flex min-h-12 items-center justify-center gap-3 border border-white bg-white px-6 py-3 text-xs font-semibold text-tertiary transition-colors duration-200 hover:bg-transparent hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-secondary">
                        Plan My Trip
                        <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-4 w-4 shrink-0 text-secondary" aria-hidden="true" />
                    </a>
                </div>
                <div class="home-social-bridge__review" data-package-reveal>
                        <figure>
                            <h3 class="mb-5 text-xs font-semibold uppercase tracking-wider text-primary">Travelers tell it better</h3>
                            <blockquote class="relative pt-4 text-lg font-medium leading-relaxed xl:text-xl">
                                <span class="pointer-events-none absolute -top-5 -left-2 text-8xl leading-none text-primary/10" aria-hidden="true">“</span>
                                <p class="relative">...I would recommend Gotoperu 100%. You will not regret it!!!</p>
                            </blockquote>
                            <figcaption class="mt-4 flex flex-wrap gap-x-3 gap-y-1 text-xs">
                                <span class="font-semibold">Zeeshan B.</span>
                                <span class="text-gray-600">Toronto - Canada</span>
                            </figcaption>
                        </figure>
                        <ul aria-label="Traveler review platforms" class="mt-5 grid grid-cols-3 items-center gap-3">
                            <li class="min-w-0">
                                <a href="https://www.tripadvisor.com.pe/Attraction_Review-g294314-d15202262-Reviews-Gotoperu-Cusco_Cusco_Region.html" target="_blank" rel="noopener noreferrer"
                                   class="inline-flex min-h-11 w-full items-center justify-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary">
                                    <img src="{{ asset('images/logos/tripadvisor2.png') }}" alt="Tripadvisor" loading="lazy" decoding="async" class="h-14 w-auto max-w-full object-contain">
                                </a>
                            </li>
                            <li class="min-w-0">
                                <a href="https://www.yelp.com/biz/gotoperu-washington?osq=gotoperu.com" target="_blank" rel="noopener noreferrer"
                                   class="inline-flex min-h-11 w-full items-center justify-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary">
                                    <img src="{{ asset('images/logos/yelp2.png') }}" alt="Yelp" loading="lazy" decoding="async" class="h-14 w-auto max-w-full object-contain">
                                </a>
                            </li>
                            <li class="min-w-0">
                                <a href="https://www.trustpilot.com/review/gotoperu.com" target="_blank" rel="noopener noreferrer"
                                   class="inline-flex min-h-11 w-full items-center justify-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary">
                                    <img src="{{ asset('images/logos/trust2.png') }}" alt="Trustpilot" loading="lazy" decoding="async" class="h-14 w-auto max-w-full object-contain">
                                </a>
                            </li>
                        </ul>
                        <a href="{{ route('reviews') }}"
                           class="group relative mt-4 inline-flex min-h-11 items-center gap-3 border-b border-tertiary/20 text-xs font-semibold transition-colors duration-200 hover:text-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary">
                            Read Traveler Reviews
                            <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-4 w-4 shrink-0 text-secondary" aria-hidden="true" />
                            <span class="absolute inset-x-0 bottom-0 h-px origin-left scale-x-0 bg-secondary transition-transform duration-300 group-hover:scale-x-100 group-focus-visible:scale-x-100 motion-reduce:transition-none" aria-hidden="true"></span>
                        </a>
                </div>
            </div>
        </div>
    </section>


{{--    <section class="grid grid-cols-1 md:grid-cols-6 my-12">--}}
{{--        <div class="md:col-span-4 relative bg-gray-700">--}}
{{--            <div class="inset-0 flex items-center text-white w-full">--}}
{{--                <div class="w-full grid grid-cols-1 md:grid-cols-6 items-center">--}}
{{--                    <div class="p-6 col-span-4">--}}
{{--                        <h3 class="font-semibold block text-xl">Your Peruvian Travel Operator</h3>--}}
{{--                        <p class="block my-6">--}}
{{--                            Trust our team of local travel experts to plan an unforgettable trip full of must-see attractions and our favorite hidden gems of the land of the Incas. Our peruvian experts have all traveled down the same roads, trains and treks and know what you’re about to experience.--}}
{{--                            Every Peru tour offered is regularly inspected to ensure our travelers have an amazing experience.--}}
{{--                        </p>--}}

{{--                        <div class="block mt-6">--}}
{{--                            <a href="{{route('packages.all')}}" class="btn-secondary">View Tours</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-span-2">--}}
{{--                        <img src="{{asset('images/banners/angie.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="md:col-span-2 bg-gray-800 text-white dark:bg-gray-700 dark:bg-opacity-90 p-6 dark:text-gray-50 flex items-center">--}}
{{--            <div class="">--}}
{{--                <h3 class="font-semibold block text-xl">WHY BOOK WITH US</h3>--}}
{{--                <p class="flex my-4">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />--}}
{{--                    </svg>--}}
{{--                    Experts in tailor-made Peru travel</p>--}}
{{--                <p class="flex my-4">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />--}}
{{--                    </svg>--}}
{{--                    Headquarters in Cusco, offices in Lima, Arequipa and Tampa,FL.</p>--}}
{{--                <p class="flex my-4">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />--}}
{{--                    </svg>--}}
{{--                    Local staff with first-hand South America travel experience</p>--}}
{{--                <p class="flex my-4">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />--}}
{{--                    </svg>--}}
{{--                    Dedicated to providing personalized, quality service</p>--}}
{{--                --}}{{--                <a href="#" class="btn-primary">{{__('message.button_all')}}</a>--}}
{{--                <div class="block mt-6">--}}
{{--                    <a href="{{route('book')}}" class="btn-primary">View More</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


{{--    <div class="container w-full col-span-4  text-2xl text-gray-700 dark:text-secondary font-bold gap-2 mt-12">--}}
{{--        GET SOCIAL WITH US--}}
{{--        <div class="border-4 h-1 w-12 border-primary mt-3"></div>--}}
{{--        <p class="font-light text-lg mt-2">Follow our Peruvian adventures and share your own with us.</p>--}}
{{--    </div>--}}

    {{-- Legacy About content is preserved in page/partials/home/about-legacy.blade.php. --}}







{{--    <section class="container hidden md:block">--}}
{{--        <div class="flex mb-3 items-center text-2xl text-gray-700 dark:text-secondary font-bold gap-2 mt-24">--}}
{{--            <div class="border-4 h-1 w-12 border-primary"></div> Travel Style--}}
{{--        </div>--}}

{{--        --}}

{{--        <div class="mt-12">--}}
{{--            <category-component></category-component>--}}
{{--        </div>--}}

{{--    </section>--}}



{{--    <section class="container mt-6 mb-12 ">--}}

{{--        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">--}}
{{--            <div class="col-span-3 grid grid-cols-1 items-center relative filter grayscale bg-fixed bg-center bg-no-repeat bg-cover" style="background-image: url({{asset('images/hotels-t.jpg')}})">--}}
{{--                <div class="flex relative">--}}
{{--                    <div class="elfsight-app-ba7c9526-9468-4d5b-b378-68ec76259e00"></div>--}}
{{--                    <img src="{{asset('images/banners/social.jpg')}}" alt="" class="object-cover h-full w-full">--}}
{{--                    <div class="absolute inset-0 gradient-cicle-gray"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-span-2 flex gap-4 flex-col justify-between content-between overflow-hidden">--}}
{{--                <div class="">--}}
{{--                    <div class="flex items-center text-center text-gray-700 dark:text-gray-300 gap-2">--}}
{{--                        <div class="border p-4 w-1/2">--}}
{{--                            <p class="block text-4xl font-bold">30 000</p>--}}
{{--                            <p class="text-xs">FACEBOOK FANS</p>--}}
{{--                        </div>--}}
{{--                        <div class="border p-4 w-1/2">--}}
{{--                            <p class="block text-3xl font-bold">#gotoperu</p>--}}
{{--                            <p class="text-xs">INSTAGRAM HASHTAG</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="">--}}
{{--                    --}}{{--            <div class="bg-fixed bg-cover bg-center bg-no-repeat" style="background-image: url({{asset('images/hotels-t.jpg')}})">--}}

{{--                    <div class="bg-gray-500 bg-opacity-10 text-center p-12">--}}
{{--                        <img src="https://gotoperu-com.s3-us-west-1.amazonaws.com/logos/logo-gotoperu-black.png" alt="" class="mx-auto py-4">--}}
{{--                        <h3>PHOTOS FROM OUR TRAVELERS</h3>--}}
{{--                        <p>Get inspired by photos and videos from fellow travelers in Peru, or share your favorite @go.to.peru experiences with us.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="grid grid-cols-4 items-center text-2xl text-gray-700 font-bold gap-3">--}}
{{--                    <div class="border">--}}
{{--                        <a href="https://www.instagram.com/go.to.peru/" target="_blank"><img src="{{asset('images/logos/instagram.png')}}" alt="" class="p-6"></a>--}}
{{--                    </div>--}}
{{--                    <div class="border">--}}
{{--                        <a href="https://www.facebook.com/GOTOPERUcom/" target="_blank"><img src="{{asset('images/logos/facebook.png')}}" alt="" class="p-6"></a>--}}
{{--                    </div>--}}
{{--                    <div class="border">--}}
{{--                        <a href="https://www.youtube.com/channel/UCWjJ10j-_BfNTDnmjBug8Ng" target="_blank"><img src="{{asset('images/logos/youtube.png')}}" alt="" class="p-6"></a>--}}
{{--                    </div>--}}
{{--                    <div class="border">--}}
{{--                        <a href="https://www.tiktok.com/@gotoperu" target="_blank"><img src="{{asset('images/logos/tiktok.png')}}" alt="" class="p-6"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--        </div>--}}

{{--    </section>--}}



{{--    <div class=" mb-3 container sm:mt-0 items-center text-2xl text-gray-700 dark:text-secondary font-bold gap-2 hidden  md:flex">--}}
{{--        <div class="">--}}
{{--            <span class="inline-block w-1 h-2.5 bg-secondary dark:bg-primary ml-1"></span>--}}
{{--            <span class="hidden md:inline-flex inline-block w-3 h-2.5 bg-secondary dark:bg-primary ml-1"></span>--}}
{{--            <span class="hidden md:inline-flex  w-5 h-2.5 bg-secondary dark:bg-primary"></span>--}}
{{--        </div> {{__('message.subtitle6')}}--}}
{{--    </div>--}}
{{--        <div class="hidden md:block">--}}
{{--            <section class="grid grid-cols-1 md:grid-cols-5 container gap-4">--}}
{{--                <div class="md:col-span-3 relative">--}}
{{--                    <img src="{{asset('images/hotel.jpg')}}" alt="" class="object-cover h-full w-full">--}}
{{--                    <div class="absolute inset-0 gradient-cicle-gray"></div>--}}
{{--                </div>--}}
{{--                <div class="md:col-span-2 bg-secondary bg-opacity-20 dark:bg-gray-700 dark:bg-opacity-90 p-6 dark:text-gray-50 flex items-center">--}}
{{--                    <div class="">--}}
{{--                        <h3 class="font-semibold text-2xl">{{__('message.info_sub1')}}</h3>--}}
{{--                        <div class=" mb-10">--}}
{{--                            <span class="inline-block w-10 h-2 bg-secondary dark:bg-primary"></span>--}}
{{--                        </div>--}}
{{--                        <p class="block my-12">--}}
{{--                            {{__('message.info_par1')}}--}}
{{--                        </p>--}}
{{--                        <a href="{{route('hotels')}}" class="btn-primary">{{__('message.button_all')}}</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--        </div>--}}
{{--    </div>--}}

    <section id="home-transportation" data-analytics-section="transportation" aria-labelledby="home-transportation-heading" class="home-transportation">
        <div class="home-transportation__media" aria-hidden="true">
            <img src="{{ asset('images/banners/confidence/safe-transportation.jpg') }}"
                 alt="" width="700" height="450" loading="lazy" decoding="async"
                 class="home-transportation__image">
            {{-- Original transportation embed: background autoplay stays muted and loops; no separate player. --}}
            <iframe src="https://player.vimeo.com/video/1118424734?background=1&amp;autoplay=1&amp;loop=1&amp;title=0&amp;byline=0&amp;portrait=0&amp;muted=1&amp;playsinline=1&amp;dnt=1"
                    title="Private transportation in Peru with GOTOPERU" loading="lazy"
                    class="home-transportation__video" frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture" aria-hidden="true" tabindex="-1"></iframe>
        </div>
        <div class="home-transportation__shade" aria-hidden="true"></div>
        <div class="home-content home-transportation__content">
            <div class="grid w-full grid-cols-12">
                <div class="home-transportation__copy" data-package-reveal>
                    <p class="inline-flex items-center gap-3 text-xs font-semibold uppercase tracking-wider text-secondary">
                        <span class="inline-flex shrink-0 items-center gap-1" aria-hidden="true"><span class="h-2.5 w-1 bg-secondary"></span><span class="h-2.5 w-3 bg-secondary"></span><span class="h-2.5 w-5 bg-secondary"></span></span>
                        Operations in Peru
                    </p>
                    <h2 id="home-transportation-heading" class="text-3xl font-semibold leading-tight tracking-tight md:text-4xl xl:text-5xl">
                        Private Transportation in Peru with GOTOPERU
                    </h2>
                    <p class="max-w-lg text-sm leading-relaxed text-white/90 md:text-base">
                        Safe, comfortable, and punctual transfers from Lima airport to Cusco, Sacred Valley, and Machu Picchu.
                    </p>
                    <a href="#form-dream-adventure" data-quote-source="transportation" class="btn-white home-transportation__cta group inline-flex min-h-12 items-center justify-center gap-3">
                        Plan My Trip
                        <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-4 w-4 shrink-0 text-secondary" aria-hidden="true" />
                    </a>
                </div>
            </div>
        </div>
    </section>







        {{--    <div class="hidden md:block">--}}
{{--    <section class="grid grid-cols-1 md:grid-cols-3 my-4 container gap-4 ">--}}
{{--        <div class="md:col-span-1 relative flex items-center">--}}
{{--            <div class="relative w-full">--}}
{{--                <img src="{{asset('images/blog.jpg')}}" alt="" class="object-cover w-full h-full">--}}
{{--            </div>--}}
{{--            <div class="absolute inset-0 gradient-cicle-gray"></div>--}}
{{--            <div class="absolute inset-x-0 bottom-0 p-6 m-6  rounded-lg shadow-lg text-gray-500 bg-gray-50 dark:bg-gray-800 dark:text-gray-300">--}}
{{--                <h3 class="font-semibold text-2xl">Lugares Para Visitar en Perú en el 2021</h3>--}}
{{--                <div class="flex inline-flex divide-x text-xs my-3 divide-gray-500 gap-1">--}}
{{--                    <div class="flex inline-flex items-center gap-1">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">--}}
{{--                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>--}}
{{--                        </svg>--}}
{{--                        <span>Hidalgo</span>--}}
{{--                    </div>--}}
{{--                    <div class="flex inline-flex items-center gap-1 pl-1">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">--}}
{{--                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>--}}
{{--                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>--}}
{{--                        </svg>--}}
{{--                        <span>27 junio 2021</span>--}}
{{--                    </div>--}}
{{--                    <div class="flex inline-flex items-center gap-1 pl-1">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">--}}
{{--                            <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z"/>--}}
{{--                            <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z"/>--}}
{{--                        </svg>--}}
{{--                        <span>Travel</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class=" mb-10">--}}
{{--                    <span class="inline-block w-1 h-2 bg-secondary ml-1"></span>--}}
{{--                    <span class="inline-block w-3 h-2 bg-secondary ml-1"></span>--}}
{{--                    <span class="inline-block w-10 h-2 bg-secondary"></span>--}}
{{--                    <span class="inline-block w-3 h-2 bg-secondary ml-1"></span>--}}
{{--                    <span class="inline-block w-1 h-2 bg-secondary ml-1"></span>--}}
{{--                </div>--}}

{{--                <a href="" class="btn-secondary">View all</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="md:col-span-2 relative">--}}
{{--            <img src="{{asset('images/cua4.jpg')}}" alt="" class="h-full w-full object-cover">--}}
{{--            <div class="md:absolute md:inset-0 p-6 bg-gray-900 bg-opacity-50">--}}
{{--                <div class="flex flex-col h-full justify-end">--}}
{{--                    <div class="text-gray-50 text-right">--}}
{{--                        <h3 class="font-semibold text-2xl">News and travel guides</h3>--}}
{{--                        <div class=" mb-10">--}}
{{--                            <span class="inline-block w-1 h-2 bg-white ml-1"></span>--}}
{{--                            <span class="inline-block w-3 h-2 bg-white ml-1"></span>--}}
{{--                            <span class="inline-block w-20 h-2 bg-white"></span>--}}
{{--                        </div>--}}
{{--                        <p class="block my-12">Welcome travelers to our Peru blog, you will find useful Peru travel information and much more to inspire you for your next vacation to the land of the Incas including travel tips for Lima, Cusco, the Inca Trail, Machu Picchu, the Amazon and many other peruvian amazing destinations.</p>--}}
{{--                        <a href="" class="btn-secondary">View all</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    </div>--}}
{{--    <section class="mt-4 hidden md:block">--}}
{{--        <div class="container grid grid-cols-1 md:grid-cols-3 flex items-center">--}}
{{--            <div class="bg-gray-100 dark:bg-gray-700 dark:text-gray-100 h-full col-span-1  justify-between p-6 text-gray-500 order-2 md:order-1">--}}
{{--                <span class="text-sm font-light">{{$blogs_first->created_at}}</span>--}}
{{--                _____--}}
{{--                <span class="text-sm font-light">{{$blogs_first->categoria->nombre}}</span>--}}

{{--                <h2 class="my-6 font-semibold text-gray-600 dark:text-gray-100 text-3xl"><a href="{{route('blog.show', $blogs_first)}}">{{$blogs_first->titulo}}</a></h2>--}}
{{--                <span class="text-sm mb-6">{!! Str::limit($blogs_first->detalle, 300) !!}</span>--}}

{{--                <a href="{{route('blog.show', $blogs_first)}}" class="text-secondary mt-4 flex">{{__('message.button_read')}} <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />--}}
{{--                    </svg></a>--}}
{{--            </div>--}}
{{--            <div class="col-span-2 order-1 md:order-2 h-30r">--}}
{{--                <img src="{{$blogs_first->imagen_miniatura}}" alt="" class="h-full w-full object-cover object-center">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="block mt-6">--}}
{{--        <div class="text-center">--}}
{{--            <a href="{{route('blog')}}" class="btn-secondary">View all travel info</a>--}}
{{--        </div>--}}
{{--    </section>--}}


{{--    <div x-data="{ open: false, init() { setTimeout(() => this.open = true, 3000) } }" x-init="init()">--}}
{{--        <button @click="open =!open" class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide  capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />--}}
{{--            </svg>--}}

{{--            <span>Invite Member</span>--}}
{{--        </button>--}}
{{--        ssf--}}

{{--        <div x-show="open" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">--}}
{{--            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">--}}
{{--                <div x-cloak @click="open = false" x-show="open"--}}
{{--                     x-transition:enter="transition ease-out duration-300 transform"--}}
{{--                     x-transition:enter-start="opacity-0"--}}
{{--                     x-transition:enter-end="opacity-100"--}}
{{--                     x-transition:leave="transition ease-in duration-200 transform"--}}
{{--                     x-transition:leave-start="opacity-100"--}}
{{--                     x-transition:leave-end="opacity-0"--}}
{{--                     class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"--}}
{{--                ></div>--}}

{{--                <div x-cloak x-show="open"--}}
{{--                     x-transition:enter="transition ease-out duration-300 transform"--}}
{{--                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"--}}
{{--                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"--}}
{{--                     x-transition:leave="transition ease-in duration-200 transform"--}}
{{--                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"--}}
{{--                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"--}}
{{--                     class="inline-block w-full relative max-w-2xl my-40 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-3xl"--}}
{{--                >--}}

{{--                        <button @click="open = false" class="text-gray-600 focus:outline-none absolute top-0 right-0 p-3 hover:text-gray-700">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />--}}
{{--                            </svg>--}}
{{--                        </button>--}}

{{--                    <a href="https://gotoperu.com/peru-travel-packages/Amazing-Peru"><img src="{{('images/banners/campaigns/black.jpg')}}" alt=""></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <section class="">
        @livewire('page.form-footer')
    </section>

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endpush
@push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://cdn.wetravel.com/widgets/embed_checkout.js"></script>

    <script src="https://static.elfsight.com/platform/platform.js" async></script>

    <script>

        new Swiper('#home-trust-slider', {
            slidesPerView: 1.05,
            spaceBetween: 0,
            watchOverflow: true,
            navigation: {
                prevEl: '#home-trust-prev',
                nextEl: '#home-trust-next',
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
                1280: { slidesPerView: 4 },
            },
            a11y: {
                slideRole: 'listitem',
                prevSlideMessage: 'Previous trust messages',
                nextSlideMessage: 'Next trust messages',
            },
        });

        new VenoBox({
            selector: '.venobox'
        });

        // document.querySelectorAll('.departamento').forEach(dept => {
        //     dept.addEventListener('mouseover', function() {
        //         const deptName = document.getElementById('dept-name');
        //         console.log(deptName)
        //         deptName.textContent = this.getAttribute('title');
        //         console.log(deptName.textContent)
        //         deptName.style.left = `${event.pageX}px`;
        //         deptName.style.top = `${event.pageY}px`;
        //         deptName.classList.remove('hidden');
        //     });
        //
        //     dept.addEventListener('mouseout', function() {
        //         document.getElementById('dept-name').classList.add('hidden');
        //     });
        // });


    </script>

{{--    <script>--}}
{{--        document.addEventListener("DOMContentLoaded", function() {--}}
{{--            setTimeout(() => {--}}
{{--                document.querySelector('[x-data]').__x.$data.open = true;--}}
{{--            }, 2000); // 10000 milisegundos = 10 segundos--}}
{{--        });--}}
{{--    </script>--}}


@endpush

@endsection
