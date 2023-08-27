<?php

namespace App\Http\Livewire\Pages\Public;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Vote;
use App\Models\Server;
use GuzzleHttp\Client;
use Livewire\Component;
use App\Mail\ServerStatus;
use App\Models\ServerVote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ServerInfo extends Component
{

    public $serverID;
    public $reason;

    public function mount($serverID) {
        $this->serverID = $serverID;
        
        $server = Server::where(['id' => $this->serverID])->first();

        if(!$server) {
            return redirect()->route('home');
        }

        if(($server->status != 'Accepted' && !Auth::check()) || ( $server->status != 'Accepted' && !Auth::user()->manageBots)) {
            return redirect()->route('home');
        }
    }

    public function render()
    {

        $time = null;
        $vote = null;

        try {

            $vote = ServerVote::where(['server_id' => $this->serverID, 'user_id' => (String) Auth::user()->id])->latest()->first();

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
            $query->select('b.id', 'b.name', DB::raw('COUNT(bu.server_id) AS vote_count'))
                ->from('servers AS b')
                ->leftJoin('server_votes AS bu', 'b.id', '=', 'bu.server_id')
                ->groupBy('b.id', 'b.name') // Include b.name in the GROUP BY clause
                ->orderBy('vote_count', 'DESC');
        }, 'ranked_servers')
        ->get();
        
        $rank = $result->search(function($r) {
            return $r->id === $this->serverID;
        });

        return view('livewire.pages.public.server-info', ['server' => Server::where(['id' => $this->serverID])->first(), 'time' => $time, 'rank' => $rank + 1])
        ->extends('layouts.app')
        ->section('content');        

    }

    public function updateStatus($status) {

        Server::where(['id' => $this->serverID])->update(['status' => $status]);
        $server = Server::where(['id' => $this->serverID])->first();

        $client = new Client();
        $embed = (object)array();

        if($status == "Rejected") {

            $embed->title = "Server Rejected";
            $embed->description = "**Server ID:** ".$server['id']."\n**Server Name:** ".$server['name']. "\n**Reviewer:** ".Auth::user()->username. "\n**Invite:** ".$server['invite']. "\n\n**Reason:** ".$this->reason;
            $embed->color = hexdec('#F70000');

        } else {

            $embed->title = "Server Accepted";
            $embed->description = "**Server ID:** ".$server['id']."\n**Server Name:** ".$server['name']. "\n**Reviewer:** ".Auth::user()->username. "\n**Invite:** ".$server['invite'];
            $embed->color = hexdec('#00F700');

        }

        $client->post('https://discord.com/api/v9/channels/1124325015630913576/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed]]]);

        $user = User::where(['id' => $server->author])->first();

        Mail::to($user->email)
        ->send(new ServerStatus($status, $server, $this->reason));

    }

    public function vote() {

        Session::put('vote', $this->serverID);
        if(Auth::check()) {

            ServerVote::create(['user_id' => (String) Auth::user()->id, 'server_id' => $this->serverID]);
            redirect()->route('serverInfo', ['serverID' => $this->serverID]);
            
        } else {

            redirect()->route('login');

        }
    }

    public function refreshServerData() {

        $client = new Client();
        $data = $client->get('https://discord.com/api/v8/guilds/'.$this->serverID, ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token')]]);
        $data = json_decode($data->getBody(), true);


        Server::where(['id' => $this->serverID])->update(['name' => $data['name'], 'icon' => $data['icon']]);

        Session::push('notifications', ['title' => 'Success', 'message' => 'Server has been refreshed']);
        $this->emit('flashSession');

    }
    
    
}
