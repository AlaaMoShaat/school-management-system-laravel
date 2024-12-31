<?php

namespace App\Http\Controllers\Dashboards\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try{
            $questions = new Question();
            $questions->quiz_id = $request->quiz_id;
            $questions->score = $request->score;
            $questions->title = ['en' => $request->title_en , 'ar'  => $request->title];
            $questions->choices = ['en' => $request->choices_en , 'ar'  => $request->choices];
            $questions->right_answer = ['en' => $request->right_answer_en , 'ar'  => $request->right_answer];
            $questions->save();
            toastr()->success(trans('messages.Success'));
            return redirect()->route('Quizzes.show' , $questions->quiz_id);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        $quiz_id = $id;
        return view('cms.dashboards.teacher.question.create' , compact('quiz_id'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        try{
            $questions = Question::findOrFail($request->id);
            $questions->score = $request->score;
            $questions->title = ['en' => $request->title_en , 'ar'  => $request->title];
            $questions->choices = ['en' => $request->choices_en , 'ar'  => $request->choices];
            $questions->right_answer = ['en' => $request->right_answer_en , 'ar'  => $request->right_answer];
            $questions->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        Question::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->back();
    }
}