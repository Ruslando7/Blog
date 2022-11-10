<?php


namespace App\Service\Social;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GoogleService
{
    public function saveGoogleData($user) {
        try{
            DB::beginTransaction();
            $email = $user->getEmail();
            $name = $user->getName();
            $password = Hash::make('123456789');
            $currentTime = Carbon::now();

            $newUser = User::firstOrCreate(['email' => $email], [
                'email' => $email,
                'name' => $name,
                'password' => $password,
                'email_verified_at' => $currentTime,
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $newUser;
    }
}
