@extends('layouts.page-layout')

@section('content')
    <main class="black-friday-page overflow-x-clip bg-white text-tertiary">
        <section class="relative isolate overflow-hidden bg-tertiary text-white" aria-labelledby="black-friday-heading"
                 x-data="{
                     landscapeFrame: null,
                     landscapeMotion: null,
                     landscapeTick: null,
                     motionPreference: null,
                     motionChanged: null,
                     photoAnimation: null,
                     photoAnimated: false,
                     routeAnimation: null,
                     routeAnimated: false,
                     init() {
                         this.landscapeMotion = window.matchMedia('(min-width: 1024px) and (prefers-reduced-motion: no-preference)');
                         this.motionPreference = window.matchMedia('(prefers-reduced-motion: no-preference)');
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
                             if (this.motionPreference.matches) {
                                 this.enterPhoto();
                                 this.enterRoute();
                             } else {
                                 this.photoAnimation?.cancel();
                                 this.photoAnimation = null;
                                 this.routeAnimation?.cancel();
                                 this.routeAnimation = null;
                             }
                         };
                         this.landscapeMotion.addEventListener('change', this.motionChanged);
                         this.motionPreference.addEventListener('change', this.motionChanged);
                         this.$nextTick(() => this.motionChanged());
                     },
                     enterPhoto() {
                         const photo = this.$refs.photo;
                         if (this.photoAnimated || !this.motionPreference?.matches || !photo.complete || !photo.naturalWidth || typeof photo.animate !== 'function') return;
                         this.photoAnimated = true;
                         // Detail's gentle photo zoom, using the native animation API already used by Home.
                         this.photoAnimation = photo.animate([
                             { transform: 'scale(1.045)' },
                             { transform: 'scale(1)' }
                         ], { duration: 4200, easing: 'ease-out' });
                         this.photoAnimation.onfinish = () => { this.photoAnimation = null; };
                     },
                     enterRoute() {
                         const route = this.$refs.journeyRoute;
                         if (this.routeAnimated || !this.motionPreference?.matches || typeof route.animate !== 'function') return;
                         this.routeAnimated = true;
                         const length = route.getTotalLength();
                         route.setAttribute('stroke-dasharray', length);
                         this.routeAnimation = route.animate([
                             { strokeDashoffset: length },
                             { strokeDashoffset: 0 }
                         ], { duration: 1800, delay: 200, easing: 'ease-in-out', fill: 'backwards' });
                         this.routeAnimation.onfinish = () => { this.routeAnimation = null; };
                     },
                     queueLandscape() {
                         if (!this.landscapeMotion.matches || this.landscapeFrame !== null) return;
                         this.landscapeFrame = requestAnimationFrame(() => {
                             this.landscapeFrame = null;
                             if (!this.landscapeMotion.matches) return;
                             const bounds = this.$el.getBoundingClientRect();
                             if (bounds.bottom <= 0 || bounds.top >= window.innerHeight) return;
                             const progress = Math.max(0, Math.min(1, (window.innerHeight - bounds.top) / (window.innerHeight + bounds.height)));
                             // Home's parallax pattern, bounded within the background's sixteen-pixel overscan.
                             const offset = (progress - 0.5) * 24;
                             this.$refs.landscape.style.transform = 'translate3d(0, ' + offset.toFixed(2) + 'px, 0)';
                         });
                     },
                     destroy() {
                         cancelAnimationFrame(this.landscapeFrame);
                         this.photoAnimation?.cancel();
                         this.routeAnimation?.cancel();
                         window.removeEventListener('scroll', this.landscapeTick);
                         window.removeEventListener('resize', this.landscapeTick);
                         this.landscapeMotion?.removeEventListener('change', this.motionChanged);
                         this.motionPreference?.removeEventListener('change', this.motionChanged);
                     }
                 }">
            <div x-ref="landscape" class="pointer-events-none absolute -inset-y-4 inset-x-0 -z-20">
                <img x-ref="photo" @load="enterPhoto()" src="{{ asset('images/team/home/machupicchu.webp') }}" alt="Machu Picchu and the surrounding Andean mountains"
                     width="2700" height="1620" fetchpriority="high" decoding="async"
                     class="h-full w-full object-cover object-center">
            </div>
            <div class="absolute inset-0 -z-10 bg-gradient-to-r from-tertiary/95 via-tertiary/50 to-tertiary/20" aria-hidden="true"></div>
            <div class="absolute inset-x-0 bottom-0 -z-10 h-1/3 bg-gradient-to-t from-tertiary/95 to-transparent" aria-hidden="true"></div>

            <div class="container relative grid h-[650px] items-center gap-8 py-8 md:grid-cols-12 md:gap-6 md:py-12">
                <div class="order-2 min-w-0 md:order-1 md:col-span-7">
                    <p class="mb-3 flex items-center gap-3 text-xs font-semibold uppercase tracking-wider text-secondary" data-package-enter="eyebrow">
                        <span class="h-px w-8 shrink-0 bg-secondary" aria-hidden="true"></span>
                        Limited-time Peru travel deals
                    </p>
                    <h1 id="black-friday-heading" class="text-3xl font-bold uppercase leading-none tracking-tight md:text-6xl lg:text-7xl" data-package-enter="title">
                        <span class="block">Unlock</span>
                        <span class="block text-secondary">the best</span>
                        <span class="block">of Peru.</span>
                    </h1>
                    <p class="mt-4 max-w-xs text-sm leading-relaxed text-white/90 md:mt-6 md:text-base" data-package-enter="description">
                        Discover selected journeys at special Black Friday prices.
                    </p>
                    <a href="{{ $featuredDeal ? '#black-friday-deals' : ($blackFridayDeals->isNotEmpty() ? '#black-friday-collection' : route('packages.all')) }}" class="home-action group mt-6 border-secondary bg-secondary text-tertiary hover:border-white hover:bg-white md:mt-8" data-package-enter="actions">
                        Explore deals
                        <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-5 w-5" aria-hidden="true" />
                    </a>
                </div>

                <div class="order-1 w-full max-w-full md:order-2 md:col-span-5 md:justify-self-end">
                    {{-- An abstract journey trace links the campaign lettering to the existing catalogue's starting price. --}}
                    <div class="relative isolate py-4" data-bf-art="main-sticker">
                        <svg class="pointer-events-none absolute inset-0 -z-10 h-full w-full" viewBox="0 0 480 360" fill="none" aria-hidden="true" focusable="false">
                            <path x-ref="journeyRoute" d="M428 32C476 76 466 163 404 190C354 212 327 178 358 157C386 138 420 168 397 199C372 232 308 230 260 246C190 274 120 294 44 304"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round" class="text-secondary opacity-40" />
                            <circle cx="428" cy="32" r="4" fill="currentColor" class="text-white/80" />
                            <circle cx="44" cy="304" r="5" fill="currentColor" class="text-primary" />
                        </svg>
                        <p class="mb-4 text-xs font-medium uppercase tracking-widest text-secondary" data-package-enter="eyebrow">
                            Peru &amp; South America
                        </p>
                        <p class="relative font-extrabold uppercase leading-none tracking-tighter">
                            <span class="block text-6xl lg:text-8xl xl:text-9xl" data-package-enter="title">Black</span>
                            <span class="block pl-8 text-6xl text-secondary lg:text-7xl xl:text-8xl" data-package-enter="description">Friday</span>
                        </p>
                        @if ($blackFridayMinPrice !== null)
                        <div class="ml-6 mt-6 border-l-2 border-secondary pl-4" data-package-enter="trust">
                            @if ($blackFridayMinOriginalPrice !== null)
                                <p class="mb-1 text-xs font-normal text-white/70">Regular price <del class="whitespace-nowrap">US${{ number_format($blackFridayMinOriginalPrice, 2) }}</del></p>
                            @endif
                            <p class="text-xs font-semibold uppercase tracking-wider text-white/80">Black Friday prices</p>
                            <p class="mt-1 flex items-baseline gap-2 leading-none">
                                <span class="text-xs font-medium uppercase text-white/70">From</span>
                                <span class="text-xs font-semibold text-secondary">US$</span>
                                <span class="text-3xl font-semibold tracking-tight lg:text-4xl">{{ number_format($blackFridayMinPrice, 2) }}</span>
                            </p>
                        </div>
                        @endif
                    </div>
                </div>

                <p class="absolute bottom-5 right-6 hidden items-center gap-3 text-xs text-white/75 lg:flex">
                    <span class="flex items-center gap-1" aria-hidden="true"><span class="h-px w-8 bg-secondary"></span><span class="h-px w-2 bg-primary"></span></span>
                    Machu Picchu, Peru
                </p>
            </div>
        </section>

        <div class="relative overflow-hidden bg-secondary py-5 text-tertiary" data-bf-art="campaign-tape" aria-hidden="true">
            <div class="container flex flex-wrap items-center justify-between gap-4" data-package-reveal>
                <p class="text-3xl font-extrabold uppercase leading-none tracking-tight md:text-4xl">
                    Black Friday
                </p>
                <p class="w-full text-xs font-medium uppercase tracking-wider md:w-auto">Peru &amp; South America<span class="mt-1 block font-semibold">Travel deals</span></p>
            </div>
        </div>

        <section id="black-friday-deals" class="scroll-mt-24 bg-tertiary py-12 text-white md:py-16" aria-labelledby="black-friday-super-heading">
            <div class="container">
                <div class="mb-8 flex flex-wrap items-end justify-between gap-6">
                    <div>
                        <p class="mb-3 text-xs font-semibold uppercase tracking-wider text-secondary">Black Friday highlights</p>
                        <h2 id="black-friday-super-heading" class="text-3xl font-extrabold uppercase leading-tight tracking-tight md:text-4xl">Super deals<span class="text-secondary">.</span></h2>
                        <p class="mt-3 text-sm text-white/70">Our featured Black Friday journeys.</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-6 text-xs font-semibold">
                        <a href="#black-friday-collection" class="inline-flex min-h-11 items-center gap-2 hover:underline focus-visible:outline-secondary">
                            The collection <x-heroicon-o-arrow-narrow-right class="h-4 w-4 text-secondary" aria-hidden="true" />
                        </a>
                        <a href="#black-friday-multi" class="inline-flex min-h-11 items-center gap-2 hover:underline focus-visible:outline-secondary">
                            Multi-country <x-heroicon-o-arrow-narrow-right class="h-4 w-4 text-secondary" aria-hidden="true" />
                        </a>
                    </div>
                </div>

                {{-- One main deal + two stacked deals from tablet upward; the same cards form the mobile rail. --}}
                <div class="flex snap-x snap-mandatory gap-4 overflow-x-auto overscroll-x-contain pb-5 md:grid md:grid-cols-12 md:gap-6 md:overflow-visible focus-visible:outline focus-visible:outline-2 focus-visible:outline-secondary"
                     tabindex="0" role="region" aria-label="Featured Black Friday deals">
                    @if ($featuredDeal)
                    <article class="w-[92%] min-w-0 max-w-sm shrink-0 snap-start md:col-span-7 md:w-full md:max-w-full">
                        <a href="{{ $featuredDeal['offer_url'] }}" data-slug="{{ $featuredDeal['slug'] }}" aria-label="View deal: {{ $featuredDeal['name'] }}"
                               class="group relative isolate flex h-full min-h-[29rem] flex-col justify-end overflow-hidden bg-black text-white focus-visible:outline focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-secondary">
                            <img src="{{ $featuredDeal['image'] }}" alt="" loading="lazy" decoding="async" class="home-card-photo absolute inset-0 -z-20">
                            <div class="absolute inset-0 -z-10 bg-gradient-to-t from-black via-black/65 to-transparent" aria-hidden="true"></div>
                            <span class="pointer-events-none absolute left-3 top-3 text-8xl font-extrabold leading-none tracking-tighter text-secondary opacity-25" aria-hidden="true">01</span>
                            <div class="relative p-5 pt-24 lg:p-6">
                                <p class="mb-3 inline-block bg-secondary px-3 py-1.5 text-xs font-semibold uppercase tracking-wide text-tertiary">Featured {{ \Illuminate\Support\Str::title($featuredDeal['label']) }}</p>
                                <h3 class="text-3xl font-semibold leading-snug tracking-tight md:text-4xl">{{ $featuredDeal['name'] }}</h3>
                                <p class="mt-2 text-xs font-semibold uppercase tracking-wide text-white/80">{{ $featuredDeal['days'] }} days</p>
                                <p class="mt-2 text-xs leading-relaxed text-white/80">{{ $featuredDeal['destinations'] }}</p>
                                <div class="mt-5 flex flex-wrap items-end justify-between gap-3 border-t border-white/25 pt-4">
                                    <div>
                                        @if ($featuredDeal['original_price'] !== null)
                                            <p class="mb-1 text-xs font-normal text-white/70">Regular price <del class="whitespace-nowrap">US${{ number_format($featuredDeal['original_price'], 2) }}</del></p>
                                        @endif
                                        <p class="text-xs font-medium uppercase tracking-wide text-white/70">Black Friday price</p>
                                        <p class="mt-1 whitespace-nowrap text-3xl font-semibold tracking-tight"><span class="mr-1 text-xs font-medium text-secondary">US$</span>{{ number_format($featuredDeal['price'], 2) }}</p>
                                    </div>
                                    <span class="inline-flex min-h-12 items-center justify-center gap-3 bg-secondary px-4 py-3 text-xs font-bold text-tertiary">
                                        View deal <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-5 w-5" aria-hidden="true" />
                                    </span>
                                </div>
                            </div>
                            <svg class="pointer-events-none absolute bottom-0 right-0 h-6 w-6 text-tertiary" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 0v24H0Z" /></svg>
                        </a>
                    </article>
                    @endif
                    @if ($secondaryDeals->isNotEmpty())
                    <div class="flex w-full shrink-0 gap-4 md:col-span-5 md:grid md:w-auto md:grid-cols-1 md:gap-6">
                        @foreach($secondaryDeals as $deal)
                            <article class="w-[92%] min-w-0 max-w-sm shrink-0 snap-start md:w-full md:max-w-full">
                                <a href="{{ $deal['offer_url'] }}" data-slug="{{ $deal['slug'] }}" aria-label="View deal: {{ $deal['name'] }}"
                                   class="group relative isolate flex h-full min-h-[29rem] flex-col justify-between gap-6 overflow-hidden bg-black text-white md:min-h-80 focus-visible:outline focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-secondary">
                                    <img src="{{ $deal['image'] }}" alt="" loading="lazy" decoding="async" class="home-card-photo absolute inset-0 -z-20">
                                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-black via-black/65 to-transparent" aria-hidden="true"></div>
                                    <div class="flex items-start justify-between gap-3 p-5">
                                        <span class="inline-block border border-secondary bg-tertiary/95 px-3 py-1.5 text-xs font-semibold uppercase tracking-wide text-secondary">{{ \Illuminate\Support\Str::title($deal['label']) }} deal</span>
                                        <span class="text-3xl font-extrabold leading-none text-secondary opacity-40" aria-hidden="true">0{{ $loop->iteration + 1 }}</span>
                                    </div>
                                    <div class="p-5">
                                        <h3 class="text-xl font-semibold leading-snug tracking-tight">{{ $deal['name'] }}</h3>
                                        <p class="mt-2 text-xs font-semibold uppercase tracking-wide text-white/80">{{ $deal['days'] }} days</p>
                                        <p class="mt-2 text-xs leading-relaxed text-white/80">{{ $deal['destinations'] }}</p>
                                        <div class="mt-4 flex items-end justify-between gap-3 border-t border-white/25 pt-3">
                                            <div>
                                                @if ($deal['original_price'] !== null)
                                                    <p class="mb-1 text-xs font-normal text-white/70">Regular price <del class="whitespace-nowrap">US${{ number_format($deal['original_price'], 2) }}</del></p>
                                                @endif
                                                <p class="text-xs font-medium uppercase tracking-wide text-white/70">Black Friday price</p>
                                                <p class="mt-1 whitespace-nowrap text-2xl font-semibold tracking-tight"><span class="mr-1 text-xs font-medium text-secondary">US$</span>{{ number_format($deal['price'], 2) }}</p>
                                            </div>
                                            <span class="inline-flex h-12 w-12 shrink-0 items-center justify-center bg-secondary text-tertiary">
                                                <span class="sr-only">View deal</span><x-heroicon-o-arrow-narrow-right class="home-card-arrow h-5 w-5" aria-hidden="true" />
                                            </span>
                                        </div>
                                    </div>
                                    <svg class="pointer-events-none absolute right-0 top-0 h-5 w-5 text-tertiary" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M0 0h24v24Z" /></svg>
                                </a>
                            </article>
                        @endforeach
                    </div>
                    @endif
                </div>
                <p class="mt-3 flex items-center justify-end gap-3 text-xs text-white/70 md:hidden">
                    Scroll to explore <x-heroicon-o-arrow-narrow-right class="h-5 w-5 text-secondary" aria-hidden="true" />
                </p>
            </div>
        </section>

        <section id="black-friday-collection" class="scroll-mt-24 py-10 md:py-12" aria-labelledby="black-friday-collection-heading">
            <div class="container">
                <div class="relative mb-8 border-b border-gray-200 pb-6">
                    <p class="mb-3 text-xs font-semibold uppercase tracking-wider text-primary">Black Friday collection</p>
                    <h2 id="black-friday-collection-heading" class="text-3xl font-bold leading-tight tracking-tight md:text-4xl">Find your next journey<span class="text-secondary">.</span></h2>
                    <p class="mt-3 text-sm text-gray-600">Peru and South America, ready to explore.</p>
                </div>

                <div class="flex snap-x snap-mandatory gap-3 overflow-x-auto overscroll-x-contain pb-5 md:grid md:grid-cols-2 md:gap-6 md:overflow-visible md:pb-0 lg:grid-cols-3 focus-visible:outline focus-visible:outline-2 focus-visible:outline-secondary"
                     tabindex="0" role="region" aria-label="Black Friday collection">
                    @foreach($blackFridayDeals as $deal)
                        <article class="w-[92%] min-w-0 shrink-0 snap-start md:w-auto">
                            <a href="{{ $deal['offer_url'] }}" data-slug="{{ $deal['slug'] }}" aria-label="View deal: {{ $deal['name'] }}"
                               class="group relative flex h-full flex-col overflow-hidden bg-black text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary">
                                <div class="relative isolate flex h-80 flex-col justify-between overflow-hidden xl:h-96">
                                    <img src="{{ $deal['image'] }}" alt="" loading="lazy" decoding="async" class="home-card-photo absolute inset-0 -z-20">
                                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-black via-black/65 to-transparent" aria-hidden="true"></div>
                                    <div class="flex items-start justify-between gap-3 p-4">
                                        <span class="border border-secondary bg-tertiary/95 px-3 py-1.5 text-xs font-semibold uppercase tracking-wide text-secondary">{{ \Illuminate\Support\Str::title($deal['label']) }} deal</span>
                                        <span class="shrink-0 bg-tertiary/95 px-3 py-1.5 text-xs font-semibold uppercase">{{ $deal['days'] }} days</span>
                                    </div>
                                    <div class="p-5 lg:p-6">
                                        <h3 class="text-xl font-semibold leading-snug tracking-tight">{{ $deal['name'] }}</h3>
                                        <p class="mt-2 text-xs leading-relaxed text-white/80">{{ $deal['destinations'] }}</p>
                                    </div>
                                </div>
                                <div class="mt-auto flex items-center justify-between gap-3 border-t border-white/25 p-5 lg:p-6">
                                    <div>
                                        @if ($deal['original_price'] !== null)
                                            <p class="mb-1 text-xs font-normal text-white/70">Regular price <del class="whitespace-nowrap">US${{ number_format($deal['original_price'], 2) }}</del></p>
                                        @endif
                                        <p class="text-xs font-medium uppercase tracking-wide text-white/70">Black Friday price</p>
                                        <p class="mt-1 whitespace-nowrap text-2xl font-semibold tracking-tight"><span class="mr-1 text-xs font-medium text-secondary">US$</span>{{ number_format($deal['price'], 2) }}</p>
                                    </div>
                                    <span class="inline-flex h-12 w-12 shrink-0 items-center justify-center border border-secondary text-secondary">
                                        <span class="sr-only">View deal</span>
                                        <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-5 w-5" aria-hidden="true" />
                                    </span>
                                </div>
                                <svg class="pointer-events-none absolute bottom-0 right-0 h-5 w-5 text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 0v24H0Z" /></svg>
                            </a>
                        </article>
                    @endforeach
                </div>
                <div class="pointer-events-none relative mt-8 overflow-hidden border-t border-gray-200 pt-4" aria-hidden="true">
                    <p class="whitespace-nowrap text-6xl font-extrabold uppercase leading-none tracking-tighter opacity-10 lg:text-8xl xl:text-9xl">Travel deals</p>
                </div>
            </div>
        </section>

        <section id="black-friday-multi" class="relative isolate overflow-hidden scroll-mt-24 bg-tertiary py-12 text-white md:py-16" aria-labelledby="black-friday-multi-heading">
            <p class="pointer-events-none absolute right-0 top-0 -z-10 select-none text-right text-8xl font-extrabold uppercase leading-none tracking-tighter text-white/70 opacity-10" aria-hidden="true">Go<br>beyond<br>Peru</p>
            {{-- Abstract terraces: nested borders, using compiled utilities only. --}}
            <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden opacity-25" data-bf-art="texture" aria-hidden="true">
                <div class="absolute bottom-0 left-0 h-80 w-80 border-l border-t border-white/25 p-6">
                    <div class="h-full w-full border-l border-t border-white/25 p-6">
                        <div class="h-full w-full border-l border-t border-white/25 p-6">
                            <div class="h-full w-full border-l border-t border-white/25 p-6">
                                <div class="h-full w-full border-l border-t border-white/25"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-4 right-4 h-56 w-64 border-l border-t border-white/25 p-6">
                    <div class="h-full w-full border-l border-t border-white/25 p-6">
                        <div class="h-full w-full border-l border-t border-white/25 p-6">
                            <div class="h-full w-full border-l border-t border-white/25"></div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="pointer-events-none absolute left-0 top-0 h-24 w-1 bg-secondary" aria-hidden="true"></span>
            <div class="container relative">
                <div class="mb-8 flex flex-wrap items-end justify-between gap-6 border-b border-white/25 pb-6 md:mb-10">
                    <div class="max-w-2xl">
                        <p class="mb-4 text-xs font-semibold uppercase tracking-wider text-secondary">Black Friday · Beyond borders</p>
                        <h2 id="black-friday-multi-heading" class="text-3xl font-extrabold uppercase leading-tight tracking-tight md:text-4xl">Multi-country journeys<span class="text-secondary">.</span></h2>
                        <p class="mt-4 text-base text-white/80">Peru is just the beginning.</p>
                    </div>
                    <a href="#black-friday-collection" data-slug="multicountry" class="home-action group border-white/50 text-white hover:border-white hover:bg-white hover:text-tertiary">
                        View all journeys <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-4 w-4 text-secondary" aria-hidden="true" />
                    </a>
                </div>

                <div class="flex snap-x snap-mandatory gap-4 overflow-x-auto overscroll-x-contain pb-5 md:gap-5 focus-visible:outline focus-visible:outline-2 focus-visible:outline-secondary"
                     tabindex="0" role="region" aria-label="Multi-country journeys, horizontally scrollable">
                    @foreach($multiCountryDeals as $deal)
                        <article class="w-[92%] min-w-0 shrink-0 snap-start sm:w-72">
                            <a href="{{ $deal['offer_url'] }}" data-slug="{{ $deal['slug'] }}" aria-label="View deal: {{ $deal['name'] }}"
                               class="group relative isolate flex h-full min-h-[29rem] flex-col justify-between overflow-hidden bg-black focus-visible:outline focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-secondary">
                                <img src="{{ $deal['image'] }}" alt="" loading="lazy" decoding="async" class="home-card-photo absolute inset-0 -z-20">
                                <div class="absolute inset-0 -z-10 bg-gradient-to-t from-black via-black/65 to-transparent" aria-hidden="true"></div>
                                <div class="flex items-start justify-between gap-3 p-4">
                                    <span class="border border-secondary bg-tertiary/95 px-3 py-1.5 text-xs font-semibold uppercase tracking-wide text-secondary">{{ \Illuminate\Support\Str::title($deal['label']) }} deal</span>
                                    <span class="text-3xl font-extrabold leading-none text-secondary opacity-40" aria-hidden="true">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                <div class="px-5 pb-5 pt-24">
                                    <p class="mb-3 text-xs font-semibold uppercase tracking-wide text-secondary">{{ $deal['days'] }} days</p>
                                    <h3 class="text-xl font-semibold leading-snug tracking-tight">{{ $deal['title'] }}</h3>
                                    <p class="mb-5 mt-3 text-xs leading-relaxed text-white/80">{{ $deal['destinations'] }}</p>
                                    <div class="flex items-end justify-between gap-3 border-t border-white/25 pt-4">
                                        <div>
                                            @if ($deal['original_price'] !== null)
                                                <p class="mb-1 text-xs font-normal text-white/70">Regular price <del class="whitespace-nowrap">US${{ number_format($deal['original_price'], 2) }}</del></p>
                                            @endif
                                            <p class="text-xs font-medium uppercase tracking-wide text-white/70">Black Friday price</p>
                                            <p class="mt-1 whitespace-nowrap text-2xl font-semibold tracking-tight"><span class="mr-1 text-xs font-medium text-secondary">US$</span>{{ number_format($deal['price'], 2) }}</p>
                                        </div>
                                        <span class="inline-flex h-12 w-12 shrink-0 items-center justify-center border border-secondary text-secondary">
                                            <span class="sr-only">View deal</span>
                                            <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-5 w-5" aria-hidden="true" />
                                        </span>
                                    </div>
                                </div>
                                <svg class="pointer-events-none absolute right-0 top-0 h-5 w-5 text-tertiary" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M0 0h24v24Z" /></svg>
                            </a>
                        </article>
                    @endforeach
                </div>
                <p class="mt-3 flex items-center justify-end gap-3 text-xs text-white/70">
                    Scroll to explore <x-heroicon-o-arrow-narrow-right class="h-5 w-5 text-secondary" aria-hidden="true" />
                </p>
            </div>
        </section>

        <section class="relative border-b border-gray-200 bg-gray-50 py-8" aria-label="Travel with GOTOPERU">
            <div class="pointer-events-none absolute inset-x-0 top-0 flex items-center gap-1" aria-hidden="true"><span class="h-1 w-24 bg-secondary"></span><span class="h-1 w-8 bg-secondary"></span><span class="h-1 w-2 bg-primary"></span></div>
            <div class="container grid grid-cols-2 gap-6 md:grid-cols-4 md:gap-8">
                @foreach(['Trusted local Peru travel experts', 'Great Reviews', 'Tailor-made journeys', 'Personalized service'] as $confidence)
                    <div class="flex items-center gap-3">
                        <span class="flex h-6 w-1 shrink-0 flex-col gap-1" aria-hidden="true"><span class="flex-1 bg-secondary"></span><span class="h-1 bg-primary"></span></span>
                        <p class="text-xs font-semibold leading-relaxed">{{ $confidence }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
