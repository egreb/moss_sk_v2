<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function get($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (is_null($post)) {
            abort(404);
        }

        return view('app.post', ['post' => $post]);
    }
}
