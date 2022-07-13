<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::latest()->paginate(20);

        return view('dashboard.post.index', $data);
    }

    public function create()
    {
        $data['tags'] = Tag::all();
        $data['categories'] = Category::all();

        return view('dashboard.post.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts,title',
            'image' => 'image',
            'description' => 'required',
            'category' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->image = 'image.jpg';
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->published_at = Carbon::now();

        $post->save();

        $post->tags()->attach($request->tags);

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
            $post->save();
        }

        Session::flash('success', 'New Post Created.');

        return redirect()->back();
    }

    public function show(Post $post)
    {
        return view('dashboard.post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $data['post'] = $post;
        $data['tags'] = Tag::all();
        $data['categories'] = Category::all();

        return view('dashboard.post.edit', $data);
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => "required|unique:posts,title, $post->id",
            'description' => 'required',
            'category' => 'required',
        ]);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category;

        $post->tags()->sync($request->tags);

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
        }

        $post->save();

        Session::flash('success', 'Post updated.');

        return redirect()->route('dashboard.post.edit', $post);;
    }

    public function destroy(Post $post)
    {
        if(file_exists(public_path($post->image)))
        {
            unlink(public_path($post->image));
        }

        $post->delete();
        Session::flash('success', 'Post deleted.');

        return redirect()->back();
    }
}
