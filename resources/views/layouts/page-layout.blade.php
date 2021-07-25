<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peru Travel Packages</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    @livewireStyles

    @stack('css')

    {{--    <link rel="stylesheet" href="https://unpkg.com/element-plus/lib/theme-chalk/index.css">--}}

    <script>
        // if (localStorage.theme === 'dark' || (!'theme' in localStorage && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        //     document.querySelector('html').classList.add('dark')
        // } else if (localStorage.theme === 'dark') {
        //     document.querySelector('html').classList.add('dark')
        // }
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            let elem = document.getElementById('switchTheme');
            document.documentElement.classList.add('dark')
        } else {
            let elem = document.getElementById('switchTheme');
            document.documentElement.classList.remove('dark')

        }

        window.addEventListener('load', function (){
            document.getElementById('preload').classList.add('hidden');
        })


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

</head>
<body class="bg-white dark:bg-gray-800 dark:text-gray-400 relative">
<div class="preload" id="preload">
    <div class="pulse"></div>
</div>
@php
    $nav_links = [
        [
            'name' => 'Peru Travel Packages',
            'route' => route('packages'),
            'active' => request()->routeIs('packages.*'),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>'
        ],
        [
            'name' => 'Only Tours',
            'route' => "#",
            'active' => "",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>'
        ],
        [
            'name' => 'Destination',
            'route' => route('destinations'),
            'active' => request()->routeIs('destinations.*'),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>'
        ],
        [
            'name' => 'Holels',
            'route' => "#",
            'active' => "",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>'
        ],
        [
            'name' => 'About Us',
            'route' => "#",
            'active' => "",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-gray-700 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>'
        ],
        [
            'name' => 'Reviews',
            'route' => "#",
            'active' => "",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>'
        ],
        [
            'name' => 'Social Responsability',
            'route' => "#",
            'active' => "",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-gray-700 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>'
        ],

    ];
@endphp


    <div class="fixed bottom-0 right-0 z-40 py-6 px-7 hidden sm:inline-flex">
        <a href="https://api.whatsapp.com/send?phone=51958123295" target="_blank">
            <span class="flex relative h-10 w-10">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-gray-400 opacity-75"></span>
            </span>
        </a>
    </div>
    <div class="fixed bottom-0 right-0 z-40 py-5 px-4 hidden sm:inline-flex">
        <a href="https://api.whatsapp.com/send?phone=51958123295" target="_blank">
            <img src="{{asset('images/whatsapp-i.png')}}" alt="" class="w-16">
        </a>
    </div>
<div x-data="{menu: false}">
    <div class="fixed bg-12 bottom-0 w-full z-30 sm:hidden">
        <div class="bg-gray-50 dark:bg-gray-800 flex gap-4 w-full mx-auto grid grid-cols-5 gap-3 text-center">
            <div class="border-t-4 border-secondary py-4">
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </a>
            </div>
            <div class="py-4">
                <a href="{{route('packages')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </a>
            </div>
            <div class="py-4">
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                </a>
            </div>
            <div class="py-4">
                <a href="{{route('destinations')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </a>
            </div>
            <div class="py-4 cursor-pointer" @click="menu = !menu">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M4 8h16M4 16h16" />
                    </svg>

            </div>
        </div>
    </div>

    <div class="fixed bottom-0 right-0 mb-16 w-9/12 mr-1 rounded-lg bg-gray-50 z-50" x-show="menu" x-transition x-on:click.away="menu = false">
        @foreach($nav_links as $nav_link)
            <a href="{{ $nav_link['route'] }}" class="w-full text-sm flex inline-flex transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white {{ $nav_link['active'] == 1 ? 'active' : '' }}">
                <span class="mr-2">
                    {!! $nav_link['icon'] !!}
                </span>
                <span class="">
                    {{ $nav_link['name'] }}
                </span>
            </a>
        @endforeach
    </div>

