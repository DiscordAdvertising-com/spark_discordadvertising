<?php

namespace App\Http\Livewire\Pages\Public;

use App\Models\Bot;
use Livewire\Component;

class BotInfo extends Component
{

    public $botID;

    public function mount($botID) {
        $this->botID = $botID;
    }

    public function render()
    {
        return view('livewire.pages.public.bot-info', ['bot' => Bot::find($this->botID)])
        ->extends('layouts.app')
        ->section('content');
    }
}
