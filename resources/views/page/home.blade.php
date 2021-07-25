<x-page-layout>

    <div class="absolute inset-0 h-screen overflow- w-screen -z-1">
        <video autoplay loop muted class="object-cover h-full w-full">
            <source src="https://assets.mixkit.co/videos/preview/mixkit-set-of-plateaus-seen-from-the-heights-in-a-sunset-26070-large.mp4" type="video/mp4" />Your browser does not support the video tag.
            {{--            <source src="{{asseDestinationst('media/intro.mp4')}}" type="video/mp4" />Your browser does not support the video tag.--}}
        </video>
    </div>
    <div class="flex h-83-5vh relative overflow-hidden">
{{--        <div class="relative items-start grid grid-cols-3 justify-between ">--}}

{{--        </div>--}}

        <div class=" grid grid-cols-1 gap-12 place-items-center text-center justify-center text-white w-full">
            <div class="mx-auto">
                <h1 class="text-5xl text-center  mb-6 font-bold font-cinzel text-secondary">Expertise in Peru travel matters</h1>
                <h3 class="text-2xl text-gray-50">Explore our favorite Peru crafted itineraries to help inspire your next adventure</h3>
            </div>
        </div>

{{--        <div class="relative z-30 p-5 flex justify-center">--}}
{{--            <a href="#" class="text-gray-50">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--        </div>--}}
    </div>

{{--            <form-home-component></form-home-component>--}}
    <div class="hidden md:inline-block">
            @livewire('page.form-home')
    </div>


{{--            <div class="mb-10 pb-10 border-b border-gray-200"></div>--}}


    <section class="container py-16 text-gray-500 text-center mx-auto relative">
        <p>Peru travel packages with an award-winning team on a completely customized, private or group tour for an authentic Peru trip of a lifetime. With our 97% satisfaction rate, round-the-clock local support and 100% financial protection, explore MachuPicchu, Cusco, Lima, Lake Titicaca, the Amazon and many more unique Peruvian destinations safely and seamlessly. Our 9,000+ enchanted guests will vouch for us.</p>


    </section>

    <section class="grid gap-8 py-8 mb-16 opacity-60 grid-cols-12 hidden md:inline-flex"><!--.row -->
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/apavit.png" alt="logo apavit" class="w-full filter grayscale invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/apotur.png" alt="logo apotur" class="w-full filter grayscale invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/asta.png"  alt="logo asta" class="w-full filter grayscale invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/expedia.png"  alt="logo expedia" class="w-full filter grayscale invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/meetup.png" alt="logo meetup" class="w-full filter grayscale invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/new.png" alt="logo the new york times" class="w-full filter grayscale invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/peru.png"  alt="logo marca peru" class="w-full filter grayscale invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/prom-peru.png" alt="logo prom peru" class="w-full filter grayscale invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/tripadvisor.png" alt="logo tripadvisor" class="w-full filter grayscale invert">
        </div>
        <div>
            <img src="https://www.gotoperu.com.pe/images/logos/yelp.png" alt="logo yelp" class="w-full filter grayscale invert">
        </div>
    </section>



