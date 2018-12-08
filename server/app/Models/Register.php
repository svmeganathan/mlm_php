<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','password','firstname','middlename','lastname','gender_id','email','address','district_id','state_id','country_id','pincode','role_id'
    ];
 

}
