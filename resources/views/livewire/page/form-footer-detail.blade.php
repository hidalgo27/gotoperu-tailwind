<div class="bg-gray-100 {{ $success ? 'py-12' : 'py-5 md:py-12' }} text-gray-700" id="form-dream-adventure" data-quote-form="detail" data-analytics-section="lead_form"
     x-data="{
         step: @entangle('step').defer,
         stepOneTracked: false,
         ctaSource: @entangle('ctaSource').defer,
         submitted: @entangle('success'),
         dateReadOnly: window.innerWidth < 768 || /iPhone|iPad|iPod/.test(navigator.userAgent),
         number: @entangle('values_number').defer,
         specified: @entangle('values_number_input').defer,
         preferredContact: @entangle('preferredContactMethod').defer,
         get travelers() {
             const value = Number(this.number === '6' ? this.specified : this.number);
             return Number.isInteger(value) && value > 0 ? value : null;
         },
         setTravelers(raw) {
             const text = String(raw).trim();
             if (text === '') {
                 this.number = null;
                 this.specified = null;
                 return;
             }
             if (!/^[0-9]+$/.test(text)) return;
             const value = Number(text);
             if (!Number.isSafeInteger(value) || value < 1) return;
             this.number = value >= 6 ? '6' : String(value);
             this.specified = value >= 6 ? String(value) : null;
         },
         changeTravelers(change) {
             this.setTravelers(Math.max(1, (this.travelers || 0) + change));
         },
         setPreferredContact(value, checked) {
             if (checked && value === 'No preference') {
                 this.preferredContact = ['No preference'];
                 return;
             }
             const selected = Object.values(this.preferredContact || {});
             this.preferredContact = ['WhatsApp', 'Email', 'Phone'].filter(method =>
                 method === value ? checked : selected.includes(method)
             );
         },
         init() {
             this.viewportResizeHandler = () => this.updateFloatingActions();
             this.viewportScrollHandler = () => this.updateFloatingActions();
             if (window.visualViewport) {
                 window.visualViewport.addEventListener('resize', this.viewportResizeHandler);
                 window.visualViewport.addEventListener('scroll', this.viewportScrollHandler);
             }
         },
         destroy() {
             this.clearFocusedField();
             if (window.visualViewport) {
                 window.visualViewport.removeEventListener('resize', this.viewportResizeHandler);
                 window.visualViewport.removeEventListener('scroll', this.viewportScrollHandler);
             }
         },
         rememberFocusedField(field) {
             if (window.innerWidth >= 768 || !field || field.readOnly
                 || !field.matches('textarea, input[type=text], input[type=email], input[type=tel]')) return;
             this.clearFocusedField();
             this.focusedField = field;
             if (window.visualViewport) {
                 this.fieldViewportHandler = () => {
                     cancelAnimationFrame(this.fieldVisibilityFrame);
                     this.fieldVisibilityFrame = requestAnimationFrame(() => {
                         this.fieldVisibilityFrame = requestAnimationFrame(() => this.keepFocusedFieldVisible());
                     });
                 };
                 window.visualViewport.addEventListener('resize', this.fieldViewportHandler);
                 window.visualViewport.addEventListener('scroll', this.fieldViewportHandler);
             } else {
                 this.fieldVisibilityTimer = setTimeout(() => this.keepFocusedFieldVisible(), 300);
             }
         },
         clearFocusedField(field = null) {
             if (field && field !== this.focusedField) return;
             clearTimeout(this.fieldVisibilityTimer);
             cancelAnimationFrame(this.fieldVisibilityFrame);
             if (window.visualViewport && this.fieldViewportHandler) {
                 window.visualViewport.removeEventListener('resize', this.fieldViewportHandler);
                 window.visualViewport.removeEventListener('scroll', this.fieldViewportHandler);
             }
             this.focusedField = null;
             this.fieldViewportHandler = null;
         },
         keepFocusedFieldVisible() {
             const field = this.focusedField;
             if (window.innerWidth >= 768 || !field || document.activeElement !== field || !field.isConnected) return;
             const viewport = window.visualViewport;
             const top = (viewport ? viewport.offsetTop : 0) + 16;
             const bottom = (viewport ? viewport.offsetTop + viewport.height : window.innerHeight) - 16;
             const bounds = field.getBoundingClientRect();
             if (bounds.top < top || bounds.bottom > bottom) {
                 const offset = bounds.top < top || bounds.height > bottom - top
                     ? bounds.top - top : bounds.bottom - bottom;
                 window.scrollBy({ top: offset, left: 0, behavior: 'auto' });
             }
         },
         updateFloatingActions() {
             const viewport = window.visualViewport;
             const top = viewport ? viewport.offsetTop : 0;
             const bottom = top + (viewport ? viewport.height : window.innerHeight);
             const hide = window.innerWidth < 768
                 && Array.from(document.querySelectorAll('[data-quote-form]')).some(form => {
                     const bounds = form.getBoundingClientRect();
                     return bounds.height > 0 && bounds.top < bottom && bounds.bottom > top;
                 });
             document.querySelectorAll('[data-quote-floating]').forEach(action => {
                 if (hide) action.style.setProperty('display', 'none', 'important');
                 else action.style.removeProperty('display');
             });
         },
         goToStep(value) {
             const completedStepOne = this.step === 1 && value === 2;
             this.step = value;
             if (completedStepOne && !this.stepOneTracked && window.GTPAnalytics) {
                 this.stepOneTracked = true;
                 window.GTPAnalytics.push('gtp_lead_step_1_complete', {
                     ...window.GTPAnalytics.pageContext(),
                     cta_source: this.ctaSource
                 });
             }
             this.$nextTick(() => this.$refs.stepHeading.focus());
         }
     }"
     x-effect="step; submitted; $nextTick(() => updateFloatingActions())"
     @scroll.window.throttle.100ms="updateFloatingActions()"
     @resize.window.debounce.100ms="dateReadOnly = window.innerWidth < 768 || /iPhone|iPad|iPod/.test(navigator.userAgent); updateFloatingActions()">
    <div class="container mx-auto">
        <div class="{{ $success ? 'w-11/12 max-w-6xl mx-auto' : 'quote-form-inner w-11/12 max-w-2xl mx-auto' }}">
            <div class="{{ $success ? 'quote-form-inner mx-auto text-center mb-6' : 'mb-4 text-center md:block md:mb-6' }}">
                <img src="{{ asset('images/logos/logo-ave.svg') }}" alt="GoToPeru" class="block mx-auto h-12 w-auto max-w-full mb-1 md:mb-4">
                @if(!$success)
                    <h2 class="text-lg text-center md:text-2xl md:text-center font-semibold text-tertiary">Request a Quote</h2>
                    <p class="mt-3 w-full bg-white px-2 py-2 text-center text-sm font-medium text-tertiary md:hidden">
                        {{ $paquete }}
                        @if($packageDuration)
                            <span class="font-normal text-gray-500">· {{ $packageDuration }} {{ __('message.pack_par4') }}</span>
                        @endif
                    </p>
                @endif
                <div class="text-left {{ $success ? 'mt-4 border border-gray-300 bg-white p-3' : 'hidden md:block w-full mt-2 md:mt-4 md:border md:border-gray-300 md:bg-white md:p-3' }}">
                    <p class="text-xs font-semibold text-primary">YOUR SELECTED TRIP</p>
                    <div class="{{ $success ? '' : 'block' }}">
                        <p class="font-semibold text-tertiary {{ $success ? 'text-sm mt-1' : 'min-w-0 text-base mt-1 md:text-sm' }}">{{ $paquete }}</p>
                        @if($packageDuration)
                            <p class="text-gray-500 {{ $success ? 'text-xs mt-1' : 'text-sm mt-1 md:text-xs' }}">{{ $packageDuration }} {{ __('message.pack_par4') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <form wire:submit.prevent="store" @submit.capture="if (step === 1) { $event.preventDefault(); $event.stopImmediatePropagation(); goToStep(2); }" data-analytics-form="quote" novalidate>
                <input type="hidden" wire:model="device" readonly>
                <input type="hidden" wire:model="browser" readonly>
                <div x-show="!submitted">
                    <div class="mb-4 md:mb-6" aria-label="Quote progress">
                        <div class="flex items-center justify-between gap-3 mb-2 md:mb-3">
                            <h3 class="text-base md:text-lg font-semibold text-tertiary focus:outline-none" tabindex="-1" x-ref="stepHeading"
                                x-text="step === 1 ? 'Your Trip' : 'Your Details'">Your Trip</h3>
                            <p class="text-sm text-gray-500" aria-live="polite">Step <span x-text="step">1</span> of 2</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2" aria-hidden="true">
                            <span class="h-1 bg-primary"></span>
                            <span class="h-1" :class="step === 2 ? 'bg-primary' : 'bg-gray-300'"></span>
                        </div>
                    </div>

                    <fieldset class="min-w-0" wire:loading.attr="disabled" wire:target="store">
                        <div x-show="step === 1" class="grid grid-cols-1 gap-4 md:block md:space-y-6">
                            <div>
                                <label for="datepicker" class="block text-sm font-semibold text-tertiary mb-2"><span class="md:hidden">Travel date</span><span class="hidden md:inline">When would you like to travel?</span></label>
                                <input id="datepicker" wire:model.lazy="travel_day" type="text" autocomplete="off"
                                       :readonly="dateReadOnly" :inputmode="dateReadOnly ? 'none' : null"
                                       class="quote-input bg-gray-50 border border-gray-400 p-3 md:p-5 text-gray-700 w-full focus:outline-none focus:border-primary"
                                       placeholder="Select a tentative date" aria-describedby="quote-date-help-detail quote-date-error-detail"
                                       aria-invalid="{{ $errors->has('travel_day') ? 'true' : 'false' }}">
                                <p id="quote-date-help-detail" class="hidden md:block text-xs text-gray-500 mt-2">Tentative date · Leave blank if you're not sure yet.</p>
                                @error('travel_day') <p id="quote-date-error-detail" class="text-sm text-red-500 mt-2" role="alert">{{ $message }}</p> @enderror
                            </div>

                            <fieldset class="min-w-0">
                                <legend class="text-sm font-semibold text-tertiary mb-1 md:mb-2 w-full md:w-auto">
                                    <span class="flex items-center justify-between gap-2">
                                        <span>Number of travelers</span>
                                        <button type="button" class="quote-action flex-shrink-0 px-2 text-xs md:hidden text-primary focus:outline-none focus:underline"
                                                :class="number === 'Undecided' ? 'font-semibold' : 'font-normal'"
                                                :aria-pressed="number === 'Undecided'"
                                                @click="number = number === 'Undecided' ? null : 'Undecided'; specified = null">
                                            Not sure yet
                                        </button>
                                    </span>
                                </legend>
                                <div class="block">
                                    <div class="min-w-0 flex items-center justify-between gap-2 md:gap-3 bg-gray-50 border border-gray-400 p-1 md:p-2">
                                        <button type="button" @click="changeTravelers(-1)" :disabled="travelers === null || travelers <= 1"
                                                class="quote-stepper-button flex items-center justify-center border border-gray-300 text-primary hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary"
                                                aria-label="Remove one traveler">
                                            <x-heroicon-o-minus class="w-5 h-5" aria-hidden="true" />
                                        </button>
                                        <input type="number" min="1" step="1" inputmode="numeric" autocomplete="off"
                                               class="quote-travelers-input min-w-0 flex-1 w-full bg-white border border-gray-300 px-2 text-center font-semibold text-tertiary focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary"
                                               aria-label="Number of travelers" :value="travelers === null ? '' : travelers"
                                               :placeholder="number === 'Undecided' ? 'Not sure yet' : 'Choose travelers'"
                                               @input="setTravelers($event.target.value); $event.target.value = travelers === null ? '' : travelers">
                                        <button type="button" @click="changeTravelers(1)"
                                                class="quote-stepper-button flex items-center justify-center border border-gray-300 text-primary hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary"
                                                aria-label="Add one traveler">
                                            <x-heroicon-o-plus class="w-5 h-5" aria-hidden="true" />
                                        </button>
                                    </div>
                                    <button type="button" class="quote-action hidden w-max max-w-full mx-auto mt-1 px-3 text-sm md:inline-block md:w-auto md:mx-0 md:mt-2 border text-primary focus:outline-none focus:ring-2 focus:ring-primary"
                                            :class="number === 'Undecided' ? 'border-primary bg-white' : 'border-transparent'"
                                            :aria-pressed="number === 'Undecided'"
                                            @click="number = number === 'Undecided' ? null : 'Undecided'; specified = null">
                                        Not sure yet
                                    </button>
                                </div>
                            </fieldset>


                            <fieldset class="min-w-0">
                                <legend class="text-sm font-semibold text-tertiary mb-2 md:mb-0">Hotel preference <span class="text-xs font-normal text-gray-500 md:hidden">· Optional</span></legend>
                                <p class="hidden md:block text-xs text-gray-500 mt-1 mb-3">Optional · Select one or more</p>
                                <div class="grid grid-cols-3 gap-0 border border-gray-300 divide-x divide-gray-300 md:gap-2 md:border-0 md:divide-x-0">
                                    @foreach(array_reverse($hotels, true) as $index => $hotel)
                                        <label class="relative cursor-pointer min-w-0" wire:key="quote-hotel-{{ $index }}">
                                            <input wire:model.defer="values_categories.{{ $index }}" type="checkbox" value="{{ $hotel['star'] }}" class="quote-choice-input sr-only">
                                            <span class="quote-choice quote-hotel !min-h-16 md:!min-h-12 flex flex-col items-center justify-center text-center gap-2 md:gap-1 md:border border-gray-300 bg-gray-50 px-1 py-4 md:py-5 md:px-3 text-primary hover:border-primary">
                                                <x-heroicon-o-check class="quote-choice-check !absolute top-0 right-0 mt-2 mr-2 hidden md:block w-4 h-4" aria-hidden="true" />
                                                <span class="text-sm font-semibold text-tertiary">{{ $hotel['category'] }}</span>
                                                <span class="quote-hotel-stars flex items-center justify-center text-secondary" role="img" aria-label="{{ $hotel['star'] }} stars">
                                                    @for($star = 0; $star < (int) $hotel['star']; $star++)
                                                        <x-heroicon-s-star class="w-3 h-3" aria-hidden="true" />
                                                    @endfor
                                                </span>
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </fieldset>

                            <button type="button" class="btn-secondary quote-action !min-h-14 md:!min-h-12 w-full" @click="goToStep(2)">
                                Continue <x-heroicon-o-arrow-right class="inline-block w-4 h-4 ml-2" aria-hidden="true" />
                            </button>
                        </div>

                        <div x-show="step === 2" x-cloak class="grid grid-cols-1 gap-4 md:block md:space-y-6" @focusin="rememberFocusedField($event.target)" @focusout="clearFocusedField($event.target)">
                            <div>
                                <label for="quote-name-detail" class="block text-sm font-semibold text-tertiary mb-2">Full name</label>
                                <input id="quote-name-detail" wire:model.defer="name" type="text" autocomplete="name"
                                       class="quote-input bg-gray-50 border border-gray-400 p-3 md:p-5 text-gray-700 w-full focus:outline-none focus:border-primary"
                                       aria-required="true" aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}" aria-describedby="quote-name-error-detail">
                                @error('name') <p id="quote-name-error-detail" class="text-sm text-red-500 mt-2" role="alert">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="quote-email-detail" class="block text-sm font-semibold text-tertiary mb-2">Email</label>
                                <input id="quote-email-detail" wire:model.defer="email" type="email" autocomplete="email" inputmode="email"
                                       class="quote-input bg-gray-50 border border-gray-400 p-3 md:p-5 text-gray-700 w-full focus:outline-none focus:border-primary"
                                       aria-required="true" aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" aria-describedby="quote-email-error-detail">
                                @error('email') <p id="quote-email-error-detail" class="text-sm text-red-500 mt-2" role="alert">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-tertiary mb-2">Phone / WhatsApp</label>
                                <div wire:ignore>
                                    <input wire:model.defer="phone" id="phone" type="tel" autocomplete="tel" inputmode="tel"
                                           class="quote-input phone_number bg-gray-50 border border-gray-400 p-3 md:p-5 text-gray-700 w-full focus:outline-none focus:border-primary"
                                           data-intl-tel-input aria-required="true" aria-describedby="quote-phone-error-detail">
                                    <input type="hidden" wire:model="country" id="country">
                                </div>
                                @error('phone') <p id="quote-phone-error-detail" class="text-sm text-red-500 mt-2" role="alert">{{ $message }}</p> @enderror
                            </div>
                            <fieldset class="min-w-0">
                                <legend class="text-sm font-semibold text-tertiary">How would you prefer us to contact you?</legend>
                                <p class="text-xs text-gray-500 mt-2 mb-3 md:mt-1">Optional</p>
                                <div class="grid grid-cols-2 gap-2 md:grid-cols-4">
                                    @foreach(['WhatsApp', 'Email', 'Phone', 'No preference'] as $contactMethod)
                                        <label class="relative cursor-pointer flex-auto min-w-12 md:min-w-0" wire:key="quote-contact-{{ $loop->index }}">
                                            <input type="checkbox" value="{{ $contactMethod }}" class="quote-choice-input sr-only"
                                                   x-effect="$el.checked = (preferredContact || []).includes($el.value)"
                                                   @change="setPreferredContact($event.target.value, $event.target.checked)">
                                            <span class="quote-choice flex items-center justify-center gap-2 text-center border border-gray-300 bg-gray-50 px-1 py-4 md:py-5 md:px-3 text-primary hover:border-primary">
                                                <span class="text-sm text-tertiary">{{ $contactMethod }}</span>
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('preferredContactMethod') <p class="text-sm text-red-500 mt-2" role="alert">{{ $message }}</p> @enderror
                            </fieldset>
                            <div>
                                <label for="quote-comment-detail" class="block text-sm font-semibold text-tertiary mb-2">Comments <span class="font-normal text-gray-500">· Optional</span></label>
                                <textarea id="quote-comment-detail" wire:model.defer="comment" rows="3"
                                          class="h-24 md:h-auto quote-input bg-gray-50 border border-gray-400 p-2 md:p-5 text-gray-700 w-full placeholder:text-sm placeholder:font-normal placeholder:text-gray-400 focus:outline-none focus:border-primary"
                                          placeholder="{{ __('message.form_footer_par9') }}"></textarea>
                                @error('comment') <p class="text-sm text-red-500 mt-2" role="alert">{{ $message }}</p> @enderror
                            </div>
                            <div class="space-y-1 md:space-y-2">
                                <button type="submit" class="btn-primary quote-action !min-h-14 md:!min-h-12 w-full" wire:loading.attr="disabled" wire:target="store">
                                    <span wire:loading.remove wire:target="store">Request My Quote</span>
                                    <span wire:loading wire:target="store" role="status">Sending your request…</span>
                                </button>
                                <button type="button" class="btn-prev quote-action w-full text-sm" @click="goToStep(1)">
                                    <x-heroicon-o-chevron-left class="inline-block w-4 h-4 mr-1" aria-hidden="true" /> Back
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </div>
                @error('api_error') <p class="text-sm text-red-500 mt-4" role="alert">{{ $message }}</p> @enderror
                @error('ctaSource') <p class="text-sm text-red-500 mt-4" role="alert">{{ $message }}</p> @enderror
                @if($success)
                    <div class="relative" role="status" aria-live="polite">
                        <div class="absolute inset-0 ml-3 mt-6 bg-gray-700" aria-hidden="true">
                            <div class="absolute inset-0 bg-line-cover opacity-10"></div>
                        </div>
                        <div class="relative">
                            <div class="relative z-10 min-w-0 border border-gray-300 bg-white p-5 md:p-8 text-left break-words md:w-2/3">
                                <span class="inline-flex items-center justify-center rounded-full bg-secondary p-2 mb-2">
                                    <x-heroicon-o-check class="w-6 h-6 text-white" aria-hidden="true" />
                                </span>
                                <h2 class="text-2xl font-semibold text-tertiary">Thank you, {{ $name }}!</h2>
                                <p class="text-sm text-gray-500 mt-2">We've received your quote request.</p>
                                <div class="mt-6">
                                    <h3 class="text-xs font-bold tracking-wider text-primary">WHAT HAPPENS NEXT?</h3>
                                    <p class="text-sm font-bold text-tertiary leading-snug mt-3">Our Peru travel experts will take it from here.</p>
                                    <ol class="mt-4 text-sm">
                                        <li class="flex items-start gap-3">
                                            <span class="flex items-center justify-center flex-shrink-0 w-6 h-6 rounded-full border border-gray-300 bg-gray-50 text-xs font-semibold text-primary" aria-hidden="true">1</span>
                                            <div class="min-w-0 flex-1">
                                                <h4 class="font-semibold text-tertiary">We review your request</h4>
                                                <p class="text-gray-500 mt-1">Our travel team will review the details you shared.</p>
                                            </div>
                                        </li>
                                        <li class="flex items-start gap-3 mt-4">
                                            <span class="flex items-center justify-center flex-shrink-0 w-6 h-6 rounded-full border border-gray-300 bg-gray-50 text-xs font-semibold text-primary" aria-hidden="true">2</span>
                                            <div class="min-w-0 flex-1">
                                                <h4 class="font-semibold text-tertiary">We prepare your proposal</h4>
                                                <p class="text-gray-500 mt-1">A GoToPeru travel advisor will work on your personalized quote.</p>
                                            </div>
                                        </li>
                                        <li class="flex items-start gap-3 mt-4">
                                            <span class="flex items-center justify-center flex-shrink-0 w-6 h-6 rounded-full border border-gray-300 bg-gray-50 text-xs font-semibold text-primary" aria-hidden="true">3</span>
                                            <div class="min-w-0 flex-1">
                                                <h4 class="font-semibold text-tertiary">We'll contact you</h4>
                                                <p class="text-gray-500 mt-1">
                                                    @switch(count($preferredContactMethod ?? []) === 1 ? $preferredContactMethod[0] : null)
                                                        @case('WhatsApp')
                                                            We'll reach out via WhatsApp using the number you provided.
                                                            @break
                                                        @case('Email')
                                                            We'll contact you using the email address you provided.
                                                            @break
                                                        @case('Phone')
                                                            A travel advisor will call you using the number you provided.
                                                            @break
                                                        @default
                                                            A travel advisor will contact you using the details you provided.
                                                    @endswitch
                                                </p>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                                <p class="text-xs text-gray-500 mt-4">Please also check your email for confirmation.</p>
                            </div>
                            <div class="relative ml-3 grid grid-cols-3 items-end md:contents md:static md:ml-0">
                                <div class="relative z-10 col-span-2 min-w-0 grid grid-cols-1 gap-3 md:flex md:items-center pl-4 pr-1 py-4 md:p-8 text-left text-gray-50 md:w-2/3">
                                    <p class="text-sm min-w-0">Want to talk to a travel advisor now?</p>
                                    <a href="https://api.whatsapp.com/send?phone=12024911478" target="_blank" rel="noopener"
                                       class="btn-secondary quote-action inline-flex items-center justify-center flex-shrink-0 max-w-full !px-0 text-center">
                                        <span class="inline-flex items-center gap-1 whitespace-nowrap px-1 text-tertiary md:block md:px-3 md:whitespace-normal">
                                            <span>Chat on WhatsApp</span>
                                            <span>→</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="relative self-stretch col-span-1 min-w-0 md:absolute right-0 bottom-0 flex items-end justify-center md:px-3 md:pt-6 md:w-4/12">
                                    <img src="{{ asset('images/team/samantha.png') }}" alt="GoToPeru travel team" class="absolute inset-0 block w-full h-full max-w-full object-contain object-bottom md:static md:w-full md:h-auto" width="436" height="577">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
<style>
    [data-quote-form] [x-cloak] { display: none !important; }
    [data-quote-form] .quote-form-inner { max-width: 42rem; }
    [data-quote-form] .quote-input { min-height: 3rem; font-size: 1rem; }
    [data-quote-form] .quote-step > * + * { margin-top: 1.5rem; }
    [data-quote-form] .quote-travelers-input { min-height: 3rem; font-size: 1rem; appearance: textfield; }
    [data-quote-form] .quote-travelers-input::-webkit-inner-spin-button,
    [data-quote-form] .quote-travelers-input::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
    [data-quote-form] .quote-stepper-button { width: 3rem; height: 3rem; flex-shrink: 0; }
    [data-quote-form] .quote-action, [data-quote-form] .quote-choice { min-height: 3rem; }
    [data-quote-form] .quote-choice { position: relative; }
    [data-quote-form] .quote-choice::before { content: ''; position: absolute; inset: 0; background: currentColor; opacity: 0; pointer-events: none; }
    [data-quote-form] .quote-choice > * { position: relative; }
    [data-quote-form] .quote-choice-input:checked + .quote-choice::before { opacity: .06; }
    [data-quote-form] .quote-hotel { height: 100%; }
    [data-quote-form] .quote-hotel-stars { gap: .0625rem; }
    [data-quote-form] .quote-hotel-stars svg { flex-shrink: 0; }
    @media (min-width: 768px) {
        [data-quote-form] .quote-hotel-stars svg { width: 1rem; height: 1rem; }
    }
    [data-quote-form] .quote-choice-check { opacity: 0; }
    [data-quote-form] .quote-choice-input:checked + .quote-choice { border-color: currentColor; box-shadow: inset 0 0 0 1px currentColor; }
    [data-quote-form] .quote-choice-input:checked + .quote-choice .quote-choice-check { opacity: 1; }
    [data-quote-form] .quote-choice-input:focus-visible + .quote-choice { outline: 2px solid currentColor; outline-offset: 2px; }
    [data-quote-form] button:disabled { opacity: .5; cursor: default; }
</style>
@push('scripts')

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            if (window.GTPAnalytics) {
                @this.set('firstTouch', window.GTPAnalytics.getFirstTouch(), true);
            }
            // Bind attribution to this rendered Livewire instance; keep the existing anchor/scroll behavior.
            document.addEventListener('click', function (event) {
                if (!(event.target instanceof Element)) return;
                const cta = event.target.closest('a[href="#form-dream-adventure"]');
                if (!cta) return;
                const source = ['hero', 'rail', 'final', 'form'].includes(cta.dataset.quoteSource)
                    ? cta.dataset.quoteSource : 'form';
                @this.set('ctaSource', source, true);
            });

            const formRoot = document.querySelector('[data-quote-form="detail"]');
            let input = formRoot.querySelector('[data-intl-tel-input]');
            let countryInput = formRoot.querySelector('#country');

            const iti = window.intlTelInput(input, {
                initialCountry: "auto",
                separateDialCode: true,
                autoHideDialCode: false,
                nationalMode: false,
                geoIpLookup: function (callback) {
                    fetch('https://ipinfo.io/json')
                        .then(response => response.json())
                        .then(data => {
                            const countryCode = data.country ? data.country : "US";
                            callback(countryCode);

                            // Forzar la actualización del país y código telefónico
                            setTimeout(() => {
                                let countryData = iti.getSelectedCountryData();
                                let countryDialCode = countryData.dialCode ? `+${countryData.dialCode}` : '';
                                let phoneCountry = `${countryCode} ${countryDialCode}`;
                                let countryName = extractCountryName(countryData.name);

                                // Actualizar los valores
                            @this.set('phonecountry', phoneCountry);
                            @this.set('country', countryName);
                                countryInput.value = countryName;
                            }, 500); // Esperar medio segundo para asegurarnos de que `intlTelInput` haya actualizado los datos
                        })
                        .catch(() => {
                            callback("US");
                        });
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js?1613236686837",
            });

            // Evento `blur` para actualizar los datos cuando el input pierde el foco
            input.addEventListener('blur', function () {
                let countryData = iti.getSelectedCountryData();
                let countryName = extractCountryName(countryData.name);
                let countryDialCode = countryData.dialCode ? `+${countryData.dialCode}` : '';
                let phoneCountry = `${countryData.iso2.toUpperCase()} ${countryDialCode}`;

                // Actualizar los valores
            @this.set('phone', this.value);
            @this.set('phonecountry', phoneCountry);
            @this.set('country', countryName);
                countryInput.value = countryName;
            });

            /**
             * Extrae solo el nombre del país en inglés (sin el nombre local en paréntesis).
             * @param {string} fullCountryName - Nombre completo del país (ej. "Peru (Perú)").
             * @returns {string}
             */
            function extractCountryName(fullCountryName) {
                return fullCountryName.replace(/\s?\(.*?\)/, '');
            }
        });


        (() => {
            const formRoot = document.querySelector('[data-quote-form="detail"]');
            const componentId = formRoot.getAttribute('wire:id');
            let closeAfterSelection = false;
            const closeSelectedCalendar = () => {
                if (!closeAfterSelection) return;
                picker.hide();
                const field = document.querySelector('[data-quote-form="detail"] #datepicker');
                if (field) field.blur();
            };
            const picker = new Pikaday({
                field: formRoot.querySelector('#datepicker'),
                minDate: new Date(),
                onSelect: function() {
                    if (window.innerWidth >= 768 && !/iPhone|iPad|iPod/.test(navigator.userAgent)) return;
                    // Pikaday has already updated the value and emitted its change event.
                    @this.set('travel_day', this.toString(), true);
                    closeAfterSelection = true;
                    requestAnimationFrame(closeSelectedCalendar);
                }
            });
            formRoot.addEventListener('pointerdown', event => {
                if (event.target.matches('#datepicker')) closeAfterSelection = false;
            });
            // Close again after Livewire morphs the field; a new user tap can reopen it.
            window.Livewire.hook('message.processed', (message, component) => {
                if (component.id === componentId && closeAfterSelection) {
                    requestAnimationFrame(closeSelectedCalendar);
                }
            });
        })();
    </script>

@endpush
