<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class brand extends Model
{
    use Translatable;

    protected $with = ['translations'];

    protected $fillable = ['is_active','photo'];

    protected $translatedAttributes = ['name'];


    protected $casts = [
        'is_active'=>'boolean',
    ];

    public function getActive(){
        return $this->is_active == '1' ?  __('admin/categories/index.active') :  __('admin/categories/index.inactive');
    }
    public function getPhotoAttribute($val){
        return ($val !== null) ? asset($val) : '';
    }

}
