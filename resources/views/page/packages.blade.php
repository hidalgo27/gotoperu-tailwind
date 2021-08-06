<x-page-layout>
<section class="-mt-20 h-75vh -z-1 relative">
    <img src="{{asset('images/1327.jpg')}}" alt="" class="h-full w-full object-cover object-top">
    <div class="absolute bottom-0 left-0 p-12">
        <h1 class="text-5xl font-semibold text-gray-50">Peru Travel Packages</h1>
    </div>
</section>
    <div class="hidden md:inline-block">
        @livewire('page.form-home')
    </div>

<section class="container py-12 text-gray-500 text-center mx-auto">
    <p class="text-sm">GOTOPERU offers the best Peru travel packages covering the main Peru destinations such as Machu Picchu, Rainbow Mountain, Cusco, Lima, Sacred Valley, Titicaca Lake, Puno, Arequipa, Nazca, the Amazon and many more. Our travel packages range from 2 days to 20 days.</p>
    <p class="text-sm my-6">Our Itineraries are carefully-crafted experiences combining the most memorable unique activities and tours that Peru has to offer. Our Peru travel packages offer a planned itinerary seeing something new, interesting and fascinating every day. If you are a family, group of friends, solo traveler or a couple our daily activities will give you the opportunity to witness the history, architecture, nature and culture of Peru. You will not have to worry about anything, we have you cover since you arrive at Peru until you depart, you will be always under GOTOPERU umbrella with a friendly representative ready to assist you every day. All you need to do is sit back and enjoy everyday, creating priceless memories to share with friends and family. </p>
    <p>The following travel Peru packages could be a reference and inspiration for your ideal peruvian vacation. No matter the type of adventure you are seeking, GOTOPERU has a trip for you. Hoping to see Llamas? Check! .Want an active Inca Trail hiking trip? Check! How about a Ceviche in Lima? Check! .How about a trip for you, your kiddos, and Grandma and Grandpa?  Contact us today with a short description of your ideal Peru trip and we will make it happen.</p>
</section>

<section class="container grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

    @foreach($paquetes as $paquete)
        <x-packages-card :paquete="$paquete"></x-packages-card>
    @endforeach


</section>
</x-page-layout>
