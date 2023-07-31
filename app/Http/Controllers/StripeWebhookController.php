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
use Laravel\Cashier\Http\Controllers\WebhookController;

class StripeWebhookController extends WebhookController
{
    
    protected function handleCustomerSubscriptionUpdated(array $payload)
    {
        $client = new Client();
        $customer = $payload['data']['object']['customer'];
        $stripe = new StripeClient('sk_test_51NYsI1FRSYCAp2ugyG9mAHaXe0jiKKsC8yOi5IOJto5ZeOhT5ua1IN4LM7C93QZgEm0fWOHt72FX65cNStSrfsiw00VkXJnw7J');
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
    }

    protected function handleCustomerSubscriptionCreated(array $payload)
    {
        $client = new Client();
        $customer = $payload['data']['object']['customer'];
        $stripe = new StripeClient('sk_test_51NYsI1FRSYCAp2ugyG9mAHaXe0jiKKsC8yOi5IOJto5ZeOhT5ua1IN4LM7C93QZgEm0fWOHt72FX65cNStSrfsiw00VkXJnw7J');
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

        User::where(['email' => $customer2['email']])->update(['premium' => true]);
        // Log::channel('daily')->debug('Stripe Webhook Received, Subscription Created :', (array)$customer2);
        return new Response('Webhook Handled', 200);
    }


    protected function handleCustomerSubscriptionDeleted(array $payload)
    {
        $client = new Client();
        $customer = $payload['data']['object']['customer'];
        $stripe = new StripeClient('sk_test_51NYsI1FRSYCAp2ugyG9mAHaXe0jiKKsC8yOi5IOJto5ZeOhT5ua1IN4LM7C93QZgEm0fWOHt72FX65cNStSrfsiw00VkXJnw7J');
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


        User::where(['email' => $customer2['email']])->update(['premium' => false]);
        return new Response('Webhook Handled', 200);
    }


    protected function handleChargeSucceeded(array $payload)
    {        
        return new Response('Webhook Handled', 200);
    }

}
