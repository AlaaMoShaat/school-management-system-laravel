<?php


namespace App\Repository;

use App\Models\FundAccount;
use App\Models\PaymentStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class PaymentStudentRepository implements PaymentStudentRepositoryInterface
{
    public function index()
    {
        $payments = PaymentStudent::all();
        return view('cms.payment.index' , compact('payments'));
    }

    public function createPaymentStudent($id)
    {
        $student = Student::findOrFail($id);
        return view('cms.payment.create' , compact('student'));
    }

    public function editPaymentStudent($id)
    {
        $payment = PaymentStudent::findOrFail($id);
        return view('cms.payment.edit' , compact('payment'));
    }

    public function store($request)
    {

        DB::beginTransaction();

        try{
            $payment = new PaymentStudent();
            $payment->student_id = $request->student_id;
            $payment->date = date('Y-m-d');
            $payment->amount = $request->amount;
            $payment->description = $request->description;
            $payment->save();


            $fund = new FundAccount();
            $fund->payment_id = $payment->id;
            $fund->date = $payment->date;
            $fund->debit = 0.00;
            $fund->credit = $payment->amount;
            $fund->save();


            $student_account = new StudentAccount();
            $student_account->student_id = $payment->student_id;
            $student_account->payment_id = $payment->id;
            $student_account->credit = 0.00;
            $student_account->debit = $payment->amount;
            $student_account->type = 'payment';
            $student_account->save();

            DB::commit();

            toastr()->success(trans('messages.Success'));
            return redirect()->route('payment_students.index');

        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {

        DB::beginTransaction();

        try{
            $payment = PaymentStudent::findOrFail($request->id);
            $payment->date = date('Y-m-d');
            $payment->amount = $request->amount;
            $payment->description = $request->description;
            $payment->save();


            $fund = FundAccount::where('payment_id' , $request->id)->first();
            $fund->date = $payment->date;
            $fund->credit = $payment->amount;
            $fund->save();


            $student_account = StudentAccount::where('payment_id' , $request->id)->first();
            $student_account->debit = $payment->amount;
            $student_account->save();

            DB::commit();

            toastr()->success(trans('messages.Update'));
            return redirect()->route('payment_students.index');

        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        PaymentStudent::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('payment_students.index');
    }

}
