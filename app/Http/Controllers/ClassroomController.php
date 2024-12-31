<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassrooms;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
{
    $query = Classroom::query();
    $grades = Grade::all();

    if ($request->has('grade_id')) {
        $query->where('grade_id', $request->grade_id);
    }

    $classrooms = $query->get();

    return view('cms.classroom.classroom', compact('classrooms', 'grades'));
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
    public function store(StoreClassrooms $request)
    {

        $List_Classes = $request->List_Classes;

        try {
            $validated = $request->validated();
            foreach ($List_Classes as $List_Class) {
                $classrooms = new Classroom();
                $classrooms->name = ['en' => $List_Class['name_en'], 'ar'  => $List_Class['name']];
                $classrooms->grade_id = $List_Class['grade_id'];
                $classrooms->save();
            }
            toastr()->success(trans('messages.Success'));
            return redirect()->route('classrooms.index');
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
    public function update(StoreClassrooms $request)
    {

        try {
                $classrooms = Classroom::findOrFail($request->id);
                $classrooms->name = ['en' => $request->name_en, 'ar'  => $request->name];
                $classrooms->grade_id = $request->grade_id;
                $classrooms->save();
                toastr()->success(trans('messages.Update'));
                return redirect()->route('classrooms.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //


    public function destroy(Request $request)
    {

        $MySection_id = Section::where('classroom_id',$request->id)->pluck('classroom_id');

        if($MySection_id->count() == 0){

            $classrooms = Classroom::destroy($request->id);
            toastr()->success(trans('messages.Delete'));
            return redirect()->route('classrooms.index');
        }

        else{

            toastr()->error(trans('classroom_trans.delete_Classroom_Error'));
            return redirect()->route('classrooms.index');

        }
    }


    public function delete_all(Request $request)
    {
        $delete_all_id = explode("," , $request->delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('classrooms.index');
    }
}