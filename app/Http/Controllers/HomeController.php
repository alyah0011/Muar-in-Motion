<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homepage;
use App\Models\Attraction;
use App\Models\Event;
use App\Http\Controllers\AdminDashboardController;

class HomeController extends Controller
{
    public function notLoggedInUser()
    {
        $homepage = Homepage::first();
        $topAttractions = Attraction::orderByDesc('average_rating')->take(6)->get();
        $upcomingevents = Event::where('eve_date', '>=', now())->orderBy('eve_date')->limit(6)->get();

        return view('dashboard', compact('homepage', 'topAttractions', 'upcomingevents'));
    }

    public function loggedInUser()
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            $userRole = auth()->user()->user_role;

            // Redirect based on the user role
            if ($userRole == 0) {
                // Assuming there is only one row in the homepages table
                $homepage = Homepage::first();
                $topAttractions = Attraction::orderByDesc('average_rating')->take(6)->get();
                $upcomingevents = Event::where('eve_date', '>=', now())->orderBy('eve_date')->limit(6)->get();
                

                return view('dashboard', compact('homepage', 'topAttractions', 'upcomingevents'));
            } elseif ($userRole == 1) {
                return app(AdminDashboardController::class)->index();
            }
        }

        // If not authenticated, handle accordingly
        return view('auth.login'); // Redirect to login page or show an error message
    }

}
