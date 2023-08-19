<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Dashboard extends Component
{

    protected $listeners = ['setPage' => 'setPage'];

    public function mount($page = null) {
        Session::put('page', $page);
    }

    public function render()
    {

        $page = Session::get('page') ? Session::get('page') : 'premium';

        return view('livewire.pages.dashboard',['page' => $page])
        ->extends('layouts.dashboard.app')
        ->section('content');
    }

    public function setPage($page) {
        if($page != 'dashboard') {
            $this->dispatchBrowserEvent('changeUrl', ['url' => '/dashboard/'.$page]);
        } else {
            $this->dispatchBrowserEvent('changeUrl', ['url' => '/dashboard']);
        }
        Session::put('page', $page);
        $this->emit('flashSession');
    }
}
