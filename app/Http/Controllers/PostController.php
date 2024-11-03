<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Constructor with middleware (commented out) to require authentication for all methods except 'create'
    // public function __construct()
    // {
    //     $this->middleware('auth')->except([
    //         'create',
    //     ]);
    // }

    /**
     * Display a listing of all active posts along with their categories.
     */
    public function index(Request $request)
    {
        // Fetches all posts with 'active' status set to true
        $posts = Post::where('active', true)->get();

        // Retrieves all categories
        $categories = Category::all();

        // Returns 'post.index' view with posts and categories data
        return view("post.index", compact(["posts", "categories"]));
    }

    /**
     * Show the form to create a new post, ensuring the user is authenticated.
     */
    public function create()
    {
        // Fetches all categories
        $categories = Category::all();

        // Check if user is logged in
        if (\Auth::check()) {
            // Display 'post.create' view with categories data
            return view("post.create", compact('categories'));
        } else {
            // Redirect to login if user is not authenticated
            return redirect("login");
        }
    }

    /**
     * Like functionality for a post. If the user has already liked the post,
     * it increments the like count; otherwise, it creates a new like.
     */
    public function like($postId)
    {
        $user = \Auth::user();
        $post = Post::findOrFail($postId);

        // Check if user has already liked this post
        $like = $user->post()->where('post_id', $postId)->first();

        if ($like) {
            // Increment existing like count if the user previously liked the post
            $like->pivot->likecount++;
            $like->pivot->save();
        } else {
            // Attach new like with likecount set to 1
            $user->post()->attach($postId, ['likecount' => 1]);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'You liked the post!');
    }

    /**
     * Store a new post in the database, requiring at least two previous likes from the user.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:50'
        ], [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required'
        ]);

        $user = auth()->user();

        // Calculate total like count across user's posts
        $likeCount = $user->post()->sum('likecount');

        // Check if the user has liked at least two posts
        if ($likeCount < 2) {
            return redirect()->back()->withErrors(['You need to like at least two posts to create a new post.']);
        }

        // Create a new post with data from request
        $post = new Post();
        $post->title = $request->input("title");
        $post->description = $request->input("description");
        $post->user_id = $user->id;
        $post->category_id = $request->input('category');
        $post->save();

        // Redirect to the posts index
        return redirect()->route('posts.index');
    }

    /**
     * Display a single post by ID.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id); // Finds post or throws 404 error if not found

        return view('post.show', compact("post"));
    }

    /**
     * Show the form to edit an existing post.
     */
    public function edit(Post $post)
    {
        // Fetches all categories to display as options in the edit form
        $categories = Category::all();

        // Returns 'admin.edit' view with the post and categories data
        return view('admin.edit', compact("post", "categories"));
    }

    /**
     * Update an existing post with new data.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:50',
            'category' => 'required'
        ], [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required'
        ]);

        // Updates the post with validated data
        $post->update($request->all());

        // Redirects to the admin index page after updating
        return redirect()->route('admin.index');
    }

    /**
     * Delete a specified post from storage.
     */
    public function destroy(Post $post)
    {
        // Deletes the specified post
        $post->delete();

        // Redirect to admin index with a success message
        return redirect()->route('admin.index')->with('success', 'Post deleted successfully.');
    }

    /**
     * Search for posts based on keywords in title, description, or related user name.
     */
    public function search(Request $request)
    {
        $search = $request->search;
        $query = Post::query();

        // If both title and description are provided, search within both
        if ($request->filled(['title', 'description'])) {
            $query->whereAll(['title', 'description'], 'LIKE', "%$search%");
        } else {
            $query->whereAny(['title', 'description'], 'LIKE', "%$search%");
        }

        // Extend search to match keywords in the associated user name
        $query->orWhereHas('user', function ($query) use ($search) {
            $query->whereAny(["name"], 'LIKE', "%$search%");
        });

        // Get matched posts and display them
        $posts = $query->get();
        return view('post.index', compact("posts"));
    }

    /**
     * Filter posts based on selected category.
     */
    public function filter(Request $request)
    {
        $categories = Category::all();

        $query = Post::query();

        // Filter posts by the specified category ID
        $query->where('category_id', $request->category_id);

        $posts = $query->get();

        return view('admin.index', compact(['posts', 'categories']));
    }

    /**
     * Toggle the active status of a specified post.
     */
    public function toggleActive(Post $post)
    {
        // Flip the 'active' status of the post
        $post->active = !$post->active;
        $post->save();

        // Redirect back to admin index
        return redirect()->route('admin.index');
    }
}
