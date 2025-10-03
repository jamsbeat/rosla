<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Consultation;

class ProfilePage extends Component
{
    public function mount()
    {

    }

    public function render()
    {
        $userId = Auth::id();
        $consultations = Consultation::where('user_id', $userId)->latest()->paginate();

        return view('livewire.profile-page', [
            'consultations' => $consultations,
        ]);
    }

    public function deleteId($id)
    {
        Consultation::find($id)->delete();
        $this->mount();
    }

}
