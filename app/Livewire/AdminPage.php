<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Consultation;
use Livewire\WithPagination;

class AdminPage extends Component
{
    use WithPagination;

    public $search = '';


    public function updatingSearch()
    {

        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin-page', [
            'consultations' => Consultation::where('scheduled_at', 'like', '%' . $this->search . '%')
                ->orWhere('address', 'like', '%' . $this->search . '%')
                ->paginate(5)
        ]);
    }
}
