<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];


    public function grade(){

        return $this->belongsTo(Grade::class , 'grade_id' , 'id');
    }


    public function classroom(){

        return $this->belongsTo(Classroom::class , 'classroom_id' , 'id');
    }


    public function teachers(){

        return $this->belongsToMany(Teacher::class , 'teacher_section');
    }

    public function students(){

        return $this->hasMany(Student::class , 'section_id' , 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($section) {
            $section->students()->delete();
        });
    }
}