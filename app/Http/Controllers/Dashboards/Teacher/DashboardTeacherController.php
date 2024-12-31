<?php

namespace App\Http\Controllers\Dashboards\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Library;
use App\Models\OnlineMeeting;
use App\Models\Quiz;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardTeacherController extends Controller
{
    public function index(){
        $ids = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('section_id');
        $sec_count = $ids->count();
        $std_count = Student::whereIn('section_id' , $ids)->count();
        return view('cms.dashboards.teacher.dashboard' , compact('sec_count' , 'std_count'));
    }

    public function subjectDetails($id){
        $subject_id = $id;
        $quizz = Quiz::where('subject_id' , $id)->get();
        $meetings = OnlineMeeting::where('subject_id' , $id)->get();
        $books = Library::where('subject_id' , $id)->get();
        return view('cms.dashboards.teacher.subjectDetails' , compact('subject_id' , 'quizz' , 'meetings' , 'books'));
    }

    public function showSections(){
        $gradeIds = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('grade_id');
        $grades = Grade::whereIn('id', $gradeIds)->get();
        return view('cms.dashboards.teacher.sections' , compact('grades'));
    }

    public function showStudents($id){
        $students = Student::where('section_id' , $id)->get();
        return view('cms.dashboards.teacher.students' , compact('students'));
    }

    public function attendance(Request $request)
    {
        try {
            foreach ($request->attendences as $studentid => $attendence) {

                $status = ($attendence == 1) ? true:false;

                Attendance::updateorCreate(
                    [
                        'student_id'=> $studentid,
                        'date' => date('Y-m-d'),
                    ],
                    [
                    'student_id' => $studentid,
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => auth()->user()->id,
                    'date' => date('Y-m-d'),
                    'status' => $status
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function attendanceReport()
    {
        $ids = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        return view('cms.dashboards.teacher.attendance_report' , compact('students'));
    }

    public function attendanceSearch(Request $request)
    {
        $request->validate([
            'from'  =>'required|date|date_format:Y-m-d',
            'to'=> 'required|date|date_format:Y-m-d|after_or_equal:from'
        ]);

        $ids = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        $query = Attendance::whereBetween('date', [$request->from, $request->to])->whereIn('section_id', $ids);

        if($request->student_id != 0){
            $query->where('student_id' , $request->student_id );
        }

        $attendances = $query->get();

        return view('cms.dashboards.teacher.attendance_report' , compact('students','attendances'));
    }
}
