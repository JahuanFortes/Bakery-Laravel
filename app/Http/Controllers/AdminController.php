<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        
        $users = User::all();
        $posts = Post::all();
        $categories = Category::all();

        return view("admin.index", compact(["posts", "categories", "users"]));
    }

    //
}
