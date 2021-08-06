<x-page-layout>
    <section class="-mt-32 h-80vh -z-1 relative">
        <img src="{{asset('images/banners/mapi.jpg')}}" alt="" class="h-full w-full object-cover object-top">
        <div class="absolute bottom-0 left-0 p-12">
            <h1 class="text-5xl font-semibold text-gray-50">BOOKING TERMS</h1>
        </div>
    </section>
    <div class="hidden md:inline-block">
        @livewire('page.form-home')
    </div>
    <section class="container mt-12">
        <h2 class="text-center font-bold text-gray-500 md:text-2xl mb-12 xl:text-4xl dark:text-secondary">BOOKING TERMS AND CONDITIONS</h2>
        <div class="grid grid-cols-1">
            <article class="mb-4" x-data="{ open: false }">
                <header class="border border-gray-200 px-4 py-2 flex justify-between cursor-pointer bg-gray-100" x-on:click="open = !open">
                    <h1 class="font-semibold text-sm text-gray-600 ">BOOKING CONDITIONS</h1>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </header>
                <div class="bg-white py-2 px-4 border mt-1" x-show="!open" x-transition>
                    <div class="grid grid-cols-1 gap-2 text-sm">
                        <p>GOTOPERU is the online booking site and trading name of GOTOPERU GROUP SAC. Our registered headquarters are at El Sol Avenue 449 - Cusco - Cusco . Registration no. 000873-005733 from the Ministry of Foreign Trade and Tourism of Peru or MINCETUR. And Peru Tax Authorization RUC : 205619753</p>
                        <p>Any booking made by a customer, whether through the company's website or otherwise, shall be deemed an offer by the customer to purchase the relevant package or travel arrangement subject to these booking conditions. By submitting a booking, you warrant and confirm to us that you comply with these arrangements. No contract between the customer and GOTOPERU shall come into existence until GOTOPERU receives the initial deposit payment and issues a Payment Receipt. The customer making the booking accepts these conditions on behalf of all members of their travel party and is responsible for payment balance from the party in entirety.</p>
                        <p>Booking services with GOTOPERU are only available to persons who are at least 18 years old. Additionally, individuals under the age of 18 on a GOTOPERU tour must be accompanied by an adult.</p>
                        <p>Our company is fully licensed by the Pervuian governments. We are also members of various travel industry associations in Peru.</p>
                    </div>
                </div>
            </article>

            <article class="mb-4" x-data="{ open: false }">
                <header class="border border-gray-200 px-4 py-2 flex justify-between cursor-pointer bg-gray-100" x-on:click="open = !open">
                    <h1 class="font-semibold text-sm text-gray-600 ">PAYMENTS</h1>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </header>
                <div class="bg-white py-2 px-4 border mt-1" x-show="open" x-transition>
                    <div class="grid grid-cols-1 gap-2 text-sm">
                        <p>Accepted payment methods: GOTOPERU accepts all major credit and debit cards, and for bookings made at least 10 days before the travel date, we also accept bank wires.</p>
                        <p>We accept payments from: Visa, Visa Electron, MasterCard, Maestro, JCB, Discover, UnionPay, Diners, and American Express cards.If you wish to pay via bank transfer/wire, please select "Bank Transfer" as your payment method in the booking process, and GOTOPERU will send our bank information. Please note that bank wires are not possible for bookings made less than 10 days from the date of travel.</p>
                        <ul>
                            <li>Payments: GOTOPERU will require an initial deposit payment , depending of the program could be 20% - 30% - 50% or the full amount at the time of booking, depending on when the booking is made, your destination, number of travellers, and what type of tour package is booked.</li>
                            <li>Payment processing: Once payment has been received, your travel advisor will send you a payment receipt.</li>
                            <li>Delayed payments: GOTOPERU reserves the right to treat cases of delayed payment as a cancellation of the booking, and the company can withdraw its confirmation of services. Please note that this applies if no agreement has been made for paying the remaining balance.</li>
                        </ul>
                    </div>
                </div>
            </article>

        </div>
    </section>


</x-page-layout>

