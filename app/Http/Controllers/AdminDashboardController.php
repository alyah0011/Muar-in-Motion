<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        
        // Check if the authenticated user has a user role of 1 (admin)
        if (auth()->check() && auth()->user()->user_role == 1) {
            return view('admin.dashboard');
        } else {
            // Redirect the user to a different route if they don't have the required role
            return redirect()->route('dashboard'); // Change 'home' to the desired route
        }
    }
}
