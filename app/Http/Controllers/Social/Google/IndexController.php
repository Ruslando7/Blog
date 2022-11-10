<?php

namespace App\Http\Controllers\Social\Google;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class IndexController extends BaseController
{
    public function __invoke()
    {
        return Socialite::driver('google')->redirect();
    }
}
