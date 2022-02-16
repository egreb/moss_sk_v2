<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Schedule;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()->with('image:id,name', 'authors')->paginate(5)->through(fn ($post) => [
            'id' => $post->id,
            'title' => $post->title,
            'image' => $post->image?->url,
            'by' => $post->authors->pluck('name')->toArray(),
            'published' => !$post->draft,
            'created_at' => $post->created_at->format('h:m d-m-Y')
        ]);
        $schedules = Schedule::latest()->take(5)->get();
        return Inertia::render('Dashboard', [
            'posts' => $posts,
            'schedules' => $schedules
        ]);
    }
}
