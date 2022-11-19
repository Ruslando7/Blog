<?php


namespace App\Service\Social;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VkService
{
    public function saveVKData($user, $mail) {
        try{
            DB::beginTransaction();
            if (is_array($mail)) {
                $email = $mail['email'];
                $currentTime = null;
            } else {
                $email = $user->getEmail();
                $currentTime = Carbon::now();
            }
            $name = $user->getName();
            $password = Hash::make('123456789');
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
