<x-page-layout>
    <section class="-mt-32 h-80vh -z-1 relative">
        <img src="{{asset('images/banners/mapi.jpg')}}" alt="" class="h-full w-full object-cover object-top">
        <div class="absolute bottom-0 left-0 p-12">
            <h1 class="text-5xl font-semibold text-gray-50">About</h1>
        </div>
    </section>

{{--    <div class="hidden md:inline-block">--}}
{{--        @livewire('page.form-home')--}}
{{--    </div>--}}

    <section class="container py-12 text-gray-500 text-center">
        <h2 class="text-3xl font-semibold mb-2">YOUR LOCAL PERU TRAVEL EXPERTS </h2>
        <p class="">GOTOPERU is a specialist travel agency catering to travellers who want an original, authentic and unforgettable experience at the land of the Incas.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 mt-12">
            <div class="">
                <p>From MachuPicchu all included tours, to off-the-beaten-path adventures at the Amazon and into Sacred Valley, Lake Titicaca, Lima, Arequipa and many more: we offer tailor-made Peru travel packages for all interests and needs. Since GOTOPERU was established in 2009, we have had the pleasure of welcoming tens of thousands of happy travellers from over 50 countries. We hope to be able to welcome you and introduce you to the magical, biodiverse and historical Peru, our home.</p>
            </div>
            <div class="">

            </div>
        </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2">
        <div class="bg-secondary p-12 grid grid-cols-3">
            <div class=""></div>
            <div class="col-span-2">
                <h2 class="font-bold text-white text-2xl">OUR VALUES: </h2>
                <p class="text-sm italic text-yellow-700 font-medium my-4">“At GOTOPERU, we are guided by a set of core values — quality, passion, trust and personal service :  and we guarantee that these hallmarks will be met every day during your vacation in Peru" </p>
                <p class="my-4 text-sm font-bold text-yellow-900">I will be always one click of distance for you : paul@gotoperu.com</p>
                <p class="font-bold text-white">Paul Catano</p>
                <p class="text-xs">CEO & Founder</p>
            </div>
        </div>
        <div class="bg-primary grid grid-cols-1 md:grid-cols-2 gap-6 p-12">
            <div class="">
                <h3 class="font-bold text-white mb-2">Personalized Service</h3>
                <p class="text-sm text-gray-800">First name basis always, since your own custom-made itinerary our dedicated local team, including representatives, guides, drivers will be always there for you on each day of your vacation. Plus a truly local assistance 24/7 on each destination. </p>
            </div>
            <div class="">
                <h3 class="font-bold text-white mb-2">Confidence</h3>
                <p class="text-sm text-gray-800">GOTOPERU is certified by the Peruvian Government, by the Ministry of Foreign Trade and Tourism of Peru (MINCETUR) . In addition we are also highly rated on Tripadvisor, Trustpilot and diverse well known travel forums.</p>
            </div>
            <div class="md:col-span-2">
                <h3 class="font-bold text-white mb-2">Commitment</h3>
                <p class="text-sm text-gray-800">To organize the best Peru Vacation! , before booking, during your Peru journey and after your trip to help you create unforgettable experiences. Will be our pleasure to be your peruvian hosts and help you experience our country as a local!</p>
            </div>
        </div>
    </section>

    <section class="py-12 text-gray-500 text-center bg-gray-100">
        <div class="container">
        <h2 class="text-3xl font-semibold mb-2">OUR TEAM</h2>
        <p class="">Each of our travel local professionals who know our country inside and out as we live and work on each peruvian destination we cover.</p>
        <p><p>GOTOPERU representatives </p></p>

        <div class="grid grid-cols-3 gap-8 mt-12">
            @foreach($teams as $team)
            <div class="text-center mb-8 md:mb-0">
                @if($team->imagen_perfil)
                    <img class="w-48 h-48 rounded-full mx-auto -mb-24" src="{{$team->imagen_perfil}}" alt="{{$team->nombre}}"/>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-48 h-48 rounded-full mx-auto bg-white -mb-24" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                @endif
                <div class="bg-white shadow-lg rounded-lg px-8 pt-32 pb-10 text-gray-400">
                    <h3 class="font-title text-gray-800 text-xl mb-3">
                        {{$team->nombre}}
                    </h3>
                    <p class="font-body mb-4">
                        {{$team->cargo}}
                    </p>
{{--                    <p class="font-body text-sm mb-4">--}}
{{--                        {{$team->actividad}}--}}
{{--                    </p>--}}
{{--                    <a class="font-body text-blue-500 hover:text-gray-800" href="#">--}}
{{--                        {{$team->email}}--}}
{{--                    </a>--}}
                </div>
            </div>
            @endforeach
        </div>
        </div>


    </section>

    <section class="">
        @livewire('page.form-footer')
    </section>

</x-page-layout>
