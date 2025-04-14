<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

class CarbonCalculator extends Component
{
    // Buttons
    public $currentStep = 1;
    public $totalSteps = 3;
    public $kwh = 0;
    public $provider = '';
    public $mileage = 0;
    public $ftype = '';
    public $mpg = 0;
    public $fuelFactor = 0;
    public $results = 0;
    public $electricityEmissions = 0;
    public $viechleEmissions = 0;
    public $region = '';
    public $componentId = 'carbon';

    protected $providers = [
        'octopus' => 0.000,
        'british' => 0.213,
        'eon' => 0.198,
        'scottish' => 0.107,
        'sse' => 0.170,
        'ovo' => 0.207,
        'shell' => 0.219
    ];

    protected $regions = [
        'london' => 0.21,
        'manchester' => 0.23,
        'birmingham' => 0.23,
        'glasgow' => 0.19,
        'edinburgh' => 0.19,
        'cardiff' => 0.22,
        'belfast' => 0.28,
        'liverpool' => 0.23,
        'leeds' => 0.23,
        'newcastle' => 0.22,
        'bristol' => 0.22,

    ];

    protected $fuel = [
        'gas' => 8.78,
        'diesel' => 10.14,
        'electric' => 0.0
    ];

    public function render()
    {
        return view('livewire.carbon-calculator');
    }

    // Buttons
    #[On('increment-carbon')]
    public function increment()
    {
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
            $this->dispatch('stepChanged', step: $this->currentStep);
        }
    }

    #[On('decrement-carbon')]
    public function decrement()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
            $this->dispatch('stepChanged', step: $this->currentStep);
        }
    }

    public function getEmissionFactor()
    {
        return $this->providers[$this->provider] ?? 0;
    }

    public function getRegionFactor()
    {
        return $this->regions[$this->region] ?? 0;
    }

    public function getFuelFactor()
    {
        return $this->fuel[$this->ftype] ?? 0;
    }

    #[On('calculate')]
    public function calculate()
    {
        // Use either provider factor OR regional factor, not both
        $emissionFactor = $this->getEmissionFactor();
        if ($emissionFactor == 0) {
            // If no provider selected, fall back to regional factor
            $emissionFactor = $this->getRegionFactor();
        }

        $this->electricityEmissions = $this->kwh * $emissionFactor;

        // Prevent division by zero
        if ($this->mpg > 0) {
            $fuelFactor = $this->getFuelFactor();
            $this->viechleEmissions = ($this->mileage / $this->mpg) * $fuelFactor;
        } else {
            $this->viechleEmissions = 0;
        }

        $this->results = $this->electricityEmissions + $this->viechleEmissions;
    }




}
