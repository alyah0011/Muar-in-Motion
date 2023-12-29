<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'user_fname' => ['required', 'string', 'max:30'], // Add validation for user_fname
            'user_location' => ['required', 'string', 'max:30'], // Add validation for user_location
            'user_phoneno' => ['required', 'string', 'max:20'], // Add validation for user_phoneno
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'user_fname' => $input['user_fname'], // Include user_fname in the User::create statement
            'user_location' => $input['user_location'], // Include user_location in the User::create statement
            'user_phoneno' => $input['user_phoneno'], // Include user_phoneno in the User::create statement
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
