@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('main_trans.students'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.students') }}</li>
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
                        <h5 style="font-family: 'Cairo', sans-serif;color: red"> {{ trans('teacherdash_trans.Todaysdate') }} {{ date('Y-m-d') }}</h5>
                        <form method="post" action="{{ url('/attendance') }}" autocomplete="off">
                            @csrf
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                   style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-success">#</th>
                                            <th class="alert-success">{{ trans('student_trans.Name') }}</th>
                                            <th class="alert-success">{{ trans('student_trans.Email') }}</th>
                                            <th class="alert-success">{{ trans('student_trans.Grade') }}</th>
                                            <th class="alert-success">{{ trans('student_trans.Classroom') }}</th>
                                            <th class="alert-success">{{ trans('student_trans.Section') }}</th>
                                            <th class="alert-success">{{ trans('teacherdash_trans.PresenceandAbsence') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($students as $student)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->grade->name }}</td>
                                            <td>{{ $student->classroom->name }}</td>
                                            <td>{{ $student->section->name }}</td>
                                            <td>
                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                    <input name="attendences[{{ $student->id }}]"
                                                           @foreach($student->attendance()->where('date',date('Y-m-d'))->get() as $attendance)
                                                           {{ $attendance->status == 1 ? 'checked' : '' }}
                                                           @endforeach
                                                           class="leading-tight" type="radio"
                                                           value="1">
                                                    <span class="text-success">{{ trans('teacherdash_trans.Presence') }}</span>
                                                </label>

                                                <label class="ml-4 block text-gray-500 font-semibold">
                                                    <input name="attendences[{{ $student->id }}]"
                                                           @foreach($student->attendance()->where('date',date('Y-m-d'))->get() as $attendance)
                                                           {{ $attendance->status == 0 ? 'checked' : '' }}
                                                           @endforeach
                                                           class="leading-tight" type="radio"
                                                           value="0">
                                                    <span class="text-danger">{{ trans('teacherdash_trans.Absence') }}</span>
                                                </label>

                                                <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                                                <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                                                <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <p><button class="btn btn-success nextBtn btn-sm pull-right" type="submit">{{trans('settings.Submit')}}</button></p>
                            </form>
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
