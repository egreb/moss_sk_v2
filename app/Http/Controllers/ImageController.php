<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ImageRepository;

/**
 * @property ImageRepository imageRepo
 */
class ImageController extends Controller
{
    public function __construct(ImageRepository $imageRepo)
    {
        $this->imageRepo = $imageRepo;
    }

    public function store(Request $request)
    {
        if (!$request->hasFile('image')) {
            return response()->json(['data' => null, 'error' => 'no image provided']);
        }
        $image = $this->imageRepo->store($request);
        $data = [
            'data' => [
                'filePath' => $image->url('small'),
                'id' => $image->id,
                'url' => $image->url(),
                'srcset' => $image->srcset()
            ]
        ];
        return response()->json($data);
    }

    public function show()
    {
        $images = $this->imageRepo->get();

        return view('admin.gallery', ['images' => $images->toArray()]);
    }

    public function fetch()
    {
        $images = $this->imageRepo->get();
        return response()->json([
            'success' => true,
            'data' => $images
        ]);
    }
}
