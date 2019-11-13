<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ImageRepository;

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

        return response()->json(['data' => $image, 'error' => null]);
    }
}
