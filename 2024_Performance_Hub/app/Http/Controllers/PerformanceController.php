<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $performances = Book::all();
       return view('performances.index', compact('performances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Performance $performance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Performance $performance)
    {
        //
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
