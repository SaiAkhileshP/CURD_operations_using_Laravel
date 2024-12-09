<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sample extends Model
{
    //
     protected $fillable = [
        'id',             // Integer
        'name',           // String
        'age',            //numeric
        'email',          // String
        'description',    // Text
        'is_active',      // Boolean
        'gender',         // Enum
        'role',           // String or Enum-like
        'profile_picture',// File Upload (path stored as string)
        'preferences',    // JSON or array
        'status',         // Radio button options
    ];
}
