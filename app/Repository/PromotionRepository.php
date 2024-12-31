<?php


namespace App\Repository;

use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class PromotionRepository implements PromotionRepositoryInterface
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('cms.student.promotion.index' , compact('promotions'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('cms.student.promotion.create' , compact('grades'));
    }


    public function store($request)
    {
        DB::beginTransaction();

        try {

            $students = Student::where(['academic_year'=>$request->academic_year , 'grade_id'=>$request->grade_id , 'classroom_id'=>$request->classroom_id , 'section_id'=>$request->section_id ])->get();

            if($students->count() < 1){
                return redirect()->back()->with('error_promotions' , ('لا توجد بيانات في جدول الطلاب'));
            }

            // update in students table
            foreach ($students as $student){
                $ids = explode(',' , $student->id);
                student::whereIn('id', $ids)->update([
                        'academic_year'=>$request->academic_year_new,
                        'grade_id'=>$request->grade_id_new,
                        'classroom_id'=>$request->classroom_id_new,
                        'section_id'=>$request->section_id_new,
                    ]);

                // insert in promotions table
                Promotion::updateOrCreate([
                    'student_id'=>$student->id,
                    'from_year'=>$request->academic_year,
                    'from_grade'=>$request->grade_id,
                    'from_classroom'=>$request->classroom_id,
                    'from_section'=>$request->section_id,
                    'to_year'=>$request->academic_year_new,
                    'to_grade'=>$request->grade_id_new,
                    'to_classroom'=>$request->classroom_id_new,
                    'to_section'=>$request->section_id_new,
                ]);

            }
            DB::commit();
            toastr()->success(trans('messages.Success'));
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {

       DB::beginTransaction();

       try{
            if($request->choose_id == 1){
                $promotions = Promotion::all();
                foreach($promotions as $promotion){
                    $ids = explode(',' , $promotion->student_id );
                    Student::whereIn('id' , $ids)->update([
                        'grade_id'=>$promotion->from_grade,
                        'classroom_id'=>$promotion->from_classroom,
                        'section_id'=>$promotion->from_section,
                        'academic_year'=>$promotion->from_year,
                    ]);
                }

                //حذف جدول الترقيات
                Promotion::truncate();

                DB::commit();
                toastr()->success(trans('messages.Success'));
                return redirect()->back();
            }

            else{
                $promotion = Promotion::findOrFail($request->id);
                Student::where('id' , $promotion->student_id)->update([
                    'grade_id'=>$promotion->from_grade,
                    'classroom_id'=>$promotion->from_classroom,
                    'section_id'=>$promotion->from_section,
                    'academic_year'=>$promotion->from_year,
                ]);
                Promotion::destroy($request->id);
                DB::commit();
                toastr()->success(trans('messages.Success'));
                return redirect()->back();
            }
       }

       catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
    }
}