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

        $posts = Post::all();
        $categories = Category::all();

        return view("post.index", compact(["posts", "categories"]));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $query = Post::query();
        $query->whereAny(['title', 'description'], 'LIKE', "%$search%");

        $query->orWhereHas('category', function ($query) use ($search) {
            $query->whereAny(["title"], 'LIKE', "%$search%");
        })
            ->orWhereHas('user', function ($query) use ($search) {
                $query->whereAny(["name"], 'LIKE', "%$search%");
            });
        $posts = $query->get();
        return view('post.index', compact("posts"));
    }

    public function filter(Request $request)
    {
        $filter = $request->filter;
        $query = Post::query();
        $query->whereHas('category', function ($query) use ($filter) {
            $query->whereAny(["title"], 'LIKE', "%$filter%");
        });
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
        ], ['title.required' => 'Title is required'],
            ['description.required' => 'Description is required']);

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
