<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use Laravel\Fortify\Http\Controllers\RegisteredUserController as FortifyRegisteredUserController;

class RegisterController extends FortifyRegisteredUserController
{
    // ... (existing code)

    public function create(Request $request): RegisterViewResponse
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_fname' => $request->input('user_fname'),
            'user_location' => $request->input('user_location'),
            'user_phoneno' => $request->input('user_phoneno'),
            'user_role' => $request->input('user_role'),
            'user_travelpref' => $request->input('user_travelpref'),
        ]);

        return app(RegisterViewResponse::class);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_fname' => ['required', 'string', 'max:30'],
            'user_location' => ['required', 'string', 'max:30'],
            'user_phoneno' => ['required', 'string', 'max:20'],
            'user_role' => ['required', 'integer', 'in:0,1'],
            'user_travelpref' => ['nullable', 'string', 'max:500'],
        ]);
    }
}
