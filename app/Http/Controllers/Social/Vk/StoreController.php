<?php

namespace App\Http\Controllers\Social\Vk;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\Social\Vk\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $mail = $request->validated();
        $user = session('user');
        if ($user = $this->service->saveVkData($user, $mail)) {
            event(new Registered($user));
            session()->forget('user');
            Auth::login($user);
            return redirect()->route('main.index');
        }
        return back(400);
    }
}
