@extends('layouts.page-layout')
@section('content')
    <section class="-mt-32 h-80vh -z-1 relative">
        <img src="{{asset('images/1327.jpg')}}" alt="" class="h-full w-full object-cover object-top">
        <div class="absolute bottom-0 left-0 p-12">
            <h1 class="text-5xl font-semibold text-gray-50">{{__('message.dest_title1')}}</h1>
        </div>
    </section>
{{--    <div class="hidden md:inline-block">--}}
{{--        @livewire('page.form-home')--}}
{{--    </div>--}}
    <section class="container py-12 text-gray-500 text-center">

        <p>{{__('message.dest_para1')}}</p>

    </section>

    <section class="container grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
        @foreach($destinations as $destination)
            <article class="grid grid-cols-1 place-content-between mb-6 border-r border-l dark:border-gray-700">
                <div class="w-full">
                    <figure class="overflow-hidden relative">
                        <img src="{{$destination->imagen}}" alt="" class="bg-cover h-full w-full">
                        <div class="absolute inset-0 gradient-cicle-gray"></div>
                    </figure>

                    <div class="w-full p-6 mt-4 mb-5 text-center">
                        <div class="">
                            {{--                        <h2 class="">{{ Str::limit($destination->nombre, 40) }}</h2>--}}
                            <h2 class="text-xl font-bold mb-4 text-center text-gray-600 dark:text-gray-300">{{$destination->nombre}}</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-200">{!! $destination->resumen !!}</p>
                        </div>
                        {{--                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea fuga repellat reprehenderit sint vero. Eum maxime minima, nobis numquam optio quasi quidem quo ratione sunt totam vel velit voluptatem voluptatum?--}}
                    </div>

                </div>

                <div class="w-full">
                    <a href="{{ route('destinations.show', $destination) }}" class="btn-secondary block text-center mt-2">{{__('message.button_all')}}</a>
                </div>
            </article>

        @endforeach
    </section>

    <section class="px-6 container grid grid-cols-1 md:grid-cols-4 my-12">
        <div class="text-center w-full col-span-4 items-center text-2xl text-gray-700 dark:text-secondary font-bold gap-2">
            PERU HIGHLIGHTS
            <div class="border-4 h-1 w-12 border-primary mx-auto mt-3"></div>
        </div>
        <div class="col-span-4 text-center mt-4">
            Peru is a country of history, culture, beauty, and adventure, with a full spectrum of possibilities for travelers. The ancient Inca City of Machu Picchu is one of the highlights of any trip to South America, but there is much more to discover throughout Peru, for example:
        </div>
    </section>


    <section>
        <div class="container">
            <div class="">
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Peruvian Hospitality, whether quietly reserved or smilingly helpful, Peruvians, we are always happy to welcome travelers to our proud nation
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Vibrant Cultural Festivals, the Peruvian year is dotted with colorful festivals, the majority with a fascinating blend of colonial and indigenous traditions.
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Visit Peru's Wonderful Wildlife, with eight national parks, eight national reserves and seven national sanctuaries, nature lovers paradise.
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Hike to Rainbow Mountain
                </p>
                {{--                <a href="#" class="btn-primary">{{__('message.button_all')}}</a>--}}


                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Buggy Ride through the Sand dunes at Huacachina Oasis.
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Food Tour in Lima, our main city is one of the gastronomic capitals of the world. Here, you can try some of the most unique and tasty dishes
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    One of the best things to do in Peru is drinking Pisco Sours – and lots of them!
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Swimming with the sea lions is another wildlife activity. Believe it or not, this is a tour you actually do from Lima!
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Explore Cusco,  the former Inca capital, this high-altitude city of terracotta rooftops is a boom town with a cosmopolitan feel
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Hike The world famous Inca Trail to Machu Picchu, make sure to book in advance for this trek, permits are limited.
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Go to the Amazon Rainforest and their amazing natural lodges
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Fly Over the Nazca Lines, especially if you’re into history, archeology or even Ancient Aliens.
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Mystic Peru, Peru has a rich tradition of healers and spiritual advisors
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    A little-known attraction that is a lot of fun: swimming with the sea turtles! north of Peru at the town of Mancora.
                </p>

                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Close experience with alpacas or llamas for a truly unforgettable Peru experience, you will enjoy these super adorable creatures!
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Spot a Sea lion on the Ballestas Islands, 4hrs south of Lima.
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Take off on a 4×4 ATV through the hillsides of the Sacred Valley to visit the Salt Mines of Maras and archeological site of Moray
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Visit the Lake Titicaca, the highest navigable lake in the world and their floating islands called Uros.
                </p>
                <p class="flex my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Explore the neighborhood of Barranco at Lima, the area has long been popular with artists and poets, giving it a Bohemian feel.
                </p>

            </div>
        </div>
    </section>


    <section class="mt-12">
        @livewire('page.form-footer')
    </section>
@endsection
