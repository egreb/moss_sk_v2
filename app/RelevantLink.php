<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelevantLink extends Model
{
    protected $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('d-m-Y');
    }

    protected $casts = [
        'expires' => 'date:d-m-Y',
    ];
}
