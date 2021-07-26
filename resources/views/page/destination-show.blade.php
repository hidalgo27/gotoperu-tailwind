<x-page-layout>
    <section class="-mt-32 h-80vh -z-1 relative">
        @foreach($destinations->destino_imagen as $imagen)
            <img src="{{$imagen->nombre}}" alt="" class="h-full w-full object-cover">
        @endforeach

        <div class="absolute bottom-0 left-0 p-12">
            <h1 class="text-5xl font-semibold text-gray-50">Peru Travel Packages</h1>
        </div>
    </section>
    <section class="container py-12 text-gray-500 text-center mx-auto">
        <p>Experience Peru with an award-winning team on a completely customized, private or small group tour for an authentic trip of a lifetime. With our 97% satisfaction rate, round-the-clock local support and 100% financial protection, explore 20+ enchanting destinations around the land of the Incas safely and seamlessly. Our 9,000+ enchanted guests will vouch for us.</p>

    </section>



    <section class="container grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
    @foreach($paquetes_api as $paquete)
        <div class="group">
            <div class="overflow-hidden relative">
                <div class="relative">
                    <img src="{{$paquete['paquetes']['imagen']}}" alt="sds" class="object-cover transition duration-500 ease-in-out transform group-hover:-translate-x-0 group-hover:scale-105"/>
                <div class="absolute inset-0 gradient-cicle-gray"></div>
                </div>
                <div class="absolute inset-x-0 bottom-0 w-full p-6">
                    <div class="bg-primary bg-opacity-95 p-4 text-gray-50 group-hover:bg-opacity-100 transition duration-500 rounded-lg shadow-xl">
                        <h2 class="text-xl font-bold">{{ $paquete['paquetes']['titulo'] }}</h2>
                        <p class="text-xs my-2">
                            @foreach($paquete['paquetes']['paquetes_destinos'] as $paquete_destino)
                                {{$paquete_destino['destinos']['nombre']}}
                                @if ($loop->iteration < count($paquete['paquetes']['paquetes_destinos'])) , @else . @endif
                            @endforeach
                        </p>

                    </div>
                </div>
            </div>
            <div class="border p-6 block group-hover:border-primary text-center transition duration-500">
                <div class="font-bold text-gray-500 text-lg mb-4">
                    {{ $paquete['paquetes']['duracion'] }} days /
                    @foreach($paquete['paquetes']['precio_paquetes'] as $precio)
                        @if($precio['estrellas'] == 2)
                            @if($precio['precio_d'] > 0)
                                <span class="text-xs align-top">from</span> $ {{$precio['precio_d']}} <span class="text-xs">usd</span>
                            @else
                                <span class="text-red-500">Consulte</span>
                            @endif
                        @endif
                    @endforeach

                </div>
                <a href="{{route('packages.detail', $paquete['paquetes']['url'])}}" class="btn-secondary">Ver detalles</a>
            </div>
        </div>
    @endforeach
    </section>
</x-page-layout>

