<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Log;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class DiscordController extends Controller
{
    public function redirect()
    {
        return Socialite::with('discord')->redirect();
    }

    public function handle()
    {
        // Collect response from callback
        $response = Socialite::driver('discord')->user();

        // Look for existing user with Discord ID
        $user = User::where('discord_id', $response->getId())->first();

        // Check if Discord ID is linked to account
        if ($user) {
            if($user->name != $response->getname()){
                $user->update([
                    'name' => $response->getName()
                ]);
            }
            if($user->avatar != $response->getAvatar()){
                $user->update([
                    'avatar' => $response->getAvatar()
                ]);
            }
            if($user->username != $response->getNickname()){
                $user->update([
                    'username' => $response->getNickname()
                ]);
            }
            Auth::login($user);
            //Log::l('LOGGED_IN', "Via Discord Login");

            return redirect()->route('index')->with('status', 'You have been logged in via Discord.');
        } else {
            $newUser = factory(\App\User::class)->create([
                'name' => $response->getName(),
                'username' => $response->getNickname(),
                'email' => $response->getEmail(),
                'avatar' => $response->getAvatar(),
                'discord_id' => $response->getId()
            ]);
            //$newUser->assignRole('Public');
            Auth::login($newUser);
            //Log::l('USER_CREATED', "via Discord Login");

            return redirect()->route('index')->with('status', 'User Created with Discord.');
        }
    }
}
