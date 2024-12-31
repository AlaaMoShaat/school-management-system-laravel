@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('question_trans.add_question'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('question_trans.add_question') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('question_trans.add_question') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form method="post" action="{{ route('Questions.store') }}">
                        @csrf
                        <input type="hidden" value="{{ $quiz_id}}" name="quiz_id">
                        <div class="form-group">
                            <label for="title">{{ trans('question_trans.title_ar') }}</label>
                            <textarea class="form-control" style="resize: none;" id="title" name="title" rows="4" cols="50"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="title_en">{{ trans('question_trans.title_en') }}</label>
                            <textarea class="form-control" style="resize: none;" id="title_en" name="title_en" rows="4" cols="50"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="choices">{{ trans('question_trans.choices_ar') }}</label>
                            <textarea class="form-control" style="resize: none;" id="choices" name="choices" rows="4" cols="50"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="choices_en">{{ trans('question_trans.choices_en') }}</label>
                            <textarea class="form-control" style="resize: none;" id="choices_en" name="choices_en" rows="4" cols="50"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="right_answer">{{ trans('question_trans.right_ar') }}</label>
                            <textarea class="form-control" style="resize: none;" id="right_answer" name="right_answer" rows="4" cols="50"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="right_answer_en">{{ trans('question_trans.right_en') }}</label>
                            <textarea class="form-control" style="resize: none;" id="right_answer_en" name="right_answer_en" rows="4" cols="50"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="score">{{ trans('question_trans.score') }}</label>
                            <input type="text" class="form-control" name="score" required>
                        </div>
                        <br>
                        <button class="btn btn-success nextBtn btn-sm pull-right" type="submit">{{trans('settings.Submit')}}</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
