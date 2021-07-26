<x-page-layout>
    <section class="-mt-32 h-80vh -z-1 relative">
        <img src="{{asset('images/banners/mapi.jpg')}}" alt="" class="h-full w-full object-cover object-top">
        <div class="absolute bottom-0 left-0 p-12">
            <h1 class="text-5xl font-semibold text-gray-50">Peru Destinations</h1>
        </div>
    </section>

    <section class="container py-12 text-gray-500 text-center">
        <p class="">Experience Peru with an award-winning team on a completely customized, private or small group tour for an authentic trip of a lifetime. With our 97% satisfaction rate, round-the-clock local support and 100% financial protection, explore 20+ enchanting destinations around the land of the Incas safely and seamlessly. Our 9,000+ enchanted guests will vouch for us.</p>
        <p class="my-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet beatae commodi doloremque est eveniet expedita id ipsam labore magnam maxime, minima nemo nihil porro quaerat rem ullam. A, earum?</p>
        <div class="text-gray-600 text-xl font-medium">
            Trabajaremos de acuerdo con su agenda y sus intereses de viaje para construir juntos los planes de viaje más exclusivos.
        </div>
    </section>

    <section class="container grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
        @foreach($destinations as $destination)
            <article class="grid grid-cols-1 place-content-between mb-6 border-r border-l">
                <div class="w-full">
                    <figure class="overflow-hidden relative">
                        <img src="{{$destination->imagen}}" alt="" class="bg-cover h-full w-full">
                        <div class="absolute inset-0 gradient-cicle-gray"></div>
                    </figure>

                    <div class="w-full p-6 mt-4 mb-5 text-center">
                        <div class="">
                            {{--                        <h2 class="">{{ Str::limit($destination->nombre, 40) }}</h2>--}}
                            <h2 class="text-xl font-bold mb-4 text-center text-gray-600">{{$destination->nombre}}</h2>
                            <p class="text-sm text-gray-500">{{$destination->resumen}}</p>
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
