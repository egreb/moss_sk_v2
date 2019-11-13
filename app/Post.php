<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'ingress',
        'content'
    ];

    public function authors()
    {
        return $this->belongsToMany(User::class);
    }

    public function image()
    {
        return $this->belongsTo('App\Image', 'image_id', 'id');
    }
}
