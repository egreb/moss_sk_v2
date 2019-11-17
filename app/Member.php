<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'address',
        'zip_code'
    ];

    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
