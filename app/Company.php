<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'address', 'email', 'logo_image', 'website'];

    public function getImageAttribute()
    {
        return $this->logo_image;
    }

}
