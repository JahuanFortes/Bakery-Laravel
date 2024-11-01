<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        $user = auth()->user();

        if ($user->likedPosts()->where('post_id', $post->id)->exists()) {
            return back()->with('error', 'You have already liked this post.');
        }

        $user->likedPosts()->attach($post->id);

        return back()->with('success', 'Post liked successfully.');
    }


}
