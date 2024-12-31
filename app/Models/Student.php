<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class Student extends Authenticatable
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    public $translatable = ['name'];

    protected $guarded=[];

    public function grade(){

        return $this->belongsTo(Grade::class , 'grade_id' , 'id');
    }

    public function classroom(){

        return $this->belongsTo(Classroom::class , 'classroom_id' , 'id');
    }

    public function section(){

        return $this->belongsTo(Section::class , 'section_id' , 'id');
    }

    public function parent(){

        return $this->belongsTo(MyParent::class , 'parent_id' , 'id');
    }

    public function images(){

        return $this->morphMany(Image::class , 'imageable');
    }

    public function student_accounts(){

        return $this->hasMany(StudentAccount::class , 'student_id' , 'id');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class , 'student_id' , 'id');
    }

    protected static function boot() {
        parent::boot();
        static::deleting(function($student) {
            $student->images()->delete();
        });
    }
}