<div>
    @if($consultations->isEmpty())
        <div class="flex flex-col justify-center items-center text-gray-600 text-center py-24">
            <div>
                You have no consultations at the moment.
            </div>
            <div>
                Click <a href="/consultations" class="text-primary">here</a> to book a new consultation.
            </div>
        </div>
    @endif
    <div class="flex-col px-2">
        @foreach($consultations as $consultation)
            <div class="inline-flex p-6 w-[400px] items-center rounded-lg shadow mt-12 mx-6">
                <div class="w-16 h-16 {{ $consultation->service->icon_bg_color ?? 'bg-gray-200' }} rounded-full flex items-center justify-center">
                    <span class="text-2xl flex justify-center items-center w-full h-full">{!! $consultation->service->icon !!}</span>
                </div>
                <div class="pl-4 py-1">
                    <div class="font-medium text-gray-800">{{ $consultation->service->name }}</div>
                    <div class="text-sm  mt-1 text-gray-600">{{ $consultation->scheduled_at }}</div>

                </div>
                <div x-data="{ isOpen: false }">
                    <div x-on:click="isOpen = !isOpen" class="text-sm pl-6 cursor-pointer text-primary">View Details</div>

                    <div x-cloak x-show="isOpen" @click.away="isOpen = false" x-transition class="absolute pt-2">
                        <div class="bg-white shadow-lg rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800">Details</h4>
                            <p class="text-sm text-gray-600 mt-2">Service: {{ $consultation->service->name }}</p>
                            <p class="text-sm text-gray-600">Date: {{ $consultation->scheduled_at }}</p>
                            <p class="text-sm text-gray-600">Address: {{ $consultation->address }}</p>
                            <p class="text-sm text-gray-600">Info: {{ $consultation->info }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
