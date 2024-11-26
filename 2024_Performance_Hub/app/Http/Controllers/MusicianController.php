<?php

namespace App\Http\Controllers;

use App\Models\Musician;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $musicians = Musician::all();
        return view('musicians.index', compact('musicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('musicians.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'instrument' => 'required|max:255',
            'genre' => 'required|max:255',
        ]);

        Musician::create($request->all());

        return redirect()->route('musicians.index')->with('success', 'Musician added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Musician $musician)
    {
        return view('musicians.show', compact('musician'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Musician $musician)
    {
        return view('musicians.edit', compact('musician'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Musician $musician)
    {
        $request->validate([
            'name' => 'required|max:255',
            'instrument' => 'required|max:255',
            'genre' => 'required|max:255',
        ]);

        $musician->update($request->all());

        return redirect()->route('musicians.index')->with('success', 'Musician updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Musician $musician)
    {
        $musician->delete();

        return redirect()->route('musicians.index')->with('success', 'Musician deleted successfully!');

    }
}
