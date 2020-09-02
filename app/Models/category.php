<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use Translatable;

    protected $with = ['translations'];

    protected $fillable = ['slug','is_active','parent_id'];

    protected $translatedAttributes = ['name'];
    protected $hidden = ['translations'];

    protected $casts = [
        'is_active'=>'boolean',
    ];



}
