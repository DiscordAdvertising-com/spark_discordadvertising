<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Vote;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ServerSplashCard extends Component
{
    public $server;
    public $votes;
    public $rank = 0;

    public function render()
    {

        $result = DB::table(function ($query) {
            $query->select('b.id', 'b.name', DB::raw('COUNT(bu.server_id) AS vote_count'))
                ->from('servers AS b')
                ->leftJoin('server_votes AS bu', 'b.id', '=', 'bu.server_id')
                ->groupBy('b.id', 'b.name') // Include b.name in the GROUP BY clause
                ->orderBy('vote_count', 'DESC');
        }, 'ranked_servers')
        ->get();
                
        $this->rank = $result->search(function($r) {
            return $r->id === (String)$this->server['id'];
        }) + 1;

        try{
            $this->votes = $this->server['votes'] ?? $this->server->votes; 
        } catch (Exception $err) {
            $this->votes = []; 
        }
                
        return view('livewire.server-splash-card');
    }
}
