<?php

namespace App\Http\Controllers\Social\Google;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class CallBackController extends BaseController
{
    public function __invoke()
    {
        $user = Socialite::driver('google')->user();
        if ($user = $this->service->saveGoogleData($user)) {
            Auth::login($user);
            return redirect()->route('main.index');
        }
        return back(400);
    }
}
