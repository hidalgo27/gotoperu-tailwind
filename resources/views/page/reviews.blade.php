<x-page-layout>
    <section class="-mt-32 h-80vh -z-1 relative">
        <img src="{{asset('images/banners/mapi.jpg')}}" alt="" class="h-full w-full object-cover object-top">
        <div class="absolute bottom-0 left-0 p-12">
            <h1 class="text-5xl font-semibold text-gray-50">Reviews and Testimonials</h1>
        </div>
    </section>

    <section class="container py-12 text-gray-500 text-center">
        <p class="">Experience Peru with an award-winning team on a completely customized, private or small group tour for an authentic trip of a lifetime. With our 97% satisfaction rate, round-the-clock local support and 100% financial protection, explore 20+ enchanting destinations around the land of the Incas safely and seamlessly. Our 9,000+ enchanted guests will vouch for us.</p>
{{--        <p class="my-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet beatae commodi doloremque est eveniet expedita id ipsam labore magnam maxime, minima nemo nihil porro quaerat rem ullam. A, earum?</p>--}}
        <div class="text-gray-600 text-xl font-medium">
            Trabajaremos de acuerdo con su agenda y sus intereses de viaje para construir juntos los planes de viaje más exclusivos.
        </div>
    </section>

    <div class="flex mt-12 container items-center text-2xl text-gray-700 dark:text-secondary font-bold gap-2">
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
                    <img src="https://gotoperu.com.mx/images/icons/tripadvisor.png" alt="" class="p-4 dark:filter dark:grayscale dark:invert">
                </div>
                <div class="border">
                    <img src="https://gotoperu.com.mx/images/icons/yelp.png" alt="" class="p-4 dark:filter dark:grayscale dark:invert">
                </div>
                <div class="border">
                    <img src="https://gotoperu.com.mx/images/icons/trust.png" alt="" class="p-4 dark:filter dark:grayscale dark:invert">
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

    <section class="container my-24">
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
    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    @endpush
    @push('scripts')
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
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
