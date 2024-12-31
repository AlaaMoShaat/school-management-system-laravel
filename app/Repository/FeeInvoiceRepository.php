<?php


namespace App\Repository;

use App\Models\Fee;
use App\Models\FeeInvoice;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class FeeInvoiceRepository implements FeeInvoiceRepositoryInterface
{
    public function index()
    {
        $fee_invoices = FeeInvoice::all();
        return view('cms.feeinvoice.index' , compact('fee_invoices'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        $fees = Fee::where('classroom_id',$student->classroom_id)->get();
        return view('cms.feeinvoice.create' , compact('student' , 'fees'));
    }

    public function store($request)
    {

        DB::beginTransaction();

        try{
            $fee_invoice = new FeeInvoice();
            $fee_invoice->student_id = $request->student_id;
            $fee_invoice->fee_id = $request->fee_id;
            $fee_invoice->invoice_date = date('Y-m-d');
            $fee_invoice->description = $request->description;
            $fee_invoice->save();

            $student_account = new StudentAccount();
            $student_account->student_id = $request->student_id;
            $student_account->type = 'invoice';
            $student_account->fee_invoice_id = $fee_invoice->id;
            $student_account->debit = $fee_invoice->fee->amount;
            $student_account->credit = 0.00;
            $student_account->save();

            DB::commit();

            toastr()->success(trans('messages.Success'));
            return redirect()->route('fee_invoices.index');

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
            $fee_invoice = FeeInvoice::findOrFail($request->id);
            $fee_invoice->fee_id = $request->fee_id;
            $fee_invoice->invoice_date = date('Y-m-d');
            $fee_invoice->description = $request->description;
            $fee_invoice->save();

            $student_account = StudentAccount::where('fee_invoice_id',$request->id)->first();
            $student_account->debit = $fee_invoice->fee->amount;
            $student_account->save();

            DB::commit();

            toastr()->success(trans('messages.Update'));
            return redirect()->route('fee_invoices.index');

        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $fee_invoice = FeeInvoice::findOrFail($id);
        $fees = Fee::where('classroom_id' , $fee_invoice->student->classroom_id)->get();
        return view('cms.feeinvoice.edit' , compact('fee_invoice' , 'fees'));
    }

    public function destroy($request)
    {
        FeeInvoice::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('fee_invoices.index');
   }

}