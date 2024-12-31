@extends('layouts.master')
@section('css')
<style>
    .d-block {
        margin-bottom: 50px;
    }
</style>
@endsection
@section('title' , trans('studentdash_trans.ShowContent'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('studentdash_trans.ShowContent') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('studentdash_trans.ShowContent') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <div  style="height: 400px;" class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="tab nav-border" style="position: relative;">
                    <div class="d-block d-md-flex justify-content-between">

                        <div class="d-block d-md-flex nav-tabs-custom">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active show" id="quizzes-tab" data-toggle="tab"
                                       href="#quizzes" role="tab" aria-controls="quizzes"
                                       aria-selected="true">{{ trans('main_trans.Quizzes') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="meetings-tab" data-toggle="tab" href="#meetings"
                                       role="tab" aria-controls="meetings" aria-selected="false">{{ trans('main_trans.List_OnlineMeetings') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">

                        {{--Quizzes Table--}}
                        <div class="tab-pane fade active show" id="quizzes" role="tabpanel" aria-labelledby="quizzes-tab">
                            <div class="table-responsive mt-15">
                                <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                    <thead>
                                    <tr  class="table-info text-danger">
                                        <th>#</th>
                                        <th>{{ trans('quiz_trans.Name') }}</th>
                                        <th>{{ trans('quiz_trans.Name_grade') }}</th>
                                        <th>{{ trans('quiz_trans.Name_classroom') }}</th>
                                        <th>{{ trans('quiz_trans.Name_section') }}</th>
                                        <th>{{ trans('settings.Processes') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($quizz as $quiz)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $quiz->name }}</td>
                                            <td>{{ $quiz->grade->name }}</td>
                                            <td>{{ $quiz->classroom->name }}</td>
                                            <td>{{ $quiz->section->name }}</td>
                                            <td>
                                                @if (optional($quiz->degree)->exists() && $quiz->degree->student_id == auth()->user()->id)
                                                    {{ $quiz->degree->score }}/{{ $quiz->degree->mark }}
                                                @else
                                                    <a href="{{ route('showQuestions', $quiz->id) }}" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true">
                                                        <i class="fas fa-person-booth"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{--Meetings Table--}}
                        <div class="tab-pane fade" id="meetings" role="tabpanel" aria-labelledby="meetings-tab">
                            <div class="table-responsive mt-15">
                                <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                    <thead>
                                    <tr  class="table-info text-danger">
                                        <th>#</th>
                                        <th>{{ trans('meeting_trans.Name_grade') }}</th>
                                            <th>{{ trans('meeting_trans.Name_classroom') }}</th>
                                            <th>{{ trans('meeting_trans.Name_section') }}</th>
                                            <th>{{ trans('meeting_trans.Name_teacher') }}</th>
                                            <th>{{ trans('meeting_trans.Topic') }}</th>
                                            <th>{{ trans('meeting_trans.Start') }}</th>
                                            <th>{{ trans('meeting_trans.Duration') }}</th>
                                            <th>{{ trans('meeting_trans.Link') }}</th>
                                    </tr>
                                    </thead>

                                    @foreach($meetings as $meeting)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $meeting->grade->name }}</td>
                                            <td>{{ $meeting->classroom->name }}</td>
                                            <td>{{ $meeting->section->name }}</td>
                                            <td>{{ $meeting->teacher->Name }}</td>
                                            <td>{{ $meeting->topic }}</td>
                                            <td>{{ $meeting->start_at }}</td>
                                            <td>{{ $meeting->duration }}</td>
                                            <td class="text-danger"><a href="{{$meeting->join_url}}" target="_blank">{{ trans('meeting_trans.Join') }}</a></td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection





























