<?php


namespace App\Http\Controllers\Personal\User;


use App\Http\Controllers\Controller;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function __invoke() {
        $user = auth()->user();
        $date = Carbon::parse($user->created_at);
        return view('personal.user.index', compact('user', 'date'));
    }

}
