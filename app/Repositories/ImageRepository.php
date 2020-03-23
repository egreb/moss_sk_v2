<?php

namespace App\Repositories;

// TODO: Create BaseRepository for caching stuff.
use App\Image as ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ImageRepository
{
    private $sizes = ['small', 'medium', 'large'];

    public function __construct()
    {
        $this->user_id = Auth::id();
    }

    public function store(Request $request, $name = 'image')
    {
        $image = $request->file($name);
        $filename = time() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path() . '/img/uploads/full/', $filename);

        $imageSizes = [
            'small' => 480,
            'medium' => 720,
            'large' => 960
        ];

        foreach ($imageSizes as $size => $width) {
            $img = Image::make(public_path() . '/img/uploads/full/' . $filename)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $img->save('img/uploads/' . $size . '/' . $filename);
        }

        $imageModel = ImageModel::create([
            'name' => $filename,
        ]);

        return $imageModel;
    }

    public function get($limit = 10, $offset = 0): Collection
    {
        return ImageModel::skip($offset)->take($limit)->get();
    }

    public function getPath($size, $filename)
    {
        return $this->path[$size] . '/' . $filename;
    }
}
