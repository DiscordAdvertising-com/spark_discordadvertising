<?php

namespace App\Http\Livewire\Pages\AdminDashboard;

use App\Models\Tag;
use Livewire\Component;

class Tags extends Component
{

    public $search;

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

}
