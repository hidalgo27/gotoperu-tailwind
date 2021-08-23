<x-page-layout>
    <section class="bg-gray-50 py-12">
        <div class="w-full md:w-3/5 mx-auto grid grid-cols-1 md:grid-cols-1 flex items-center">
            <div class="col-span-1 px-6 md:px-0 justify-between text-gray-500">
                <span class="text-sm font-light text-secondary">{{$post->created_at}}</span>
                _____
                <span class="text-sm font-light text-secondary">{{$post->categoria->nombre}}</span>

                <h2 class="my-4 font-semibold text-gray-600 text-3xl">{{$post->titulo}}</h2>
{{--                <span class="text-sm mb-6">{!! Str::limit($post->detalle, 300) !!}</span>--}}

{{--                <a href="" class="text-secondary mt-4 flex">read <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />--}}
{{--                    </svg></a>--}}
            </div>
            <div class="col-span-2 h-96">
                <img src="{{$post->imagen_miniatura}}" alt="" class="h-full w-full object-cover object-center">
            </div>
        </div>
        <div class="w-full md:w-3/5 mx-auto mt-6 px-6 md:px-0">
            <div class="text-gray-600 w-full block">{!! $post->detalle !!}</div>
        </div>
    </section>


    <section class="">
        @livewire('page.form-footer')
    </section>

</x-page-layout>
