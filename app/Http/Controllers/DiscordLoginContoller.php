<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\GuildData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

class DiscordLoginContoller extends Controller
{
     /**
     * Redirect the user to the Discord authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('discord')
        ->scopes(['guilds'])
        ->redirect();
    }

    /**
     * Obtain the user information from Discord.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {
        $discord = Socialite::driver('discord')->stateless();
        $avatar = "https://cdn.discordapp.com/embed/avatars/0.png";
        if($discord->user()->user["avatar"]) $avatar = 'https://cdn.discordapp.com/avatars/'.$discord->user()->id.'/'.$discord->user()->user["avatar"].'.png';

        $user = User::updateOrCreate([
            'id' => $discord->user()->id
        ], [
            "username" => $discord->user()->user["username"],
            "avatar" => $avatar,
            "discriminator" => $discord->user()->user["discriminator"],
            "public_flags" => $discord->user()->user["public_flags"],
            "flags" => $discord->user()->user["flags"],
            "banner" => $discord->user()->user["banner"],
            "banner_color" => $discord->user()->user["banner_color"],
            "accent_color" => $discord->user()->user["accent_color"],
            "locale" => $discord->user()->user["locale"],
            "mfa_enabled" => $discord->user()->user["mfa_enabled"],
            "email" => $discord->user()->user["email"],
            "verified" => $discord->user()->user["verified"],
            "token" => $discord->user()->token,
            "refreshToken" => $discord->user()->refreshToken,
        ]);

        if($user) {

            Auth::login($user, true);

            if(Session::get('vote')) {

                $botID = Session::get('vote');
                Session::forget('vote');
                return redirect()->route('botInfo', ['botID' => $botID]);

            } else {

                return redirect()->route('dashboard');

            }

        }

            
    }

        /**
     * Redirect the user to the Discord authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {

        Auth::logout();
        Session::put('page', null);
        return redirect()->route('login');

    }
}
