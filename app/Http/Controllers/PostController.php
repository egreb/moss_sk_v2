<?php

namespace App\Http\Controllers;

use App\Post;
use App\Schedule;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function get($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (is_null($post)) {
            abort(404);
        }

        $event = Schedule::where('active', true)->first();
        if (!is_null($event)) {
            $event = $event->nextEvent();
        }
        if (!empty($post->ingress)) {
            $ogDescription = parsedown($post->ingress);
        } else {
            $ogDescription = substr(parsedown($post->content), 0, 100) . '...';
        }

        return view('app.post',
            [
                'post' => $post,
                'event' => $event,
                'ogTitle' => $post->title,
                'ogDescription' => strip_tags($ogDescription),
                'ogImage' => $post->image ? $post->image->url() : null
            ]);
    }
}
