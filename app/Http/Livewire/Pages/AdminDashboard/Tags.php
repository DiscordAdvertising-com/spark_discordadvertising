<?php

namespace App\Http\Livewire\Pages\AdminDashboard;

use App\Models\Tag;
use Livewire\Component;
use GuzzleHttp\Client;
use Exception;
use Illuminate\Support\Facades\Session;

class Tags extends Component
{

    public $search;
    public $tag;

    public function render()
    {
        $tags = null;

        if($this->search) {
            $tags = Tag::where('name', 'LIKE', '%' . $this->search .'%')->get();
        } else {
            $tags = Tag::get();
        }
        return view('livewire.pages.admin-dashboard.tags', ['tags' => $tags]);
    }

    public function remove($name) {
        Tag::where('name', '=', $name)->delete();
    }

    public function add() {
        Tag::create(['name' => $this->tag]);
    }

}
