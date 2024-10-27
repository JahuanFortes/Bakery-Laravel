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
    public function index(Request $request)
    {
//#region Filter
//        $filter = $request->query('filter'); // Capture the filter value
//        // Apply your filter logic based on the selected option
//        $items = Post::query();
//
//        if ($filter) {
//            $items->where('category', $filter); // Adjust this to fit your actual filter logic
//        }
//
//        $items = $items->get();
//#endregion

//#region search
//        if (request('search')) {
//            $posts = Post::where('title', 'like', '%' . request('search') . '%')->get();
//        } else {
//
//        }
//#endregion search
        $posts = Post::all();
        $categories = Category::all();

        return view("post.index", compact(["posts", "categories"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $user = \Auth::user();
        if (\Auth::check()) {
            return view("post.create", compact('categories'));
        } else {
            return redirect("login");
        }
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

        return view('post.show', compact("postShow"));
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
