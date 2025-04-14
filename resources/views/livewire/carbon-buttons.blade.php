<div>
    <div class="flex justify-between px-2 w-full pt-8">
        <button wire:click="decrement" class="px-3 py-1 rounded-lg border {{ $this->getPrevButtonClass() }}">Back</button>
        @if($this->currentStep !== $this->totalSteps)
        <button wire:click="increment" class="px-3 py-1 rounded-lg border {{ $this->getNextButtonClass() }}">Next</button>
        @endif

        @if($this->currentStep === $this->totalSteps)
            @if($this->componentId === 'consultation')
                <button wire:click="saveRequest" class="px-3 py-1 bg-primary text-white rounded-lg">
                    <span>Submit</span>
                </button>
            @elseif($this->componentId === 'carbon')
                <button wire:click="calculate" class="px-3 py-1 bg-primary text-white rounded-lg">Calculate</button>
            @endif
        @endif
    </div>
</div>
