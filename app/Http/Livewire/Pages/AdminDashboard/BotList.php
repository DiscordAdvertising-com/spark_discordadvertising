<?php

namespace App\Http\Livewire\Pages\AdminDashboard;

use App\Models\Bot;
use Livewire\Component;

class BotList extends Component
{

    public $search;
    public $filter = 'id';

    public function render()
    {

        $bots = null;

        if($this->search) {
            $bots = Bot::where($this->filter, 'LIKE', '%' . $this->search .'%')->orderBy('created_at', 'asc')->get();
        } else {
            $bots = Bot::orderBy('created_at', 'asc')->get();
        }

        return view('livewire.pages.admin-dashboard.bot-list', ['bots' => $bots]);
    }
}
