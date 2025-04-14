<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class CarbonButtons extends Component
{
    public $currentStep;
    public $totalSteps = 3;
    public $componentId;

    public function mount($currentStep, $componentId, $totalSteps = 3)
    {
        $this->currentStep = $currentStep;
        $this->componentId = $componentId;
        $this->totalSteps = $totalSteps;
    }

    public function render()
    {
        return view('livewire.carbon-buttons');
    }

    #[On('stepChanged')]
    public function updateStep($step)
    {
        $this->currentStep = $step;
    }

    public function increment()
    {
        $this->dispatch("increment-{$this->componentId}");
    }

    public function decrement()
    {
        $this->dispatch("decrement-{$this->componentId}");
    }

    public function getNextButtonClass()
    {
        return $this->currentStep === $this->totalSteps
            ? 'border-gray-500 cursor-not-allowed'
            : 'border-primary';
    }

    public function getPrevButtonClass()
    {
        return $this->currentStep === 1
            ? 'border-gray-300 cursor-not-allowed'
            : 'border-primary';
    }

    public function calculate()
    {
        $this->dispatch('calculate');
    }

    public function saveRequest()
    {
        $this->dispatch('saveRequest');
    }
}