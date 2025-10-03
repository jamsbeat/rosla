<div class="h-screen">
    <div class="w-full max-w-2xl mx-auto bg-white shadow rounded p-6 my-8">

        @if($currentStep === 1)
            <div wire:key="step1">
                <h2 class="text-lg font-semibold mb-4">Step 1: Home Energy</h2>
                <p class="text-sm text-gray-600 mb-4">Estimate your share of household energy use.</p>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">What type of home do you live in?</label>
                    <select wire:model.live="homeType" class="w-full border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary">
                        <option value="">Select Home Type</option>
                        <option value="flat">Flat / Apartment</option>
                        <option value="terraced">Terraced House</option>
                        <option value="semi_detached">Semi-detached House</option>
                        <option value="detached">Detached House</option>
                    </select>
                    @error('homeType') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">How many people live in your household (including you)?</label>
                    <input wire:model.live="occupants" type="number" min="1" step="1" class="w-full border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary" placeholder="e.g., 2">
                    @error('occupants') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">What is your home's primary heating fuel?</label>
                    <select wire:model.live="heatingFuel" class="w-full border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary">
                        <option value="">Select Fuel Type</option>
                        <option value="gas">Natural Gas</option>
                        <option value="electricity">Electricity (Storage Heaters, etc.)</option>
                        <option value="oil">Heating Oil</option>
                        <option value="lpg">LPG</option>
                        <option value="heat_pump">Heat Pump (Air or Ground Source)</option>
                        <option value="other">Other / Don't Know</option>
                    </select>
                    @error('heatingFuel') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

        @elseif($currentStep === 2)
            <div wire:key="step2">
                <h2 class="text-lg font-semibold mb-4">Step 2: Travel</h2>
                <p class="text-sm text-gray-600 mb-4">Estimate your annual travel emissions.</p>

                <fieldset class="border border-primary p-4 rounded-lg mb-4">
                    <legend class="text-md font-medium text-gray-800 px-2">Car Travel (Optional)</legend>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Approximate Annual Mileage Driven?</label>
                        <input wire:model.live="carMileage" type="number" step="100" class="w-full border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary" placeholder="e.g., 8000">
                        <span class="text-xs text-gray-500">Leave blank or 0 if you don't drive.</span>
                        @error('carMileage') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    @if($carMileage > 0)
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Car's Fuel Efficiency (Miles Per Gallon or kWh/100 miles)?</label>
                            <input wire:model.live="carEfficiency" type="number" step="1" class="w-full border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary" placeholder="e.g., 45 MPG or 30 kWh/100 miles">
                            @error('carEfficiency') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Car's Fuel Type?</label>
                            <select wire:model.live="carFuelType" class="w-full border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary">
                                <option value="">Select Fuel Type</option>
                                <option value="petrol">Petrol</option>
                                <option value="diesel">Diesel</option>
                                <option value="hybrid">Hybrid</option>
                                <option value="electric">Electric (EV)</option>
                            </select>
                            @error('carFuelType') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    @endif
                </fieldset>

                <fieldset class="border border-primary p-4 rounded-lg mb-4">
                    <legend class="text-md font-medium text-gray-800 px-2">Public Transport</legend>
                    <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Approximate weekly mileage on Buses?</label>
                    <input wire:model.live="busMilesWeekly" type="number" step="1" class="w-full border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary" placeholder="e.g., 20">
                        @error('busMilesWeekly') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Approximate weekly mileage on Trains?</label>
                    <input wire:model.live="trainMilesWeekly" type="number" step="1" class="w-full border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary" placeholder="e.g., 50">
                        @error('trainMilesWeekly') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </fieldset>

                {{-- Flights --}}
                <fieldset class="border border-primary p-4 rounded-lg mb-4">
                    <legend class="text-md font-medium text-gray-800 px-2">Flights (Annually)</legend>
                    <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Number of short-haul return flights per year?</label>
                    <input wire:model.live="shortHaulFlights" type="number" step="1" min="0" class="w-full border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary" placeholder="e.g., 2">
                    <span class="text-xs text-gray-500">Within UK/Europe, < 3 hours</span>
                        @error('shortHaulFlights') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Number of long-haul return flights per year?</label>
                    <input wire:model.live="longHaulFlights" type="number" step="1" min="0" class="w-full border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary" placeholder="e.g., 1">
                    <span class="text-xs text-gray-500">Intercontinental, > 3 hours</span>
                    @error('longHaulFlights') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </fieldset>
            </div>

        @elseif($currentStep === 3)
            <div wire:key="step3">
                <h2 class="text-lg font-semibold mb-4">Step 3: Diet</h2>
                <p class="text-sm text-gray-600 mb-4">Estimate the impact of your typical diet.</p>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">How often do you typically eat meat (beef, lamb, pork, poultry) or fish?</label>
                    <select wire:model.live="dietType" class="w-full border border-primary rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary">
                        <option value="">Select Frequency</option>
                        <option value="high_meat">Most days (High Meat)</option>
                        <option value="medium_meat">A few times a week (Medium Meat)</option>
                        <option value="low_meat">Rarely (Low Meat / Flexitarian)</option>
                        <option value="pescatarian">Fish only, no other meat (Pescatarian)</option>
                        <option value="vegetarian">No meat or fish (Vegetarian)</option>
                        <option value="vegan">No animal products (Vegan)</option>
                    </select>
                    @error('dietType') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

        @elseif($currentStep === 4)
            <div wire:key="step4">
                <h2 class="text-xl font-bold mb-4">Your Estimated Annual Carbon Footprint</h2>

                @if($calculationError)
                    <div class="p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg mb-4">
                        <p><strong>Calculation Error:</strong> {{ $calculationError }}</p>
                        <p>Please go back and ensure all required fields are filled correctly.</p>
                    </div>
                @elseif($totalEmissions >= 0)
                    <div class="space-y-4">
                        <div class="p-4 bg-gray-100 rounded-lg">
                            <h3 class="font-semibold text-lg mb-2">Breakdown (kg CO₂e per year):</h3>
                            <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-2">
                                <div class="flex justify-between py-1 border-b">
                                    <dt class="text-sm font-medium text-gray-600">Home Energy:</dt>
                                    <dd class="text-sm font-semibold text-gray-900">{{ number_format($homeEmissions, 0) }}</dd>
                                </div>
                                <div class="flex justify-between py-1 border-b">
                                    <dt class="text-sm font-medium text-gray-600">Car Travel:</dt>
                                    <dd class="text-sm font-semibold text-gray-900">{{ number_format($carEmissions, 0) }}</dd>
                                </div>
                                <div class="flex justify-between py-1 border-b">
                                    <dt class="text-sm font-medium text-gray-600">Flights:</dt>
                                    <dd class="text-sm font-semibold text-gray-900">{{ number_format($flightEmissions, 0) }}</dd>
                                </div>
                                <div class="flex justify-between py-1 border-b">
                                    <dt class="text-sm font-medium text-gray-600">Public Transport:</dt>
                                    <dd class="text-sm font-semibold text-gray-900">{{ number_format($publicTransportEmissions, 0) }}</dd>
                                </div>
                                <div class="flex justify-between py-1 border-b">
                                    <dt class="text-sm font-medium text-gray-600">Diet:</dt>
                                    <dd class="text-sm font-semibold text-gray-900">{{ number_format($dietEmissions, 0) }}</dd>
                                </div>
                            </dl>
                        </div>

                        {{-- Total --}}
                        @if($totalEmissions > 0)
                        <div class="p-6 bg-blue-50 rounded-lg text-center">
                            <h3 class="text-sm font-medium text-blue-800 uppercase tracking-wide">Total Estimated Footprint</h3>
                            <p class="mt-1 text-4xl font-bold text-blue-900">{{ number_format($totalEmissions / 1000, 1) }} tonnes CO₂e</p>
                            <p class="text-lg font-medium text-blue-900">({{ number_format($totalEmissions, 0) }} kg CO₂e)</p>
                            @php
                                $ukAverageIndividual = 5500;
                            @endphp
                            <p class="mt-4 text-sm text-gray-600">
                                For context, the average UK individual's consumption footprint is around {{ number_format($ukAverageIndividual / 1000, 1) }} tonnes CO₂e per year.
                            </p>

                            <div class="mt-4 text-sm">
                                @if($totalEmissions < $ukAverageIndividual * 0.7)
                                    <p class="text-green-700 font-semibold">Excellent! Your estimated footprint is significantly lower than the UK average.</p>
                                @elseif($totalEmissions < $ukAverageIndividual * 0.9)
                                    <p class="text-green-600 font-semibold">Good! Your estimated footprint is below the UK average.</p>
                                @elseif($totalEmissions <= $ukAverageIndividual * 1.1)
                                    <p class="text-yellow-600 font-semibold">Your estimated footprint is around the UK average.</p>
                                @elseif($totalEmissions <= $ukAverageIndividual * 1.5)
                                    <p class="text-orange-600 font-semibold">Your estimated footprint is above the UK average. Consider areas for reduction.</p>
                                @else
                                    <p class="text-red-600 font-semibold">Your estimated footprint is significantly higher than the UK average. Focus on high-impact areas like travel and diet.</p>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>

                @else
                    <div class="p-4 bg-yellow-100 text-yellow-700 border border-yellow-300 rounded-lg">
                        <p>Complete the previous steps to calculate your footprint.</p>
                    </div>
                @endif
            </div>
        @endif

        <livewire:carbon-buttons :currentStep="$currentStep" :totalSteps="$totalSteps" :component-id="$componentId" />

    </div>  
</div>