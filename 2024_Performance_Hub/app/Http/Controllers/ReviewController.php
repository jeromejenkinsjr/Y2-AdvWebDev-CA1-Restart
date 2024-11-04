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
       // Deletes the performance from the database.
    $review->delete();

    }
}
