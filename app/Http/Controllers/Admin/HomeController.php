<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Schedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at')->take(5)->get();
        $schedules = Schedule::orderBy('updated_at')->take(5)->get();

        return view('admin.home', ['posts' => $posts, 'schedules' => $schedules]);
    }
}
