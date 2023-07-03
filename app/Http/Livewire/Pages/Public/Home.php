<?php

namespace App\Http\Livewire\Pages\Public;

use App\Models\Bot;
use App\Models\Tag;
use App\Models\BotTag;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Home extends Component
{

    public $filter;

    public function render()
    {        

        $latestBots = [];

        if($this->filter != null) {

            $bs = DB::table('bots')
            ->join('bot_tags', 'bots.id', '=', 'bot_tags.bot_id')
            ->where('bot_tags.tag' , '=', $this->filter)
            ->select('*')
            ->orderBy('bots.created_at', 'DESC')
            ->limit(4)
            ->get();

            foreach($bs as $b) {
                $latestBots[] = (array)$b;
            }
                        
        } else {

            $latestBots = Bot::orderBy('created_at', 'DESC')->limit(4)->get();

        }

        return view('livewire.pages.public.home', ['bots' => Bot::all(), 'tags' => Tag::all(), 'latest' => $latestBots])
        ->extends('layouts.app')
        ->section('content');
    }

    public function filter($filter) {

        if($filter == 'all') {
            $this->filter = null;
        } else {
            $this->filter = $filter;
        }

    }
}
