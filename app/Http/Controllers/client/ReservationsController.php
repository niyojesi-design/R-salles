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
    public function store(Request $request, $salle_id)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'required|integer|min:1',
        ]);

        $reservation = new \App\Models\Reservation();
        $reservation->salle_id = $salle_id;
        $reservation->user_id = auth()->id();
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->duration = $request->duration;
        $reservation->save();

        return redirect()->route('client.reservations.index', ['salle_id' => $salle_id])->with('success', 'Réservation créée avec succès !');
    }
}