</div>

    <header>
        <div class="border-b dark:border-gray-900 dark:border-opacity-40  shadow p-4 bg-gray-50 dark:bg-gray-800 items-center flex flex-wrap">
            <div class="mx-auto">
                <a href="/"><img src="https://gotoperu-com.s3-us-west-1.amazonaws.com/logos/logo-gotoperu-black.png" alt="" class="w-full"></a>
            </div>
            <div class="flex-1 p-3 dark:text-gray-400 hidden sm:inline-block">
                <div class='console-container'>
                    <span id='text'></span>
                    <div class='console-underscore' id='console'>_</div>
                </div>
            </div>
            <div class="flex justify-end gap-4 items-center hidden sm:inline-flex">
                <button id="switchTheme" class="h-10 w-10 flex justify-center items-center focus:outline-none text-gray-500">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>
                </button>

                @livewire('page.form-inquire')
                @livewire('page.form-subscribe')

                <div class="dark:text-gray-400">
                    <span class="text-xs block text-right">USA/Canada</span>
                    202 246 2282
                </div>
            </div>
        </div>
    </header>




    <nav class="banner-wrapper top-0 z-30 sticky">
        <div class="banner">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-gray-50 opacity-90 shadow-lg dark:bg-gray-800 hidden md:inline-flex">
                <div class="container flex items-center justify-center mx-auto text-gray-600 capitalize">
                    {{--                    <a href="#" class="text-gray-800 text-sm dark:text-gray-200 border-b border-transparent transition duration-500 hover:border-blue-500 mx-1.5 sm:mx-6">Peru Travel Packages</a>--}}
                    @foreach($nav_links as $nav_link)
                        <a href="{{ $nav_link['route'] }}" class="dark:text-gray-400 menu-list {{ $nav_link['active'] == 1 ? 'active' : '' }}">{{ $nav_link['name'] }}</a>
                    @endforeach
                </div>
            </div>

        </div>
    </nav>


