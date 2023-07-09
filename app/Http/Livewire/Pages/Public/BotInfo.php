<?php

namespace App\Http\Livewire\Pages\Public;

use Exception;
use Carbon\Carbon;
use App\Models\Bot;
use App\Models\Vote;
use GuzzleHttp\Client;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BotInfo extends Component
{

    public $botID;

    public function mount($botID) {
        $this->botID = $botID;
        
        $bot = Bot::where(['id' => $this->botID])->first();

        $bot->tags()->create(['bot_id' => '783324614138658847', 'tag' => 'Moderation']);

        if(!$bot) {
            return redirect()->route('home');
        }

        if($bot->status != 'Accepted' && !Auth::user()->access) {
            return redirect()->route('home');
        }
    }

    public function render()
    {

        $time = null;
        $vote = null;

        try {

            $vote = Vote::where(['bot_id' => $this->botID, 'user_id' => (String) Auth::user()->id])->latest()->first();

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
                ->leftJoin('votes AS bu', 'b.id', '=', 'bu.bot_id')
                ->groupBy('b.id', 'b.username') // Include b.username in the GROUP BY clause
                ->orderBy('vote_count', 'DESC');
        }, 'ranked_bots')
        ->get();
        
        $rank = $result->search(function($r) {
            return $r->id === $this->botID;
        });

        return view('livewire.pages.public.bot-info', ['bot' => Bot::find($this->botID), 'time' => $time, 'rank' => $rank + 1])
        ->extends('layouts.app')
        ->section('content');        

    }

    public function updateStatus($status) {
        Bot::where(['id' => $this->botID])->update(['status' => $status]);
    }

    public function vote() {
        if(Auth::check()) {

            Vote::create(['user_id' => (String) Auth::user()->id, 'bot_id' => $this->botID]);
            redirect()->route('botInfo', ['botID' => $this->botID]);
            
        } else {

            Session::put('vote', $this->botID);
            redirect()->route('login');

        }
    }
}
