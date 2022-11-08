<?php


namespace App\Http\Controllers\Personal\User;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke() {
        $user = auth()->user();
        return view('personal.user.index', compact('user'));
    }

}
