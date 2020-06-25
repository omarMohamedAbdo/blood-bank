<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
use Auth;
use Exception;

class SocialController extends Controller
{
        public function redirect($provider)
        {
            return Socialite::driver($provider)->redirect();
        }
       
        public function callback($provider)
        {
            try {
                    $getInfo = Socialite::driver($provider)->user(); 
                    $user = $this->createUser($getInfo,$provider); 
                    Auth::login($user); 
                    return redirect()->to('/home');
                }
            catch(Exception $e) {
                return redirect('/');
            }
        }

        function createUser($getInfo,$provider){
            $user = User::where('provider_id', $getInfo->id)->first();
            if (!$user) {
                $user = User::create([
                    'name'     => $getInfo->getName(),
                    'email'    => $getInfo->getEmail(),
                    'avatar'    => $getInfo->getAvatar(),
                    'provider' => $provider,
                    'provider_id' => $getInfo->getId()
                ]);
                }
            return $user;
        }
}
