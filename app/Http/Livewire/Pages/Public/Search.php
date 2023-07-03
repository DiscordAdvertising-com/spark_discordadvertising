<?php

namespace App\Http\Livewire\Pages\Public;

use App\Models\Bot;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Search extends Component
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
        $bots = [];

        if($this->filter != null) {

            $bs2 = DB::table('bots')
            ->join('bot_tags', 'bots.id', '=', 'bot_tags.bot_id')
            ->where('bot_tags.tag', $this->filter)
            ->where('bots.username', 'LIKE', '%' . $this->query . '%')
            ->select('*')
            ->orderBy('bots.created_at', 'DESC')
            ->paginate($this->perPage);
        
            foreach($bs2 as $b2) {
                $bots[] = (array)$b2;
            }


        } else {

            $bots = Bot::where('username', 'LIKE', '%' . $this->query .'%')->orderBy('created_at', 'DESC')->paginate($this->perPage);

        }

        return view('livewire.pages.public.search', ['bots' => $bots])
        ->extends('layouts.app')
        ->section('content');
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 24;
    }

}
