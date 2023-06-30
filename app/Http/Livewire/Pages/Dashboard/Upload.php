<?php

namespace App\Http\Livewire\Pages\Dashboard;

use Exception;
use GuzzleHttp\Client;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Upload extends Component
{

    public $bot_client_id;
    public $bot;
    public $description;
    public $headline;
    public $tags = ["Gaming", "Community", "Fun", "Education", "Moderation", "Economy", "Ticket"];
    public $addedTags = [];
    public $tag;
    public $owners = [];

    public $step2 = true;
    public $step3 = true;
    public $step4 = true;

    // Production 
    // public $step2 = false;
    // public $step3 = false;
    // public $step4 = false;

    public function render()
    {
        return view('livewire.pages.dashboard.upload');
    }

    public function findBot() {
        
        $client = new Client();

        try {

            //Fetch bot by id
            $data = $client->get('https://discord.com/api/v8/users/'.$this->bot_client_id, ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token')]]);
            $data = json_decode($data->getBody(), true);
    
            if($data['bot']) {

                $this->bot = $data;
                Session::push('notifications', ['title' => 'Success', 'message' => 'Bot has been found']);

                $this->step2 = true;
                
            } else {

                throw null;

            }
            
        } catch( Exception $err) {

            $this->bot = null;

            Session::push('notifications', ['title' => 'Error', 'message' => 'Bot could not be found']);

        }

        $this->emit('flashSession');

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

        unset($this->addedTags[array_search($tag, $this->addedTags)]);  
        $this->addedTags = array_merge($this->addedTags);

    }
    
}
