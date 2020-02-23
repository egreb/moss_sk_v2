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

    public function url($size = 'large')
    {
        return '/img/uploads/' . $size . '/' . $this->name;
    }

    public function srcset(): string
    {
        $srcset = [];

        foreach (['small' => 480, 'medium' => 720, 'large' => 980] as $size => $width) {
            $srcset[] = '/img/uploads/' . $size . '/' . $this->name . ' ' . $width . 'w';
        }

        return implode(',', $srcset);
    }
}
