<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $performances = Performance::all();
       return view('performances.index', compact('performances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('performances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
'title' => 'required',
'piece' => 'required',
'event' => 'required',
'musician' => 'required',
'duration' => 'required|date_format:H:i:s',
'composer' => 'required',
'description' => 'required|max:500',
'image' => 'required|image|mimes:jpeg,png,jpg,gif,afif|max:2048',
        ]);

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/'), $imageName);
            $imageName = 'images/' . $imageName; 
        }

        Performance::create([
'title' => $request->title,
'piece' => $request->piece,
'composer' => $request->composer,
'musician' => $request->musician,
'duration' => $request->duration,
'event' => $request->event,
'description' => $request->description,
'image' => $imageName,
'created_at' => now(),
        'updated_at' => now(),
        ]);

        return to_route('performances.index')->with('success', 'Book created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Performance $performance)
    {
        return view('performances.show')->with('performance', $performance);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Performance $performance)
    {
        return view('performances.show')->with('performance', $performance);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Performance $performance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Performance $performance)
    {
        //
    }
}
