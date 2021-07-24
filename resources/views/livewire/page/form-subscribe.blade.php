<div>
    <!-- Modal -->
    <div x-data="{ showModal : false }">
        <!-- Button -->
        <button type="button" @click="showModal = !showModal" class="btn-secondary text-center w-full block">Subscribe Now</button>

        <!-- Modal Background -->
        <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-gray-800 bg-opacity-90 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <!-- Modal -->
            <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 sm:w-10/12 md:w-4/12 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                <!-- Title -->
                <h3 class="text-2xl text-center font-bold text-gray-500">Subscribe Now </h3>

                <!-- Some beer 🍺 -->
                <form wire:submit.prevent="store">
                    <div class="grid grid-cols-1 mt-6 gap-4">
                        <div class="">
                            <div class="text-xs font-medium text-gray-500 mb-1">Name</div>
                            <input wire:model="name" class="form-input text-sm leading-6" placeholder="Please input name" type="text">

                            @error('name')
                            <span class="text-xs text-red-500">(*{{$message}})</span>
                            @enderror

                        </div>
                        <div class="">
                            <div class="text-xs font-medium text-gray-500 mb-1">Email</div>
                            <input wire:model="email" class="form-input text-sm leading-6" placeholder="Please input email" type="email">
                            @error('email')
                            <span class="text-xs text-red-500">(*{{$message}})</span>
                            @enderror
                        </div>


                        @if ($success)
                            <div class="col-span-2 inline-flex w-full overflow-hidden bg-gray-100 shadow-sm">
                                <div class="flex items-center justify-center w-12 bg-green-500">
                                </div>
                                <div class="px-3 py-2 text-left w-full flex justify-between items-center">
                                    <div>
                                        <span class="font-semibold text-green-500">Success</span>
                                        <p class="mb-1 text-sm leading-none text-gray-500">{{$success}}</p>
                                    </div>
                                    <div class="">
                                        <span @click="showModal = !showModal" class="p-2 py-1 rounded text-green-500 text-sm bg-green-200 border border-green-300 cursor-pointer">OK</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>


                    <!-- Buttons -->
                    <div class="text-right space-x-5 mt-5">
                        <button type="button" @click="showModal = !showModal" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary" wire:click="load_submit">
                            Send <span wire:loading wire:target="load_submit"><div class="lds-hourglass"></div></span>
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
