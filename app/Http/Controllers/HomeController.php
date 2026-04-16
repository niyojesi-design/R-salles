<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::withCount('salles')->get();
        $featuredSalles = \App\Models\Salle::latest()->take(6)->get();
        $totalSalles = \App\Models\Salle::count();
        $totalReservations = \App\Models\Reservation::count();
        $totalClients = \App\Models\User::count();
        $totalCategories = \App\Models\Category::count();

        return view('home', compact(
            'categories',
            'featuredSalles',
            'totalSalles',
            'totalReservations',
            'totalClients',
            'totalCategories'
        ));
    }
}
