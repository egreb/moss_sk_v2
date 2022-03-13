<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Post;
use App\Services\Slug;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;
use Carbon\Carbon;
use Illuminate\View\View;
use Request;
use Illuminate\Http\Request as HttpRequest;

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
        $post = new Post([
            'published_at' => Carbon::now('Europe/Oslo')->format('Y-m-d\TH:i'),
            'draft' => false,
        ]);

        return view('admin.post.create', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(HttpRequest $request)
    {
        Request::validate([
            'title' => 'required',
            'ingress' => 'required',
            'story' => 'required',
        ]);

        $request->merge([
            'slug' => $this->slug_generator->createSlug($request->title),
            'draft' => !$request->input('publish'),
            'published_at' => Carbon::createFromFormat('Y-m-d\TH:i', $request->input('published_at'))->format('Y-m-d H:i:s'),
        ]);

        $post = Post::create($request->except(['file', 'image', 'publish']));
        $post->authors()->sync([Auth::id()]);

        return redirect()->route('dashboard')->with('message', 'Post opprettet');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return RedirectResponse
     * @throws \Exception
     */
    public function update(HttpRequest $request, string $id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            abort(404, 'Post ikke funnet');
        }

        Request::validate([
            'title' => 'required',
            'ingress' => 'required',
            'story' => 'required',
        ]);

        $request->merge([
            'draft' => !$request->publish,
        ]);

        $post->update($request->except(['file', 'image', 'publish', 'created_at', 'updated_at']));

        $post->touch(); // update timestamp
        $post->save();
        $post->authors()->syncWithoutDetaching([Auth::id()]);

        return redirect()->route('dashboard')->with('message', 'Post oppdatert');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(string $id)
    {
        $post = Post::find($id);

        if (is_null($post)) {
            abort(404);
        }

        $post->delete();
        return redirect()->route('dashboard')->with('message', 'Post slettet!');
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
