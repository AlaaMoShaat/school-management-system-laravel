@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('teacherdash_trans.PresenceandAbsence'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('teacherdash_trans.PresenceandAbsence') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('teacherdash_trans.PresenceandAbsence') }}</li>
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ url('/attendance_report') }}" autocomplete="off">
                    @csrf
                    <h4 style="font-family: 'Cairo', sans-serif;color: blue">{{ trans('teacherdash_trans.Searchinformation') }}</h4><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student">{{ trans('teacherdash_trans.Mystudents') }}</label>
                                <select class="custom-select mr-sm-2" name="student_id">
                                    <option value="0">{{ trans('teacherdash_trans.Allstudents') }}</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body datepicker-form">
                            <div class="input-group" data-date-format="yyyy-mm-dd">
                                <input type="text"  class="form-control range-from date-picker-default" placeholder="{{ trans('teacherdash_trans.Startdate') }}" required name="from">
                                <span class="input-group-addon">{{ trans('teacherdash_trans.To') }}</span>
                                <input class="form-control range-to date-picker-default" placeholder="{{ trans('teacherdash_trans.Enddate') }}" type="text" required name="to">
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success nextBtn btn-sm pull-right" type="submit">{{trans('settings.Submit')}}</button>
                </form>
                <br><br>
                @isset($attendances)
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th class="alert-success">#</th>
                            <th class="alert-success">{{ trans('student_trans.Name') }}</th>
                            <th class="alert-success">{{ trans('student_trans.Grade') }}</th>
                            <th class="alert-success">{{ trans('student_trans.Classroom') }}</th>
                            <th class="alert-success">{{ trans('student_trans.Section') }}</th>
                            <th class="alert-success">{{ trans('teacherdash_trans.Date') }}</th>
                            <th class="alert-warning">{{ trans('teacherdash_trans.Status') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attendances as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$attendance->student->name}}</td>
                                <td>{{$attendance->student->grade->name}}</td>
                                <td>{{$attendance->student->classroom->name}}</td>
                                <td>{{$attendance->student->section->name}}</td>
                                <td>{{$attendance->date}}</td>
                                <td>
                                    @if($attendance->status == 0)
                                        <span class="btn-danger">{{ trans('teacherdash_trans.Absence') }}</span>
                                    @else
                                        <span class="btn-success">{{ trans('teacherdash_trans.Presence') }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                @endisset
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
