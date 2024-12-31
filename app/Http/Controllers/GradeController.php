<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrades;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::withCount('classrooms')->get();
        return response()->view('cms.grade.grade' , compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGrades $request)
    {
        try{
            $validated = $request->validated();
            $grades = new Grade();
            $grades->name = ['en' => $request->name_en , 'ar'  => $request->name];
            $grades->note = $request->note;
            $grades->save();
            toastr()->success(trans('messages.Success'));
            return redirect()->route('grades.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGrades $request)
    {
        try {
            $validated = $request->validated();
            $grades = Grade::findOrFail($request->id);
            $grades->name = ['en' => $request->name_en , 'ar'  => $request->name];
            $grades->note = $request->note;
            $grades->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('grades.index');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //ازا المرحلة الدراسية كان الها صفوف تابعة الها وبدي اجي احزف المرحلة مش هيرضى انو يحزفها 

        $MyClass_id = Classroom::where('grade_id',$request->id)->pluck('grade_id');

        if($MyClass_id->count() == 0){

            $grades = Grade::destroy($request->id);
            toastr()->success(trans('messages.Delete'));
            return redirect()->route('grades.index');
        }

        else{

            toastr()->error(trans('grade_trans.delete_Grade_Error'));
            return redirect()->route('grades.index');

        }
    }
}