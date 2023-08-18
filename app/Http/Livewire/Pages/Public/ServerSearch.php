<?php

namespace App\Http\Livewire\Pages\Public;

use App\Models\Server;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServerSearch extends Component
{

    public $query;
    public $filter;

    public $perPage = 24;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function mount(Request $request) {
        $this->query = $request->query('query');
        $this->filter = $request->query('filter');
    }

    public function render()
    {
        $servers = [];

        if($this->filter != null) {

            $bs2 = DB::table('servers')
            ->join('server_tags', 'servers.id', '=', 'server_tags.server_id')
            ->where('server_tags.tag', $this->filter)
            ->where('servers.name', 'LIKE', '%' . $this->query . '%')
            ->where('servers.status', 'Accepted')
            ->select('*')
            ->orderBy('servers.created_at', 'DESC')
            ->paginate($this->perPage);
        
            foreach($bs2 as $b2) {
                $servers[] = (array)$b2;
            }


        } else {

            $servers = Server::where('name', 'LIKE', '%' . $this->query .'%')->where('status', 'Accepted')->orderBy('created_at', 'DESC')->paginate($this->perPage);

        }

        return view('livewire.pages.public.server-search', ['servers' => $servers])
        ->extends('layouts.app')
        ->section('content');
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 24;
    }

}
