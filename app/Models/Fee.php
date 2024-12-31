<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function grade(){

        return $this->belongsTo(Grade::class , 'grade_id' , 'id');
    }

    public function classroom(){

        return $this->belongsTo(Classroom::class , 'classroom_id' , 'id');
    }

    public function type(){

        return $this->belongsTo(FeeType::class , 'type_id' , 'id');
    }

    public function fee_invoices(){

        return $this->hasMany(FeeInvoice::class , 'fee_id' , 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($fee) {
            $fee->fee_invoices()->delete();
        });
    }
}