<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    /**
     * @var string
     */
    protected $dateFormat = 'd.m.Y h:m';

    protected $dates = [
        'published_at',
    ];


    public function authors()
    {
        return $this->belongsToMany(User::class);
    }

    public function author_string()
    {
        $author_string = '';

        foreach ($this->authors as $author) {
            $author_string .= $author->name . ', ';
        }

        return rtrim($author_string, ', ');
    }

    public function image()
    {
        return $this->belongsTo('App\Image', 'image_id', 'id');
    }

    public function published_by(): array
    {
        $names = [];
        foreach ($this->authors as $author) {
            $names[] = $author->name;
        }

        return $names;
    }
}
