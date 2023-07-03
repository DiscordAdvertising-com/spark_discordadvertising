<?php

namespace App\Http\Livewire\Pages\Public;

use App\Models\Bot;
use App\Models\Tag;
use App\Models\BotTag;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Home extends Component
{

    public function render()
    {        

        $latestBots = [];


        $latestBots = Bot::orderBy('created_at', 'DESC')->limit(4)->get();


        return view('livewire.pages.public.home', ['latest' => $latestBots])
        ->extends('layouts.app')
        ->section('content');
    }

}
