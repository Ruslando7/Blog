<?php


namespace App\Http\Controllers\Personal\User;


use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke() {
        $user = auth()->user();
        return view('personal.user.edit', compact('user'));
    }

}
