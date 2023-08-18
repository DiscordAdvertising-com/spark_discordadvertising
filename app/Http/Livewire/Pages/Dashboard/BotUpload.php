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

class BotUpload extends Component
{

    public $botClientID;
    public $bot;
    public $description;
    public $headline;
    public $tags = [];
    public $addedTags = [];
    public $tag;
    public $customTag;
    public $accounts = [];
    public $accountID;
    public $invite;
    public $inviteValid = false;

    public function mount() {

        $tags = Tag::all();

        foreach($tags as $tag) {

            $this->tags[] = $tag->name;

        }

    }

    public function render()
    {
        return view('livewire.pages.dashboard.bot-upload');
    }

    public function findBot() {
        
        $client = new Client();

        $bot = Bot::find((String) $this->botClientID);

        if($bot != null) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Bot is already registerd']);

        } else {

            try {

                //Fetch bot by id
                $data = $client->get('https://discord.com/api/v8/users/'.$this->botClientID, ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token')]]);
                $data = json_decode($data->getBody(), true);
        
                if($data['bot']) {
    
                    $this->bot = $data;
                    Session::push('notifications', ['title' => 'Success', 'message' => 'Bot has been found']);
                    
                } else {
    
                    throw null;
    
                }
                
            } catch( Exception $err) {
    
                $this->bot = null;
    
                Session::push('notifications', ['title' => 'Error', 'message' => 'Bot could not be found']);
    
            }

        }

        $this->emit('flashSession');

    }

    public function addCustomTag() {
        Tag::create(['name' => $this->customTag]);
        $tag = Tag::where(['name' => $this->customTag])->first();
        $this->addedTags[] = $this->customTag;
        Session::push('notifications', ['title' => 'Success', 'message' => 'Custom Tag Created']);
        $this->emit('flashSession');
    }

    public function addTag() {

        if(count($this->addedTags) == 3 && Auth::user()->premium == 0) {

            Session::push('notifications', ['title' => 'Error', 'message' => '3 tags is the limit']);
            $this->emit('flashSession');

        } else if (count($this->addedTags) == 5 && Auth::user()->premium < 3) {

            Session::push('notifications', ['title' => 'Error', 'message' => '5 tags is the limit']);
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

                foreach($this->accounts as $account) {
    
                    if($account['id'] == $this->accountID) {
    
                        $unique = false;
    
                    }
        
                }
    
                if($unique) {
    
                    //Fetch bot by id
                    $data = $client->get('https://discord.com/api/v8/users/'.$this->accountID, ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token')]]);
                    $data = json_decode($data->getBody(), true);
            
                    $this->accounts[] = $data;
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

            unset($this->accounts[array_search(User::find($accountID), $this->accounts)]);  
            $this->accounts = array_merge($this->accounts);

        } catch( Exception $err) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Something went wrong']);

        }

    }

    public function validateInvite() {

        if(str_contains($this->invite, 'https://discord.com/api/oauth2/authorize?') || str_contains($this->invite, 'https://discord.com/oauth2/authorize?')) {

            $this->inviteValid = true;
            Session::push('notifications', ['title' => 'Success', 'message' => 'Valid Invite']);

        } else {

            $this->inviteValid = false;
            Session::push('notifications', ['title' => 'Error', 'message' => 'Invalid Invite']);

        }
    
        $this->emit('flashSession');

    }

    public function createListing() {

        try {

            Bot::create(['id' => $this->bot['id'], 'author' => (String) Auth::user()->id, 'headline' => $this->headline, 'description' => $this->description, 'username' => $this->bot['username'], 'avatar' => $this->bot['avatar'], 'discriminator' => $this->bot['discriminator'], 'invite' => $this->invite]);

            foreach($this->addedTags as $tag) {

                BotTag::create(['bot_id' => $this->bot['id'], 'tag' => $tag]);

            }

            foreach($this->accounts as $account) {

                BotUser::create(['bot_id' => $this->bot['id'], 'user_id' => $account['id']]);

            }
            
            Session::push('notifications', ['title' => 'Success', 'message' => 'Bot listing has been created']);

            $client = new Client();

            $embed = (object)array();
            $embed->title = "New Bot Created";
            $embed->description = "**Application ID:** ".$this->bot['id']."\n**Bot Name:** ".$this->bot['username']."\n**Approval Link:** ".route('botInfo', ['botID' => $this->bot['id']]);
            $embed->color = hexdec('#00F700');

            $component = (object)array();
            $component->type = 1;
            $component->components = [(object)array()];
            $component->components[0]->type = 2;
            $component->components[0]->style = 5;
            $component->components[0]->label = "Bot Approval Page";
            $component->components[0]->url = route('botInfo', ['botID' => $this->bot['id']]);

            $client->post('https://discord.com/api/v9/channels/1124325015630913576/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed], 'components' => [$component]]]);
            // $client->post('https://discord.com/api/webhooks/1126136433359474791/27msjV_2pVrW2Dnhb-2UCOA7og-pI3PNZ7E_RIfAI7sXTRqKjL36oyPcUxcEPhmjUBv1', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed]]]);

        } catch (Exception $err) {

            Session::push('notifications', ['title' => 'Error', 'message' => 'Something went wrong']);

        }

        Session::put('botName', $this->bot['username']);

        $this->emit('setPage', 'successScreen');

    }
    
}
