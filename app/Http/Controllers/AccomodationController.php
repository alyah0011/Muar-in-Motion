<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accomodation; 

class AccomodationController extends Controller
{
   // Display a list of accommodations
   public function index()
   {
       $accommodations = Accomodation::all();

       return view('ant.acco', ['accommodations' => $accommodations]);
   }

   // Show details of a specific accommodation
   public function show($acco_id)
   {
       $accommodation = Accomodation::find($acco_id);

       return view('ant.accodetail', ['accommodation' => $accommodation]);
   } 

   
}
