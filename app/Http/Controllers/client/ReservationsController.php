<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function create($salle_id)
    {
    $salle = \App\Models\Salle::findOrFail($salle_id);
    return view('reservation.create', compact('salle'));
    }
}
