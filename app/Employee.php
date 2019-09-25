<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'company', 'employee_email', 'phone_number'];


    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    
}
