<?php

namespace App\Http\Controllers\Dashboards\Student;

use App\Http\Controllers\Controller;
use App\Models\OnlineMeeting;
use App\Models\Quiz;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class DashboardStudentController extends Controller
{
    public function index(){
        $subjects = Subject::where('grade_id' , auth()->user()->grade_id)->where('classroom_id' , auth()->user()->classroom_id)->get();
        return view('cms.dashboards.student.dashboard' , compact('subjects'));
    }

    public function showContent($id){
        $quizz = Quiz::where('subject_id' , $id)->get();
        $meetings = OnlineMeeting::where('subject_id' , $id)->get();
        return view('cms.dashboards.student.meetingsandquizzes' , compact('quizz' , 'meetings'));
    }

    public function showQuestions($quiz_id){
        $student_id = Auth::user()->id;
        return view('cms.dashboards.student.questions' , compact('quiz_id' , 'student_id'));
    }
}