@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('student_trans.Graduate_Students'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student_trans.Graduate_Students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student_trans.Graduate_Students') }}</li>
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
                                <a href="{{route('createGraduation')}}" class="btn btn-success btn-lg" role="button"
                                   aria-pressed="true">{{ trans('student_trans.Graduation_Class') }}</a><br><br>
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
                                            <th>{{ trans('student_trans.Parents_Email') }}</th>
                                            <th>{{ trans('student_trans.Date') }}</th>
                                            <th>{{ trans('student_trans.Academic') }}</th>
                                            <th>{{ trans('settings.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($students as $student)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->grade->name }}</td>
                                            <td>{{ $student->classroom->name }}</td>
                                            <td>{{ $student->section->name }}</td>
                                            <td>{{ $student->parent->Email }}</td>
                                            <td>{{ $student->date_birth }}</td>
                                            <td>{{ $student->academic_year }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <form method="post" action="{{ route('returnStudent', $student->id) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-info btn-sm">{{ trans('student_trans.Return') }}</button>
                                                        </form>

                                                        <form method="post" action="{{ route('deleteStudent', $student->id) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm">{{ trans('student_trans.Force') }}</button>
                                                        </form>
                                                    </div>
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
