<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        //dd($request->all());

        $user = Auth::user();
        $user->user_travelpref = $request->input('notes');
        $user->save();

        return redirect()->back()->with('success', 'Travel preferences updated successfully!');
    }
}
