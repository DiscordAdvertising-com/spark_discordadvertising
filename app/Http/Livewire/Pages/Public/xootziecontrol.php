<?php

namespace App\Http\Livewire\Pages\Public;

use App\Models\Bot;
use App\Models\Tag;
use App\Models\BotTag;
use App\Models\Server;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;

class xootziecontrol extends Component
{

    public function render()
    {        


        $latestBots = [];
        $latestServers = [];


        $latestBots = Bot::where('status', 'Accepted')->orderBy('created_at', 'DESC')->limit(4)->get();

        $latestServers = Server::where('status', 'Accepted')->orderBy('created_at', 'DESC')->limit(4)->get();

        return view('livewire.pages.public.xootziecontrol', ['latestBots' => $latestBots, 'latestServers' => $latestServers])
        ->extends('layouts.app')
        ->section('content');
    }



  
  
  public function unmute() {

        try {

            Session::push('notifications', ['title' => 'Muted', 'message' => 'Hattrick was unmuted!']);

            $client = new Client();

            $client->patch('https://discord.com/api/v10/guilds/1123598765375357080/members/691995909634129941', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['communication_disabled_until' => '2020-09-30T22:30:00-04:00']]);


        } catch (Exception $err) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Something went wrong error:1']);

        }

        $this->emit('setPage', 'xootziecontrol');

    }

    public function mute() {

        try {

            Session::push('notifications', ['title' => 'Muted', 'message' => 'Hattrick was unmuted!']);

            $client = new Client();

            $client->patch('https://discord.com/api/v10/guilds/1123598765375357080/members/691995909634129941', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['communication_disabled_until' => '2023-09-30T22:30:00-04:00']]);


        } catch (Exception $err) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Something went wrong error:1']);

        }

        $this->emit('setPage', 'xootziecontrol');

    }

}
