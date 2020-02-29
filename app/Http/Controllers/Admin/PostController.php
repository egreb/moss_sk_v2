<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Post as PostRequest;
use Auth;
use App\Post;
use App\Services\Slug;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;
use Illuminate\View\View;

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
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');

        return view('admin.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  $request PostRequest
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(PostRequest $request)
    {
        $request->merge([
            'slug' => $this->slug_generator->createSlug($request->title),
            'draft' => $request->has('draft') ? false : true
        ]);

        $post = Post::create($request->except('file'));
        $post->save();
        $post->authors()->sync([Auth::id()]);

        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return RedirectResponse
     * @return View
     */
    public function edit(string $id)
    {
        $post = Post::with('image')->find($id);
        if (is_null($post)) {
            return redirect()->route('admin.post.index');
        }

        return view('admin.post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return RedirectResponse
     * @throws \Exception
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            abort(404);
        }

        $post->title = $request->title;
        $post->ingress = $request->ingress;
        $post->story = $request->story;
        $post->draft = $request->has('draft') ? false : true;
        $post->image_id = $request->image_id;
        $post->touch(); // update timestamp
        $post->save();
        $post->authors()->syncWithoutDetaching([Auth::id()]);

        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if (is_null($post)) {
            abort(404);
        }

        $post->delete();
        return redirect()->route('admin.post.index');
    }

    public function deleteImage(string $id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            return response('not found', 404);
        }

        $post->image_id = null;

        $ok = $post->saveOrFail();
        if ($ok) {
            return response('ok', 200);
        }

        return response('something went wrong saving post', 500);
    }

    public function uploadImage(Request $request, string $id)
    {
        $all = $request->all();
        $files = $request->allFiles();
        $post = Post::find($id);
        if (is_null($post)) {
            return response('post not found', 404);
        }

        if ($request->has('image')) {
            $image = $this->imageRepo->store($request, 'image');

            if (!is_null($image)) {
                return response()->json([
                    'id' => $image->id,
                    'url' => $image->url(),
                    'srcset' => $image->srcset()
                ], 200);
            }

            return response('could not upload image', 501);
        }

        return response('need image', 402);
    }
}
