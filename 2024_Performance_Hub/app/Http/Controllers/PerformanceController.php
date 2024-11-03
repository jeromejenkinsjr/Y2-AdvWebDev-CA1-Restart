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
    public function index(Request $request)
    {

        // This gets the search term from the request if it exists
        $search = $request->input('search');

        $query = Performance::query();

        if ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%')
                  ->orWhere('piece', 'LIKE', '%' . $search . '%')
                  ->orWhere('composer', 'LIKE', '%' . $search . '%')
                  ->orWhere('musician', 'LIKE', '%' . $search . '%')
                  ->orWhere('event', 'LIKE', '%' . $search . '%');
        }
    
        // Get all or filtered performances
        $performances = $query->get();
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
'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,afif|max:2048',
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
        return view('performances.edit')->with('performance', $performance);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Performance $performance)
    {
         // Validate the incoming data
    $request->validate([
        'title' => 'required',
        'piece' => 'required',
        'event' => 'required',
        'musician' => 'required',
        'duration' => 'required|date_format:H:i:s',
        'composer' => 'required',
        'description' => 'required|max:500',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,afif|max:2048', // Image is optional during update so that the user is not required to upload a new image at each update request.
    ]);

    // Handle the uploaded image if there is one.
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/'), $imageName);
        $imageName = 'images/' . $imageName;

        // Update the image field in the model.
        $performance->image = $imageName;
    }

// I forgot to explain in the previous commit, but the reason for individually referencing $performance->attribute is that unlike the store method which uses Performance::create() to set all attributes at once, there's no direct equivalent method for updating all attributes together. This is why I update each attribute individually before calling $performance->save(). After looking into it, I did see I could have also used $performance->update() with an array of updated attributes which works similarly to create().

    $performance->title = $request->title;
    $performance->piece = $request->piece;
    $performance->composer = $request->composer;
    $performance->musician = $request->musician;
    $performance->duration = $request->duration;
    $performance->event = $request->event;
    $performance->description = $request->description;

    $performance->updated_at = now();
    $performance->save();

    // Redirect back to the index page with a success message
    return to_route('performances.index')->with('success', 'Performance updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Performance $performance)
    {
        //
    }
}
