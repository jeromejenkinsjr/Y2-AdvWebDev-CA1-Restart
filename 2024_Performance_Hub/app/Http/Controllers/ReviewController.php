<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $performanceId)
    {
        // Validate the request data
        $request->validate([
            'content' => 'required|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Create a new review
        Review::create([
            'performance_id' => $performanceId,
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
        ]);

        // Redirect back to the performance page with a success message
        return redirect()->route('performances.show', $performanceId)->with('success', 'Review added successfully!');
    }

    public function destroy(Review $review)
    {
       // Deletes the performance from the database using the method delete().
    $review->delete();
    return redirect()->back()->with('success', 'Review deleted successfully.'); // When delete fuction is run 
    }

    public function edit(Review $review)
    {
        // The code beneath checks if the user is the admin, and if not, it results to routing back to the index with the error message.
        if (auth()->user()->id !== $review-> user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('performances.index')->with('error', 'Access denied.');
        }

        return view('reviews.edit', compact('review'));
}

    public function update(Request $request, Review $review)
    {

        $review->update($request->only(['rating', 'content']));

        return redirect()->route('performances.show', $review->performance_id)
        ->with('success', 'Review updated successfully.');
    }
}