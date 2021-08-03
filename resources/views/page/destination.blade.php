<x-page-layout>
    <section class="-mt-32 h-80vh -z-1 relative">
        <img src="{{asset('images/banners/mapi.jpg')}}" alt="" class="h-full w-full object-cover object-top">
        <div class="absolute bottom-0 left-0 p-12">
            <h1 class="text-5xl font-semibold text-gray-50">Peru Destinations</h1>
        </div>
    </section>

    <section class="container py-12 text-gray-500 text-center">

        <p>Peru is a unique south american country, there is not a simple way to describe all the highlights that this destination offers; you will feel the magic of this land, you will see history, delicious food ( Peruvian Gastronomy is known worldwide) , rich culture, plenty of adventure and more. It’s a country with over 5000 years of history, and proudly one of the most diverse countries in the world that create practically infinite vacation destinations from Amazon national parks, ancient Inca ruins to the mysterious Nazca Lines and beautiful mountains for amazing treks as the Inca trail.</p>

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
                            <p class="text-sm text-gray-500 dark:text-gray-200">{{$destination->resumen}}</p>
                        </div>
                        {{--                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea fuga repellat reprehenderit sint vero. Eum maxime minima, nobis numquam optio quasi quidem quo ratione sunt totam vel velit voluptatem voluptatum?--}}
                    </div>

                </div>

                <div class="w-full">
                    <a href="{{ route('destinations.show', $destination) }}" class="btn-secondary block text-center mt-2">View All</a>
                </div>
            </article>

        @endforeach
    </section>

</x-page-layout>
