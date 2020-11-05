<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    // public function update($user, array $input)
    // {
    //     Validator::make($input, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'email', 'max:255', Rule::unique('organisasi')->ignore($user->id)],
    //         'photo' => ['nullable', 'image', 'max:1024'],
    //     ])->validateWithBag('updateProfileInformation');

    //     if (isset($input['photo'])) {
    //         $user->updateProfilePhoto($input['photo']);
    //     }

    //     $user->forceFill([
    //         'name' => $input['name'],
    //         'email' => $input['email'],
    //     ])->save();
    // }

    public function update($organisasi, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('organisasi')->ignore($organisasi->id)],
            'photo' => ['nullable', 'image', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $organisasi->updateProfilePhoto($input['photo']);
        }

        $organisasi->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
        ])->save();
    }
}
