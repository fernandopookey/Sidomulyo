<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        // dd($user->getId());
        $findUser = User::where('google_id', $user->getId())->first();
        if ($findUser) {
            Auth::login($findUser);
            return redirect()->intended('/');
        } else {
            // dd($user->id);
            $newUser = User::create([
                // 'fullname'      => $user->getName(),
                // 'username'      => $user->getNickname(),
                // 'email'         => $user->getEmail(),
                // 'google_id'     => $user->getId(),
                // 'address'       => $user->getAvatar(),
                // 'phone_number'  => $user->getNumber(),
                // 'roles'         => $user->getRoles(),
                // 'password'      => bcrypt('123456789')
                'fullname'      => $user->fullname,
                'username'      => $user->username,
                'email'         => $user->getEmail(),
                'google_id'     => $user->id,
                'address'       => $user->address,
                'phone_number'  => $user->phone_number,
                // 'roles'         => $user->roles,
                'password'      => bcrypt('123456789')
            ]);

            Auth::login($newUser);
            return redirect()->intended('/');
        }


        // try {
        //     $user = Socialite::driver('google')->user();
        //     // dd($user);
        //     $findUser = User::where('google_id', $user->getId())->first();
        //     if ($findUser) {
        //         Auth::login($findUser);
        //         return redirect()->intended('/');
        //         // return redirect('/');
        //     } else {
        //         // dd($user->id);
        //         $newUser = User::create([
        //             // 'fullname'      => $user->getName(),
        //             // 'username'      => $user->getNickname(),
        //             // 'email'         => $user->getEmail(),
        //             // 'google_id'     => $user->getId(),
        //             // 'address'       => $user->getAvatar(),
        //             // 'phone_number'  => $user->getNumber(),
        //             // 'roles'         => $user->getRoles(),
        //             // 'password'      => bcrypt('123456789')
        //             'fullname'      => $user->fullname,
        //             'username'      => $user->username,
        //             'email'         => $user->email,
        //             'google_id'     => $user->google_id,
        //             'address'       => $user->address,
        //             'phone_number'  => $user->phone_number,
        //             'roles'         => $user->roles,
        //             'github_token' => $user->token,
        //             'github_refresh_token' => $user->refreshToken,
        //             'password'      => bcrypt('123456789')
        //         ]);

        //         Auth::login($newUser);
        //         return redirect()->intended('/');
        //         // return redirect('/');
        //     }
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     return "Eror";
        // }
    }
}
