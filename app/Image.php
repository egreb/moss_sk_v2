<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $appends = [
        'url',
        'srcset'
    ];

    protected $guarded = [];

    public function getSrcSetAttribute()
    {
        return $this->srcset();
    }

    public function getUrlAttribute()
    {
        return $this->url('small');
    }

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
