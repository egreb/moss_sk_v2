<?php

declare(strict_types=1);

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $appends = [
        'url',
        'srcset'
    ];

    protected $guarded = [];

    public function getSrcSetAttribute(): string
    {
        return $this->srcset();
    }

    public function getUrlAttribute(): string
    {
        return $this->url('small');
    }

    public function url($size = 'small'): string
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
