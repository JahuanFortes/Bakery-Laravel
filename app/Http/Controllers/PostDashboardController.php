<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostDashboardController extends Controller
{
    public function index()
    {
        return view("posts-dashboard");
    }

    public function create()
    {
        return view("post-create");
    }
    //
}