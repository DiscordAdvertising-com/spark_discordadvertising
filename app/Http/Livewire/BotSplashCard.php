<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Vote;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class BotSplashCard extends Component
{
    public $bot;
    public $votes;
    public $rank = 0;

    public function render()
    {

        $result = DB::table(function ($query) {
            $query->select('b.id', 'b.username', DB::raw('COUNT(bu.bot_id) AS vote_count'))
                ->from('bots AS b')
                ->leftJoin('bot_votes AS bu', 'b.id', '=', 'bu.bot_id')
                ->groupBy('b.id', 'b.username') // Include b.username in the GROUP BY clause
                ->orderBy('vote_count', 'DESC');
        }, 'ranked_bots')
        ->get();
                
        $this->rank = $result->search(function($r) {
            return $r->id === (String)$this->bot['id'];
        }) + 1;

        try{
            $this->votes = $this->bot['votes'] ?? $this->bot->votes; 
        } catch (Exception $err) {
            $this->votes = []; 
        }
                
        return view('livewire.bot-splash-card');
    }
}
