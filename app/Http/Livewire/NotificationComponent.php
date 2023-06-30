<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationComponent extends Component
{
    protected $listeners = ['flashSession' => 'render'];
    
    public function render()
    {
        $notifications = session('notifications', []);

        return view('livewire.notification-component', compact('notifications'));
    }
}
