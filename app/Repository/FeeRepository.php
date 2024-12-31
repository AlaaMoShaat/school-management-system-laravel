<?php


namespace App\Repository;

use App\Models\Classroom;
use App\Models\Fee;
use App\Models\FeeType;
use App\Models\Grade;

class FeeRepository implements FeeRepositoryInterface
{
    public function index()
    {
        $fees = Fee::all();
        return view('cms.fee.index' , compact('fees'));
    }


    public function create()
    {
        $grades = Grade::all();
        $types = FeeType::all();
        return view('cms.fee.create' , compact('grades' , 'types'));
    }


    public function store($request)
    {
        try{
            $fees = new Fee();
            $fees->amount = $request->amount;
            $fees->type_id = $request->type_id;
            $fees->grade_id = $request->grade_id;
            $fees->classroom_id = $request->classroom_id;
            $fees->year = $request->year;
            $fees->save();
            toastr()->success(trans('messages.Success'));
            return redirect()->route('fees.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $fees = Fee::findOrFail($id);
        $types = FeeType::all();
        $grades = Grade::all();
        $classrooms = Classroom::where('grade_id' , $fees->grade_id)->get();
        return view('cms.fee.edit' , compact('fees' , 'grades' , 'classrooms' , 'types'));
    }


    public function update($request)
    {
        try{
            $fees = Fee::findOrFail($request->id);
            $fees->amount = $request->amount;
            $fees->type_id = $request->type_id;
            $fees->grade_id = $request->grade_id;
            $fees->classroom_id = $request->classroom_id;
            $fees->year = $request->year;
            $fees->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('fees.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        Fee::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('fees.index');
   }
}