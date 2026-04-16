<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use App\Http\Requests\StoreSalleRequest;
use App\Http\Requests\UpdateSalleRequest;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = Salle::all();
        return view('salles.index', compact('salles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    $categories = \App\Models\Category::all();
        return view('salles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalleRequest $request)
    {
        Salle::create($request->validated());
        return redirect()->route('salles.index')->with('success', 'Salle créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salle $salle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salle $salle)
    {
        //
            return view('salles.edit', compact('salle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalleRequest $request, Salle $salle)
    {
        $salle->update($request->validated());
        return redirect()->route('salles.index')->with('success', 'Salle mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salle $salle)
    {
        //
    }
}
