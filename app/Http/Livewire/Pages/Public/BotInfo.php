<?php

namespace App\Http\Livewire\Pages\Public;

use App\Models\Bot;
use App\Models\Vote;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BotInfo extends Component
{

    public $botID;

    public function mount($botID) {
        $this->botID = $botID;
    }

    public function render()
    {

        $time = null;

        $vote = Vote::where(['bot_id' => $this->botID, 'user_id' => Auth::user()->id])->latest()->first();

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

        return view('livewire.pages.public.bot-info', ['bot' => Bot::find($this->botID), 'time' => $time])
        ->extends('layouts.app')
        ->section('content');
    }

    public function vote() {
        if(Auth::check()) {

            Vote::create(['user_id' => Auth::user()->id, 'bot_id' => $this->botID]);
            redirect()->route('botInfo', ['botID' => $this->botID]);
            
        } else {

            Session::put('vote', $this->botID);
            redirect()->route('login');

        }
    }
}
