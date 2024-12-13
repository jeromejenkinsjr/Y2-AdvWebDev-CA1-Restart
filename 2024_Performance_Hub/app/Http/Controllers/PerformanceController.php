<?php

namespace App\Http\Controllers;

use App\Models\Musician;
use App\Models\Tag;
use App\Models\Performance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UserView;

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

        $tagIds = $request->input('tags', []);

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
    

    if (!empty($tagIds)) {
        $query->whereHas('tags', function ($q) use ($tagIds) {
            $q->whereIn('tags.id', $tagIds); // Specify tags.id to avoid ambiguity
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
        $allTags = Tag::all(); // Fetch all tags for the filter UI
        return view('performances.index', compact('performances', 'allTags', 'search', 'sort', 'tagIds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allMusicians = Musician::all();
        $allTags = Tag::all();
        return view('performances.create', compact('allTags', 'allMusicians'));
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
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id',
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/'), $imageName);
        $imageName = 'images/' . $imageName;
    }

    $performance = Performance::create([
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
    
$performance->tags()->attach($request->input('tags', []));


    return redirect()->route('performances.index')->with('success', 'Performance created successfully!');
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
    $performance->load('tags'); // Load related tags for the performance
    $allTags = Tag::all(); // Get all available tags

    // Pass both variables to the view using compact
    return view('performances.edit', [
        'performance' => $performance,
        'allTags' => $allTags,
        'allMusicians' => Musician::all(),
    ]);
    

}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Performance $performance)
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
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id',
    ]);

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/'), $imageName);
        $performance->image = 'images/' . $imageName;
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

    $performance->musicians()->sync($request->musicians);
    $performance->tags()->sync($request->input('tags', []));


    return redirect()->route('performances.index')->with('success', 'Performance updated successfully!');
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
