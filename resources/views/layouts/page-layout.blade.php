<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="{{ request()->routeIs('home') ? 'width=device-width, initial-scale=1.0' : 'width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('message.seo_title')}}</title>
    @stack('meta')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">

    @livewireStyles

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <meta name="google-site-verification" content="RKqlAT_PUqYYY0MkFZc-h48BgcRpUvekk7ZGAojEjHA" />
    <meta name="p:domain_verify" content="da6ce019431809801f9c598831381786"/>


    @stack('css')


    {{--    <link rel="stylesheet" href="https://unpkg.com/element-plus/lib/theme-chalk/index.css">--}}

    <script>
        // if (sessionStorage.theme === 'dark' || (!'theme' in sessionStorage && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        //     document.querySelector('html').classList.add('dark')
        // } else if (sessionStorage.theme === 'dark') {
        //     document.querySelector('html').classList.add('dark')
        // }
        // if (sessionStorage.theme === 'dark' || (!('theme' in sessionStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        //     let elem = document.getElementById('switchTheme');
        //     document.documentElement.classList.add('dark')
        // } else {
        //     let elem = document.getElementById('switchTheme');
        //     document.documentElement.classList.remove('dark')
        //
        // }

        // window.addEventListener('load', function (){
        //     document.getElementById('preload').classList.add('hidden');
        // })

        (function () {
            const html = document.documentElement;
            const btn  = document.getElementById('switchTheme');

            // 1) Al cargar, fuerza modo claro
            html.classList.remove('dark');
            sessionStorage.removeItem('theme');

            // 2) Si alguna parte del código intenta agregar 'dark', la quitamos al instante
            new MutationObserver(() => {
                if (html.classList.contains('dark')) {
                    html.classList.remove('dark');
                }
            }).observe(html, { attributes: true, attributeFilter: ['class'] });

            // 3) El botón ya no activa dark; solo asegura estilos del ícono
            if (btn) {
                btn.classList.remove('text-yellow-500');
                btn.classList.add('text-gray-500');

                btn.addEventListener('click', function (e) {
                    e.preventDefault(); // no hacemos toggle
                    html.classList.remove('dark');
                    sessionStorage.removeItem('theme');
                    // opcional: mostrar un toast "Dark mode disabled"
                });
            }
        })();

    </script>
    <!-- Hotjar Tracking Code for https://gotoperu.com -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:3067283,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

    <style>
        .preload {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background-color: #151515;
            z-index: 1000000000;
        }

        .pulse {
            position: relative;
            left: 50%;
            top: 50vh;
            margin-left: -40px;
            margin-top: -40px;
        }
        .pulse:before, .pulse:after {
            content: "";
            border: 5px solid #323232;
            width: 80px;
            height: 80px;
            border-radius: 500px;
            position: absolute;
        }
        .pulse:before {
            animation: pulse-outer 0.8s ease-in infinite;
        }
        .pulse:after {
            animation: pulse-inner 0.8s linear infinite;
        }

        @keyframes pulse-outer {
            0% {
                opacity: 1;
                filter: alpha(opacity=100);
            }
            50% {
                opacity: 0.5;
                filter: alpha(opacity=50);
            }
            100% {
                opacity: 0;
                filter: alpha(opacity=0);
            }
        }
        @keyframes pulse-inner {
            0% {
                transform: scale(0);
                opacity: 0;
                filter: alpha(opacity=0);
            }
            100% {
                transform: scale(1);
                opacity: 1;
                filter: alpha(opacity=100);
            }
        }

    </style>

{{--    <!-- Global site tag (gtag.js) -  Google Analytics -->--}}
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0E6CS6E9Z2"></script>--}}
{{--    <script>--}}
{{--        window.dataLayer = window.dataLayer || [];--}}
{{--        function gtag(){dataLayer.push(arguments);}--}}
{{--        gtag('js', new Date());--}}

{{--        gtag('config', 'G-0E6CS6E9Z2');--}}
{{--    </script>--}}


    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-56QS42KC');</script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-56QS42KC"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

</head>
<body class="bg-white relative overflow-x-clip {{ request()->routeIs('home', 'packages.detail', 'offers.show') ? '' : 'site-mobile-header-offset' }}">
{{--<div class="preload" id="preload">--}}
{{--    <div class="pulse"></div>--}}
{{--</div>--}}
@php

    $nav_links = [
        [
            'name' => 'Home',
            'state' => '1',
            'route' => route('home'),
            'active' => request()->routeIs('home'),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>',
                    'nav_sub_links' => []

        ],
        [
            'name' => __('message.nav_item1'),
            'state' => '2',
            'route' => route('packages.all'),
            'active' => request()->routeIs('packages.*'),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>',
                    'nav_sub_links' => []

        ],

        [
            'name' => __('message.nav_item3'),
            'state' => '2',
            'route' => route('destinations.all'),
            'active' => request()->routeIs('destinations.*'),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>',
                    'nav_sub_links' =>[]
        ],
        [
            'name' => __('message.nav_item4'),
            'state' => '3',
            'route' => route('hotels'),
            'active' => request()->routeIs('hotels'),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>',
                    'nav_sub_links' => []
        ],
        [
            'name' => __('message.nav_item5'),
            'state' => '3',
            'route' => route('about'),
            'active' => request()->routeIs('about'),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>',
           'nav_sub_links' =>
                [
                    $sub_data =
                    [
                        [
                            'name' =>__('message.nav_sub_item1'),
                            'state' => '1',
                            'route' => route('book'),
                            'active' => request()->routeIs('book'),
                            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>'
                        ],
                        [
                            'name' => __('message.nav_sub_item2'),
                            'state' => '3',
                            'route' => route('confidence'),
                            'active' => request()->routeIs('confidence'),
                            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>'
                        ],
                        [
                            'name' => __('message.nav_sub_item3'),
                            'state' => '3',
                            'route' => route('conditions'),
                            'active' => request()->routeIs('conditions'),
                            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>'
                        ],
                        [
                            'name' => __('message.nav_sub_item4'),
                            'state' => '3',
                            'route' => route('about'),
                            'active' => request()->routeIs('about'),
                            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>'
                        ],
                        [
                            'name' => __('message.nav_sub_item5'),
                            'state' => '3',
                            'route' => route('blog'),
                            'active' => request()->routeIs('blog'),
                            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>'
                        ],
                        [
                            'name' => __('message.nav_sub_item6'),
                            'state' => '3',
                            'route' => route('faq'),
                            'active' => request()->routeIs('faq'),
                            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>'
                        ]
                    ]
                ]

        ],
        [
            'name' => __('message.nav_item6'),
            'state' => '3',
            'route' => route('reviews'),
            'active' => request()->routeIs('reviews'),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>',
                    'nav_sub_links' => []
        ],


    ];

