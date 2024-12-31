@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('main_trans.Quizzes'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.Quizzes') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Quizzes') }}</li>
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
                    <div class="col-xl-12 mb-30">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('student_trans.Name') }}</th>
                                            <th>{{ trans('subject_trans.Name') }}</th>
                                            <th>{{ trans('Teacher_trans.Name_Teacher') }}</th>
                                            <th>{{ trans('quiz_trans.Name') }}</th>
                                            <th>{{ trans('studentdash_trans.Degree') }}</th>
                                            <th>{{ trans('studentdash_trans.Date') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($degrees as $degree)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $degree->student->name }}</td>
                                            <td>{{ $degree->quiz->subject->name }}</td>
                                            <td>{{ $degree->quiz->teacher->Name }}</td>
                                            <td>{{ $degree->quiz->name }}</td>
                                            <td>{{ $degree->score }}/{{ $degree->mark }}</td>
                                            <td>{{ $degree->date }}</td>
                                            @empty
                                                <td class="alert-danger" colspan="7">{{ trans('admindash_trans.NoData') }}</td>
                                            </tr>
                                        @endforelse
                                    </table>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
