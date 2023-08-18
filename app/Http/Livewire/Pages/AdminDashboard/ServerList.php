<?php

namespace App\Http\Livewire\Pages\AdminDashboard;

use App\Models\Server;
use Livewire\Component;

class ServerList extends Component
{

    public $search;
    public $filter = 'id';

    public function render()
    {

        $servers = null;

        if($this->search) {
            $servers = Server::where($this->filter, 'LIKE', '%' . $this->search .'%')->orderBy('created_at', 'asc')->get();
        } else {
            $servers = Server::orderBy('created_at', 'asc')->get();
        }

        return view('livewire.pages.admin-dashboard.server-list', ['servers' => $servers]);
    }
}
