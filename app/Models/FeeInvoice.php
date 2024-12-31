<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeInvoice extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function fee(){

        return $this->belongsTo(Fee::class , 'fee_id' , 'id');
    }

    public function student(){

        return $this->belongsTo(Student::class , 'student_id' , 'id');
    }

    public function student_accounts(){

        return $this->hasMany(StudentAccount::class , 'fee_invoice_id' , 'id');
    }

    public function receipts(){

        return $this->hasMany(ReceiptStudent::class , 'fee_invoice_id' , 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($fee_invoice) {
            $fee_invoice->student_accounts()->delete();
        });
    }
}