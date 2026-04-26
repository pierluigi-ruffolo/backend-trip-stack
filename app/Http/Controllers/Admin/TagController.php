<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::withCount('destinations')->get();
        return view('admin.tags.index', compact('tags'));
    }


    public function create()
    {

        return view('admin.tags.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:30|unique:tags,name',
            'color' => 'required|string|size:7|regex:/^#([A-Fa-f0-9]{6})$/',
        ]);

        $newTag = new Tag();
        $newTag->name = $validated['name'];
        $newTag->color = $validated['color'];
        $newTag->save();
        return redirect()->route('admin.tags.index');
    }


    public function edit(Tag $tag)
    {

        return view('admin.tags.edit', compact('tag'));
    }


    public function update(Request $request, Tag $tag)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:30|unique:tags,name,' . $tag->id,
            'color' => 'required|string|size:7|regex:/^#([A-Fa-f0-9]{6})$/',
        ]);

        $tag->name = $validated['name'];
        $tag->color = $validated['color'];
        $tag->update();

        return redirect()->route('admin.tags.show', $tag);
    }





    public function show(Tag $tag)
    {

        $tag->load('destinations');
        return view('admin.tags.show', compact('tag'));
    }





    public function destroy(Tag $tag)
    {

        $tag->delete();
        return redirect()->route('admin.tags.index');
    }
}
