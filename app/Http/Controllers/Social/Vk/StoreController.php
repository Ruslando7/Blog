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
        session(['mail' => $mail]);
        return redirect()->route('vk.callback');
    }
}
