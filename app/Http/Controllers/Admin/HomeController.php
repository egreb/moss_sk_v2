<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Schedule;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(5)->get();
        $schedules = Schedule::latest()->take(5)->get();

        return Inertia::render('Dashboard', ['posts' => $posts, 'schedules' => $schedules]);
    }
}
