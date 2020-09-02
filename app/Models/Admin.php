<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    protected $guarded = [];
    public $timestamps = true;

    public function getImageAttribute($val){
        return ($val !== null) ? asset($val) : "";
    }
}
