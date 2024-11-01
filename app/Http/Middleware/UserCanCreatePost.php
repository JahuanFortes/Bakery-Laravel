<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserCanCreatePost
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        $user = $request->user();
//
//        $likedPostsCount = $user->likedPosts()->where('user_id', '!=', $user->id)->count();
//
//        if ($likedPostsCount < 2) {
//            return redirect()->route('posts.index')->with('error', 'You need to like at least 2 posts from other users to create a post.');
//        }
        return $next($request);
    }
}
