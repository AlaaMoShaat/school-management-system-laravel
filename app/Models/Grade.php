<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Grade extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    public function classrooms(){

        return $this->hasMany(Classroom::class , 'grade_id' , 'id');
    }


    
    public function sections(){

        return $this->hasMany(Section::class , 'grade_id' , 'id');
    }



    protected static function boot() {
        parent::boot();

        static::deleting(function($grade) {
            $grade->classrooms()->delete();
        });
    }
}
