<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Performance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UserView;
use Illuminate\Database\Eloquent\ModelNotFoundException;

// This PerformanceController manages CRUD operations for the Performance model which to represents musical performances. Key functions here include data filtering, sorting, and file handling, particularly for performance images, with a consistent user feedback mechanism through success messages.

class PerformanceController extends Controller
{
    // The index method manages data retrieval and dynamic filtering. It includes a query initiation with Performance::query(), allowing conditional clauses based on user input for search and sort terms. This separation keeps search and sort logic isolated, enhancing scalability if more filters are added later.
    public function index(Request $request)
    {

        // This gets the search term from the request if it exists
        $search = $request->input('search');
        // Gets the sorting options from the request
        $sort = $request->input('sort');

        $query = Performance::query();

        if ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('piece', 'LIKE', '%' . $search . '%')
                ->orWhere('composer', 'LIKE', '%' . $search . '%')
                ->orWhere('event', 'LIKE', '%' . $search . '%')
                ->orWhereHas('musicians', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%');
        });
    }
    
        if ($sort == 'title_asc') {
                // Sort the query results by the 'title' attribute in ascending order when the sort parameter is set to 'title_asc'.
            $query->orderBy('title', 'asc');
        } elseif ($sort == 'title_desc') {
                // Sort the query results by the 'title' attribute in descending order when the sort parameter is set to 'title_desc'.
            $query->orderBy('title', 'desc');
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
        $allTags = Tag::all();
        return view('performances.create', compact('allTags'));
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
'duration' => 'required|date_format:H:i:s',
'composer' => 'required',
'description' => 'required|max:500',
'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,afif|max:2048',
'musicians' => 'required|array',
'musicians.*' => 'exists:musicians,id',
'tags' => 'array'
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
'duration' => $request->duration,
'event' => $request->event,
'description' => $request->description,
'image' => $imageName,
'created_at' => now(),
        'updated_at' => now(),
        ]);

        $performance->musicians()->attach($request->musicians);

        return to_route('performances.index')->with('success', 'Book created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Performance $performance)
    {

// Log the user's view of this performance
if (auth()->check()) {
    $userView = UserView::create([
        'user_id' => auth()->id(),
        'composer' => $performance->composer,
        'performance_id' => $performance->id,
        'created_at' => now(),
    ]);
}


        $performance->load('reviews.user', 'musicians');
        $allTags = Tag::all();
        return view('performances.show')->with('performance', $performance, 'allTags');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Performance $performance)
    {
        $performance->load('tags');
        $allTags = Tag::all();
        return view('performances.edit')->with('performance', $performance, 'allTags');
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
        'duration' => 'required|date_format:H:i:s',
        'composer' => 'required',
        'description' => 'required|max:500',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,afif|max:2048', // Image is optional during update so that the user is not required to upload a new image at each update request.
        'musicians' => 'required|array',
        'musicians.*' => 'exists:musicians,id',
        'tags' => 'array',
        'tags.*' => 'exists:tags,id' // Validate each tag exists in the tags table
    ]);

    // Handle the uploaded image if there is one.
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/'), $imageName);
        $imageName = 'images/' . $imageName;

        // Update the image field in the model.
        $performance->image = $imageName;
    }

    $performance->update([
        'title' => $request->title,
        'piece' => $request->piece,
        'composer' => $request->composer,
        'duration' => $request->duration,
        'event' => $request->event,
        'description' => $request->description,
        'updated_at' => now(),
    ]);

// The update method validates and selectively updates attributes. This is similar to store, but here each attribute is individually updated because Performance::update() is not utilized. Individual attribute updates ($performance->attribute = $request->attribute) provide flexibility for complex update logic. The approach is optimal when the update logic varies by attribute or requires additional processing.

// Sync musicians to the performance
$performance->musicians()->sync($request->musicians);

// Sync tags to the performance
$performance->tags()->sync($request->tags);

    // Redirect back to the index page with a success message
    return to_route('performances.index')->with('success', 'Performance updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Performance $performance)
    {
       // Deletes the performance from the database.
    $performance->delete();

    // Redirects back to the index page with a success message.
    return to_route('performances.index')->with('success', 'Performance deleted successfully.');
    }
}
