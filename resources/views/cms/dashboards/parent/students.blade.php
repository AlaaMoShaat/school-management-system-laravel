@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('parentdash_trans.MySons'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('parentdash_trans.MySons') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('parentdash_trans.MySons') }}</li>
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
                                            <th>{{ trans('student_trans.Grade') }}</th>
                                            <th>{{ trans('student_trans.Classroom') }}</th>
                                            <th>{{ trans('student_trans.Section') }}</th>
                                            <th>{{ trans('student_trans.Date') }}</th>
                                            <th>{{ trans('student_trans.Academic') }}</th>
                                            <th>{{ trans('settings.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->grade->name }}</td>
                                            <td>{{ $student->classroom->name }}</td>
                                            <td>{{ $student->section->name }}</td>
                                            <td>{{ $student->date_birth }}</td>
                                            <td>{{ $student->academic_year }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" role="button" aria-pressed="true" href="{{ route('sonQuizzes', $student->id) }}">
                                                    <i style="color: #ffc107" class="far fa-eye"></i>{{ trans('parentdash_trans.Results') }}
                                                </a>
                                            </td>
                                            </tr>
                                        @endforeach
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
