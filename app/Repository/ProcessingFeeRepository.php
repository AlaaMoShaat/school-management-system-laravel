<?php


namespace App\Repository;

use App\Models\ProcessingFee;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface
{
    public function index()
    {
        $procs = ProcessingFee::all();
        return view('cms.processingfee.index' , compact('procs'));
    }

    public function createProcessingFee($id)
    {
        $student = Student::findOrFail($id);
        return view('cms.processingfee.create' , compact('student'));
    }

    public function editProcessingFee($id)
    {
        $proc = ProcessingFee::findOrFail($id);
        return view('cms.processingfee.edit' , compact('proc'));
    }

    public function store($request)
    {

        DB::beginTransaction();

        try{
            $proc = new ProcessingFee();
            $proc->student_id = $request->student_id;
            $proc->date = date('Y-m-d');
            $proc->amount = $request->amount;
            $proc->description = $request->description;
            $proc->save();


            $student_account = new StudentAccount();
            $student_account->student_id = $proc->student_id;
            $student_account->processing_fee_id = $proc->id;
            $student_account->credit = $proc->amount;
            $student_account->debit = 0.00;
            $student_account->type = 'processingFee';
            $student_account->save();

            DB::commit();

            toastr()->success(trans('messages.Success'));
            return redirect()->route('processing_fees.index');

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
            $proc = ProcessingFee::findOrFail($request->id);
            $proc->date = date('Y-m-d');
            $proc->amount = $request->amount;
            $proc->description = $request->description;
            $proc->save();

            
            $student_account = StudentAccount::where('processing_fee_id' , $request->id)->first();
            $student_account->credit = $proc->amount;
            $student_account->save();

            DB::commit();

            toastr()->success(trans('messages.Update'));
            return redirect()->route('processing_fees.index');

        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        ProcessingFee::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('processing_fees.index');
    }

}