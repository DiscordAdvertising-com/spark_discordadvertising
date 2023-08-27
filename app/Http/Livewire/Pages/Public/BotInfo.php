<?php

namespace App\Http\Livewire\Pages\Public;

use Exception;
use Carbon\Carbon;
use App\Models\Bot;
use App\Models\User;
use App\Models\Vote;
use GuzzleHttp\Client;
use App\Mail\BotStatus;
use App\Models\BotVote;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class BotInfo extends Component
{

    public $botID;
    public $botClientID;
    public $reason;

    public function mount($botID) {
        $this->botID = $botID;
        
        $bot = Bot::where(['id' => $this->botID])->first();

        if(!$bot) {
            return redirect()->route('home');
        }

        if(($bot->status != 'Accepted' && !Auth::check()) || ( $bot->status != 'Accepted' && !Auth::user()->manageBots)) {
            return redirect()->route('home');
        }
    }

    public function render()
    {

        $time = null;
        $vote = null;

        try {

            $vote = BotVote::where(['bot_id' => $this->botID, 'user_id' => (String) Auth::user()->id])->latest()->first();

            if($vote) {
                
                $twelveHourMark = strtotime($vote->created_at) + (12 * 60 * 60);
                $currentTimestamp = time();
                $remainingTime = max(0, $twelveHourMark - $currentTimestamp);
                
                $hours = floor($remainingTime / 3600);
                $minutes = floor(($remainingTime % 3600) / 60);
                $seconds = $remainingTime % 60;
                
                $time = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);        
    
                if(Carbon::parse($vote->created_at)->addHours(12) < Carbon::now()) {
                    $time = "00:00:00";
                }
    
            } else {
    
                $time = "00:00:00";
    
            }

        } catch (Exception $err) {

            $time = "00:00:00";

        }

        $result = DB::table(function ($query) {
            $query->select('b.id', 'b.username', DB::raw('COUNT(bu.bot_id) AS vote_count'))
                ->from('bots AS b')
                ->leftJoin('bot_votes AS bu', 'b.id', '=', 'bu.bot_id')
                ->groupBy('b.id', 'b.username') // Include b.username in the GROUP BY clause
                ->orderBy('vote_count', 'DESC');
        }, 'ranked_bots')
        ->get();
        
        $rank = $result->search(function($r) {
            return $r->id === $this->botID;
        });

        return view('livewire.pages.public.bot-info', ['bot' => Bot::where(['id' => $this->botID])->first(), 'time' => $time, 'rank' => $rank + 1])
        ->extends('layouts.app')
        ->section('content');        

    }

    public function updateStatus($status) {

        Bot::where(['id' => $this->botID])->update(['status' => $status]);
        $bot = Bot::where(['id' => $this->botID])->first();

        $client = new Client();
        $embed = (object)array();
        $findBot = Bot::find($this->botClientID);

        if($status == "Rejected") {

            $embed->title = "Bot Rejected";
            $embed->description = "**Application ID:** ".$bot['id']."\n**Bot Name:** ".$bot['username']. "\n**Reviewer:** ".Auth::user()->username. "\n\n**Reason:** ".$this->reason;
            $embed->color = hexdec('#F70000');

            $client->post('https://discord.com/api/v9/channels/1124325015630913576/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed]]]);


            $embed->title = "Bot Rejected";
            $embed->description = "**Application ID:** ".$bot['id']."\n**Bot Name:** ".$bot['username']. "\n\n**Reason:** *Reason undisclosed, see your email if your the bot owner* ";
            $embed->color = hexdec('#F70000');

            $client->post('https://discord.com/api/v9/channels/1126134459415134289/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed]]]);


        } else {

            $embed->title = "Bot Accepted";
            $embed->description = "**Application ID:** ".$bot['id']."\n**Bot Name:** ".$bot['username']. "\n**Reviewer:** ".Auth::user()->username;
            $embed->color = hexdec('#00F700');


            $client->post('https://discord.com/api/v9/channels/1124325015630913576/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed]]]);


            $embed->title = "Bot Accepted";
            $embed->description = "**Application ID:** ".$bot['id']."\n**Bot Name:** ".$bot['username'];
            $embed->color = hexdec('#00F700');

            $component = (object)array();
            $component->type = 1;
            $component->components = [(object)array()];
            $component->components[0]->type = 2;
            $component->components[0]->style = 5;
            $component->components[0]->label = "Bot Page";
            $component->components[0]->url = "https://discordadvertising.com/bot/".$bot['id'];

            $client->post('https://discord.com/api/v9/channels/1126134459415134289/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed], 'components' => [$component]]]);

        }

    
        $user = User::where(['id' => $bot->author])->first();

        Mail::to($user->email)
        ->send(new BotStatus($status, $bot, $this->reason));

    }

    public function vote() {

        Session::put('vote', $this->botID);
        if(Auth::check()) {

            BotVote::create(['user_id' => (String) Auth::user()->id, 'bot_id' => $this->botID]);
            redirect()->route('botInfo', ['botID' => $this->botID]);
            
        } else {

            redirect()->route('login');

        }
    }

    public function refreshBotData() {

        $client = new Client();
        $data = $client->get('https://discord.com/api/v8/users/'.$this->botID, ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token')]]);
        $data = json_decode($data->getBody(), true);


        Bot::where(['id' => $this->botID])->update(['username' => $data['username'], 'avatar' => $data['avatar'], 'discriminator' => $data['discriminator']]);

        Session::push('notifications', ['title' => 'Success', 'message' => 'Bot has been refreshed']);
        $this->emit('flashSession');

    }
    
    
}
