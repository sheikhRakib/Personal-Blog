<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    public function index()
    {
        $data['tags'] = Tag::latest('id')->paginate(10);

        return view('dashboard.tag.index', $data);
    }

    public function create()
    {
        return view('dashboard.tag.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags,name',
        ]);

        $category = new Tag();
        $category['name'] = $request->name;
        $category['description'] = $request->description;
        $category->save();

        Session::flash('success', 'New Tag Created.');

        return redirect()->back();

    }

    public function show(Tag $tag)
    {
        return view('dashboard.tag.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('dashboard.tag.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'name' => "required|unique:tags,name,$tag->id",
        ]);

        $tag->name = $request->name;
        $tag->description = $request->description;
        $tag->save();

        Session::flash('success', 'Tag updated successfully');
        return redirect()->route('dashboard.tag.edit', $tag->slug);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        Session::flash('success', 'Tag deleted');
        return redirect()->route('dashboard.tag.index');
    }
}
