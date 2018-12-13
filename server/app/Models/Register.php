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
        'firstname','middlename','lastname','gender_id','email','phoneno','address','pincode','district_id','state_id','country_id','role_id','username','password','retypsd','otp','status',
    ];
 

}
