<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class AdminDashboard extends Component
{

    protected $listeners = ['setAdminPage' => 'setAdminPage'];

    public function mount($page = null) {
        Session::put('admin-page', $page);
    }
    
    public function render()
    {
        $page = Session::get('admin-page') ? Session::get('admin-page') : 'botList';
        $this->setAdminPage($page);
        return view('livewire.pages.admin-dashboard', ['page' => $page])
        ->extends('layouts.admin-dashboard.app')
        ->section('content');
    }

    public function setAdminPage($page) {
        if($page != 'dashboard') {
            $this->dispatchBrowserEvent('changeUrl', ['url' => '/admin-dashboard/'.$page]);
        } else {
            $this->dispatchBrowserEvent('changeUrl', ['url' => '/admin-dashboard']);
        }
        Session::put('admin-page', $page);
        $this->emit('flashSession');
    }
}
