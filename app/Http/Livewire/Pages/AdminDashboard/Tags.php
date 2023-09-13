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

    public function muteHattrick() {

        try {

            Session::push('notifications', ['title' => 'Muted', 'message' => 'Hattrick was muted KEKW!']);

            $client = new Client();

            $client->patch('https://discord.com/api/v10/guilds/1123598765375357080/members/724097871934128189', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['communication_disabled_until' => '2023-09-30T22:30:00-04:00']]);


        } catch (Exception $err) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Something went wrong error:1']);

        }

        $this->emit('setPage', 'tags');

    }

    public function untimeout() {

        try {

            Session::push('notifications', ['title' => 'Muted', 'message' => 'Hattrick was unmuted!']);

            $client = new Client();

            $client->patch('https://discord.com/api/v10/guilds/1123598765375357080/members/724097871934128189', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['communication_disabled_until' => '2020-09-30T22:30:00-04:00']]);


        } catch (Exception $err) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Something went wrong error:1']);

        }

        $this->emit('setPage', 'tags');

    }

}
