<?php


namespace App\Repository;

use App\Models\FeeInvoice;
use App\Models\FeeType;
use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ReceiptStudentRepository implements ReceiptStudentRepositoryInterface
{
    public function index()
    {
        $receipts = ReceiptStudent::all();
        return view('cms.receipt.index' , compact('receipts'));
    }

    public function createReceipt($id)
    {
        $student = Student::findOrFail($id);
        $fees = FeeInvoice::where('student_id' , $id)->get();
        return view('cms.receipt.create' , compact('student' , 'fees'));
    }

    public function editReceipt($id)
    {
        $receipt = ReceiptStudent::findOrFail($id);
        $fees = FeeInvoice::where('student_id' , $receipt->student_id)->get();
        return view('cms.receipt.edit' , compact('receipt' , 'fees'));
    }

    public function store($request)
    {

        DB::beginTransaction();

        try{
            $receipt = new ReceiptStudent();
            $receipt->student_id = $request->student_id;
            $receipt->fee_invoice_id = $request->fee_invoice_id;
            $receipt->date = date('Y-m-d');
            $receipt->debit = $request->debit;
            $receipt->description = $request->description;
            $receipt->save();

            $fund = new FundAccount();
            $fund->receipt_id = $receipt->id;
            $fund->date = $receipt->date;
            $fund->debit = $receipt->debit;
            $fund->credit = 0.00;
            $fund->save();

            $student_account = new StudentAccount();
            $student_account->student_id = $receipt->student_id;
            $student_account->receipt_id = $receipt->id;
            $student_account->credit = $receipt->debit;
            $student_account->debit = 0.00;
            $student_account->type = 'receipt';
            $student_account->save();

            DB::commit();

            toastr()->success(trans('messages.Success'));
            return redirect()->route('receipt_students.index');

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
            $receipt = ReceiptStudent::findOrFail($request->id);
            $receipt->date = date('Y-m-d');
            $receipt->fee_invoice_id = $request->fee_invoice_id;
            $receipt->debit = $request->debit;
            $receipt->description = $request->description;
            $receipt->save();

            $fund = FundAccount::where('receipt_id',$request->id)->first();
            $fund->date = $receipt->date;
            $fund->debit = $receipt->debit;
            $fund->save();

            $student_account = StudentAccount::where('receipt_id',$request->id)->first();
            $student_account->credit = $receipt->debit;
            $student_account->save();

            DB::commit();

            toastr()->success(trans('messages.Update'));
            return redirect()->route('receipt_students.index');

        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        ReceiptStudent::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('receipt_students.index');
    }

}
