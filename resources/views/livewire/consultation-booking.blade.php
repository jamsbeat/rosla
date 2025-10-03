    <div class="h-screen my-12">
        <div class="w-full bg-white shadow rounded p-4">
            @if($currentStep === 1)
                <div wire:key="step1">
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-gray-700">Select Consultation Type</h3>
                        @error('selectedService') <span class="text-red-500 text-xs italic mt-1">{{ $message }}</span> @enderror
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
                            @forelse($services as $service)
                            <div wire:key="service-{{ $service->id }}">
                                <button wire:click="selectService({{ $service->id }})" class="w-full text-left">
                                    <div
                                        class="cursor-pointer p-4 rounded-lg transition-all duration-200 ease-in-out hover:shadow-md {{ $selectedService == $service->id ? 'ring-2 ring-offset-2 ring-primary bg-primary/10' : 'border border-gray-200 hover:border-primary' }}"
                                    >
                                        <div class="flex flex-col items-center text-center">
                                            <div class="w-16 h-16 {{ $service->icon_bg_color ?? 'bg-gray-200' }} rounded-full flex items-center justify-center mb-3">
                                                <span class="text-2xl">{!! $service->icon !!}</span>
                                            </div>
                                            <h4 class="font-medium text-gray-800">{{ $service->name }}</h4>
                                            <div class="text-xs mt-1 text-center">{{ $service->description }}</div>
                                        </div>
                                    </div>
                                </button>
                            </div>
                            @empty
                                <p class="text-gray-500 md:col-span-3">No services available at this time.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endif

            @if($currentStep === 2)
            <div wire:key="step2" class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-700">Select Date and Time</h3>

                <div
                    wire:ignore
                    x-data="{
                        value: @entangle('scheduledAtInput'),
                        instance: null,
                        init() {
                            this.instance = flatpickr(this.$refs.input, {
                                enableTime: true,
                                dateFormat: 'Y-m-d H:i',
                                altInput: true,
                                altFormat: 'F j, Y h:i K',
                                minDate: '2025-05-01',
                                maxDate: '2025-08-31',
                                minTime: '07:00',
                                maxTime: '15:00',
                                time_24hr: false,
                                minuteIncrement: 15,
                                disable: [
                                    function(date) {
                                        return (date.getDay() === 0);
                                    }
                                ],
                                onChange: (selectedDates, dateStr, instance) => {
                                    if (selectedDates.length > 0) {
                                        this.value = instance.formatDate(selectedDates[0], 'Y-m-d H:i');
                                    } else {
                                        this.value = null;
                                    }
                                },
                                onReady: (selectedDates, dateStr, instance) => {
                                    if (this.value) {
                                        instance.setDate(this.value, false);
                                    }
                                }
                            });
                            this.$watch('value', (newValue) => {
                                if (!newValue) {
                                    this.instance.clear();
                                } else if (this.instance.selectedDates.length === 0 || this.instance.formatDate(this.instance.selectedDates[0], 'Y-m-d H:i') !== newValue) {
                                    this.instance.setDate(newValue, false);
                                }
                            });

                            this.$refs.input.addEventListener('livewire:navigating', () => {
                                if (this.instance) {
                                    this.instance.destroy();
                                    this.instance = null;
                                }
                            });
                        }
                    }"
                >
                    <label for="scheduled_at" class="block text-sm font-medium text-gray-700">Preferred Date & Time <span class="text-red-500">*</span></label>
                    <input
                        x-ref="input"
                        id="scheduled_at"
                        type="text"
                        class="mt-1 block w-full border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary @error('scheduledAtInput') border-red-500 @enderror"
                        placeholder="Select date and time..."
                        readonly
                    >
                </div>

                @error('scheduledAtInput') <span class="text-red-500 text-xs italic mt-1">{{ $message }}</span> @enderror

            </div>
            @endif

            @if($currentStep === 3)
            <div class="space-y-4" wire:key="step3">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Your Details</h3>

                <div class="flex flex-col gap-2">
                    <label for="address" class="text-sm font-medium text-gray-700">Address <span class="text-red-500">*</span></label>
                    <input wire:model="address" type="text" id="address" class="border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary @error('address') border-red-500 @enderror" placeholder="Your street address"/>
                    @error('address') <span class="text-red-500 text-xs italic mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="info" class="text-sm font-medium text-gray-700">Additional Information</label>
                    <textarea wire:model="info" id="info" rows="3" class="border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary @error('info') border-red-500 @enderror" placeholder="Anything else we should know? (Optional)"></textarea>
                    @error('info') <span class="text-red-500 text-xs italic mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <div wire:loading>
                <x-loading />
            </div>

            @endif

            <div class="mt-6 pt-4 border-t border-gray-200">
                <livewire:carbon-buttons :currentStep="$currentStep" :totalSteps="$totalSteps" :component-id="$componentId"/>
            </div>


        </div>

        <style>
            .flatpickr-calendar {
                background: #ffffff !important;
            }

            .flatpickr-day.selected,
            .flatpickr-day.selected:hover {
                background: #1DA44D !important;
                border-color: #1DA44D !important; /* Fixed missing value */
            }

            .flatpickr-day:hover {
                background: #D3D3D3 !important; /* Hover state - Light indigo */
                color: #ffffff !important; /* Hover state - White */
            }
        </style>
    </div>


    @script
    <script>
        $wire.on('success', () => {
            Swal.fire({
                title: "Booking Success!",
                html: "Your consultation was booked succesfully <br> Check your inbox for a confirmation email",
                icon: "success",
                customClass: {
                    confirmButton: 'bg-primary hover:bg-secondary text-white font-medium py-2 px-4 rounded-lg transition-all duration-100 focus:outline-none hover:ring-2 focus:ring-secondary focus:ring-offset-2'
                },
                buttonsStyling: false,
                footer: '@auth<a href="/profile">View Consultations</a>@endauth'
            });
        });

        $wire.on('fail', () => {
            Swal.fire({
                title: "This date/time is already taken",
                html: "Please secelect another date/time that is availiable",
                icon: "error",
                customClass: {
                    confirmButton: 'bg-primary hover:bg-secondary text-white font-medium py-2 px-4 rounded-lg transition-all duration-100 focus:outline-none hover:ring-2 focus:ring-secondary focus:ring-offset-2'
                },
                buttonsStyling: false,
            });
        });


    </script>
    @endscript
