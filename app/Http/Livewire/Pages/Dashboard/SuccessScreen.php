<?php

namespace App\Http\Livewire\Pages\Dashboard;

use Livewire\Component;

class SuccessScreen extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard.success-screen');
    }

    public function redirectToList() {
        $this->emit('setPage', 'botList');
    }
}