@endphp

{{--[--}}
{{--'name' => __('message.nav_item7'),--}}
{{--'state' => '3',--}}
{{--'route' => route('responsability'),--}}
{{--'active' => request()->routeIs('responsability'),--}}
{{--'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />--}}
{{--</svg>',--}}
{{--'nav_sub_links' => []--}}
{{--],--}}


{{--[--}}
{{--'name' => __('message.nav_item2'),--}}
{{--'state' => '2',--}}
{{--'route' => route('tours'),--}}
{{--'active' => request()->routeIs('tours'),--}}
{{--'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />--}}
{{--</svg>',--}}
{{--'nav_sub_links' => []--}}
{{--],--}}

@if(request()->routeIs('home'))
    <div class="hidden md:block" :class="{ hidden: introVisible }" x-data="{
        introVisible: true,
        observer: null,
        init() {
            this.$nextTick(() => {
                this.observer = new IntersectionObserver(entries => {
                    this.introVisible = entries[0].boundingClientRect.bottom > 0;
                });
                this.observeIntro();
            });
        },
        observeIntro() {
            if (!this.observer) return;
            const intro = document.getElementById(window.innerWidth < 768 ? 'home-hero' : 'popular-peru-trips');
            this.observer.disconnect();
            if (!intro) { this.introVisible = false; return; }
            this.introVisible = intro.getBoundingClientRect().bottom > 0;
            this.observer.observe(intro);
        },
        destroy() { this.observer?.disconnect(); }
    }" @resize.window.debounce.100ms="observeIntro()">
@endif
<div data-quote-floating class="fixed bottom-0 right-0 z-40 py-2 px-4 sm:inline-flex md:mb-0 md:hidden">
    <a href="#form-dream-adventure" data-quote-source="floating">
        <div class="flex items-center">
            <span class="bg-gray-800 text-white -mr-3 py-2 px-4 rounded-lg border-2 border-secondary">Start my quote</span>
            <img src="{{asset('images/team/sai4.png')}}" alt="" width="433" height="577"
                 @if(request()->routeIs('home')) loading="lazy" decoding="async" @endif
                 class="w-16 h-16 object-cover object-top  rounded-full border-2 border-secondary">
        </div>
    </a>
</div>

    <div data-quote-floating class="fixed bottom-0 mb-20 right-0 z-40 py-6 px-7 sm:inline-flex md:mb-0">
        <a href="https://api.whatsapp.com/send?phone=12024911478" target="_blank" data-analytics-cta="whatsapp" data-analytics-source="floating">
            <span class="flex relative h-10 w-10">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-gray-400 opacity-75"></span>
            </span>
        </a>
    </div>
    <div data-quote-floating class="fixed bottom-0 mb-20 right-0 z-40 py-5 px-4 sm:inline-flex md:mb-0">
        <a href="https://api.whatsapp.com/send?phone=12024911478" target="_blank" data-analytics-cta="whatsapp" data-analytics-source="floating">
            <img src="{{asset('images/whatsapp-i.png')}}" alt="" width="670" height="503"
                 @if(request()->routeIs('home')) loading="lazy" decoding="async" @endif
                 class="w-16">
        </a>
    </div>
@if(request()->routeIs('home'))
    </div>
@endif
{{--<div class="fixed bottom-0 left-0 ml-3 bottom-0 z-10 sm:hidden">--}}
{{--    <img src="{{asset('images/fiorella.jpg')}}" alt="" class="rounded-t-lg w-24 mx-auto">--}}
{{--    <a href="#form-dream-adventure" class="btn-secondary-2 text-center  font-bold"><span class="text-lg pt-3">Start my quote</span></a>--}}
{{--    <span class="my-5 block"></span>--}}
{{--</div>--}}

@if(request()->routeIs('home'))
    {{-- Header, media, editorial content and trust share one initial viewport. --}}
    <div class="home-intro">
@endif
    {{-- One mobile header and drawer, shared by every page using this layout. --}}
    <div class="site-mobile-header" data-mobile-site-header :class="{ 'is-open': menu, 'is-closing': drawerClosing }"
         x-data="{
             menu: false,
             drawerClosing: false,
             drawerTimer: null,
             init() {
                 this.$watch('menu', open => {
                     window.clearTimeout(this.drawerTimer);
                     this.drawerClosing = !open;
                     if (!open) this.drawerTimer = window.setTimeout(() => { this.drawerClosing = false; }, 200);
                 });
             },
             savedScrollX: 0,
             savedScrollY: 0,
             savedBodyStyles: {},
             savedRootOverflow: '',
             openMenu() {
                 if (this.menu || window.matchMedia('(min-width: 768px)').matches) return;
                 this.savedScrollX = window.scrollX;
                 this.savedScrollY = window.scrollY;
                 ['position', 'top', 'left', 'right', 'width', 'overflow'].forEach(property => {
                     this.savedBodyStyles[property] = document.body.style[property];
                 });
                 this.savedRootOverflow = document.documentElement.style.overflow;
                 Object.assign(document.body.style, {
                     position: 'fixed', top: -this.savedScrollY + 'px',
                     left: '0', right: '0', width: '100%', overflow: 'hidden'
                 });
                 document.documentElement.style.overflow = 'hidden';
                 this.menu = true;
             },
             closeMenu(restoreFocus = false) {
                 if (!this.menu) return;
                 this.menu = false;
                 Object.assign(document.body.style, this.savedBodyStyles);
                 document.documentElement.style.overflow = this.savedRootOverflow;
                 const scrollBehavior = document.documentElement.style.scrollBehavior;
                 document.documentElement.style.scrollBehavior = 'auto';
                 window.scrollTo(this.savedScrollX, this.savedScrollY);
                 document.documentElement.style.scrollBehavior = scrollBehavior;
                 if (restoreFocus) this.$refs.menuToggle.focus({ preventScroll: true });
             },
             trapMenuFocus(event) {
                 if (!this.menu) return;
                 const items = Array.from(this.$refs.mobileHeader.querySelectorAll('a[href], button:not([disabled]), summary'))
                     .filter(element => element.getClientRects().length > 0);
                 const first = items[0];
                 const last = items[items.length - 1];
                 if (event.shiftKey && document.activeElement === first) {
                     event.preventDefault();
                     last.focus();
                 } else if (!event.shiftKey && document.activeElement === last) {
                     event.preventDefault();
                     first.focus();
                 }
             },
             destroy() { this.closeMenu(); window.clearTimeout(this.drawerTimer); }
         }"
         @keydown.escape.window="if (menu) { $event.preventDefault(); closeMenu(true); }"
         @keydown.tab="trapMenuFocus($event)"
         @resize.window="if (menu && window.matchMedia('(min-width: 768px)').matches) closeMenu()">
        <div class="site-mobile-backdrop" aria-hidden="true" @click="closeMenu(true)"></div>
        <header x-ref="mobileHeader" class="site-mobile-panel"
                :role="menu ? 'dialog' : null" :aria-modal="menu ? 'true' : null"
                :aria-label="menu ? 'Main navigation' : null">
            <div class="site-mobile-row">
                <a href="{{ route('home') }}" @click="closeMenu()" aria-label="GoToPeru home" class="site-mobile-logo">
                    <img src="{{ asset('images/logos/logo-gotoperu-black.png') }}" alt="GoToPeru" width="270" height="51">
                </a>
                <button type="button" x-ref="menuToggle" @click="menu ? closeMenu(true) : openMenu()" :aria-expanded="menu.toString()"
                        aria-controls="site-mobile-menu" :aria-label="menu ? 'Close navigation' : 'Open navigation'"
                        class="site-mobile-toggle">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"
                              :d="menu || drawerClosing ? 'M6 6l12 12M6 18L18 6' : 'M4 6h16M4 12h16M4 18h16'" />
                    </svg>
                </button>
            </div>
            <nav id="site-mobile-menu" aria-label="Main navigation" class="site-mobile-nav"
                 inert :inert="menu ? null : ''" aria-hidden="true" :aria-hidden="(!menu).toString()"
                 @click="if ($event.target.closest('a[href]')) closeMenu()">
                <div class="site-mobile-links">
                    @foreach($nav_links as $nav_link)
                        @if($nav_link['nav_sub_links'])
                            <details class="border-b border-gray-100">
                                <summary class="cursor-pointer py-3 text-sm font-semibold text-tertiary">
                                    <span>{{ $nav_link['name'] }}</span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" /></svg>
                                </summary>
                                <div class="pb-2 pl-3">
                                    @foreach($sub_data as $sub_data_item)
                                        <a href="{{ $sub_data_item['route'] }}" class="flex min-h-12 items-center py-3 text-sm text-gray-600 hover:underline">{{ $sub_data_item['name'] }}</a>
                                    @endforeach
                                </div>
                            </details>
                        @else
                            <a href="{{ $nav_link['route'] }}" @click="closeMenu()"
                               class="flex min-h-12 items-center border-b border-gray-100 py-3 text-sm font-semibold text-tertiary hover:underline"
                               @if($nav_link['active']) aria-current="page" @endif>
                                <span>{{ $nav_link['name'] }}</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5" /></svg>
                            </a>
                        @endif
                    @endforeach
                </div>
            </nav>
            <div class="site-mobile-footer">
                <div class="site-mobile-contact" inert :inert="menu ? null : ''">
                    <p>Let's plan your Peru journey</p>
                    <a href="mailto:info@gotoperu.com" @click="closeMenu()">info@gotoperu.com</a>
                    <a href="tel:+18134558646" @click="closeMenu()">+1 (813) 455-8646 <span>· US</span></a>
                </div>
                @if(request()->routeIs('home', 'packages.*', 'offers.show', 'destinations.*', 'category.*', 'about', 'book', 'confidence', 'conditions', 'faq', 'hotels', 'responsability', 'reviews', 'tours', 'blog', 'blog.show'))
                    {{-- Keep the drawer source during closing so the delegated click listener reads it. --}}
                    <a href="#form-dream-adventure" data-quote-source="header_mobile"
                       :data-quote-source="menu || drawerClosing ? 'mobile_drawer' : 'header_mobile'"
                       @click="drawerClosing = menu; closeMenu()" class="site-mobile-quote home-action home-action-primary">
                        <span>Request a Quote</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5" /></svg>
                    </a>
                @endif
            </div>
        </header>
    </div>
@if(request()->routeIs('home'))
    <header class="relative z-30 hidden border-b border-gray-200 bg-white/95 md:block">
        <div class="flex min-h-20 w-full items-center justify-between gap-4 px-4 py-3 sm:px-6 lg:px-10 xl:px-12">
                <a href="{{ route('home') }}" aria-label="GoToPeru home" class="inline-flex min-h-12 items-center">
                    <img src="{{ asset('images/logos/logo-gotoperu-black.png') }}" alt="GoToPeru" width="270" height="51" class="h-auto w-44 lg:w-56">
                </a>
                <div class="hidden items-center gap-6 md:flex">
                    <a href="mailto:info@gotoperu.com" class="hidden text-xs text-gray-500 hover:underline xl:inline">info@gotoperu.com</a>
                    <a href="tel:+18134558646" class="text-tertiary xl:border-l xl:border-gray-200 xl:pl-6">
                        <span class="mb-1 block text-xs font-medium uppercase tracking-wider text-gray-500">Call our team · US</span>
                        <span class="block text-sm font-semibold">+1 (813) 455-8646</span>
                    </a>
                    <a href="#form-dream-adventure" data-quote-source="header" class="home-action home-action-primary">{{ __('message.button_inquire') }}</a>
                </div>
        </div>
    </header>
@else
    <header class="hidden md:block">
        <div class="border-b dark:border-gray-900 dark:border-opacity-40  shadow p-4 bg-gray-50 items-center flex flex-wrap">
            <div class="mx-auto hidden md:block">
                <a href="/"><img src="https://gotoperu-com.s3-us-west-1.amazonaws.com/logos/logo-gotoperu-black.png" alt="" class="w-full"></a>
            </div>
            <div class="flex-1 p-3 dark:text-gray-400 hidden sm:inline-block">
                <div class='console-container'>
                    <span id='text'></span>
                    <div class='console-underscore' id='console'>_</div>
                </div>
            </div>
            <div class="flex justify-end gap-4 items-center hidden sm:inline-flex">
{{--                <button id="switchTheme" class="h-10 w-10 flex justify-center items-center focus:outline-none text-gray-500">--}}
{{--                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>--}}
{{--                </button>--}}

{{--                @livewire('page.form-inquire')--}}
{{--                @livewire('page.form-subscribe')--}}
                <span>info@gotoperu.com</span>
                <a href="#form-dream-adventure" data-quote-source="header" class="btn-secondary text-center">{{__('message.button_inquire')}}</a>
                <div class="dark:text-gray-400">
                    <span class="text-xs block text-right">US</span>
                    +1 (813) 455-8646
                </div>
            </div>
        </div>
    </header>
@endif

    @if(request()->routeIs('home'))
        <div class="hidden md:block" data-home-nav-slot>
    @endif
    <nav class="banner-wrapper top-0 z-30 {{ request()->routeIs('home') ? 'home-nav relative hidden md:block' : 'sticky' }}">
        <div class="banner">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="{{ request()->routeIs('home') ? 'border-b border-white/30 bg-white/80 backdrop-blur-sm transition-colors duration-300' : 'bg-gray-50 opacity-90 shadow-lg dark:bg-gray-800' }} hidden md:inline-flex">
                <div class="container flex items-center justify-center mx-auto text-gray-600 capitalize " x-data="{menu : false}">
                    {{--                    <a href="#" class="text-gray-800 text-sm dark:text-gray-200 border-b border-transparent transition duration-500 hover:border-blue-500 mx-1.5 sm:mx-6">Peru Travel Packages</a>--}}
                    @foreach($nav_links as $nav_link)
                        @if($nav_link['state'] > 1)
                            <div class="relative">

                             @if($nav_link['nav_sub_links'])
                                    <span @click="menu = !menu" class="menu-list {{ request()->routeIs('home') ? 'home-nav-link' : 'dark:text-gray-400' }} flex items-center block cursor-pointer {{ $nav_link['active'] == 1 ? 'active' : '' }}">
                                        {{ $nav_link['name'] }}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </span>
                                <div class="bg-gray-50 absolute top-0 rounded-lg mt-16 w-72 z-50 shadow" x-show="menu" x-on:click.away="menu = false" x-transition>
                                    <p class="font-bold text-gray-500 text-xs px-5 py-3">INFORMATION</p>


                                    @foreach($nav_link['nav_sub_links'] as $nav_sub)

                                        @foreach($sub_data as $sub_data_item)

                                            <a href="{{ $sub_data_item['route'] }}" class="w-full text-sm flex items-center inline-flex transition-colors duration-200 block px-4 py-2 text-normal text-gray-500 rounded hover:bg-gray-700 hover:text-secondary menu-pop {{ $sub_data_item['active'] == 1 ? 'active' : '' }}">
                                                    <span class="mr-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                        </svg>
                                                    </span>
                                                <span class="">
                                                        {{ $sub_data_item['name'] }}
                                                    </span>
                                            </a>
                                        @endforeach

                                    @endforeach

                                </div>
                                @else
                                    <a href="{{ $nav_link['route'] }}" class="menu-list {{ request()->routeIs('home') ? 'home-nav-link' : 'dark:text-gray-400' }} block relative {{ $nav_link['active'] == 1 ? 'active' : '' }}">
                                        {{ $nav_link['name'] }}
                                    </a>
                                @endif

                            </div>

                        @endif

                    @endforeach
                    @if(request()->routeIs('home'))
                        <a href="#form-dream-adventure" data-quote-source="sticky_nav" class="home-sticky-cta" hidden>Request a Quote</a>
                    @endif
{{--                    <a href="https://gotolatam.com/" target="_blank" class="dark:text-gray-400 menu-list block relative">South America Packages</a>--}}


{{--                    @foreach($category as $categories)--}}
{{--                    <a href="{{ route('category.show', $categories) }}" class="dark:text-gray-400 menu-list block relative {{ $nav_link['active'] == 1 ? 'active' : '' }}">--}}
{{--                        {{ $categories->nombre }}--}}
{{--                    </a>--}}
{{--                    @endforeach--}}
                </div>
            </div>

        </div>
    </nav>

    @if(request()->routeIs('home'))
        </div>
        @yield('home-intro')
    </div>
    @endif

    @yield('content')
{{--    {{$slot}}--}}

    <section class="site-recognition" aria-label="Tourism logos" @if(request()->routeIs('home')) data-analytics-section="recognition" @endif>
        <div class="home-content">
            {{-- Existing tourism logos, without adding membership or endorsement claims. --}}
            <div class="site-recognition__logos">
                <div><img src="{{asset('images/logos/apavit.png')}}" alt="APAVIT" width="220" height="110" loading="lazy" decoding="async"></div>
                <div><img src="{{asset('images/logos/apotur.png')}}" alt="APOTUR Perú" width="220" height="110" loading="lazy" decoding="async"></div>
                <div><img src="{{asset('images/logos/asta.png')}}" alt="ASTA" width="220" height="110" loading="lazy" decoding="async"></div>
                <div><img src="{{asset('images/logos/peru.png')}}" alt="Marca Perú" width="220" height="110" loading="lazy" decoding="async"></div>
                <div><img src="{{asset('images/logos/prom-peru.png')}}" alt="PromPerú" width="220" height="110" loading="lazy" decoding="async"></div>
                <div>
                    <a href="{{asset('images/banners/codigo-esnna.webp')}}" class="site-recognition__poster" aria-haspopup="dialog" aria-label="Open the Protégeme responsible tourism poster">
                        <img src="{{asset('images/logos/esnna.png')}}" alt="Protégeme — Turismo Responsable" width="220" height="110" loading="lazy" decoding="async">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer class="site-footer" @if(request()->routeIs('home')) data-analytics-section="footer" @endif>
        <div class="home-content">
            <div class="site-footer__top">
                <div class="site-footer__brand">
                    <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
                        <img src="https://gotoperu-com.s3-us-west-1.amazonaws.com/logos/logo-gotoperu-white.png" alt="GOTOPERU" width="214" height="91" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="site-footer__contact">
                    <p class="site-footer__label">Let's plan your Peru journey</p>
                    <div class="site-footer__contact-details">
                        <div>
                            <p class="site-footer__contact-label">Sales</p>
                            <a href="mailto:info@gotoperu.com">info@gotoperu.com</a>
                        </div>
                        <div>
                            <p class="site-footer__contact-label">Operations 24/7</p>
                            <a href="tel:+51953358040">+51 953 358 040</a>
                            <p class="site-footer__contact-label mt-4"><strong class="font-semibold text-white/80">Travel Agent's WhatsApp</strong></p>
                            <a href="https://wa.me/51953358040" data-analytics-cta="whatsapp" data-analytics-source="footer" class="group">
                                +51 953 358 040
                                <x-heroicon-o-arrow-narrow-right class="home-card-arrow ml-1 inline-block h-4 w-4 text-secondary" aria-hidden="true" />
                            </a>
                        </div>
                        <a href="#form-dream-adventure" data-quote-source="footer" class="home-action site-footer__quote group">
                            Request a Quote
                            <x-heroicon-o-arrow-narrow-right class="home-card-arrow h-4 w-4 shrink-0 text-secondary" aria-hidden="true" />
                        </a>
                    </div>
                </div>
            </div>

            <nav class="site-footer__navigation" aria-label="Footer navigation">
                <div>
                    <p class="site-footer__label">{{__('message.nav_item1')}}</p>
                    <ul>
                        <li><a href="{{route('packages.all')}}">{{__('message.foorer_li1')}}</a></li>
                        <li><a href="{{route('tours')}}">{{__('message.foorer_li2')}}</a></li>
                        <li>
                            <a href="{{route('hotels')}}">
                                {{__('message.nav_item4')}}
                                <span class="site-footer__link-detail">2, 3, 4, 5 {{__('message.foorer_par2')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="site-footer__label">{{__('message.nav_item3')}}</p>
                    <ul>
                        <li><a href="{{route('destinations.show', 'cusco')}}">Cusco</a></li>
                        <li><a href="{{route('destinations.show', 'machu-picchu')}}">MachuPicchu</a></li>
                        <li><a href="{{route('destinations.show', 'puno')}}">Lake Titicaca</a></li>
                        <li>
                            <a href="{{route('destinations.show', 'arequipa')}}" class="block">Colca Canyon</a>
                            <a href="{{route('destinations.show', 'lineas-de-nazca')}}" class="block">Nazca Lines</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="site-footer__label">{{__('message.nav_item8')}}</p>
                    <ul>
                        <li><a href="{{route('book')}}">{{__('message.nav_sub_item1')}}</a></li>
                        <li><a href="{{route('confidence')}}">{{__('message.nav_sub_item2')}}</a></li>
                        <li><a href="{{route('conditions')}}">{{__('message.nav_sub_item3')}}</a></li>
                        <li><a href="{{route('about')}}">{{__('message.nav_sub_item4')}}</a></li>
                        <li><a href="{{route('faq')}}">{{__('message.nav_sub_item6')}}</a></li>
                    </ul>
                </div>
                <div>
                    <p class="site-footer__label">Documents</p>
                    <ul>
                        <li><a href="{{asset('terms-and-condition.pdf')}}" target="_blank" rel="noopener noreferrer">Terms and conditions</a></li>
                        <li><a href="{{asset('documents/gtg-política-del-SGIG.pdf')}}" target="_blank" rel="noopener noreferrer">SGIG Policy</a></li>
                        <li><a href="https://forms.gle/kpgG6PY9Zhd6qR8K9" target="_blank" rel="noopener noreferrer">Whistleblower Channel</a></li>
                    </ul>
                </div>
            </nav>

            <div class="site-footer__legal">
                <p>
                    GOTOPERU COMPANY EIRL  - RUC  20609225441 - Avenida El Sol 449 - Cusco - Cusco - Peru
                </p>
                <p>© Copyright 2025 GotoPeru. All rights reserved.</p>
            </div>
        </div>
    </footer>
@livewireScripts


<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('vendor/intl-tel-input/build/js/utils.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script>
    new VenoBox({
        selector: '.site-recognition__poster',
        customClass: 'site-recognition-modal',
        maxWidth: '48rem',
        fitView: true,
        navigation: false,
        navTouch: false,
        focusItem: true,
        onPostOpen() {
            const modal = document.querySelector('.vbox-overlay.site-recognition-modal') || document.querySelector('.vbox-overlay');
            modal.setAttribute('role', 'dialog');
            modal.setAttribute('aria-modal', 'true');
            modal.setAttribute('aria-label', 'Protégeme — Responsible tourism');
            const close = modal.querySelector('.vbox-close');
            close.setAttribute('role', 'button');
            close.setAttribute('tabindex', '0');
            close.setAttribute('aria-label', 'Close poster');
            close.addEventListener('keydown', event => {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    close.click();
                }
            });
            modal.addEventListener('keydown', event => {
                if (event.key === 'Tab') {
                    event.preventDefault();
                    close.focus();
                }
            });
            close.focus();
        },
        onContentLoaded() {
            const poster = document.querySelector('.site-recognition-modal .vbox-child img');
            if (poster) poster.alt = 'Código ESNNA — Protégeme: turismo responsable y prevención de la explotación sexual de niñas, niños y adolescentes.';
        }
    });
</script>
@php
    $marketingPageType = request()->routeIs('home') ? 'home'
        : (request()->routeIs('packages.detail') ? 'package' : (request()->routeIs('offers.show') ? 'offer' : 'other'));
    $marketingPageContext = [
        'page_type' => $marketingPageType,
        'package_id' => in_array($marketingPageType, ['package', 'offer'], true) ? (int) $paquete['id'] : null,
        'package_slug' => in_array($marketingPageType, ['package', 'offer'], true) ? $paquete['url'] : null,
        'offer_campaign_id' => $marketingPageType === 'offer' ? (int) $campaign->id : null,
        'offer_slug' => $marketingPageType === 'offer' ? $campaign->slug : null,
    ];
@endphp
<script>
    (() => {
        if (window.GTPAnalytics) return;
        window.dataLayer = window.dataLayer || [];
        const page = @json($marketingPageContext);
        const relevant = ['home', 'package', 'offer'].includes(page.page_type)
            || !!document.querySelector('[data-quote-form="general"]');
        const storageKey = 'gtp_marketing_attribution_v1';
        const queryKeys = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'gclid', 'fbclid'];
        const landingTypes = ['home', 'package', 'offer', 'other'];
        const typeForPath = path => path === '/' ? 'home'
            : (/^\/peru-travel-packages\/.+/.test(path) ? 'package' : (/^\/offers\/.+/.test(path) ? 'offer' : 'other'));
        const cleanPath = value => typeof value === 'string' && value.startsWith('/') && !value.startsWith('//')
            && value.length <= 1024 && !/[<>?#\u0000-\u001f\u007f]/.test(value) ? value : null;
        const cleanValue = (value, key) => {
            if (typeof value !== 'string') return null;
            if (key === 'gclid' || key === 'fbclid') {
                return value && Array.from(value).length <= 512 && !/[<>\u0000-\u0020\u007f]/.test(value) ? value : null;
            }
            value = value.replace(/<[^>]*>/g, '').replace(/[<>]/g, '').replace(/[\u0000-\u001f\u007f]/g, ' ').trim();
            return value ? Array.from(value).slice(0, 255).join('') : null;
        };
        let raw = null;
        let firstTouch = null;
        try {
            raw = sessionStorage.getItem(storageKey);
            const stored = raw ? JSON.parse(raw) : null;
            if (stored && stored.version === 1 && landingTypes.includes(stored.first_landing_type)
                && cleanPath(stored.first_landing_path) && typeof stored.captured_at === 'string'
                && stored.captured_at.length <= 40) {
                firstTouch = {
                    version: 1, captured_at: stored.captured_at,
                    first_landing_type: stored.first_landing_type, first_landing_path: stored.first_landing_path
                };
                queryKeys.forEach(key => firstTouch[key] = cleanValue(stored[key], key));
            }
        } catch (error) { /* Storage can be unavailable; retain a page-local snapshot below. */ }
        if (!firstTouch) {
            const path = cleanPath(window.location.pathname) || '/';
            const params = new URLSearchParams(window.location.search);
            firstTouch = {
                version: 1, captured_at: new Date().toISOString(),
                first_landing_type: relevant ? page.page_type : typeForPath(path), first_landing_path: path
            };
            queryKeys.forEach(key => firstTouch[key] = cleanValue(params.get(key), key));
            // Never overwrite an existing first touch while navigating in this tab.
            if (raw === null) {
                try { sessionStorage.setItem(storageKey, JSON.stringify(firstTouch)); } catch (error) {}
            }
        }
        const quoteSources = ['hero', 'header', 'header_mobile', 'mobile_drawer', 'sticky_nav', 'packages', 'why_gotoperu', 'advisor', 'transportation', 'footer', 'floating', 'rail', 'final', 'form'];
        const pendingQuoteKey = 'gtp_pending_quote_v1';
        const pendingQuoteLifetime = 5 * 60 * 1000;
        let ctaSource = 'form';
        try {
            const pendingRaw = sessionStorage.getItem(pendingQuoteKey);
            // Consume once, including stale or mismatched destinations.
            sessionStorage.removeItem(pendingQuoteKey);
            const pending = pendingRaw ? JSON.parse(pendingRaw) : null;
            if (pending && ['package', 'offer'].includes(page.page_type)
                && quoteSources.includes(pending.source) && pending.source !== 'form'
                && pending.path === window.location.pathname
                && window.location.hash === '#form-dream-adventure'
                && Number.isFinite(pending.created_at)
                && Date.now() >= pending.created_at && Date.now() - pending.created_at <= pendingQuoteLifetime) {
                ctaSource = pending.source;
            }
        } catch (error) { /* Keep the direct-landing fallback when storage is unavailable. */ }
        const eventFields = {
            gtp_content_view: ['page_type', 'package_id', 'package_slug', 'offer_slug', 'first_landing_type'],
            gtp_section_view: ['section_name', 'page_type', 'package_slug', 'offer_slug'],
            gtp_cta_click: ['cta_name', 'cta_source', 'page_type', 'package_slug', 'offer_slug'],
            gtp_lead_form_start: ['page_type', 'package_slug', 'offer_slug', 'cta_source'],
            gtp_lead_step_1_complete: ['page_type', 'package_slug', 'offer_slug', 'cta_source'],
            generate_lead: ['first_landing_type', 'conversion_page_type', 'package_id', 'package_slug', 'offer_slug', 'cta_source', 'number_travelers', 'hotel_category']
        };
        let formStarted = false;
        window.GTPAnalytics = {
            getFirstTouch: () => ({ ...firstTouch }),
            pageContext: () => ({ ...page }),
            getCtaSource: () => ctaSource,
            push: (event, values = {}) => {
                if (!relevant || !Object.prototype.hasOwnProperty.call(eventFields, event)) return;
                if (event === 'gtp_lead_step_1_complete' && !formStarted) {
                    window.GTPAnalytics.push('gtp_lead_form_start', values);
                }
                if (event === 'gtp_lead_form_start') {
                    if (formStarted) return;
                    formStarted = true;
                }
                const payload = { event };
                eventFields[event].forEach(key => {
                    if (values[key] !== undefined && values[key] !== null && values[key] !== '') payload[key] = values[key];
                });
                window.dataLayer.push(payload);
            }
        };
        if (!relevant) return;
        const analytics = window.GTPAnalytics;
        analytics.push('gtp_content_view', { ...page, first_landing_type: firstTouch.first_landing_type });
        document.addEventListener('click', event => {
            if (!(event.target instanceof Element)) return;
            const quote = event.target.closest('[data-quote-source]');
            if (quote) {
                if (!quoteSources.includes(quote.dataset.quoteSource)) return;
                ctaSource = quote.dataset.quoteSource;
                try {
                    sessionStorage.removeItem(pendingQuoteKey);
                    const sameTab = !event.ctrlKey && !event.metaKey && !event.shiftKey && !event.altKey
                        && (!quote.getAttribute('target') || quote.getAttribute('target') === '_self');
                    if (quote.matches('a[href]') && sameTab && !event.defaultPrevented) {
                        const destination = new URL(quote.href, window.location.href);
                        if (destination.origin === window.location.origin
                            && destination.hash === '#form-dream-adventure'
                            && (destination.pathname !== window.location.pathname || destination.search !== window.location.search)) {
                            sessionStorage.setItem(pendingQuoteKey, JSON.stringify({
                                source: ctaSource, path: destination.pathname, created_at: Date.now()
                            }));
                        }
                    }
                } catch (error) { /* Same-page attribution remains available without storage. */ }
                analytics.push('gtp_cta_click', { ...page, cta_name: 'request_quote', cta_source: ctaSource });
                return;
            }
            const whatsapp = event.target.closest('a[data-analytics-cta="whatsapp"]');
            if (whatsapp && ['floating', 'footer'].includes(whatsapp.dataset.analyticsSource)) {
                analytics.push('gtp_cta_click', { ...page, cta_name: 'whatsapp', cta_source: whatsapp.dataset.analyticsSource });
            }
        });
        const formStart = event => {
            const input = event.target;
            if (formStarted || !event.isTrusted || !(input instanceof Element)
                || !input.matches('input:not([type="hidden"]):not([type="submit"]), select, textarea')
                || input.disabled || !input.closest('form[data-analytics-form="quote"]')) return;
            analytics.push('gtp_lead_form_start', { ...page, cta_source: ctaSource });
        };
        ['focusin', 'input', 'change'].forEach(event => document.addEventListener(event, formStart, true));
        const observeSections = () => {
            if (!('IntersectionObserver' in window)) return;
            const allowed = page.page_type === 'home'
                ? ['hero', 'trust', 'packages', 'destinations', 'why_gotoperu', 'peru_in_motion', 'advisor_reviews', 'transportation', 'lead_form', 'recognition', 'footer']
                : ['package', 'offer'].includes(page.page_type)
                    ? ['overview', 'itinerary', 'prices', 'included', 'recommended_hotels', 'lead_form']
                    : ['lead_form'];
            const seen = new Set();
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    const section = entry.target.dataset.analyticsSection;
                    if (!entry.isIntersecting || seen.has(section)) return;
                    seen.add(section);
                    analytics.push('gtp_section_view', { ...page, section_name: section });
                    observer.unobserve(entry.target);
                });
            }, { threshold: 0, rootMargin: '0px 0px -15% 0px' });
            document.querySelectorAll('[data-analytics-section]').forEach(section => {
                if (allowed.includes(section.dataset.analyticsSection)) observer.observe(section);
            });
        };
        if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', observeSections, { once: true });
        else observeSections();
        const leadEvents = new Set();
        window.addEventListener('gtp:generate-lead', event => {
            const lead = event.detail;
            if (!lead || typeof lead.lead_event_id !== 'string' || leadEvents.has(lead.lead_event_id)) return;
            leadEvents.add(lead.lead_event_id);
            analytics.push('generate_lead', lead);
        });
    })();
</script>
@stack('scripts')
<!-- begin olark code
<script type="text/javascript">
    ;(function(o,l,a,r,k,y){if(o.olark)return;
        r="script";y=l.createElement(r);r=l.getElementsByTagName(r)[0];
        y.async=1;y.src="//"+a;r.parentNode.insertBefore(y,r);
        y=o.olark=function(){k.s.push(arguments);k.t.push(+new Date)};
        y.extend=function(i,j){y("extend",i,j)};
        y.identify=function(i){y("identify",k.i=i)};
        y.configure=function(i,j){y("configure",i,j);k.c[i]=j};
        k=y._={s:[],t:[+new Date],c:{},l:a};
    })(window,document,"static.olark.com/jsclient/loader.js");
    /* Add configuration calls below this comment */
    olark.identify('2217-527-10-8230');</script>
 end olark code -->
<script>
    // Shared Detail/Home section reveals, with Detail's existing reduced-motion guard.
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

    (() => {
        'use strict';

        let refOffset = 0;
        const bannerHeight = 77;
        const bannerWrapper = document.querySelector('.banner-wrapper');
        const homeNavSlot = document.querySelector('[data-home-nav-slot]');
        const homeIntro = homeNavSlot?.closest('.home-intro');
        const homeStickyCta = homeNavSlot?.querySelector('.home-sticky-cta');
        const mobileHeader = document.querySelector('[data-mobile-site-header]');
        let showStickyCta = false;
        let pendingCtaAttention = false;
        let mobileLastOffset = 0;
        let mobileScrollDirection = 0;
        let mobileScrollTravel = 0;
        if (!bannerWrapper) return;

        if (homeStickyCta) {
            bannerWrapper.addEventListener('transitionend', (event) => {
                if (event.target !== bannerWrapper || event.propertyName !== 'transform') return;
                if (!showStickyCta) {
                    // Release its space only after the whole sticky wrapper has left.
                    homeStickyCta.hidden = true;
                    return;
                }
                if (!pendingCtaAttention) return;
                pendingCtaAttention = false;
                if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
                homeStickyCta.classList.add('motion-safe:animate-cta-attention');
            });
            homeStickyCta.addEventListener('animationend', (event) => {
                if (event.target === homeStickyCta && event.animationName === 'cta-attention') {
                    homeStickyCta.classList.remove('motion-safe:animate-cta-attention');
                }
            });
        }

        const handler = () => {
            const newOffset = window.scrollY || window.pageYOffset;
            // Share the existing scroll listener; desktop's sticky logic remains below.
            if (mobileHeader) {
                const mobile = !window.matchMedia('(min-width: 768px)').matches;
                const menuVisible = mobileHeader.classList.contains('is-open') || mobileHeader.classList.contains('is-closing');
                if (!menuVisible) mobileHeader.classList.toggle('is-scrolled', mobile && newOffset > 64);
                if (!mobile || menuVisible || newOffset <= 64) {
                    mobileHeader.classList.remove('is-scroll-hidden');
                    mobileScrollDirection = 0;
                    mobileScrollTravel = 0;
                } else {
                    const delta = newOffset - mobileLastOffset;
                    const direction = Math.sign(delta);
                    if (direction) {
                        if (direction !== mobileScrollDirection) mobileScrollTravel = 0;
                        mobileScrollDirection = direction;
                        mobileScrollTravel += Math.abs(delta);
                        if (mobileScrollTravel >= 12) {
                            mobileHeader.classList.toggle('is-scroll-hidden', direction > 0 && newOffset > 112);
                            mobileScrollTravel = 0;
                        }
                    }
                }
                mobileLastOffset = Math.max(0, newOffset);
            }
            const scrollingUp = newOffset < refOffset;
            const wasHidden = bannerWrapper.classList.contains('animateOut');
            let stickyStart = bannerHeight;
            if (homeNavSlot) {
                stickyStart = homeNavSlot.getBoundingClientRect().top + newOffset;
                const stuck = window.matchMedia('(min-width: 768px)').matches && newOffset > stickyStart;
                // Preserve the nav's flow space when it leaves the short Hero container.
                if (stuck) homeNavSlot.style.height = `${bannerWrapper.offsetHeight}px`;
                else homeNavSlot.style.removeProperty('height');
                bannerWrapper.classList.toggle('is-stuck', stuck);
                homeIntro.classList.toggle('nav-stuck', stuck);
            }

            if (newOffset > stickyStart) {
                if (newOffset > refOffset) {
                    bannerWrapper.classList.remove('animateIn');
                    bannerWrapper.classList.add('animateOut');
                } else if (scrollingUp || !homeNavSlot) {
                    bannerWrapper.classList.remove('animateOut');
                    bannerWrapper.classList.add('animateIn');
                }
            } else {
                bannerWrapper.classList.remove('animateOut');
                bannerWrapper.classList.add('animateIn');
            }
            if (homeStickyCta) {
                const stuck = bannerWrapper.classList.contains('is-stuck');
                const visible = stuck && bannerWrapper.classList.contains('animateIn') && (scrollingUp || showStickyCta);
                if (visible !== showStickyCta) {
                    showStickyCta = visible;
                    if (visible) homeStickyCta.hidden = false;
                    homeStickyCta.classList.remove('motion-safe:animate-cta-attention');
                    pendingCtaAttention = visible && wasHidden;
                }
                if (!stuck) homeStickyCta.hidden = true;
            }
            refOffset = newOffset;
        };

        window.addEventListener('scroll', handler, { passive: true });
        if (homeNavSlot || mobileHeader) window.addEventListener('resize', handler, { passive: true });
        handler();
    })();

    // function([string1, string2],target id,[color1,color2])
    @unless(request()->routeIs('home'))
        consoleText(['Go with the Experts', 'Vamos a Perú'], 'text',['#585858','#7F8429','#f9a825']);
    @endunless

    function consoleText(words, id, colors) {
        if (colors === undefined) colors = ['#fff'];
        var visible = true;
        var con = document.getElementById('console');
        var letterCount = 1;
        var x = 1;
        var waiting = false;
        var target = document.getElementById(id)
        target.setAttribute('style', 'color:' + colors[0])
        window.setInterval(function() {

            if (letterCount === 0 && waiting === false) {
                waiting = true;
                target.innerHTML = words[0].substring(0, letterCount)
                window.setTimeout(function() {
                    var usedColor = colors.shift();
                    colors.push(usedColor);
                    var usedWord = words.shift();
                    words.push(usedWord);
                    x = 1;
                    target.setAttribute('style', 'color:' + colors[0])
                    letterCount += x;
                    waiting = false;
                }, 1000)
            } else if (letterCount === words[0].length + 1 && waiting === false) {
                waiting = true;
                window.setTimeout(function() {
                    x = -1;
                    letterCount += x;
                    waiting = false;
                }, 1000)
            } else if (waiting === false) {
                target.innerHTML = words[0].substring(0, letterCount)
                letterCount += x;
            }
        }, 100)
        window.setInterval(function() {
            if (visible === true) {
                con.className = 'console-underscore hidden'
                visible = false;

            } else {
                con.className = 'console-underscore'

                visible = true;
            }
        }, 400)
    }

    // document.getElementById('switchTheme').addEventListener('click', function() {
    //
    //     let htmlClasses = document.querySelector('html').classList;
    //     let elem = document.getElementById('switchTheme');
    //     if(sessionStorage.theme === 'dark') {
    //         elem.classList.remove('text-yellow-500');
    //         elem.classList.add('text-gray-500');
    //         htmlClasses.remove('dark');
    //         sessionStorage.removeItem('theme')
    //     } else {
    //         elem.classList.add('text-yellow-500');
    //         elem.classList.remove('text-gray-500');
    //         htmlClasses.add('dark');
    //         sessionStorage.theme = 'dark';
    //     }
    // });

    @unless(request()->routeIs('home'))
    (function () {
        const html = document.documentElement;
        const btn  = document.getElementById('switchTheme');

        // 1) Al cargar, fuerza modo claro
        html.classList.remove('dark');
        sessionStorage.removeItem('theme');

        // 2) Si alguna parte del código intenta agregar 'dark', la quitamos al instante
        new MutationObserver(() => {
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
            }
        }).observe(html, { attributes: true, attributeFilter: ['class'] });

        // 3) El botón ya no activa dark; solo asegura estilos del ícono
        if (btn) {
            btn.classList.remove('text-yellow-500');
            btn.classList.add('text-gray-500');

            btn.addEventListener('click', function (e) {
                e.preventDefault(); // no hacemos toggle
                html.classList.remove('dark');
                sessionStorage.removeItem('theme');
                // opcional: mostrar un toast "Dark mode disabled"
            });
        }
    })();
    @endunless

</script>


</body>
</html>
