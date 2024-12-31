<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessingFee extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function student(){

        return $this->belongsTo(Student::class , 'student_id' , 'id');
    }


    public function student_accounts(){

        return $this->hasMany(StudentAccount::class , 'processing_fee_id' , 'id');
    }


    protected static function boot() {
        parent::boot();

        static::deleting(function($proc) {
            $proc->student_accounts()->delete();
        });
    }
}