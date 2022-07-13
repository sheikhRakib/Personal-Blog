<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public $g_data;

    public function __construct()
    {
        $this->g_data['setting'] = Setting::first();
        $this->g_data['categories'] = Category::all();
    }

    public function index()
    {
        $data['setting']    = $this->g_data['setting'];
        $data['categories'] = $this->g_data['categories'];

        $posts  = Post::with('category')->orderBy('created_at', 'DESC')->take(5)->get();
        $data['posts']          = $posts;
        $data['leftPosts']      = $posts->splice(0, 2);
        $data['centerPost']     = $posts->splice(0, 1);
        $data['rightPosts']     = $posts->splice(0);

        $footerPosts = Post::with('category')->inRandomOrder()->limit(4)->get();
        $data['firstFooterPost']    = $footerPosts->splice(0, 1);
        $data['firstfooterPosts2']  = $footerPosts->splice(0, 2);
        $data['lastFooterPost']     = $footerPosts->splice(0, 1);
        $data['recentPosts']        = Post::with('category')->orderBy('created_at', 'DESC')->paginate(9);

        // return $data;
        return view('website.home', $data);
    }

    public function category(Category $category)
    {
        return $category;
    }

    public function post(Post $post)
    {
        return $post;
    }
}
