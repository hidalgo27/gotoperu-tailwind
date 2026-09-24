{{--/Users/hidalgoponce/Laravel/gotoperu-tailwind/resources/views/page/partials/package/assets.blade.php--}}
@once
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
        @if (!empty($campaign))
            <style>
                /* Offer-only hierarchy; the standard package hero keeps its existing styles. */
                #hotels { scroll-margin-top: 112px; }
                .campaign-hero .package-hero__identity { max-width: 880px; }
                .campaign-hero .package-hero__title { max-width: 20ch; margin-top: 0; font-size: clamp(2.25rem, 5vw, 4.25rem); line-height: 1.08; }
                .campaign-hero__eyebrow { line-height: 1.6; }
                .campaign-hero__subtitle { max-width: 52ch; }
                .campaign-hero__metadata .package-hero__destinations { max-width: 52ch; margin-top: 0; font-size: inherit; }
                .campaign-hero .package-hero__offer { margin-top: 24px; }
                .campaign-hero .package-hero__scroll { margin-top: 28px; }
                @media (prefers-reduced-motion: no-preference) {
                    .campaign-hero__eyebrow,
                    .campaign-hero__subtitle { animation: package-hero-enter .8s ease-out both; }
                    .campaign-hero__eyebrow { animation-delay: .12s; }
                    .campaign-hero__subtitle { animation-delay: .3s; }
                }
            </style>
        @endif
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
@endonce
