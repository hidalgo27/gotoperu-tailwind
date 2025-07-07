@php
    $gridItems = [
        [
            'id' => 1,
            'imageUrl' => 'https://storage.googleapis.com/a1aa/image/cccae178-5777-429b-3be7-69115e5fd1a6.jpg',
            'altText' => 'Underwater scene with a school of striped fish swimming in blue water',
            'title' => 'Travel Packages',
            'url' => '/peru-travel-packages',
            'buttonText' => 'Explore More',
        ],
        [
            'id' => 2,
            'imageUrl' =>
                'https://images.unsplash.com/photo-1620658927695-c33df6fb8130?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Y29zdGElMjByaWNhfGVufDB8fDB8fHww',
            'altText' => 'Group of elephants walking on grassy savannah under a clear sky',
            'title' => 'Costa Rica',
            'url' => '/destinations',
            'buttonText' => 'Discover Destinations',
        ],
        [
            'id' => 3,
            'imageUrl' => 'https://storage.googleapis.com/a1aa/image/d8ee014b-a7cc-4b2e-1a5e-bf3d19fdeaca.jpg',
            'altText' => 'Silhouetted group of people standing on a hilltop at sunset with colorful sky',
            'title' => 'Our Team',
            'url' => '/about-us/our-team',
            'buttonText' => 'Meet the Entire Team',
        ],
        [
            'id' => 4,
            'imageUrl' =>
                'https://images.unsplash.com/photo-1552664730-d307ca884978?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8d29yayUyMHRvZ2V0aGVyfGVufDB8fDB8fHww',
            'altText' => 'Couple holding hands outdoors at twilight with mountains in background',
            'title' => 'Work with Us',
            'buttonText' => 'Contact Us',
            'centerText' => true,
            'isModal' => true,
        ],
    ];
@endphp

<div class="pt-24">
    <div class="container flex flex-col">
        <h1 class="text-4xl italic font-playfair mb-6">EXPLORE MORE WITH GOTOGROUP</h1>
    </div>
    <div class="flex flex-wrap w-full h-full">
        @foreach ($gridItems as $item)
            <div class="relative flex-1 min-w-[50%] lg:min-w-[25%] h-full">
                <img src="{{ $item['imageUrl'] }}" alt="{{ $item['altText'] }}"
                    class="w-full h-[30vh] md:h-[40vh] xl:h-[50vh] object-cover brightness-75" loading="lazy" />
                <div
                    class="absolute inset-0 flex flex-col justify-center items-center text-white italic text-2xl md:text-3xl font-playfair {{ isset($item['centerText']) && $item['centerText'] ? 'text-center px-4' : '' }}">
                    <div class="font-semibold">{{ $item['title'] }}</div>
                    @if (isset($item['isModal']) && $item['isModal'])
                        <button onclick="openModal()"
                            class="mt-4 border border-white px-4 py-1 text-sm md:text-base hover:bg-white hover:text-black transition duration-300 cursor-pointer">
                            {{ $item['buttonText'] }}
                        </button>
                    @else
                        <a href="{{ $item['url'] ?? '#' }}"
                            class="mt-4 border border-white px-4 py-1 text-sm md:text-base hover:bg-white hover:text-primary transition duration-300">
                            {{ $item['buttonText'] }}
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-gray-900/70"
        onclick="if(event.target === this) closeModal()">
        <div class="relative bg-white rounded-lg shadow-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <!-- Close button -->
            <button onclick="closeModal()"
                class="absolute top-4 right-4 p-1 rounded-full hover:bg-gray-100 transition-colors"
                aria-label="Close modal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Modal content -->
            <div>
                <!-- WorkWithUsForm would go here -->
                <div class="p-8">
                    <p class="text-center py-8">Work with us form would be displayed here</p>
                </div>
            </div>
        </div>
    </div>
</div>
@push('css')
    <style>
        /* Smooth transition for modal */
        .modal-transition {
            transition: opacity 0.3s ease;
        }

        .modal-hidden {
            opacity: 0;
        }
    </style>
@endpush


@push('scripts')
    <script>
        function lockBodyScroll() {
            document.body.style.overflow = 'hidden';
        }

        function unlockBodyScroll() {
            document.body.style.overflow = '';
        }

        function openModal() {
            const modal = document.getElementById('modal');
            modal.classList.remove('hidden');
            lockBodyScroll();
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.add('hidden');
            unlockBodyScroll();
        }

        // Clean up on page navigation
        window.addEventListener('beforeunload', unlockBodyScroll);
    </script>
@endpush
