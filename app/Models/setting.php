<?php

namespace App\models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use Translatable;

    protected $with = ['translations'];

    protected $fillable = ['key','is_translatable','plain_value'];

    protected $translatedAttributes = ['value'];

    protected $casts = [
        'is_translatable'=>'boolean',
    ];

    public static function setMany($settings){
        foreach ($settings as $key => $value) {
            self::Set($key , $value);
        }
    }
    public static function Set($key , $value){
        if ($key === 'translatable'){
            return static::setTranslatableSetting($value);
        }
        if (is_array($value)){
            $value = json_encode($value);
        }
        static::updateOrCreate(['key'=>$key] , ['plain_value'=>$value]);
    }
    public static function setTranslatableSetting( $settings = []){
       foreach($settings as $key=>$value){
           static::updateOrCreate(['key'=>$key],[
               'is_translatable'=>True,
               'value'=>$value
               ]);
       }
    }
}
