@extends('layouts.page-layout')

@push('meta')
    <meta name="robots" content="noindex,follow">
    <link rel="canonical" href="{{ route('offers.show', ['packageSlug' => $paquete->url, 'campaignSlug' => $campaign->slug]) }}">
@endpush

@section('content')
    @if ($campaign->slug === 'black-friday')
        @php
            // Preserve the approved campaign hero and price treatment while rendering
            // the shared itinerary, hotels and quote form once with the real campaign.
            $offerPackageBody = view('page.partials.package.body', [
                'paquete' => $paquete,
                'campaign' => $campaign,
                'category' => $category,
                'testinomials' => $testinomials,
                'hoteles_destinos' => $hoteles_destinos,
                'testinomials_r' => $testinomials_r,
                'teams' => $teams,
            ])->render();
            $offerContentStart = strpos($offerPackageBody, '<section id="package-journey"');
            $offerPriceStart = strpos($offerPackageBody, '<div class="package-commercial__summary');
            $offerPriceEnd = $offerPriceStart !== false
                ? strpos($offerPackageBody, '<div class="package-commercial__availability', $offerPriceStart)
                : false;
            $offerImages = $paquete->imagen_paquetes->filter(fn ($image) => filled($image->nombre));
            if ($offerImages->isEmpty() && filled($paquete->imagen)) {
                $offerImages = collect([(object) ['nombre' => $paquete->imagen]]);
            }
            $offerTitle = filled($campaign->headline) ? $campaign->headline : $paquete->titulo;
            $offerDestinations = $paquete->paquetes_destinos
                ->map(fn ($destination) => trim((string) data_get($destination, 'destinos.nombre')))
                ->filter()
                ->unique(fn ($name) => mb_strtolower($name))
                ->values();
            $offerDescription = trim(html_entity_decode(strip_tags($paquete->descripcion ?? ''), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            $offerSummary = \Illuminate\Support\Str::limit(preg_split('/(?<=[.!?])\s+/u', $offerDescription, 2)[0], 200);
            $offerOriginalPrice = is_numeric($campaign->original_price)
                && $campaign->original_price > $campaign->offer_price
                ? $campaign->original_price : null;
        @endphp

        @if ($offerContentStart !== false && $offerPriceStart !== false && $offerPriceEnd !== false && $offerImages->isNotEmpty())
            @section('black-friday-offer-price')
                <div class="package-commercial__summary bg-tertiary text-white p-6 md:p-8">
                    <h2 id="package-trip-title" class="package-commercial__eyebrow text-xs font-bold tracking-wider uppercase text-secondary">{{ \Illuminate\Support\Str::title($campaign->offer_label) }} price</h2>
                    <p class="package-commercial__duration text-sm font-semibold tracking-wider uppercase text-white">{{ $paquete->duracion }} {{ __('message.pack_par4') }}</p>
                    @if ($offerOriginalPrice !== null)
                        <p class="mb-1 text-xs font-normal text-white/70">Regular price <del class="whitespace-nowrap">US${{ number_format($offerOriginalPrice, 2, '.', ',') }}</del></p>
                    @endif
                    <p class="package-commercial__price text-white">
                        <span class="text-xs">US$</span>
                        <strong class="text-5xl font-semibold leading-tight">{{ number_format($campaign->offer_price, 2, '.', ',') }}</strong>
                        <span class="text-xs">per person</span>
                    </p>
                    @if ($offerDestinations->isNotEmpty())
                        <p class="package-commercial__destinations text-xs text-white/80">{{ $offerDestinations->implode(' • ') }}</p>
                    @endif
                    <div class="package-commercial__actions">
                        <a href="#form-dream-adventure" data-quote-source="rail" class="btn-secondary text-center">Request a Quote</a>
                    </div>
                </div>
            @endsection
            @php
                // Keep the approved quote-only rail and the shared form's campaign context.
                $offerPackageBody = substr_replace($offerPackageBody, $__env->yieldContent('black-friday-offer-price'),
                    $offerPriceStart, $offerPriceEnd - $offerPriceStart);
            @endphp

            <section class="package-hero isolate overflow-hidden bg-tertiary text-white items-center" aria-labelledby="package-hero-title">
                <div class="swiper mySwiper2 package-hero__gallery">
                    <div class="swiper-wrapper">
                        @foreach ($offerImages as $image)
                            <div class="swiper-slide">
                                <img src="{{ $image->nombre }}" alt="{{ $paquete->titulo }}"
                                     class="h-full w-full object-cover" @if ($loop->first) fetchpriority="high" @endif>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-tertiary via-tertiary/70 to-transparent" aria-hidden="true"></div>
                <div class="pointer-events-none absolute inset-0 hidden bg-gradient-to-r from-tertiary/95 via-tertiary/50 to-tertiary/20 md:block" aria-hidden="true"></div>

                <div class="container package-shell relative z-10 grid items-center gap-6 pt-32 pb-8 md:grid-cols-12 md:py-16 lg:py-24">
                    <div class="order-2 min-w-0 md:order-1 md:col-span-7">
                        <p class="mb-3 hidden text-xs font-semibold uppercase tracking-wider text-secondary md:block" data-package-enter="eyebrow">
                            Limited-time travel deal
                        </p>
                        <h1 id="package-hero-title" class="text-3xl font-semibold leading-tight tracking-tight md:text-5xl lg:text-6xl" data-package-enter="title">
                            {{ $offerTitle }}
                        </h1>
                        <div class="mt-4 flex flex-wrap items-center gap-x-6 gap-y-2 text-xs text-white/80">
                            <p class="inline-flex flex-shrink-0 items-center gap-2 font-semibold uppercase tracking-wider text-white">
                                <x-heroicon-o-calendar class="h-4 w-4 text-secondary" aria-hidden="true" />
                                {{ $paquete->duracion }} {{ __('message.pack_par4') }}
                            </p>
                            @if ($offerDestinations->isNotEmpty())
                                <p class="min-w-0">{{ $offerDestinations->implode(' · ') }}</p>
                            @endif
                        </div>
                        @if ($offerSummary !== '')
                            <p class="mt-5 hidden max-w-2xl text-sm leading-relaxed text-white/80 md:block" data-package-enter="description">{{ $offerSummary }}</p>
                        @endif

                        <div class="mt-5 border-t border-white/20 pt-5" data-package-enter="actions">
                            {{-- Keep the price beside the quote action on small screens. --}}
                            <div class="md:hidden">
                                @if ($offerOriginalPrice !== null)
                                    <p class="mb-1 text-xs font-normal text-white/70">Regular price <del class="whitespace-nowrap">US${{ number_format($offerOriginalPrice, 2, '.', ',') }}</del></p>
                                @endif
                                <p class="text-xs font-semibold uppercase tracking-wider text-secondary">{{ \Illuminate\Support\Str::title($campaign->offer_label) }} price</p>
                                <p class="mt-2 flex flex-wrap items-baseline gap-2">
                                    <span class="text-sm font-semibold text-white/80">US$</span>
                                    <strong class="text-4xl font-semibold leading-none tracking-tight">{{ number_format($campaign->offer_price, 2, '.', ',') }}</strong>
                                    <span class="text-xs text-white/70">per person</span>
                                </p>
                            </div>
                            <div class="mt-5 flex flex-wrap items-center gap-3">
                                <a href="#form-dream-adventure" data-quote-source="hero"
                                   class="btn-secondary inline-flex min-h-12 w-full items-center justify-center gap-3 text-center md:w-auto">
                                    {{ $campaign->cta_label }}
                                    <x-heroicon-o-arrow-right class="h-4 w-4" aria-hidden="true" />
                                </a>
                                <a href="#package-itinerary" class="inline-flex min-h-12 w-full items-center justify-center gap-3 border border-white/50 px-6 text-sm font-semibold text-white hover:text-secondary md:w-auto">
                                    View itinerary
                                    <x-heroicon-o-arrow-down class="h-4 w-4" aria-hidden="true" />
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="order-1 min-w-0 w-full md:order-2 md:col-span-5 md:justify-self-end">
                        {{-- Reuse the main campaign's artwork with the persisted offer price. --}}
                        <div class="relative isolate py-4"
                             x-data="{
                                 routeAnimation: null,
                                 routeAnimated: false,
                                 routeMotion: null,
                                 routeChanged: null,
                                 init() {
                                     this.routeMotion = window.matchMedia('(min-width: 768px) and (prefers-reduced-motion: no-preference)');
                                     this.routeChanged = () => {
                                         if (this.routeMotion.matches) {
                                             this.enterRoute();
                                         } else {
                                             this.routeAnimation?.cancel();
                                             this.routeAnimation = null;
                                         }
                                     };
                                     this.routeMotion.addEventListener('change', this.routeChanged);
                                     this.$nextTick(() => this.routeChanged());
                                 },
                                 enterRoute() {
                                     const route = this.$refs.journeyRoute;
                                     if (this.routeAnimated || !this.routeMotion.matches || typeof route.animate !== 'function') return;
                                     this.routeAnimated = true;
                                     const length = route.getTotalLength();
                                     route.setAttribute('stroke-dasharray', length);
                                     this.routeAnimation = route.animate([
                                         { strokeDashoffset: length },
                                         { strokeDashoffset: 0 }
                                     ], { duration: 1800, delay: 200, easing: 'ease-in-out', fill: 'backwards' });
                                     this.routeAnimation.onfinish = () => { this.routeAnimation = null; };
                                 },
                                 destroy() {
                                     this.routeAnimation?.cancel();
                                     this.routeMotion?.removeEventListener('change', this.routeChanged);
                                 }
                             }">
                            <svg class="pointer-events-none absolute inset-0 -z-10 hidden h-full w-full md:block" viewBox="0 0 480 360" fill="none" aria-hidden="true" focusable="false">
                                <path x-ref="journeyRoute" d="M428 32C476 76 466 163 404 190C354 212 327 178 358 157C386 138 420 168 397 199C372 232 308 230 260 246C190 274 120 294 44 304"
                                      stroke="currentColor" stroke-width="2" stroke-linecap="round" class="text-secondary opacity-40" />
                                <circle cx="428" cy="32" r="4" fill="currentColor" class="text-white/80" />
                                <circle cx="44" cy="304" r="5" fill="currentColor" class="text-primary" />
                            </svg>
                            <p class="mb-4 text-xs font-medium uppercase tracking-widest text-secondary" data-package-enter="eyebrow">
                                Peru &amp; South America
                            </p>
                            <p class="relative flex items-baseline gap-2 font-extrabold uppercase leading-none tracking-tighter md:block">
                                <span class="block text-2xl md:text-6xl lg:text-8xl xl:text-9xl" data-package-enter="title">Black</span>
                                <span class="block text-2xl text-secondary md:pl-8 md:text-6xl lg:text-7xl xl:text-8xl" data-package-enter="description">Friday</span>
                            </p>
                            <div class="ml-6 mt-6 hidden border-l-2 border-secondary pl-4 md:block" data-package-enter="trust">
                                @if ($offerOriginalPrice !== null)
                                    <p class="mb-1 text-xs font-normal text-white/70">Regular price <del class="whitespace-nowrap">US${{ number_format($offerOriginalPrice, 2, '.', ',') }}</del></p>
                                @endif
                                <p class="text-xs font-semibold uppercase tracking-wider text-white/80">{{ \Illuminate\Support\Str::title($campaign->offer_label) }} prices</p>
                                <p class="mt-1 flex items-baseline gap-2 leading-none">
                                    <span class="text-xs font-medium uppercase text-white/70">From</span>
                                    <span class="text-xs font-semibold text-secondary">US$</span>
                                    <span class="text-3xl font-semibold tracking-tight lg:text-4xl">{{ number_format($campaign->offer_price, 2, '.', ',') }}</span>
                                </p>
                                <p class="mt-2 text-xs text-white/70">per person</p>
                            </div>
                        </div>

                        {{-- Keep gallery controls in flow so they cannot overlap the campaign art. --}}
                        <div class="relative z-10 mt-4 flex flex-wrap items-center gap-6">
                            @foreach ($offerImages as $image)
                                <a class="venobox @if ($loop->first) btn-white hidden items-center gap-2 md:inline-flex @endif"
                                   data-gall="packageHeroGallery" href="{{ $image->nombre }}"
                                   data-title="{{ $paquete->titulo }}" @if (!$loop->first) hidden @endif>
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
                    </div>
                </div>
            </section>

            {{-- Keep the existing advisor overlap clear of the campaign lettering. --}}
            <div class="bg-secondary py-5 text-tertiary xl:pb-20">
                <div class="container package-shell grid xl:grid-cols-12">
                    <div class="flex flex-wrap items-center justify-between gap-4 xl:col-span-8">
                        <p class="text-3xl font-extrabold uppercase leading-none tracking-tight md:text-4xl">Black Friday</p>
                        <p class="w-full text-xs font-medium uppercase tracking-wider md:w-auto">Peru &amp; South America<span class="mt-1 block font-semibold">Travel deals</span></p>
                    </div>
                </div>
            </div>

            {!! substr($offerPackageBody, $offerContentStart) !!}
        @else
            {{-- Keep the original package render if its shared structure or photos change. --}}
            {!! $offerPackageBody !!}
        @endif
    @else
        @include('page.partials.package.body', ['campaign' => $campaign])
    @endif
    @include('page.partials.package.assets')
@endsection
