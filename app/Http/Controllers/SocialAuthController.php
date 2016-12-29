<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;
use App\User;
use Auth;
use Illuminate\Contracts\Auth\Guard;

class SocialAuthController extends Controller
{
    public function __construct(Guard $auth) {
      $this->auth = $auth;
      // $this->registrar = $registrar;
      $this->middleware('guest', ['except' => 'logout']);
      // $this->middleware(['auth', 'admin'])->except('login');
    }

    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        // Auth::attempt($login);
        auth()->login($user);

        return redirect()->to('/home');
    }
}
