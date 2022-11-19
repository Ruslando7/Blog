<?php

namespace App\Http\Controllers\Social\Vk;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class CallBackController extends BaseController
{
    public function __invoke()
    {
        if (session()->has('user')) {
            $user = session('user');
            $mail = session('mail');
        } else {
            $user = Socialite::driver('vkontakte')->user();
            $mail = $user->getEmail();
            session(['user' => $user]);
        }
        if ($mail) {
            if ($user = $this->service->saveVkData($user, $mail)) {
                session()->forget('user');
                session()->forget('mail');
                Auth::login($user);
                return redirect()->route('main.index');
            }
            return back(400);
        }
        return redirect()->route('vk.email.add');
    }
}
