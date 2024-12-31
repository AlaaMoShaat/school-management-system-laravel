<?php

namespace App\Http\Controllers\Dashboards\Parent;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\FeeInvoice;
use App\Models\ReceiptStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardParentController extends Controller
{
    public function index(){
        $students = Student::where('parent_id' , auth()->user()->id)->get();
        return view('cms.dashboards.parent.dashboard' , compact('students'));
    }

    public function showStudents(){
        $students = Student::where('parent_id' , auth()->user()->id)->get();
        return view('cms.dashboards.parent.students' , compact('students'));
    }

    public function showQuizzes($id){
        $student = Student::findorFail($id);
        if($student->parent_id !== auth()->user()->id){
            toastr()->error(trans('parentdash_trans.Eroormsg'));
            return redirect()->route('parentdash');
        }
        $degrees = Degree::where('student_id' , $id)->get();
        return view('cms.dashboards.parent.quizzes' , compact('degrees'));
    }

    public function fees(){
        $studentIds = Student::where('parent_id' , auth()->user()->id)->pluck('id');
        $fee_invoices = FeeInvoice::whereIn('student_id' , $studentIds)->get();
        return view('cms.dashboards.parent.fees' , compact('fee_invoices'));
    }

    public function receipts($id){
        $receipts = ReceiptStudent::where('fee_invoice_id' , $id)->get();
        return view('cms.dashboards.parent.receipts' , compact('receipts'));
    }
}