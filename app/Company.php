<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'address', 'company_email', 'image_logo', 'website'];

    public function employee()
    {
        return $this->hasMany('App\Employee');
    }

    public function getImageAttribute()
    {
        return $this->image_logo;
    }

}
