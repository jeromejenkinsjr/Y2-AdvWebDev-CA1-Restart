<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        // Load performances related to this tag
        $performances = $tag->performances()->with('tags')->get();

        // Return the view with performances
        return view('tags.show', [
            'tag' => $tag,
            'performances' => $performances,
        ]);
    }
}
