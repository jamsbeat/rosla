<div class="h-screen">
    <div class="w-full bg-white shadow rounded p-4">
        @if($currentStep === 1)
            <div class="justify-center items-center"
            wire:key="step1">
                <div class="p-4 min-w-1/2">
                    <label class="py-1 w-fit text-sm relative block">Kilowatt-hours used</label>
                    <input wire:model="kwh" type="number" step="0.01" class="p-1 w-1/2 border-primary border rounded-lg"
                    />
                    <span class="absolute bottom-[640px] left-[580px]">kWh</span>
                </div>
                <div class="p-4 min-w-1/2">
                    <label class="py-1 w-fit text-sm relative block">Electricity Provider</label>
                    <select wire:model.live="provider" class="p-1 rounded-lg">
                        <option>Select Provider</option>
                        <option value="octopus">Octopus Energy</option>
                        <option value="british">British Gas</option>
                        <option value="eon">E.ON</option>
                        <option value="scottish">Scottish Power</option>
                        <option value="sse">SSE</option>
                        <option value="ovo">OVO Energy</option>
                        <option value="shell">Shell Energy</option>
                    </select>
                </div>
                <div class="p-4 min-w-1/2">
                    <label class="py-1 w-fit text-sm relative block">Region</label>
                    <select wire:model="region" class="p-1 rounded-lg">
                        <option>Select Region</option>
                        <option value="london">London</option>
                        <option value="manchester">Manchester</option>
                        <option value="birmingham">Birmingham</option>
                        <option value="glasgow">Glasgow</option>
                        <option value="edinburgh">Edinburgh</option>
                        <option value="cardiff">Cardiff</option>
                        <option value="belfast">Belfast</option>
                        <option value="liverpool">Liverpool</option>
                        <option value="leeds">Leeds</option>
                        <option value="newcastle">Newcastle</option>
                        <option value="bristol">Bristol</option>
                    </select>
                </div>
            </div>
            <div>{{ $provider }}</div>
        @elseif($currentStep === 2)
        <div class="justify-center items-center"
        wire:key="step2">
            <div class="p-4 min-w-1/2">
                <label class="py-1 w-fit text-sm relative block"> Miles Driven </label>
                <input class="p-1 w-1/2 border-primary border rounded-lg"
                wire:model="mileage"
                />
            </div>
            <div class="p-4 min-w-1/2">
                <label class="py-1 w-fit text-sm relative block">Miles Per Gallon</label>
                <input class="p-1 w-1/2 border-primary border rounded-lg"
                wire:model="mpg"
                />
            </div>
            <div class="p-4 min-w-1/2">
                <label class="py-1 w-fit text-sm relative block">Fuel Type</label>
                <select wire:model.live="ftype" class="p-1 rounded-lg">
                    <option>Select Provider</option>
                    <option value="diesel">Diesel</option>
                    <option value="gas">Gasoline</option>
                    <option value="electric">Electric</option>
                </select>
            </div>
        </div>
        @elseif($currentStep === 3)
        <div class="justify-center items-center" wire:key="step3">
            @if($results > 0)
                <div class="mt-6 p-4 border rounded-lg">
                    <h2 class="text-xl font-bold">Your Carbon Footprint Results</h2>

                    <div class="mt-4 grid grid-cols-2 gap-4">
                        <div class="p-3 bg-gray-100 rounded-lg">
                            <h3 class="font-semibold">Electricity Emissions</h3>
                            <p class="text-xl">{{ number_format($electricityEmissions, 2) }} kg CO₂e</p>
                        </div>

                        <div class="p-3 bg-gray-100 rounded-lg">
                            <h3 class="font-semibold">Vehicle Emissions</h3>
                            <p class="text-xl">{{ number_format($viechleEmissions, 2) }} kg CO₂e</p>
                        </div>
                    </div>

                    <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                        <h3 class="font-semibold">Total Carbon Footprint</h3>
                        <p class="text-2xl font-bold">{{ number_format($results, 2) }} kg CO₂e</p>

                        @if($results < 1500)
                            <p class="mt-2 text-green-600">Excellent! Your carbon footprint is well below average.</p>
                        @elseif($results < 2300)
                            <p class="mt-2 text-green-500">Good! Your carbon footprint is better than average.</p>
                        @elseif($results < 3000)
                            <p class="mt-2 text-yellow-500">Average. This is typical for UK households.</p>
                        @elseif($results < 4500)
                            <p class="mt-2 text-orange-500">Above average. There are opportunities to reduce your emissions.</p>
                        @else
                            <p class="mt-2 text-red-500">Very high. Consider ways to significantly reduce your carbon footprint.</p>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        @endif

        <livewire:carbon-buttons :currentStep="$currentStep" :component-id="$componentId"/>
    </div>
</div>
