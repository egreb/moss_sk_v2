<?php

namespace App\Repositories;

// TODO: Create BaseRepository for caching stuff.
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Image as ImageModel;

class ImageRepository
{
	public function __construct()
	{
		$this->user_id = Auth::id();
	}

	public function store(Request $request)
	{
		$file = $request->file('image');
		$fileName = time() . '.' . $file->getClientOriginalExtension();

		\Cloudinary::config(config('cloudinary'));
		$resp = \Cloudinary\Uploader::upload($file->getRealPath(), array("responsive_breakpoints" => array(
			"create_derived" => true, "bytes_step" => 20000, "min_width" => 200, "max_width" => 1000,
			"transformation" => array("crop" => "fill", "aspect_ratio" => "16:9", "gravity" => "auto")
		)));

		$imageModel = ImageModel::create([
			'name' => $fileName,
			'url' => $resp['url'],
			'public_id' => $resp['public_id']
		]);

		return $imageModel;
	}

	public function getPath($size, $filename)
	{
		return $this->path[$size] . '/' . $filename;
	}
}
