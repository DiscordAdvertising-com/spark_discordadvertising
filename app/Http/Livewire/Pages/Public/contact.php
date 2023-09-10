<?php

namespace App\Http\Livewire\Pages\Public;

use App\Models\Bot;
use App\Models\Tag;
use App\Models\BotTag;
use App\Models\Server;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class contact extends Component
{

    public function render()
    {        

        $latestBots = [];
        $latestServers = [];


        $latestBots = Bot::where('status', 'Accepted')->orderBy('created_at', 'DESC')->limit(4)->get();

        $latestServers = Server::where('status', 'Accepted')->orderBy('created_at', 'DESC')->limit(4)->get();

        return view('livewire.pages.public.contact', ['latestBots' => $latestBots, 'latestServers' => $latestServers])
        ->extends('layouts.app')
        ->section('content');
    }

}
