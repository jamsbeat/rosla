<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Consultation;
use App\Models\Service;
use App\Models\UserDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConsultationBooked;
use App\Models\User;

class ConsultationBooking extends Component
{
    public $currentStep = 1;
    public $totalSteps = 3;
    public $componentId = 'consultation';

    public $user;

    public $services;
    public $selectedService = null;

    public $scheduledAtInput = null;
    public $scheduledAt = null;

    public $address = '';
    public $info = '';

    protected function rules()
    {
        return [
            'selectedService' => 'required|integer|exists:services,id',

            'scheduledAtInput' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    try {
                        $dateTime = Carbon::parse($value);

                        // 1. Check Date Range
                        $minDate = Carbon::create(2025, 5, 1)->startOfDay();
                        $maxDate = Carbon::create(2025, 8, 31)->endOfDay();
                        if (!$dateTime->between($minDate, $maxDate)) {
                            $fail('Please select a date between May 1st, 2025 and August 31st, 2025.');
                            return;
                        }

                        // 2. Check Day of Week (Sunday = 0)
                        if ($dateTime->dayOfWeek === Carbon::SUNDAY) {
                            $fail('Consultations are not available on Sundays.');
                            return;
                        }

                        // 3. Check Time Range (7:00 AM to 3:00 PM / 15:00)
                        $timeOnly = $dateTime->format('H:i');
                        if ($timeOnly < '07:00' || $timeOnly > '15:00') {
                             // Be careful with the upper bound - > 15:00 means 15:01 onwards is invalid.
                             // If 15:00 exactly is allowed, this is correct. If only up to 14:59, use >= '15:00'.
                             // Flatpickr's maxTime usually handles this, but server validation is crucial.
                            $fail('Please select a time between 7:00 AM and 3:00 PM.');
                            return;
                        }

                        $isBooked = Consultation::where('scheduled_at', $dateTime->format('Y-m-d H:i:s'))
                                                ->exists();
                        if ($isBooked) {
                            $fail('This date and time slot is already booked. Please choose another.');
                            $this->dispatch('fail');
                            return;
                        }

                        // If all checks pass, store the validated Carbon instance
                        $this->scheduledAt = $dateTime;

                    } catch (\Exception $e) {
                        // Handle parsing errors
                        $fail('The selected date and time format is invalid.');
                    }
                }
            ],

            'address' => 'required|string|max:255',
            'info' => 'nullable|string|max:500',
        ];
    }

    public function mount()
    {
        $this->services = Service::all();
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.consultation-booking');
    }

    #[On('increment-consultation')]
    public function increment()
    {
        try {
            $this->validateStep($this->currentStep);
        } catch (ValidationException $e) {
            return;
        }

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
            $this->dispatch('stepChanged', step: $this->currentStep);
        } else {
             $this->saveRequest();
        }
    }

    #[On('decrement-consultation')]
    public function decrement()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
            $this->dispatch('stepChanged', step: $this->currentStep);
        }
    }

    public function selectService($serviceId)
    {
        $this->selectedService = (int)$serviceId;
        $this->resetValidation('selectedService');
    }

    public function validateStep(int $step)
    {
        if ($step === 1) {
            $this->validateOnly('selectedService');
        } elseif ($step === 2) {
            $this->validateOnly('scheduledAtInput');
        } elseif ($step === 3) {
            $this->validateOnly('address');
            $this->validateOnly('info');
        } else {
            throw new \InvalidArgumentException("Invalid step: {$step}");
        }
    }

    #[On('saveRequest')]
    public function saveRequest()
    {
        $validatedData = $this->validate([
            'selectedService' => $this->rules()['selectedService'],
            'scheduledAtInput' => $this->rules()['scheduledAtInput'],
            'address' => $this->rules()['address'],
            'info' => $this->rules()['info'],
        ]);

        DB::transaction(function () use ($validatedData) {

            $consultation = Consultation::create([
                'user_id' => Auth::user()->id,
                'service_id' => $validatedData['selectedService'],
                'address' => $validatedData['address'],
                'info' => $validatedData['info'] ?? null,
                'scheduled_at' => $this->scheduledAt,
            ]);

            Mail::to($this->user)->queue(
                new ConsultationBooked($this->user)
            );

            sleep(1);

            $this->resetExcept('services');
            $this->currentStep = 1;
            $this->dispatch('stepChanged', step: $this->currentStep);

            $this->dispatch('success');
        });
    }
}