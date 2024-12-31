<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    public function grade(){

        return $this->belongsTo(Grade::class , 'grade_id' , 'id');
    }

    public function sections(){

        return $this->hasMany(Section::class , 'classroom_id' , 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($classroom) {
            $classroom->sections()->delete();
        });
    }
}