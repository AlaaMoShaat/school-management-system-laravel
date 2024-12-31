<?php


namespace App\Repository;

use App\Models\Grade;
use App\Models\Student;

class GraduationRepository implements GraduationRepositoryInterface
{

    public function indexGraduation()
    {
        $students = Student::onlyTrashed()->get();
        return view('cms.student.graduation.index' , compact('students'));
    }


    public function createGraduation()
    {
        $grades = Grade::all();
        return view('cms.student.graduation.create' , compact('grades'));
    }


    public function graduation($request)
    {
        $students = Student::where(['academic_year'=>$request->academic_year , 'grade_id'=>$request->grade_id , 'classroom_id'=>$request->classroom_id , 'section_id'=>$request->section_id ])->get();

        if($students->count() < 1){
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }

        foreach ($students as $student){
            $ids = explode(',' , $student->id);
            student::whereIn('id', $ids)->delete();
        }

        toastr()->success(trans('messages.Success'));
        return redirect()->route('indexGraduation');
    }


    public function returnStudent($id)
    {
        Student::onlyTrashed()->findOrFail($id)->restore();
        toastr()->success(trans('messages.Success'));
        return redirect()->back();
    }


    public function deleteStudent($id){
        Student::onlyTrashed()->findOrFail($id)->forceDelete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->back();
    }



}