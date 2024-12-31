<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MyParent extends Authenticatable
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['Name_Father','Job_Father','Address_Father', 'Name_Mother','Job_Mother','Address_Mother'];

    protected $guarded=[];

    public function students(){
        return $this->hasMany(Student::class , 'parent_id' , 'id');
    }

    public function images(){
        return $this->morphMany(Image::class , 'imageable');
    }

    protected static function boot() {
        parent::boot();
        static::deleting(function($my_parent) {
            $my_parent->students()->delete();
        });

        static::deleting(function($my_parent) {
            $my_parent->images()->delete();
        });
    }

}