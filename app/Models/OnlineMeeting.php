<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineMeeting extends Model
{
    use HasFactory;

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

    public function teacher(){
        return $this->belongsTo(Teacher::class , 'teacher_id' , 'id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class , 'subject_id' , 'id');
    }
}