<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Post;
use Carbon\Carbon;
use App\Services\Slug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;
use App\User;

class PostController extends Controller
{
    private $imageRepo;
    private $user_id;
    private $slug_generator;

    public function __construct(ImageRepository $imageRepo)
    {
        $this->user_id = Auth::id();
        $this->slug_generator = new Slug();
        $this->imageRepo = $imageRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\View
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc('updated_at');

        return view('admin.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = null;

        if ($request->has('delete_image')){
            return view('admin.post.create', ['image' => $image]);
        }

        if ($request->has('image')) {
            $image = $this->imageRepo->store($request);

            if (empty($request->title)) {
                return view('admin.post.create', ['image' => $image]);
            }
        }

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $this->slug_generator->createSlug($request->title);
        $post->ingress = $request->ingress;
        $post->content = $request->content;
        $post->draft = $request->has('draft') ? false : true;

        if (!is_null($image)) {
            $post->image_id = $image->id;
        } else if(!empty($request->image_id)) {
            $post->image_id = $request->image_id;
        }
        $post->save();
        $post->authors()->sync([Auth::id()]);

        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            return redirect()->route('admin.post.index');
        }

        return view('admin.post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            abort(404);
        }

        if ($request->has('delete_image')) {
            if (!is_null($post->image)) {
                $post->image()->delete();
            }

            return back()->with('post', $post);
        }


        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        if ($request->has('image')) {
            $image = $this->imageRepo->store($request);
            if (!is_null($image)) {
                $post->image_id = $image->id;
                $post->save();
            }
            return back()->with('post', $post);
        }

        $post->title = $request->title;
        $post->slug = $this->slug_generator->createSlug($post->title, $id);
        $post->ingress = $request->ingress;
        $post->content = $request->content;
        $post->draft = $request->has('draft') ? false : true;
        $post->touch(); // update timestamp
        $post->save();
        $post->authors()->syncWithoutDetaching([Auth::id()]);

        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, string $id)
    {
        $post = Post::find($id);

        if (is_null($post)) {
            abort(404);
        }

        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
