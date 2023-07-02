<?php

namespace App\Http\Livewire\Pages\Dashboard;

use App\Models\Bot;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

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
            $bots = Bot::where(['author' => Auth::user()->id])->where($this->category, 'LIKE', '%' . $this->search .'%')->get();            
        } else {
            $bots = Bot::where(['author' => Auth::user()->id])->get(); 
        }

        return view('livewire.pages.dashboard.bot-list', ['bots' => $bots]);
    }
}
