<?php

namespace App\Http\Controllers\Social\Vk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AddController extends BaseController
{
    public function __invoke()
    {
        return view('social.vk.auth');
    }
}
