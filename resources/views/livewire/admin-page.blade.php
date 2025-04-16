<div>
    <input
        wire:model.live="search"
        type="search"
        placeholder="Search consultations..."
        class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary mb-4"
    />
    @if($consultations->count())
        @foreach($consultations as $consultation)
            <div class="p-4 border-b w-1/2">
                <div>
                    <div>ID: {{ $consultation->id }}</div>
                    <div>Service: {{ $consultation->service->name }}</div>
                    <div>Date: {{ $consultation->scheduled_at }}</div>
                    <div>Address: {{ $consultation->address }}</div>
                    <div>Info: {{ $consultation->info }}</div>
                <!-- Add more consultation details as needed -->
                </div>
                <div class="mt-2">
                    <button wire:click="deleteId({{ $consultation->id }})" class="text-red-500 hover:text-red-700 text-sm">Delete</button>
                </div>
                <div x-data="{ isOpen: false }">
                    <div x-on:click="isOpen = !isOpen" class="text-sm cursor-pointer text-primary">Contact Details</div>

                    <div x-cloak x-show="isOpen" @click.away="isOpen = false" x-transition class="absolute pt-2">
                        <div class="bg-white shadow-lg rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800">Contact Details</h4>
                            <p class="text-sm text-gray-600 mt-2">Name: {{ $consultation->user->name }}</p>
                            <p class="text-sm text-gray-600">Email: {{ $consultation->user->email }}</p>
                            <p class="text-sm text-gray-600">Phone: {{ $consultation->user->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="w-1/2 py-4">
            {{ $consultations->links(data: [
                'class' => 'bg-primary text-white',
                'active' => 'bg-primary-dark',
                'disabled' => 'bg-primary-light opacity-50'
            ]) }}
        </div>

    @else
        <p>No consultations found.</p>
    @endif

</style>

</div>


