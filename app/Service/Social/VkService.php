<?php


namespace App\Service\Social;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VkService
{
    public function saveVKData($user, $mail = '') {
        try{
            DB::beginTransaction();
            $email = $user->getEmail();
            if (!$email) {
                $email = $mail['email'];
            }
            $name = $user->getName();
            $password = Hash::make('123456789');

            $newUser = User::firstOrCreate(['email' => $email], [
                'email' => $email,
                'name' => $name,
                'password' => $password,
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $newUser;
    }
}
