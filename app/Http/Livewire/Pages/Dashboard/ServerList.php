<?php

namespace App\Http\Livewire\Pages\Dashboard;

use App\Models\Server;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ServerList extends Component
{

    public $category;
    public $search;

    public function mount() {
        $this->category = 'name';
    }

    public function render()
    {
        $servers = null;
        
        if($this->search) {
            $servers = Server::where(['author' => (String)Auth::user()->id])->where($this->category, 'LIKE', '%' . $this->search .'%')->get();            
        } else {
            $servers = Server::where(['author' => (String)Auth::user()->id])->get(); 
        }

        return view('livewire.pages.dashboard.server-list', ['servers' => $servers]);
    }

    public function setPage($page, $id) {
        Session::put('serverID', (String) $id);
        $this->emit('setPage', $page);
    }
}
