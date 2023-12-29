<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transportation; 

class TransportationController extends Controller
{
    public function index()
    {
        $transportations = Transportation::all();
 
        return view('ant.trans', ['transportations' => $transportations]);
    }

   

 

}
