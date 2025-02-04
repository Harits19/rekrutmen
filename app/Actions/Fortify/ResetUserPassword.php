<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    // public function reset($user, array $input)
    // {
    //     Validator::make($input, [
    //         'password' => $this->passwordRules(),
    //     ])->validateWithBag('updatePassword');

    //     $user->forceFill([
    //         'password' => Hash::make($input['password']),
    //     ])->save();
    // }

    public function reset($organisasi, array $input)
    {
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->validateWithBag('updatePassword');

        $organisasi->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}
