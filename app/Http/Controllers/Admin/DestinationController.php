<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DestinationController extends Controller
{

    public function index()
    {
        $destinations = Destination::with('country')->get();
        return view('admin.destinations.index', compact('destinations'));
    }




    public function create()
    {
        $countries = Country::all();
        $tags = Tag::all();
        return view('admin.destinations.create', compact('countries', 'tags'));
    }



    public function store(Request $request)
    {
        $request->merge([
            'title' => ucfirst(strtolower($request->title))
        ]);

        $validated = $request->validate([
            'title' => 'required|unique:destinations,title',
            'country_id' => 'required|exists:countries,id',
            'cover_image' => 'nullable|image',
            'description' => 'nullable',
            'price_person' => 'nullable|numeric',
            'duration' => 'nullable|integer',
            'tags' => 'nullable|array'
        ]);
        $newDestination = new Destination();
        $newDestination->title = $validated['title'];
        $newDestination->slug = Str::slug($validated['title'], '-');
        $newDestination->country_id = $validated['country_id'];
        $newDestination->description = $validated['description'];
        $newDestination->price_person = $validated['price_person'];
        $newDestination->duration = $validated['duration'];

        if (isset($validated['cover_image'])) {
            $path = Storage::disk('public')->putFile('cover_images', $validated['cover_image']);
            $newDestination->cover_image = $path;
        }

        $newDestination->save();

        if (isset($validated['tags'])) {
            $newDestination->tags()->attach($validated['tags']);
        }

        return redirect()->route('admin.destinations.index');
    }


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
