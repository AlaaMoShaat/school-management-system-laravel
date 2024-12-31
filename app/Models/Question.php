<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Question extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title','choices','right_answer'];

    public function quiz(){
        return $this->belongsTo(Quiz::class , 'quiz_id' , 'id');
    }
}