<?php

namespace App\Http\Livewire\Pages\Dashboard;

use Exception;
use App\Models\Bot;
use App\Models\Tag;
use App\Models\User;
use App\Models\BotTag;
use GuzzleHttp\Client;
use App\Models\BotUser;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BotManage extends Component
{

    public $botClientID;
    public $bot;
    public $description;
    public $headline;
    public $tags = [];
    public $addedTags = [];
    public $tag;
    public $accountID;
    public $invite;
    public $inviteValid = true;

    public function mount($botID = null) {

        $tags = Tag::all();

        foreach($tags as $tag) {

            $this->tags[] = $tag->name;

        }

        if(!$botID) {
            $this->botClientID = Session::get('botID');
        } else {
            $this->botClientID = $botID;
        }

        $bot = Bot::where(['id' => (String)$this->botClientID])->first();

        $this->description = $bot['description'] ?? '';
        $this->headline = $bot['headline'] ?? '';
        $this->invite = $bot['invite'] ?? '';

        foreach($bot->tags as $tag) {

            $this->addedTags[] = $tag['tag'];

            unset($this->tags[array_search($tag['tag'], $this->tags)]);  
    
            $this->tag = null;  
            $this->tags = array_merge($this->tags);

        }

    }

    public function render()
    {        

        $bot = Bot::where(['id' => $this->botClientID])->first();

        $accounts = array();
        foreach($bot->users as $user) {

            if($user->user != null) {

                $accounts[] = $user->user;

            }

        }
        
        return view('livewire.pages.dashboard.bot-manage', ['accounts' => $accounts]);

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
    
                    //Fetch bot by id
                    $data = $client->get('https://discord.com/api/v8/users/'.$this->accountID, ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token')]]);
                    $data = json_decode($data->getBody(), true);
            
                    BotUser::create(['user_id' => $this->accountID, 'bot_id' => $this->botClientID]);

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

            BotUser::where(['user_id' => $accountID])->delete();

        } catch( Exception $err) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Something went wrong']);

        }

    }

    public function updateListing() {

        try {

            $findBot = Bot::find($this->botClientID);
            Bot::where(['id' => $this->botClientID])->update(['headline' => $this->headline, 'description' => $this->description, 'invite' => $this->invite]);
    

            foreach($findBot->tags as $tag) {

                BotTag::where(['bot_id' => $tag['bot_id'], 'tag' => $tag['tag']])->delete();

            }

            foreach($this->addedTags as $tag) {

                BotTag::create(['bot_id' => $findBot['id'], 'tag' => $tag]);

            }
            
            Session::push('notifications', ['title' => 'Success', 'message' => 'Bot listing has been updated']);

            $client = new Client();

            $embed = (object)array();
            $embed->title = "Bot Updated";
            $embed->description = "**Application ID:** ".$findBot['id']."\n**Bot Name:** ".$findBot['username'];
            $embed->color = hexdec('#F7771D');

            $component = (object)array();
            $component->type = 1;
            $component->components = [(object)array()];
            $component->components[0]->type = 2;
            $component->components[0]->style = 5;
            $component->components[0]->label = "Updated Page";
            $component->components[0]->url = route('botInfo', ['botID' => $findBot['id']]);

            $client->post('https://discord.com/api/v9/channels/1126134459415134289/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed]]]);


        } catch (Exception $err) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Something went wrong']);

        }

        $this->emit('setPage', 'botList');

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

            $findBot = Bot::find($this->botClientID);

            Bot::where(['id' => $this->botClientID])->delete();
            BotTag::where(['bot_id' => $this->botClientID])->delete();
            BotUser::where(['bot_id' => $this->botClientID])->delete();

            Session::push('notifications', ['title' => 'Success', 'message' => 'Bot has been delisted']);

            $client = new Client();

            $embed = (object)array();
            $embed->title = "Bot Deleted";
            $embed->description = "**Application ID:** ".$findBot['id']."\n**Bot Name:** ".$findBot['username'];
            $embed->color = hexdec('#F70000');

            $client->post('https://discord.com/api/v9/channels/1126134459415134289/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed]]]);

            $this->emit('setPage', 'botList');

        } catch(Exception $err) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Something went wrong']);

        }

        return redirect()->route('dashboard', ['page' => 'botList']);

        $this->emit('setPage', 'botList');

    }
    
}