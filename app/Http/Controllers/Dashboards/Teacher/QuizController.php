<?php

namespace App\Http\Controllers\Dashboards\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Degree;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $data['quizzes'] = Quiz::where('teacher_id' , auth()->user()->id)->get();
        $data['subjects'] = Subject::where('teacher_id' , auth()->user()->id)->get();
        $ids = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('grade_id');
        $data['grades'] = Grade::whereIn('id' , $ids)->get();
        return view('cms.dashboards.teacher.quizzes' , $data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try{
            $quizzes = new Quiz();
            $quizzes->name = ['en' => $request->name_en , 'ar'  => $request->name];
            $quizzes->subject_id = $request->subject_id;
            $quizzes->grade_id = $request->grade_id;
            $quizzes->classroom_id = $request->classroom_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = auth()->user()->id;
            $quizzes->save();
            toastr()->success(trans('messages.Success'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        $questions= Question::where('quiz_id' , $id)->get();
        $quiz = Quiz::findOrFail($id);
        return view('cms.dashboards.teacher.question.questions' , compact('questions' , 'quiz'));
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        try{
            $quizzes = Quiz::findOrFail($request->id);
            $quizzes->name = ['en' => $request->name_en , 'ar'  => $request->name];
            $quizzes->subject_id = $request->subject_id;
            $quizzes->grade_id = $request->grade_id;
            $quizzes->classroom_id = $request->classroom_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = auth()->user()->id;
            $quizzes->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        Quiz::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->back();
    }


    public function studentsQuizzes($id)
    {
        $degrees = Degree::where('quiz_id' , $id)->get();
        return view('cms.dashboards.teacher.studentsQuizzes' , compact('degrees'));
    }


    public function repeatQuiz(Request $request)
    {
        Degree::where('quiz_id' , $request->quiz_id)->where('student_id' , $request->student_id)->delete();
        toastr()->success(trans('studentdash_trans.Reopened'));
        return redirect()->back();
    }


    public function Get_Classrooms($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name", "id");
        return $list_classes;

    }


    public function Get_Sections($id)
    {
        $list_sections = Section::where("classroom_id", $id)->pluck("name", "id");
        return $list_sections;
    }
}