<?php

namespace App\Http\Livewire\Pages\Dashboard;

use Exception;
use App\Models\Server;
use App\Models\Tag;
use App\Models\User;
use App\Models\ServerTag;
use GuzzleHttp\Client;
use App\Models\ServerUser;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ServerManage extends Component
{

    public $serverID;
    public $server;
    public $description;
    public $headline;
    public $tags = [];
    public $addedTags = [];
    public $tag;
    public $accountID;
    public $invite;
    public $inviteValid = true;

    public function mount($serverID = null) {

        $tags = Tag::all();

        foreach($tags as $tag) {

            $this->tags[] = $tag->name;

        }

        if(!$serverID) {
            $this->serverID = Session::get('serverID');
        } else {
            $this->serverID = $serverID;
        }

        $server = Server::where(['id' => (String)$this->serverID])->first();

        $this->description = $server['description'] ?? '';
        $this->headline = $server['headline'] ?? '';
        $this->invite = $server['invite'] ?? '';

        foreach($server->tags as $tag) {

            $this->addedTags[] = $tag['tag'];

            unset($this->tags[array_search($tag['tag'], $this->tags)]);  
    
            $this->tag = null;  
            $this->tags = array_merge($this->tags);

        }

    }

    public function render()
    {        

        $server = Server::where(['id' => $this->serverID])->first();

        $accounts = array();
        foreach($server->users as $user) {

            if($user->user != null) {

                $accounts[] = $user->user;

            }

        }
        
        return view('livewire.pages.dashboard.server-manage', ['accounts' => $accounts]);

    }

    public function updatingInvite() {
        $this->inviteValid = false;
    }

    public function addTag() {

        if(count($this->addedTags) == 3) {

            Session::push('notifications', ['title' => 'Error', 'message' => '3 tags is the limit']);
            $this->emit('flashSession');

        } else {

            if(!$this->tag) {

                $this->tag = $this->tags[0];

            } 
    
            $this->addedTags[] = $this->tag;
            unset($this->tags[array_search($this->tag, $this->tags)]);  
    
            $this->tag = null;  
            $this->tags = array_merge($this->tags);

        }

    }

    public function removeTag($tag) {

        try {

            unset($this->addedTags[array_search($tag, $this->addedTags)]);  
            $this->addedTags = array_merge($this->addedTags);

        } catch( Exception $err) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Something went wrong']);

        }

    }

    public function addAccount() {


        $client = new Client();
        $unique = true;

        $user = User::find((String) $this->accountID);

        if($user == null) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'User has not been registerd on our platform, before they can be added they have to login atleast once']);

        } else if(Auth::user()->id == (String) $this->accountID) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'You are an owner by default']);

        } else {

            try {
    
                if($unique) {
    
                    //Fetch server by id
                    $data = $client->get('https://discord.com/api/v8/users/'.$this->accountID, ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token')]]);
                    $data = json_decode($data->getBody(), true);
            
                    ServerUser::create(['user_id' => $this->accountID, 'server_id' => $this->serverID]);

                    Session::push('notifications', ['title' => 'Success', 'message' => 'Account has been found']);
    
                } else {
    
                    Session::push('notifications', ['title' => 'Error', 'message' => 'Account is already added']);
    
                }
                    
            } catch( Exception $err) {
    
                Session::push('notifications', ['title' => 'Error', 'message' => 'Account could not be found']);
    
            }

        }

        $this->emit('flashSession');

    }

    public function removeAccount($accountID) {

        try {

            ServerUser::where(['user_id' => $accountID])->delete();

        } catch( Exception $err) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Something went wrong']);

        }

    }

    public function updateListing() {

        try {

            $findServer = Server::find($this->serverID);
            Server::where(['id' => $this->serverID])->update(['headline' => $this->headline, 'description' => $this->description, 'invite' => $this->invite]);
    

            foreach($findServer->tags as $tag) {

                ServerTag::where(['server_id' => $tag['server_id'], 'tag' => $tag['tag']])->delete();

            }

            foreach($this->addedTags as $tag) {

                ServerTag::create(['server_id' => $findServer['id'], 'tag' => $tag]);

            }
            
            Session::push('notifications', ['title' => 'Success', 'message' => 'Server listing has been updated']);

            $client = new Client();

            $embed = (object)array();
            $embed->title = "Server Updated";
            $embed->description = "**Application ID:** ".$findServer['id']."\n**Server Name:** ".$findServer['name'];
            $embed->color = hexdec('#F7771D');

            $component = (object)array();
            $component->type = 1;
            $component->components = [(object)array()];
            $component->components[0]->type = 2;
            $component->components[0]->style = 5;
            $component->components[0]->label = "Updated Page";
            $component->components[0]->url = route('serverInfo', ['serverID' => $findServer['id']]);

            $client->post('https://discord.com/api/v9/channels/1126134459415134289/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed], 'components' => [$component]]]);


        } catch (Exception $err) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Something went wrong error:1']);

        }

        $this->emit('setPage', 'serverList');

    }

    public function validateInvite() {

        if(str_contains($this->invite, 'https://discord.com/api/oauth2/authorize?')) {

            $this->inviteValid = true;
            Session::push('notifications', ['title' => 'Success', 'message' => 'Valid Invite']);

        } else {

            $this->inviteValid = false;
            Session::push('notifications', ['title' => 'Error', 'message' => 'Invalid Invite']);

        }
    
        $this->emit('flashSession');

    }

    public function deleteListing() {

        try {

            $findServer = Server::find($this->serverID);

            Server::where(['id' => $this->serverID])->delete();
            ServerTag::where(['server_id' => $this->serverID])->delete();
            ServerUser::where(['server_id' => $this->serverID])->delete();

            Session::push('notifications', ['title' => 'Success', 'message' => 'Server has been delisted']);

            $client = new Client();

            $embed = (object)array();
            $embed->title = "Server Deleted";
            $embed->description = "**Application ID:** ".$findServer['id']."\n**Server Name:** ".$findServer['name'];
            $embed->color = hexdec('#F70000');

            $client->post('https://discord.com/api/v9/channels/1126134459415134289/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed]]]);

            $this->emit('setPage', 'serverList');

        } catch(Exception $err) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Something went wrong']);

        }

        return redirect()->route('dashboard', ['page' => 'serverList']);

        $this->emit('setPage', 'serverList');

    }
    
}
