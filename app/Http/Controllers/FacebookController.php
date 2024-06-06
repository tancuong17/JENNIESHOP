<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacebookController extends Controller
{
    public function getFacebookSignInUrl()
    {
        try {
            return Socialite::driver('facebook')->redirect();
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function loginCallback(Request $request)
    {
        try {
            $userFacebook = Socialite::driver('facebook')->user();
            $user = User::where('facebook_id', $userFacebook->getId())->first();
            if (!$user) {
                $user = User::create(
                    [
                        'email' => $userFacebook->getEmail(),
                        'name' => $userFacebook->getName(),
                        'facebook_id'=> $userFacebook->getId(),
                        'image' => $userFacebook->getAvatar(),
                        'password' => Hash::make("123")
                    ]
                );
            }
            $data = [
                'facebook_id' => $userFacebook->getId(),
                'password' => "123",
            ];
            if (Auth::attempt($data)) {
                return Redirect::to('/');
            }
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}