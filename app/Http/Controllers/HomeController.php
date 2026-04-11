<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        $salles = \App\Models\Salle::all();
        return view('home', compact('salles'));
    }
}
