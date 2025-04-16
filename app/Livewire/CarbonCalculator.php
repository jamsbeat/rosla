<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class CarbonCalculator extends Component
{
    public $componentId = 'carbon';
    public $currentStep = 1;
    public $totalSteps = 4;

    #[Rule('required', message: 'Please select your home type.')]
    public $homeType = '';
    #[Rule('required|integer|min:1', message: 'Please enter the number of occupants (at least 1).')]
    public $occupants = null;
    #[Rule('required', message: 'Please select your primary heating fuel.')]
    public $heatingFuel = '';

    #[Rule('nullable|integer|min:0')]
    public $carMileage = 0;
    #[Rule('required_if:carMileage,>,0|numeric|min:1')]
    public $carEfficiency = null;
    #[Rule('required_if:carMileage,>,0')]
    public $carFuelType = '';
    #[Rule('nullable|integer|min:0')]
    public $busMilesWeekly = 0;
     #[Rule('nullable|integer|min:0')]
    public $trainMilesWeekly = 0;
    #[Rule('nullable|integer|min:0')]
    public $shortHaulFlights = 0;
    #[Rule('nullable|integer|min:0')]
    public $longHaulFlights = 0;

    #[Rule('required', message: 'Please select your typical diet.')]
    public $dietType = '';

    public $homeEmissions = 0;
    public $carEmissions = 0;
    public $publicTransportEmissions = 0;
    public $flightEmissions = 0;
    public $dietEmissions = 0;
    public $totalEmissions = -1;
    public $calculationError = null;

    const UK_GRID_INTENSITY = 0.212;
    const GAS_INTENSITY = 0.184;
    const OIL_INTENSITY = 0.247;
    const LPG_INTENSITY = 0.215;

    protected $avgEnergyConsumption = [
        'flat' => ['electricity' => 1800, 'gas' => 8000],
        'terraced' => ['electricity' => 2400, 'gas' => 12000],
        'semi_detached' => ['electricity' => 2900, 'gas' => 12000],
        'detached' => ['electricity' => 4300, 'gas' => 17000],
    ];

    const PETROL_LITRE_PER_MILE_FACTOR = 4.546;
    const PETROL_KGCO2E_PER_LITRE = 2.31;
    const DIESEL_KGCO2E_PER_LITRE = 2.68;
    const HYBRID_EFFICIENCY_FACTOR = 1.15;
    const EV_AVG_KWH_PER_MILE = 0.3;

    const BUS_KGCO2E_PER_MILE = 0.16;
    const TRAIN_KGCO2E_PER_MILE = 0.06;

    const SHORT_HAUL_RETURN_KGCO2E = 350;
    const LONG_HAUL_RETURN_KGCO2E = 1800;

    protected $dietFactors = [
        'high_meat' => 2500,
        'medium_meat' => 1900,
        'low_meat' => 1600,
        'pescatarian' => 1400,
        'vegetarian' => 1200,
        'vegan' => 900,
    ];

    public function render()
    {
        return view('livewire.carbon-calculator');
    }

    #[On('increment-{componentId}')]
    public function increment()
    {

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
            if ($this->currentStep === $this->totalSteps) {
                $this->calculate();
            } else {
                 $this->resetValidation();
                 $this->calculationError = null;
                 $this->totalEmissions = -1;
            }
        }
        $this->dispatch('stepChanged', step: $this->currentStep);
    }

    #[On('decrement-{componentId}')]
    public function decrement()
    {

        if ($this->currentStep > 1) {
            $this->currentStep--;
             $this->resetValidation();
             $this->calculationError = null;
             $this->totalEmissions = -1;
        }
         $this->dispatch('stepChanged', step: $this->currentStep);
    }

    #[On('calculate-{componentId}')]
    public function calculate($componentId = null)
    {
        if ($componentId && $componentId !== $this->componentId) return;


        $this->calculationError = null;
        $this->totalEmissions = 0;

        try {
            $this->homeEmissions = $this->calculateHomeEmissions();
            $this->carEmissions = $this->calculateCarEmissions();
            $this->publicTransportEmissions = $this->calculatePublicTransportEmissions();
            $this->flightEmissions = $this->calculateFlightEmissions();
            $this->dietEmissions = $this->calculateDietEmissions();
            $this->totalEmissions = $this->homeEmissions +
                                    $this->carEmissions +
                                    $this->publicTransportEmissions +
                                    $this->flightEmissions +
                                    $this->dietEmissions;

        } catch (\Exception $e) {
            $this->calculationError = "Could not complete calculation. Please check your inputs. Error: " . $e->getMessage();
            $this->totalEmissions = -1;
        }
    }

    private function calculateHomeEmissions()
    {
        if (empty($this->homeType) || empty($this->occupants) || $this->occupants <= 0 || empty($this->heatingFuel)) {
            return 0;
        }

        $avgElec = $this->avgEnergyConsumption[$this->homeType]['electricity'] ?? 2900;
        $avgGas = $this->avgEnergyConsumption[$this->homeType]['gas'] ?? 12000;

        $perPersonElecKwh = $avgElec / $this->occupants;
        $perPersonHeatingKwh = 0;
        $heatingEmissionFactor = 0;

        switch ($this->heatingFuel) {
            case 'gas':
                $perPersonHeatingKwh = $avgGas / $this->occupants;
                $heatingEmissionFactor = self::GAS_INTENSITY;
                break;
            case 'electricity':

                $perPersonElecKwh += ($avgGas / $this->occupants);
                break;
            case 'oil':
                $perPersonHeatingKwh = $avgGas / $this->occupants;
                $heatingEmissionFactor = self::OIL_INTENSITY;
                 break;
             case 'lpg':
                $perPersonHeatingKwh = $avgGas / $this->occupants;
                $heatingEmissionFactor = self::LPG_INTENSITY;
                 break;
            case 'heat_pump':
                $perPersonElecKwh += ($avgGas / $this->occupants) / 3;
                break;
            case 'other':
            default:
                 $perPersonHeatingKwh = $avgGas / $this->occupants;
                 $heatingEmissionFactor = self::GAS_INTENSITY;
                 break;
        }

        $elecEmissions = $perPersonElecKwh * self::UK_GRID_INTENSITY;
        $heatingEmissions = $perPersonHeatingKwh * $heatingEmissionFactor;

        return $elecEmissions + $heatingEmissions;
    }

    private function calculateCarEmissions()
    {
        if (empty($this->carMileage) || $this->carMileage <= 0 || empty($this->carEfficiency) || $this->carEfficiency <= 0 || empty($this->carFuelType)) {
            return 0;
        }

        $miles = (float) $this->carMileage;
        $efficiency = (float) $this->carEfficiency;
        $emissions = 0;

        switch ($this->carFuelType) {
            case 'petrol':
                $emissions = ($miles / $efficiency) * self::PETROL_LITRE_PER_MILE_FACTOR * self::PETROL_KGCO2E_PER_LITRE;
                break;
            case 'diesel':
                $emissions = ($miles / $efficiency) * self::PETROL_LITRE_PER_MILE_FACTOR * self::DIESEL_KGCO2E_PER_LITRE;
                 break;
            case 'hybrid':
                 $emissions = ($miles / $efficiency) * self::PETROL_LITRE_PER_MILE_FACTOR * self::PETROL_KGCO2E_PER_LITRE;
                 break;
            case 'electric':
                $kwhPerMile = $efficiency / 100;
                 if ($efficiency > 20) {
                     $kwhPerMile = self::EV_AVG_KWH_PER_MILE;
                 }
                 $totalKwh = $miles * $kwhPerMile;
                 $emissions = $totalKwh * self::UK_GRID_INTENSITY;
                 break;
        }
        return $emissions;
    }

    private function calculatePublicTransportEmissions()
    {
        $busMilesAnnual = ($this->busMilesWeekly ?? 0) * 52;
        $trainMilesAnnual = ($this->trainMilesWeekly ?? 0) * 52;

        $busEmissions = $busMilesAnnual * self::BUS_KGCO2E_PER_MILE;
        $trainEmissions = $trainMilesAnnual * self::TRAIN_KGCO2E_PER_MILE;

        return $busEmissions + $trainEmissions;
    }

     private function calculateFlightEmissions()
    {
        $shortHaul = ($this->shortHaulFlights ?? 0) * self::SHORT_HAUL_RETURN_KGCO2E;
        $longHaul = ($this->longHaulFlights ?? 0) * self::LONG_HAUL_RETURN_KGCO2E;
        return $shortHaul + $longHaul;
    }

    private function calculateDietEmissions()
    {
        return $this->dietFactors[$this->dietType] ?? 0;
    }
}