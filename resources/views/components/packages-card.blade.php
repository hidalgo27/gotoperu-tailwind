@props(['paquete'])
<div class="group">
    <div class="overflow-hidden relative">
        <div class="relative">
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
        <a href="{{route('packages.detail', $paquete['url'])}}" class="btn-secondary">View details</a>
    </div>
</div>