{{--    @yield('content')--}}
    {{$slot}}

    <section class="grid grid-cols-4 md:grid-cols-10 gap-8  py-12 mt-12 bg-gray-500 bg-opacity-10"><!--.row -->
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/apavit.png" alt="logo apavit" class="w-full dark:filter dark:grayscale dark:invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/apotur.png" alt="logo apotur" class="w-full dark:filter dark:grayscale dark:invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/asta.png"  alt="logo asta" class="w-full dark:filter dark:grayscale dark:invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/expedia.png"  alt="logo expedia" class="w-full dark:filter dark:grayscale dark:invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/meetup.png" alt="logo meetup" class="w-full dark:filter dark:grayscale dark:invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/new.png" alt="logo the new york times" class="w-full dark:filter dark:grayscale dark:invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/peru.png"  alt="logo marca peru" class="w-full dark:filter dark:grayscale dark:invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/prom-peru.png" alt="logo prom peru" class="w-full dark:filter dark:grayscale dark:invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/tripadvisor.png" alt="logo tripadvisor" class="w-full dark:filter dark:grayscale dark:invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/yelp.png" alt="logo yelp" class="w-full dark:filter dark:grayscale dark:invert">
        </div>
    </section>

    <footer class="relative bg-gray-200 dark:bg-gray-800 text-gray-500 dark:text-gray-50 pb-16">
        {{--        <svg class="absolute top-0 w-full h-6 -mt-5 sm:-mt-10 sm:h-16 text-gray-200 dark:text-gray-800" preserveAspectRatio="none" viewBox="0 0 1440 54">--}}
        {{--            <path fill="currentColor" d="M0 22L120 16.7C240 11 480 1.00001 720 0.700012C960 1.00001 1200 11 1320 16.7L1440 22V54H1320C1200 54 960 54 720 54C480 54 240 54 120 54H0V22Z"></path>--}}
        {{--        </svg>--}}
        <div class="container pt-12">
            <div class="text-center mb-20">
                <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
                    <img src="https://gotoperu-com.s3-us-west-1.amazonaws.com/logos/logo-gotoperu-white.png" alt="" class="mx-auto">
                </a>
            </div>


            <div class="grid grid-cols-2 gap-4 dark:text-gray-300 md:grid-cols-6 mb-24">
                <div>
                    <p class="font-semibold tracking-wide text-secondary mb-6">
                        Category
                    </p>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">News</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">World</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Games</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">References</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="font-semibold tracking-wide text-secondary mb-6">
                        Category
                    </p>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">News</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">World</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Games</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">References</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="font-semibold tracking-wide text-secondary mb-6">Cherry</p>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Web</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">eCommerce</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Business</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Entertainment</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Portfolio</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="font-semibold tracking-wide text-secondary mb-6">Apples</p>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Media</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Brochure</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Nonprofit</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Educational</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Projects</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="font-semibold tracking-wide text-secondary mb-6">
                        Business
                    </p>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Infopreneur</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Personal</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Wiki</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Forum</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="font-semibold tracking-wide text-secondary mb-6">
                        Category
                    </p>
                    <div class="bg-gray-900 p-4 rounded-lg shadow-inner">
                        <p>
                            As an agent of change, you have the power to change the world.
                        </p>
                        <a href="" class="btn-primary lg:px-4 block text-center mt-4">Contact Us</a>
                    </div>
                </div>

                {{--                <div class="md:max-w-md lg:col-span-2">--}}
                {{--                    <div class="mt-4 lg:max-w-sm">--}}
                {{--                        <p class="text-sm text-deep-purple-50">--}}
                {{--                            As an agent of change, you have the power to change the world.--}}
                {{--                        </p>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>

            <div class="flex flex-col justify-between pt-5 pb-10 border-t border-deep-purple-accent-200 sm:flex-row">
                <p class="text-sm dark:text-gray-300">
                    © Copyright 2021 GotoPeru. All rights reserved.
                </p>
                <div class="flex items-center mt-4 space-x-4 sm:mt-0">
                    <a href="/" class="transition-colors duration-300 text-blue-100 hover:text-blue-400">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                            <path
                                d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z"
                            ></path>
                        </svg>
                    </a>
                    <a href="/" class="transition-colors duration-300 text-gray-300 hover:text-gray-600">
                        <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
                            <circle cx="15" cy="15" r="4"></circle>
                            <path
                                d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z"
                            ></path>
                        </svg>
                    </a>
                    <a href="/" class="transition-colors duration-300 text-blue-400 hover:text-blue-600">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                            <path
                                d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"
                            ></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
@livewireScripts

<script src="{{asset('js/app.js')}}"></script>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
@stack('scripts')

<script>
    (() => {
        'use strict';

        let refOffset = 0;
        const bannerHeight = 77;
        const bannerWrapper = document.querySelector('.banner-wrapper');
        const banner = document.querySelector('.banner');

        const handler = () => {
            const newOffset = window.scrollY || window.pageYOffset;

            if (newOffset > bannerHeight) {
                if (newOffset > refOffset) {
                    bannerWrapper.classList.remove('animateIn');
                    bannerWrapper.classList.add('animateOut');
                } else {
                    bannerWrapper.classList.remove('animateOut');
                    bannerWrapper.classList.add('animateIn');
                }
                // banner.style.background = 'rgba(162, 197, 35, 0.6)';
                refOffset = newOffset;
            } else {
                // banner.style.backgroundColor = 'rgba(162, 197, 35, 1)';
            }
        };

        window.addEventListener('scroll', handler, false);
    })();

</script>
<script type="text/javascript">
    // function([string1, string2],target id,[color1,color2])
    consoleText(['Go with the Experts', 'Vamos a Perú', 'Vamos a Italia'], 'text',['#585858','#7F8429','#f9a825']);

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
</script>
<script>
    document.getElementById('switchTheme').addEventListener('click', function() {

        let htmlClasses = document.querySelector('html').classList;
        let elem = document.getElementById('switchTheme');
        if(localStorage.theme === 'dark') {
            elem.classList.remove('text-yellow-500');
            elem.classList.add('text-gray-500');
            htmlClasses.remove('dark');
            localStorage.removeItem('theme')
        } else {
            elem.classList.add('text-yellow-500');
            elem.classList.remove('text-gray-500');
            htmlClasses.add('dark');
            localStorage.theme = 'dark';
        }
    });
</script>


</body>
</html>
