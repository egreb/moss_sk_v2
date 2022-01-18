<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private ImageRepository $repo;

    public function __construct(ImageRepository $imageRepo)
    {
        $this->repo = $imageRepo;
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        if (!$request->hasFile('image')) {
            return response()->json(['errors' => 'Mangler bilde'], 400);
        }

        $request->validate([
            'image' => 'file|image'
        ]);

        $image = $this->repo->store($request);

        return response()->json([
            'filePath' => $image->url('small'),
            'id' => $image->id,
            'url' => $image->url(),
            'srcset' => $image->srcset()
        ]);
    }
}
