<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptStudent extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function student(){

        return $this->belongsTo(Student::class , 'student_id' , 'id');
    }

    public function student_accounts(){

        return $this->hasMany(StudentAccount::class , 'receipt_id' , 'id');
    }

    public function fund_accounts(){

        return $this->hasMany(FundAccount::class , 'receipt_id' , 'id');
    }

    public function fee_invoice(){

        return $this->belongsTo(FeeInvoice::class , 'fee_invoice_id' , 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($receipt) {
            $receipt->student_accounts()->delete();
        });
        static::deleting(function($receipt) {
            $receipt->fund_accounts()->delete();
        });
    }
}
