<?php


namespace App\Repository;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class SubjectRepository implements SubjectRepositoryInterface
{

    public function index()
    {
        $data['subjects'] = Subject::all();
        $data['grades'] = Grade::all();
        return view('cms.subject.subjects' , $data);
    }

    public function store($request)
    {
        try{
            $subjects = new Subject();
            $subjects->name = ['en' => $request->name_en , 'ar'  => $request->name];
            $subjects->grade_id = $request->grade_id;
            $subjects->classroom_id = $request->classroom_id;
            $subjects->teacher_id = $request->teacher_id;
            $subjects->save();
            toastr()->success(trans('messages.Success'));
            return redirect()->route('subjects.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try{
            $subjects = Subject::findOrFail($request->id);
            $subjects->name = ['en' => $request->name_en , 'ar'  => $request->name];
            $subjects->grade_id = $request->grade_id;
            $subjects->classroom_id = $request->classroom_id;
            $subjects->teacher_id = $request->teacher_id;
            $subjects->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('subjects.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Subject::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('subjects.index');
    }

    public function getTeachers($id)
    {
        $sections = Section::where('classroom_id' , $id)->pluck('id');
        $teachersection = DB::table('teacher_section')->whereIn('section_id' , $sections)->pluck('teacher_id');
        return Teacher::whereIn('id' , $teachersection)->pluck("Name", "id");
    }
}