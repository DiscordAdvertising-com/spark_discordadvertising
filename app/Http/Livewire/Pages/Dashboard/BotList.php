<?php

namespace App\Http\Livewire\Pages\Dashboard;

use App\Models\Bot;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BotList extends Component
{

    public $category;
    public $search;

    public function mount() {
        $this->category = 'username';
    }

    public function render()
    {
        $bots = null;
        
        if($this->search) {
            $bots = Bot::where(['author' => (String)Auth::user()->id])->where($this->category, 'LIKE', '%' . $this->search .'%')->get();            
        } else {
            $bots = Bot::where(['author' => (String)Auth::user()->id])->get(); 
        }

        return view('livewire.pages.dashboard.bot-list', ['bots' => $bots]);
    }

    public function setPage($page, $id) {
        Session::put('botID', $id);
        $this->emit('setPage', $page);
    }
}
