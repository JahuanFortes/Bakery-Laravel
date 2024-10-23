<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth')->except([
//            'create',
//        ]);
//    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::all();
        $categories = Category::all();

        return view("post.index", compact(["posts", "categories"]));
//        [
//             => $posts,
//
//        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("post.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $posts = new Post();
        $categories = new Category();
        $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:50']
        ], ['title.required' => 'voorbeeld text'],
            ['description.required' => 'voorbeeld text']);
//
        $posts->title = $request->input("title");
        $posts->description = $request->input("description");
        $posts->user_id = \Auth::user()->id;
        $posts->category_id = $request->input('category');
        $posts->save();
        return redirect()->route('posts.index');

    }
//

    /**
     * Display the specified resource.
     */
    //display a single post
    public function show(post $post)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
//        $post=Post::find();
//        return view('post.create', compact('post'));

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
