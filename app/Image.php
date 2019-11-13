<?php

namespace App;

use App\Repositories\ImageRepository;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name',
        'uploaded_by',
        'url',
        'public_id'
    ];

    public function path($size = 'large')
    {
        $imageRepo = new ImageRepository();
        return $imageRepo->getPath($size, $this->name);
    }
}
