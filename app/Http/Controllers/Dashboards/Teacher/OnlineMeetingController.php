<?php

namespace App\Http\Controllers\Dashboards\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\OnlineMeeting;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class OnlineMeetingController extends Controller
{

    public function index()
    {
        $meetings = OnlineMeeting::where('teacher_id' , auth()->user()->id)->get();
        return view('cms.dashboards.teacher.meeting.index' , compact('meetings'));
    }


    public function create()
    {
        $ids = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('grade_id');
        $grades = Grade::whereIn('id' , $ids)->get();
        $subjects = Subject::where('teacher_id' , auth()->user()->id)->get();
        return view('cms.dashboards.teacher.meeting.create' , compact('grades' , 'subjects'));
    }


    public function store(Request $request)
    {
        try{
            $meeting = new OnlineMeeting();
            $meeting->grade_id = $request->grade_id;
            $meeting->classroom_id = $request->classroom_id;
            $meeting->section_id = $request->section_id;
            $meeting->subject_id = $request->subject_id;
            $meeting->teacher_id = auth()->user()->id;
            $meeting->meeting_id = $request->meeting_id;
            $meeting->topic = $request->topic;
            $meeting->start_at = $request->start_at;
            $meeting->duration = $request->duration;
            $meeting->password = $request->password;
            $meeting->start_url = $request->start_url;
            $meeting->join_url = $request->join_url;
            $meeting->save();
            toastr()->success(trans('messages.Success'));
            return redirect()->route('Online_meetings.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $meeting = OnlineMeeting::findOrFail($id);
        $ids = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('grade_id');
        $grades = Grade::whereIn('id' , $ids)->get();
        $classrooms = Classroom::where('grade_id' , $meeting->grade_id)->get();
        $sections = Section::where('classroom_id' , $meeting->classroom_id)->get();
        $subjects = Subject::where('teacher_id' , auth()->user()->id)->get();
        return view('cms.dashboards.teacher.meeting.edit' , compact('grades' , 'meeting' , 'classrooms' , 'sections' , 'subjects'));
    }


    public function update(Request $request)
    {
        try{
            $meeting = OnlineMeeting::findOrFail($request->id);
            $meeting->grade_id = $request->grade_id;
            $meeting->classroom_id = $request->classroom_id;
            $meeting->section_id = $request->section_id;
            $meeting->subject_id = $request->subject_id;
            $meeting->teacher_id = auth()->user()->id;
            $meeting->meeting_id = $request->meeting_id;
            $meeting->topic = $request->topic;
            $meeting->start_at = $request->start_at;
            $meeting->duration = $request->duration;
            $meeting->password = $request->password;
            $meeting->start_url = $request->start_url;
            $meeting->join_url = $request->join_url;
            $meeting->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Online_meetings.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        OnlineMeeting::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Online_meetings.index');
    }
}