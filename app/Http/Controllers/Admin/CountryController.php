<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index()
    {
        $countries =  Country::withCount('destinations')->get();

        return view('admin.countries.index', compact('countries'));
    }




    public function create()
    {

        $continents = Country::all();
        return view('admin.countries.create', compact('continents'));
    }



    public function store(Request $request)
    {
        $request->merge([
            'name' => ucfirst(strtolower($request->name))
        ]);

        $validated =   $request->validate([
            'name' => 'required|unique:countries|max:255',
            'continent' => 'required',
            'description' => 'nullable'
        ]);
        $newCountry = new Country();
        $newCountry->name = $validated['name'];
        $newCountry->continent = $validated['continent'];
        $newCountry->description = $validated['description'];
        $newCountry->save();
        return redirect()->route('admin.countries.index');
    }


    public function show(Country $country)

    {

        return view('admin.countries.show', compact('country'));
    }


    public function edit(string $id) {}


    public function update(Request $request, string $id) {}


    public function destroy(string $id) {}
}
