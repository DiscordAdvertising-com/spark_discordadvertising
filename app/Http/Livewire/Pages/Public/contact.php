<?php

namespace App\Http\Livewire\Pages\Public;

use App\Models\Bot;
use App\Models\Tag;
use App\Models\BotTag;
use App\Models\Server;
use GuzzleHttp\Client;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Contact extends Component
{

    public $email;
    public $name;
    public $description;
    public $sent = false;

    public function render()
    {        
        return view('livewire.pages.public.contact')
        ->extends('layouts.app')
        ->section('content');
    }

    public function contact() {

        $client = new Client();

        $embed = (object)array();
        $embed->title = 'Name: '. $this->name .' | Email: '. $this->email  ?? 'No Info';
        $embed->description = 'Description: '.$this->description ?? 'No Description';
        $embed->color = hexdec('#00F700');

        $client->post('https://discord.com/api/v9/channels/1123608352837075066/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed]]]);

        $this->name = null;
        $this->email = null;
        $this->description = null;
        $this->sent = true;

    }

}
