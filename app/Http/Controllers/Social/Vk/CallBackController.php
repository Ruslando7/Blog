<?php

namespace App\Http\Controllers\Social\Vk;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class CallBackController extends BaseController
{
    public function __invoke()
    {
        $user = Socialite::driver('vkontakte')->user();
        session(['user' => $user]);
        if ($user->getEmail()) {
            if ($user = $this->service->saveVkData($user)) {
                session()->forget('user');
                Auth::login($user);
                return redirect()->route('main.index');
            }
            return back(400);
        }
        return redirect()->route('vk.email.add');
    }
}
