<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Stripe\StripeClient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookHandled;
use Laravel\Cashier\Events\WebhookReceived;
use Symfony\Component\HttpFoundation\JsonResponse;
use Laravel\Cashier\Http\Controllers\WebhookController;

class StripeWebhookController extends WebhookController
{
    
    protected function handleCustomerSubscriptionUpdated(array $payload)
    {
        try {
            $client = new Client();
            $customer = $payload['data']['object']['customer'];
            $stripe = new StripeClient('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');
            $customer2 = $stripe->customers->retrieve(
                $customer,
                []
            );
            $customerData = User::where(['email' => $customer2['email']])->first();
    
            $embed = (object)array();
            $embed->title = "Subscription Updated";
            $embed->description = "Customer: ".$customerData['username']. " / ".$customerData['email']." / ".$customerData["id"] ;
            $embed->color = hexdec('#00F700');
            $client->post('https://discord.com/api/v9/channels/1134844892724604989/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed]]]);
            return new Response('Webhook Handled', 200);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    protected function handleCustomerSubscriptionCreated(array $payload)
    {
        try {
            $client = new Client();
            $customer = $payload['data']['object']['customer'];
            $stripe = new StripeClient('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');
            $customer2 = $stripe->customers->retrieve(
                $customer,
                []
            );
            
            $customerData = User::where(['email' => $customer2['email']])->first();
    
            $embed = (object)array();
            $embed->title = "Subscription Created";
            $embed->description = "Customer: ".$customerData['username']. " / ".$customerData['email']." / ".$customerData["id"] ;
            $embed->color = hexdec('#00F700');
    
            $client->post('https://discord.com/api/v9/channels/1134844892724604989/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed]]]);
    
            if($payload['data']['object']['items']['data'][0]['plan']['id'] == 'price_1NYsR3FRSYCAp2ugFZBrH2QW') {
    
                User::where(['email' => $customer2['email']])->update(['premium' => 1]);
    
            } else if ($payload['data']['object']['items']['data'][0]['plan']['id'] == 'price_1NYtT7FRSYCAp2ugIDTOAO2V') {
    
                User::where(['email' => $customer2['email']])->update(['premium' => 2]);
    
            } else if ($payload['data']['object']['items']['data'][0]['plan']['id'] == 'price_1NaOWSFRSYCAp2ugvRQATJ6p') {
    
                User::where(['email' => $customer2['email']])->update(['premium' => 3]);
    
            }
    
            $discordUserId = $customerData['id']; // Replace with the actual user ID
            $guildId = '1123598765375357080'; // Replace with the actual guild ID
            $roleId = '1135586274481279026';
    
            $discordApiUrl = "https://discord.com/api/v9/guilds/$guildId/members/$discordUserId/roles/$roleId";
    
            $client->put($discordApiUrl, [
                'headers' => [
                    'Authorization' => 'Bot '.config('services.discord.discord_bot_token'),
                ],
            ]);
    
            Log::channel('daily')->debug('Stripe Webhook Received:', (array) $payload);
            return new Response('Webhook Handled', 200);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }


    protected function handleCustomerSubscriptionDeleted(array $payload)
    {
        try {
            $client = new Client();
            $customer = $payload['data']['object']['customer'];
            $stripe = new StripeClient('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');
            $customer2 = $stripe->customers->retrieve(
                $customer,
                []
            );
    
            $customerData = User::where(['email' => $customer2['email']])->first();
    
            $embed = (object)array();
            $embed->title = "Subscription Deleted";
            $embed->description = "Customer: ".$customerData['username']. " / ".$customerData['email']." / ".$customerData["id"] ;
            $embed->color = hexdec('#00F700');
    
            $client->post('https://discord.com/api/v9/channels/1134844892724604989/messages', ['headers' => ['Authorization' => 'Bot '.config('services.discord.bot_token_webhooks'), 'Content-Type'=> 'application/json'], 'json' => ['embeds' => [$embed]]]);
    
            $discordUserId = $customerData['id']; // Replace with the actual user ID
            $guildId = '1123598765375357080'; // Replace with the actual guild ID
            $roleId = '1135586274481279026';
    
            $discordApiUrl = "https://discord.com/api/v9/guilds/$guildId/members/$discordUserId/roles/$roleId";
    
            $client->delete($discordApiUrl, [
                'headers' => [
                    'Authorization' => 'Bot '.config('services.discord.discord_bot_token'),
                ],
            ]);
    
            User::where(['email' => $customer2['email']])->update(['premium' => 0]);
            return new Response('Webhook Handled', 200);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }


    protected function handleChargeSucceeded(array $payload)
    {        
        return new Response('Webhook Handled', 200);
    }

}
