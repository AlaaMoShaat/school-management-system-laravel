<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSections;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('cms.section.section',compact('grades' , 'teachers'));
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
    public function store(StoreSections $request)
    {
        try{
            $validated = $request->validated();
            $sections = new Section();
            $sections->name = ['en' => $request->name_en , 'ar'  => $request->name];
            $sections->status = 1;
            $sections->grade_id = $request->grade_id;
            $sections->classroom_id = $request->classroom_id;

            $sections->save();
            $sections->teachers()->attach($request->teacher_id); //insert in teacher_section_table

            toastr()->success(trans('messages.Success'));
            return redirect()->route('sections.index');
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
    public function update(StoreSections $request)
    {
        try{
            $validated = $request->validated();
            $sections = Section::findOrFail($request->id);
            $sections->name = ['en' => $request->name_en , 'ar'  => $request->name];
            $sections->grade_id = $request->grade_id;
            $sections->classroom_id = $request->classroom_id;

            if(isset($request->status)) {
                $sections->status = 1;
              } else {
                $sections->status = 2;
              }

            // update teacher_section_table
            if (isset($request->teacher_id)) {
                $sections->teachers()->sync($request->teacher_id);
            } else {
                $sections->teachers()->sync(array());
            }

            $sections->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('sections.index');
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
    public function destroy(Request $request)
    {
        $ts = DB::table('teacher_section')->where('section_id' , $request->id)->delete();
        $sections = Section::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('sections.index');
    }


    public function getclasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name", "id");

        return $list_classes;
    }
}
