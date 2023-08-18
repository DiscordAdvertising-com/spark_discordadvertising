<?php

namespace App\Http\Livewire;

use App\Models\Server;
use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ServerFilterSearch extends Component
{

    public $filter;
    public $search;

    public function render()
    {

        $searchServers = [];
        $totalSearchServers = [];

        if($this->filter != null) {

            $bs = DB::table('servers')
            ->join('server_tags', 'servers.id', '=', 'server_tags.server_id')
            ->where('server_tags.tag', $this->filter)
            ->where('servers.name', 'LIKE', '%' . $this->search . '%')
            ->where('status', 'Accepted')
            ->select('*')
            ->orderBy('servers.created_at', 'DESC')
            ->limit(16)
            ->get();

            $bs2 = DB::table('servers')
            ->join('server_tags', 'servers.id', '=', 'server_tags.server_id')
            ->where('server_tags.tag', $this->filter)
            ->where('servers.name', 'LIKE', '%' . $this->search . '%')
            ->where('status', 'Accepted')
            ->select('*')
            ->orderBy('servers.created_at', 'DESC')
            ->get();

            
            foreach($bs as $b) {
                $searchServers[] = (array)$b;
            }
              
            foreach($bs2 as $b2) {
                $totalSearchServers[] = (array)$b2;
            }

        } else {

            $searchServers = Server::where('servers.name', 'LIKE', '%' . $this->search . '%')->where('status', 'Accepted')->orderBy('created_at', 'DESC')->limit(16)->get();
            $totalSearchServers = Server::where('servers.name', 'LIKE', '%' . $this->search . '%')->where('status', 'Accepted')->orderBy('created_at', 'DESC')->get();

        }
        
        return view('livewire.server-filter-search',['servers' => Server::all(), 'tags' => Tag::all(), 'searchResults' => $searchServers, 'allSearchResults' => $totalSearchServers ]);
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
            return redirect()->route('serverSearch', ['query' => $this->search, 'filter' => $this->filter]);
        } else { 
            return redirect()->route('serverSearch');
        }
    }
    
}
