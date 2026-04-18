<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{

    public function index()
    {
        $destinations = Destination::with('country')->get();

        return view('admin.destinations.index', compact('destinations'));
    }


    public function create() {}


    public function store(Request $request) {}


    public function show(Destination $destination)
    {
        $destination->load('country', 'tags');
        return view('admin.destinations.show', compact('destination'));
    }







    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
