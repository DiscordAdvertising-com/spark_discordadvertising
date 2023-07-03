<?php

namespace App\Http\Livewire;

use App\Models\Bot;
use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FilterSearch extends Component
{

    public $filter;

    public function render()
    {

        $searchBots = [];
        $totalSearchBots = [];

        if($this->filter != null) {

            $bs = DB::table('bots')
            ->join('bot_tags', 'bots.id', '=', 'bot_tags.bot_id')
            ->where('bot_tags.tag' , '=', $this->filter)
            ->select('*')
            ->orderBy('bots.created_at', 'DESC')
            ->limit(16)
            ->get();

            $bs2 = DB::table('bots')
            ->join('bot_tags', 'bots.id', '=', 'bot_tags.bot_id')
            ->where('bot_tags.tag' , '=', $this->filter)
            ->select('*')
            ->orderBy('bots.created_at', 'DESC')
            ->get();

            foreach($bs as $b) {
                $searchBots[] = (array)$b;
            }
              
            foreach($bs2 as $b2) {
                $totalSearchBots[] = (array)$b2;
            }

        } else {

            $searchBots = Bot::orderBy('created_at', 'DESC')->limit(16)->get();
            $totalSearchBots = Bot::orderBy('created_at', 'DESC')->get();

        }
        
        return view('livewire.filter-search',['bots' => Bot::all(), 'tags' => Tag::all(), 'search' => $searchBots, 'allSearch' => $totalSearchBots ]);
    }

    public function filter($filter) {

        if($filter == 'all') {
            $this->filter = null;
        } else {
            $this->filter = $filter;
        }

    }
    
}
