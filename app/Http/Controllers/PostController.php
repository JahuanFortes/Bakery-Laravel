<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\post;
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
//        $post = new Post();
//        $post->title = "haha";
        return view("post.index", [
            "posts" => $posts
        ]);
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
//        $posts = new Posts();
//        $categories = new Category();
//        $request->validate([
//            'title ' => 'required',
//            'description ' => 'required',
//        ], ['name.required' => 'voorbeeld text']);
//
//        $posts->title = $request->input("#");
//        $posts->description = $request->input("#");
//        $categories-> id =$request->input("");
//        $posts->save();
//        //$post->user_id= /auth::user()->id
//        //$post->save()
//        return redirect()->route('posts.index');
    }
//

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
//        return view("post.details",[
//            'post'=>$post
//        ]);
        //
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
