<?php

namespace App\Http\Livewire;

use App\Models\Bot;
use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FilterSearch extends Component
{

    public $filter;
    public $search;

    public function render()
    {

        $searchBots = [];
        $totalSearchBots = [];

        if($this->filter != null) {

            $bs = DB::table('bots')
            ->join('bot_tags', 'bots.id', '=', 'bot_tags.bot_id')
            ->where('bot_tags.tag', $this->filter)
            ->where('bots.username', 'LIKE', '%' . $this->search . '%')
            ->select('*')
            ->orderBy('bots.created_at', 'DESC')
            ->limit(16)
            ->get();

            $bs2 = DB::table('bots')
            ->join('bot_tags', 'bots.id', '=', 'bot_tags.bot_id')
            ->where('bot_tags.tag', $this->filter)
            ->where('bots.username', 'LIKE', '%' . $this->search . '%')
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

            $searchBots = Bot::where('bots.username', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->limit(16)->get();
            $totalSearchBots = Bot::where('bots.username', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->get();

        }
        
        return view('livewire.filter-search',['bots' => Bot::all(), 'tags' => Tag::all(), 'searchResults' => $searchBots, 'allSearchResults' => $totalSearchBots ]);
    }

    public function filter($filter) {

        if($filter == 'all') {
            $this->filter = null;
        } else {
            $this->filter = $filter;
        }

    }

    public function search() {
        if($this->search) {
            return redirect()->route('search', ['query' => $this->search, 'filter' => $this->filter]);
        } else { 
            return redirect()->route('search');
        }
    }
    
}
