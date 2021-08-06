<x-page-layout>
    <section class="-mt-32 h-80vh -z-1 relative">
        <img src="{{asset('images/banners/mapi.jpg')}}" alt="" class="h-full w-full object-cover object-top">
        <div class="absolute bottom-0 left-0 p-12">
            <h1 class="text-5xl font-semibold text-gray-50">TRAVEL WITH CONFIDENCE</h1>
        </div>
    </section>
    <div class="hidden md:inline-block">
        @livewire('page.form-home')
    </div>
    <section class="container mt-12">
        <h2 class="text-center font-bold text-gray-500 md:text-2xl mb-12 xl:text-4xl dark:text-secondary">What we’re doing for your wellbeing</h2>
        <div class="grid grid-cols-1 md:grid-cols-5 border mb-6">
            <div class="col-span-2">
                <img src="https://picsum.photos/700/450" alt="" class="object-cover h-full w-full">
            </div>
            <div class="col-span-3 p-12">
                <h3 class="font-bold text-gray-500 pb-4 text-xl dark:text-white">Health and hygiene processes</h3>
                <p class="text-gray-500 dark:text-gray-200 text-sm">Taking in consideration the latest developments we have added enhanced measures to our travel safety standards, including increased social distancing policies to offer the most safely experiences.</p>
                <p class="text-gray-500 dark:text-gray-200 text-sm">These measures have been developed in alignment with government recommendations and health providers across our destinations. For example, GOTOPERU has implemented the World Travel & Tourism Council’s “Safe Travels” protocols and the Peruvian Tourist Board’s “Clean & Safe” norms.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 border mb-6">
            <div class="col-span-2">
                <img src="{{asset('images/banners/confidence/safe-transportation.jpg')}}" alt="" class="object-cover h-full w-full">
            </div>
            <div class="col-span-3 p-12">
                <h3 class="font-bold text-gray-500 pb-4 text-xl dark:text-white">Safe transportation</h3>
                <p class="text-gray-500 dark:text-gray-200 text-sm">All vehicles are deep cleaned to keep you safe. For example, if you join one of our small group tours, your tour bus will be equipped with hand sanitiser and the vehicle will be disinfected regularly. If you are on a private tour your van will be thoroughly cleaned before every service.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 border mb-6">
            <div class="col-span-2">
                <img src="{{asset('images/banners/confidence/quality-checked.jpg')}}" alt="" class="object-cover h-full w-full">
            </div>
            <div class="col-span-3 p-12">
                <h3 class="font-bold text-gray-500 pb-4 text-xl dark:text-white">Quality-checked hotels</h3>
                <p class="text-gray-500 dark:text-gray-200 text-sm">Our GOTOPERU travel agents select the hotels for their quality, location and high service standards. In addition, we are working with our hotel partners to ensure that they also meet our health and hygiene requirements.</p>
                <p class="text-gray-500 dark:text-gray-200 text-sm">You can enjoy every stay knowing that all key touch points will be sanitised regularly and hand gel will be provided at all the hotels you will stay in. If you are a solo traveller you will have your own private room, this was also a policy before the current times.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 border mb-6">
            <div class="col-span-2">
                <img src="{{asset('images/banners/confidence/handpicked.jpg')}}" alt="" class="object-cover h-full w-full">
            </div>
            <div class="col-span-3 p-12">
                <h3 class="font-bold text-gray-500 pb-4 text-xl dark:text-white">Handpicked activities and Restaurants</h3>
                <p class="text-gray-500 dark:text-gray-200 text-sm">Peru is known for its exquisite gastronomy and with more reason we will offer you the best recommendations to enjoy the best plates at the best places.</p>
                <p class="text-gray-500 dark:text-gray-200 text-sm">We also certify that our experienced providers for every activity are aligned with us when it comes to health and hygiene procedures; all the peruvian activities offered are tested and are selected for you.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 border mb-6">
            <div class="col-span-2">
                <img src="{{asset('images/banners/confidence/experienced-tour-guides.jpg')}}" alt="" class="object-cover h-full w-full">
            </div>
            <div class="col-span-3 p-12">
                <h3 class="font-bold text-gray-500 pb-4 text-xl dark:text-white">Experienced tour guides</h3>
                <p class="text-gray-500 dark:text-gray-200 text-sm">GOTOPERU best local guides. They will be there to keep you safe and create an unforgettable Peru vacation from start to finish.</p>
                <p class="text-gray-500 dark:text-gray-200 text-sm">In addition they will have extra training on all safety protocols so they know exactly what to do in all possible scenarios, we will always be there for you.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 border mb-6">
            <div class="col-span-2">
                <img src="https://picsum.photos/700/454" alt="" class="object-cover h-full w-full">
            </div>
            <div class="col-span-3 p-12">
                <h3 class="font-bold text-gray-500 pb-4 text-xl dark:text-white">Detailed travel docs</h3>
                <p class="text-gray-500 dark:text-gray-200 text-sm">Part of the GOTOPERU experience will be to have all comprehensiva travel documents and useful information before arrival and in addition your travel advisor will keep you updated should any changes arise.</p>
                <p class="text-gray-500 dark:text-gray-200 text-sm">Your Peru travel documents will have all the information you need in one place to help you prepare and maximize your peruvian adventure plus our tips based on many years of experience.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 border mb-6">
            <div class="col-span-2">
                <img src="{{asset('images/banners/confidence/24.jpg')}}" alt="" class="object-cover h-full w-full">
            </div>
            <div class="col-span-3 p-12">
                <h3 class="font-bold text-gray-500 pb-4 text-xl dark:text-white">24/7 support</h3>
                <p class="text-gray-500 dark:text-gray-200 text-sm">We live at each destination, there will always be an agent ready to assist you. If you urgently need to contact us, you can access our assistance line at any time of day.</p>
                <p class="text-gray-500 dark:text-gray-200 text-sm">Our Headquarters are located in Cusco but we have remote offices in Arequipa, Lima and Puno, plus GOTOPERU representatives in MachuPicchu, Nazca, Paracas, Urubamba, Puerto Maldonado and Chiclayo.</p>
            </div>
        </div>


    </section>


</x-page-layout>