{{--    <div class="w-4/5 mx-auto my-20 bg-white">--}}
{{--        <div id="slider" class="swiper-container w-full">--}}
{{--            <div class="swiper-wrapper">--}}
{{--                <div class="swiper-slide bg-cover bg-center shadow-lg" style="background-image: url('https://picsum.photos/400/555');">--}}
{{--                    <div class="container mx-auto px-6 md:px-20 py-6">--}}
{{--                        <div class="w-full md:w-1/2">--}}
{{--                            <div class="md:border border-gray-100 md:p-10">--}}
{{--                                <h3 class="text-5xl leading-tight" style="font-family: Niconne, cursive;">Welcome To </h3>--}}
{{--                                <h2 class="font-bold leading-tight text-6xl">Web2Tailwind</h2>--}}
{{--                                <p class="text-xl mt-10 font-light">Use complete html components in your projects.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="my-10 md:mx-10 md:-mt-2"><a href="#appointment"--}}
{{--                                                                    class="bg-pink-500  ease-linear hover:bg-blue-600 text-white px-6 py-4 rounded-full">USE--}}
{{--                                    TEMPLATE</a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="hidden md:flex swiper-button-prev bg-white w-16 h-16 text-xs rounded-full text-pink-500"></div>--}}
{{--            <div class="hidden md:flex swiper-button-next bg-white w-16 h-16 text-xs rounded-full text-pink-500"></div>--}}
{{--            <div class="swiper-pagination"></div>--}}
{{--        </div>--}}
{{--    </div>--}}



    <section class="container">
        <h2 class="text-center font-bold text-gray-500 md:text-4xl mb-20 xl:text-5xl dark:text-secondary">Your Peru Vacation Worry-Free</h2>
        <div class="grid text-center mb-16 gap-4 grid-cols-1 sm:grid-cols-3">
            <div class="relative mb-12 sm:mb-0">
                <div class="text-center mb-4 absolute -top-10 right-1/2 transform translate-x-1/2">
                    <a href="#" class="block relative">
                        {{--                        <img alt="profil" src="/images/person/4.jpg" class="mx-auto object-cover h-40 w-40  border border-white dark:border-gray-800"/>--}}

                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto object-cover p-4 rounded-full bg-secondary text-green-50 h-20 w-20  border border-white dark:border-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>

                    </a>
                </div>
                <div class="bg-gray-50 bg-opacity-30 transition duration-500 dark:bg-gray-800 border px-8 py-4 pt-12 hover:border-secondary">
                    <div class="text-center">
                        <p class="font-bold text-gray-500 pb-2 dark:text-white">
                            Your wellbeign is our priority
                        </p>
                        <a href="#" class="text-gray-500 dark:text-gray-200 font-light hover:text-blue-500 font-light transition duration-500">
                            Find out more
                        </a>
                    </div>
                </div>
            </div>
            <div class="relative mb-12 sm:mb-0">
                <div class="text-center mb-4 absolute -top-10 right-1/2 transform translate-x-1/2">
                    <a href="#" class="block relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto object-cover p-4 rounded-full bg-primary text-green-50 h-20 w-20  border border-white dark:border-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                        </svg>
                    </a>
                </div>
                <div class="bg-gray-50 bg-opacity-30 transition duration-500 dark:bg-gray-800 border px-8 py-4 pt-12 hover:border-primary">
                    <div class="text-center">
                        <p class="font-bold text-gray-500 pb-2 dark:text-white">
                            Your perfectly planned trip
                        </p>
                        <a href="#" class="text-gray-500 dark:text-gray-200 font-light hover:text-blue-500 font-light transition duration-500">
                            Find out more
                        </a>
                    </div>
                </div>
            </div>
            <div class="relative mb-12 sm:mb-0">
                <div class="text-center mb-4 absolute -top-10 right-1/2 transform translate-x-1/2">
                    <a href="#" class="block relative">
                        {{--                        <img alt="profil" src="/images/person/4.jpg" class="mx-auto object-cover h-40 w-40  border border-white dark:border-gray-800"/>--}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto object-cover p-4 rounded-full bg-secondary text-green-50 h-20 w-20  border border-white dark:border-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </a>
                </div>
                <div class="bg-gray-50 bg-opacity-30 transition duration-500 dark:bg-gray-800 border px-8 py-4 pt-12 hover:border-secondary">
                    <div class="text-center">
                        <p class="font-bold text-gray-500 pb-2 dark:text-white">
                            Free Changes & Cancellation
                        </p>
                        <a href="#" class="text-gray-500 dark:text-gray-200 font-light hover:text-blue-500 hover:font-bold font-light transition duration-500">
                            Find out more
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="flex container items-center text-2xl text-gray-700 dark:text-secondary font-bold gap-2">
        <div class="border-4 h-1 w-12 border-primary"></div> GOTOPERU
    </div>
    <div class="grid grid-cols-1 md:grid-cols-5 container gap-4">
        <div class="col-span-2 flex gap-4 flex-wrap content-between overflow-hidden">
            <div class="w-full">
                <div class="grid grid-cols-2 w-full items-center text-center text-gray-700 dark:text-gray-300 gap-2">
                    <div class="border p-4 w-full">
                        <p class="block text-4xl font-bold">97%</p>
                        <p class="text-xs">GUEST SATISFACTION RATE</p>
                    </div>
                    <div class="border p-4 w-full">
                        <p class="block text-3xl font-bold">9000 +</p>
                        <p class="text-xs">GOTOPERU GUESTS</p>
                    </div>
                </div>
            </div>
            <div class="relative">
                {{--            <div class="bg-fixed bg-cover bg-center bg-no-repeat" style="background-image: url({{asset('images/hotels-t.jpg')}})">--}}
                {{--                <img src="{{asset('images/hotels-t.jpg')}}" alt="" class="h-full object-cover min-w-full transition duration-500 ease-in-out transform hover:-translate-x-0 hover:scale-105">--}}
                <div class="flex items-center justify-center">
                    <div class="border bg-white p-6 dark:bg-gray-800 text-gray-800 dark:text-gray-300">
                        <p class="mb-2 flex inline-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            100% Tailor Made, Private Tours
                        </p>
                        <p class="mb-2 flex inline-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Authentic & Unique Experiences
                        </p>
                        <p class="mb-2 flex inline-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            24/7 Local Support While You Travel
                        </p>
                        <p class="mb-2 flex inline-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Travel with an Award-Winning Team
                        </p>
                        <p class="mb-2 flex inline-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            100% Financial Protection
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex inline-flex items-center text-2xl text-gray-700 font-bold gap-3">
                <div class="border">
                    <img src="https://gotoperu.com.mx/images/icons/tripadvisor.png" alt="" class="p-4 filter grayscale invert">
                </div>
                <div class="border">
                    <img src="https://gotoperu.com.mx/images/icons/yelp.png" alt="" class="p-4 filter grayscale invert">
                </div>
                <div class="border">
                    <img src="https://gotoperu.com.mx/images/icons/trust.png" alt="" class="p-4 filter grayscale invert">
                </div>
            </div>


        </div>
        <div class="col-span-3 grid grid-cols-1 items-center relative overflow-hidden bg-center bg-no-repeat bg-cover" style="background-image: url({{asset('https://picsum.photos/700/450')}})">
            {{--            <img src="{{asset('images/hotels-t.jpg')}}" alt="" class="h-full object-cover min-w-full transition duration-500 ease-in-out transform hover:-translate-x-0 hover:scale-105">--}}

            {{--            <div class="absolute flex items-center inset-0 ">--}}
            <div class="md:mx-16">
            <div class="w-full swiper-container mySwiper">
                <div class="swiper-wrapper">
                @foreach($testinomials as $testinomial)
                    <div class="swiper-slide p-12">
                        <div class="my-10 mx-16 w-full mx-auto rounded-lg bg-white dark:bg-gray-800 shadow-lg px-5 pt-5 pb-10 text-gray-800 dark:text-gray-300">
                            <div class="w-full pt-1 text-center pb-5 -mt-16 mx-auto">
                                <a href="#" class="block relative">
                                    <img alt="profil" src="https://gotoperu.com.mx/images/video-testimonial/2.jpg" class="mx-auto object-cover rounded-full h-20 w-20 z-30"/>
                                </a>
                            </div>
                            <div class="w-full mb-6">
                                <div class="text-3xl text-indigo-500 text-left leading-tight h-3">
                                    “
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-100 text-center px-5">
                                    {{ Str::limit($testinomial->contenido, 150) }}
                                </p>
                                <div class="text-3xl text-indigo-500 text-right leading-tight h-3 -mt-3">
                                    ”
                                </div>
                            </div>
                            <div class="w-full text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto cursor-pointer text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                <p class="text-md text-indigo-500 font-bold text-center">
                                    {{ $testinomial->nombre }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-300 text-center">
                                    {{ $testinomial->ciudad }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="swiper-button-next btn-next"></div>
                <div class="swiper-button-prev btn-prev"></div>
            </div>
            </div>
        </div>
    </div>

    <section class="py-12 my-12 bg-line-cover bg-gray-50 dark:bg-gray-800 bg-fixed">
        <div class="flex container mb-3 items-center text-2xl text-gray-700 dark:text-primary font-bold gap-2">
            <div class="border-4 h-1 w-12 border-secondary"></div> Featured Perú Itineraries
        </div>

        <div class="container">
        <div class="swiper-container slider-featured">
            <div class="swiper-wrapper">
                @foreach($paquetes_features as $feature)
                    <div class="swiper-slide grid grid-cols-1 md:grid-cols-3">

                        <!--                    <div class="" v-for="imagen in slide.imagen_paquetes">-->
                        <!--                        <img :src="imagen.nombre" alt="" class="object-cover">-->
                        <!--                    </div>-->
                        <div class=" md:col-span-2 mb:6 md:mb-0 relative z-0">
                            @foreach($feature->imagen_paquetes as $imagen)
                            <img src="{{$imagen->nombre}}" alt="" class="object-cover">
                            @endforeach
                                <div class="absolute inset-0 gradient-cicle-gray"></div>
                        </div>
                        <div class="flex items-center relative z-50">
                            <div class="p-12 w-full md:-ml-24 bg-white rounded-lg shadow-xl ">
                            <!--                        <h4 class="text-2xl text-secondary font-semibold">{{ $feature->duracion }} days $999</h4>-->
                                <h3 class="text-2xl my-3 font-bold text-gray-500">{{ $feature->titulo }}</h3>
                                <div class="font-bold text-secondary text-lg mb-4">
                                    {{ $feature->duracion }} days from $ 2045 <span class="text-xs">usd</span>
                                </div>
                                <div class="mb-6">
                                    {!! Str::limit($feature->descripcion, 150) !!}

                                </div>
                                <a href="{{route('packages.detail', $feature->url)}}" class="btn btn-primary">See full itinerary</a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next btn-next"></div>
            <div class="swiper-button-prev btn-prev"></div>
        </div>
        </div>

    </section>

    <div class="flex container mb-3 items-center text-2xl text-gray-700 dark:text-secondary font-bold gap-2">
        <div class="border-4 h-1 w-12 border-primary"></div> Perú Recommended Itineraries
    </div>

    <section class="container grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

        @foreach($paquete_recommended as $paquete)
            <div class="group">
                <div class="overflow-hidden relative">
                    <div class="bg-blue-500 relative">
                        <img src="{{$paquete->imagen}}" alt="sds" class="object-cover transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105"/>
                        <div class="absolute inset-0 gradient-cicle-gray"></div>
                    </div>
                    <div class="absolute inset-x-0 bottom-0 w-full p-6">
                        <div class="bg-primary bg-opacity-95 p-4 text-gray-50 group-hover:bg-opacity-100 transition duration-500 rounded-lg shadow-xl">
                            <h2 class="text-xl font-bold">{{ $paquete['titulo'] }}</h2>
                            <p class="text-xs my-2">

                                @foreach($paquete['paquetes_destinos'] as $paquete_destino)
                                    {{$paquete_destino['destinos']['nombre']}}
                                    @if ($loop->iteration < count($paquete['paquetes_destinos'])) , @else . @endif
                                @endforeach
                            </p>

                        </div>
                    </div>
                </div>
                <div class="border p-6 block group-hover:border-primary text-center transition duration-500">
                    <div class="font-bold text-gray-500 dark:text-gray-300 text-lg mb-4">
                        {{ $paquete['duracion'] }} days /
                        @foreach($paquete['precio_paquetes'] as $precio)
                            @if($precio['estrellas'] == 2)
                                @if($precio['precio_d'] > 0)
                                    <span class="text-xs align-top">from</span> $ {{$precio['precio_d']}} <span class="text-xs">usd</span>
                                @else
                                    <span class="text-red-500">Consulte</span>
                                @endif
                            @endif
                        @endforeach

                    </div>
                    <a href="{{route('packages.detail', $paquete['url'])}}" class="btn-secondary">Ver detalles</a>
                </div>
            </div>
        @endforeach


    </section>


    <div class="flex container mb-3 items-center text-2xl text-gray-700 dark:text-primary font-bold gap-2 mt-24">
        <div class="border-4 h-1 w-12 border-secondary dark:border-secondary"></div> Destinations
{{--        <div class="text-center mb-10">--}}
{{--            <span class="inline-block w-1 h-1 rounded-full bg-blue-500 ml-1"></span>--}}
{{--            <span class="inline-block w-3 h-1 rounded-full bg-blue-500 ml-1"></span>--}}
{{--            <span class="inline-block w-40 h-1 rounded-full bg-blue-500"></span>--}}
{{--            <span class="inline-block w-3 h-1 rounded-full bg-blue-500 ml-1"></span>--}}
{{--            <span class="inline-block w-1 h-1 rounded-full bg-blue-500 ml-1"></span>--}}
{{--        </div>--}}
    </div>

    <section class="grid grid-cols-1 md:grid-cols-5 mb-4 container gap-4">
        <div class="md:col-span-3 overflow-hidden group relative">
            <img src="{{asset('images/cua2.jpg')}}" alt="" class="hidden md:inline-flex object-cover h-full min-w-full transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105">
            <div class="md:absolute md:inset-y-0 md:left-0 w-full md:w-64 p-6 bg-primary bg-opacity-95 text-gray-50">
                <h3 class="font-bold text-2xl">Cusco & Machu Picchu</h3>
                <p class="mt-3 md:mb-6 block text-sm">Travel Packages to Machu Picchu with breathtaking scenery, visit the Incas highest archeological achievement, and you will tune in to the mystery that is at the heart of the Andean Mountains. If you are planning a trip to Machu Picchu, take advantage of our first-class tour service from the city of Cusco to Ollantaytambo and Aguas Calientes.</p>
                <a href="/destinations/machu-picchu" class="btn-white hidden md:inline-flex">All destinations</a>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 hidden md:inline-flex absolute bottom-0 right-0 m-6 cursor-pointer text-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <div class="md:col-span-2 flex flex-col gap-4 content-between overflow-hidden">

            <div class="overflow-hidden relative group">
                <img src="https://picsum.photos/500/360" alt="" class=" object-cover min-w-full  transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105">
                <div class="absolute w-full bottom-0 inset-x-0 p-3">
                    <div class="py-2 px-4 text-gray-100 bg-primary bg-opacity-95 shadow-lg rounded-lg">
                        <div class="font-normal text-sm">
                            12 days / <span class="text-xs align-top">from</span> $ 2045 <span class="text-xs">usd</span>
                        </div>
                        <h2 class="text-lg font-semibold">Best of Peru</h2>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden relative group">
                <img src="{{asset('images/asc.jpg')}}" alt="" class="object-cover min-w-full transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105">
                <div class="absolute w-full bottom-0 inset-x-0 p-3">
                    <div class="py-2 px-4 text-gray-100 bg-primary bg-opacity-95 shadow-lg rounded-lg">
                        <div class="font-normal text-sm">
                            12 days / <span class="text-xs align-top">from</span> $ 2045 <span class="text-xs">usd</span>
                        </div>
                        <h2 class="text-lg font-semibold">Best of Peru</h2>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="grid grid-cols-1 md:grid-cols-5 mb-4 container gap-4">

        <div class="md:col-span-2 order-2 md:order-1 flex flex-col gap-4 content-between overflow-hidden">

            <div class="overflow-hidden relative group">
                <img src="{{asset('images/asc.jpg')}}" alt="" class=" object-cover min-w-full  transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105">
                <div class="absolute w-full bottom-0 inset-x-0 p-3">
                    <div class="py-2 px-4 text-gray-100 bg-secondary bg-opacity-95 shadow-lg rounded-lg">
                        <div class="font-normal text-sm">
                            12 days / <span class="text-xs align-top">from</span> $ 2045 <span class="text-xs">usd</span>
                        </div>
                        <h2 class="text-lg font-semibold">Best of Peru</h2>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden relative group">
                <img src="{{asset('images/asc.jpg')}}" alt="" class="object-cover min-w-full transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105">
                <div class="absolute w-full inset-x-0 bottom-0 p-3">
                    <div class="py-2 px-4 text-gray-100 bg-secondary bg-opacity-95 shadow-lg rounded-lg">
                        <div class="font-normal text-sm">
                            12 days / <span class="text-xs align-top">from</span> $ 2045 <span class="text-xs">usd</span>
                        </div>
                        <h2 class="text-lg font-semibold">Best of Peru</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:col-span-3 order-1 md:order-2 overflow-hidden group relative">
            <img src="{{asset('images/pa.jpg')}}" alt="" class="hidden md:inline-flex object-cover h-full min-w-full transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105">
            <div class="md:absolute md:inset-y-0 md:right-0 w-full md:w-64 p-6 bg-secondary bg-opacity-95 text-gray-50">
                <h3 class="font-bold text-right text-2xl">Paracas & Nazca Lines</h3>
                <p class="mt-3 md:mb-6 block text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque error laudantium nostrum? Accusantium eum.</p>
                <a href="#" class="btn-white hidden md:inline-flex">All destinations</a>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 hidden md:inline-flex absolute bottom-0 left-0 m-6 cursor-pointer text-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

        </div>

    </section>

    <section class="grid col-span-1 md:grid-cols-5 mb-4 container gap-4">
        <div class="md:col-span-3 overflow-hidden group relative">
            <img src="{{asset('images/titicaca.jpg')}}" alt="" class="hidden md:inline-flex object-cover h-full min-w-full transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105">
            <div class="md:absolute md:inset-y-0 md:left-0 w-full md:w-64 p-6 bg-gray-700 bg-opacity-95 text-gray-50">
                <h3 class="font-bold text-2xl">Puno & Titicaca Lake</h3>
                <p class="mt-3 mb-6 block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque error laudantium nostrum? Accusantium eum.</p>
                <a href="#" class="btn-white hidden md:inline-flex">All destinations</a>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 hidden md:inline-flex absolute bottom-0 right-0 m-6 cursor-pointer text-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <div class="md:col-span-2 flex flex-col gap-4 content-between overflow-hidden">

            <div class="overflow-hidden relative group">
                <img src="{{asset('images/asc.jpg')}}" alt="" class=" object-cover min-w-full  transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105">
                <div class="absolute w-full bottom-0 inset-x-0 p-3">
                    <div class="py-2 px-4 text-gray-100 bg-gray-700 bg-opacity-95 shadow-lg rounded-lg">
                        <div class="font-normal text-sm">
                            12 days / <span class="text-xs align-top">from</span> $ 2045 <span class="text-xs">usd</span>
                        </div>
                        <h2 class="text-lg font-semibold">Best of 2Peru</h2>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden relative group">
                <img src="{{asset('images/asc.jpg')}}" alt="" class="object-cover min-w-full transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105">
                <div class="absolute w-full bottom-0 inset-x-0 p-3">
                    <div class="py-2 px-4 text-gray-100 bg-gray-700 bg-opacity-95 shadow-lg rounded-lg">
                        <div class="font-normal text-sm">
                            12 days / <span class="text-xs align-top">from</span> $ 2045 <span class="text-xs">usd</span>
                        </div>
                        <h2 class="text-lg font-semibold">Best of Peru</h2>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="container">
        <div class="flex mb-3 items-center text-2xl text-gray-700 dark:text-secondary font-bold gap-2 mt-24">
            <div class="border-4 h-1 w-12 border-primary"></div> Travel Style
        </div>

        <div class="grid grid-cols-6 gap-4 mt-12">
            <div class="col-start-2 col-span-4">
                <div class="grid grid-cols-3 md:grid-cols-8 content-center text-center">
                    <div class="">
                        <img src="{{asset('images/include/assistances.png')}}" alt="" class="object-contain px-4 text-center">
                        <p class="text-xs">Assistances</p>
                    </div>
                    <div class="">
                        <img src="{{asset('images/include/breakfast.png')}}" alt="" class="object-contain px-4 text-center">
                        <p class="text-xs">Breakfast</p>
                    </div>
                    <div class="">
                        <img src="{{asset('images/include/entrances.png')}}" alt="" class="object-contain px-4 text-center">
                        <p class="text-xs">Entrances</p>
                    </div>
                    <div class="">
                        <img src="{{asset('images/include/flight.png')}}" alt="" class="object-contain px-4 text-center">
                        <p class="text-xs">Flight</p>
                    </div>
                    <div class="">
                        <img src="{{asset('images/include/hotels.png')}}" alt="" class="object-contain px-4 text-center">
                        <p class="text-xs">Hotels</p>
                    </div>
                    <div class="">
                        <img src="{{asset('images/include/tours.png')}}" alt="" class="object-contain px-4 text-center">
                        <p class="text-xs">Tours</p>
                    </div>
                    <div class="">
                        <img src="{{asset('images/include/trains.png')}}" alt="" class="object-contain px-4 text-center">
                        <p class="text-xs">Trains</p>
                    </div>
                    <div class="">
                        <img src="{{asset('images/include/transfers.png')}}" alt="" class="object-contain px-4 text-center">
                        <p class="text-xs">Transfers</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12">
{{--            <category-component></category-component>--}}
        </div>

    </section>

    <section class="container my-12">
        <div class="flex mb-3 items-center text-2xl text-gray-700 dark:text-primary font-bold gap-2">
            <div class="">
                <span class="inline-block w-1 h-2.5 bg-secondary ml-1"></span>
                <span class="inline-block w-3 h-2.5 bg-secondary ml-1"></span>
                <span class="inline-block w-5 h-2.5 bg-secondary"></span>
            </div> Social Media
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="grid grid-cols-1 items-center relative bg-fixed bg-center bg-no-repeat bg-cover" style="background-image: url({{asset('images/hotels-t.jpg')}})">
                <div class="flex">
                    <div class="elfsight-app-ba7c9526-9468-4d5b-b378-68ec76259e00"></div>
                </div>
            </div>
            <div class="flex gap-4 flex-col justify-between content-between overflow-hidden">
                <div class="">
                    <div class="flex items-center text-center text-gray-700 dark:text-gray-300 gap-2">
                        <div class="border p-4 w-1/2">
                            <p class="block text-4xl font-bold">30 000</p>
                            <p class="text-xs">FACEBOOK FANS</p>
                        </div>
                        <div class="border p-4 w-1/2">
                            <p class="block text-3xl font-bold">#gotoperu</p>
                            <p class="text-xs">INSTAGRAM HASHTAG</p>
                        </div>
                    </div>
                </div>
                <div class="">
                    {{--            <div class="bg-fixed bg-cover bg-center bg-no-repeat" style="background-image: url({{asset('images/hotels-t.jpg')}})">--}}

                    <div class="bg-gray-500 bg-opacity-10 text-center p-12">
                        <img src="https://gotoperu-com.s3-us-west-1.amazonaws.com/logos/logo-gotoperu-black.png" alt="" class="mx-auto py-4">
                        <h3>PHOTOS FROM OUR TRAVELERS</h3>
                        <p>Get inspired by photos and videos from fellow travelers in Peru, or share your favorite @go.to.peru experiences with us.</p>
                    </div>
                </div>
                <div class="grid grid-cols-4 items-center text-2xl text-gray-700 font-bold gap-3">
                    <div class="border">
                        <img src="{{asset('images/logos/instagram.png')}}" alt="" class="p-6">
                    </div>
                    <div class="border">
                        <img src="{{asset('images/logos/facebook.png')}}" alt="" class="p-6">
                    </div>
                    <div class="border">
                        <img src="{{asset('images/logos/youtube.png')}}" alt="" class="p-6">
                    </div>
                    <div class="border">
                        <img src="{{asset('images/logos/tiktok.png')}}" alt="" class="p-6">
                    </div>
                </div>


            </div>
        </div>

    </section>


    <div class="flex mb-3 container items-center text-2xl text-gray-700 dark:text-secondary font-bold gap-2">
        <div class="">
            <span class="inline-block w-1 h-2.5 bg-secondary dark:bg-primary ml-1"></span>
            <span class="hidden md:inline-flex inline-block w-3 h-2.5 bg-secondary dark:bg-primary ml-1"></span>
            <span class="hidden md:inline-flex inline-block w-5 h-2.5 bg-secondary dark:bg-primary"></span>
        </div> Peru Travel Information
    </div>
    <section class="grid grid-cols-1 md:grid-cols-5 container gap-4">
        <div class="md:col-span-3 relative">
            <img src="{{asset('images/hotel.jpg')}}" alt="" class="object-cover h-full w-full">
            <div class="absolute inset-0 gradient-cicle-gray"></div>
        </div>
        <div class="md:col-span-2 bg-secondary bg-opacity-20 dark:bg-gray-700 dark:bg-opacity-90 p-6 dark:text-gray-50 flex items-center">
            <div class="">
                <h3 class="font-semibold text-2xl">Hotels</h3>
                <div class=" mb-10">
                    <span class="inline-block w-1 h-2 bg-secondary dark:bg-primary ml-1"></span>
                    <span class="inline-block w-3 h-2 bg-secondary dark:bg-primary ml-1"></span>
                    <span class="inline-block w-10 h-2 bg-secondary dark:bg-primary"></span>
                    <span class="inline-block w-3 h-2 bg-secondary dark:bg-primary ml-1"></span>
                    <span class="inline-block w-1 h-2 bg-secondary dark:bg-primary ml-1"></span>
                </div>
                <p class="block my-12">
                    At GOTOPERU our expert local team handpicked the best Peru hotels at each category.
                    All feature excellent locations and facilities for a comfortable stay, plus the best service and warm peruvian hospitality. Our hotels will be a great part of an unforgettable Peru vacation!
                    Select your preferred Hotel category for all our Peru travel packages.
                </p>
                <a href="#" class="btn-primary">View all</a>
            </div>
        </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-3 my-4 container gap-4">
        <div class="md:col-span-1 relative flex items-center">
            <div class="relative w-full">
                <img src="{{asset('images/blog.jpg')}}" alt="" class="object-cover w-full h-full">
            </div>
            <div class="absolute inset-0 gradient-cicle-gray"></div>
            <div class="absolute inset-x-0 bottom-0 p-6 m-6  rounded-lg shadow-lg text-gray-500 bg-gray-50 dark:bg-gray-800 dark:text-gray-300">
                <h3 class="font-semibold text-2xl">Lugares Para Visitar en Perú en el 2021</h3>
                <div class="flex inline-flex divide-x text-xs my-3 divide-gray-500 gap-1">
                    <div class="flex inline-flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                        <span>Hidalgo</span>
                    </div>
                    <div class="flex inline-flex items-center gap-1 pl-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>
                        <span>27 junio 2021</span>
                    </div>
                    <div class="flex inline-flex items-center gap-1 pl-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                            <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z"/>
                            <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z"/>
                        </svg>
                        <span>Travel</span>
                    </div>
                </div>
                <div class=" mb-10">
                    <span class="inline-block w-1 h-2 bg-secondary ml-1"></span>
                    <span class="inline-block w-3 h-2 bg-secondary ml-1"></span>
                    <span class="inline-block w-10 h-2 bg-secondary"></span>
                    <span class="inline-block w-3 h-2 bg-secondary ml-1"></span>
                    <span class="inline-block w-1 h-2 bg-secondary ml-1"></span>
                </div>

                <a href="" class="btn-secondary">View all</a>
            </div>
        </div>
        <div class="md:col-span-2 relative">
            <img src="https://picsum.photos/840/665" alt="" class="h-full w-full object-cover">
            <div class="md:absolute md:inset-0 p-6 bg-gray-900 bg-opacity-50">
                <div class="flex flex-col h-full justify-end">
                    <div class="text-gray-50 text-right">
                        <h3 class="font-semibold text-2xl">News and travel guides</h3>
                        <div class=" mb-10">
                            <span class="inline-block w-1 h-2 bg-white ml-1"></span>
                            <span class="inline-block w-3 h-2 bg-white ml-1"></span>
                            <span class="inline-block w-20 h-2 bg-white"></span>
                        </div>
                        <p class="block my-12">Welcome travelers to our Peru blog, you will find useful Peru travel information and much more to inspire you for your next vacation to the land of the Incas including travel tips for Lima, Cusco, the Inca Trail, Machu Picchu, the Amazon and many other peruvian amazing destinations.</p>
                        <a href="" class="btn-secondary">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@push('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endpush
@push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
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
    </script>

@endpush
</x-page-layout>
