@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('main_trans.Students_Promotions'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.Students_Promotions') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Students_Promotions') }}</li>
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

                    @if (Session::has('error_promotions'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_promotions')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <h6 style="color: red;font-family: Cairo">{{ trans('student_trans.Old_school_stage') }}</h6><br>

                    <form method="post" action="{{ route('promotions.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="academic_year">{{trans('student_trans.Academic')}}</label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{trans('parent_trans.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="grade_id">{{trans('student_trans.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="grade_id" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="classroom_id">{{trans('student_trans.Classroom')}}</label>
                                <select class="custom-select mr-sm-2" name="classroom_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{trans('student_trans.Section')}}</label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>
                        </div>
                        <br><h6 style="color: red;font-family: Cairo">{{ trans('student_trans.New_school_stage') }}</h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="academic_year">{{trans('student_trans.Academic')}}</label>
                                <select class="custom-select mr-sm-2" name="academic_year_new">
                                    <option selected disabled>{{trans('parent_trans.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="grade_id_new">{{trans('student_trans.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="grade_id_new" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="classroom_id">{{trans('student_trans.Classroom')}}</label>
                                <select class="custom-select mr-sm-2" name="classroom_id_new" required>

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="section_id">{{trans('student_trans.Section')}}</label>
                                <select class="custom-select mr-sm-2" name="section_id_new" required>

                                </select>
                            </div>
                        </div>
                        <button class="btn btn-success nextBtn btn-sm pull-right" type="submit">{{trans('settings.Submit')}}</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')

<script>
    $(document).ready(function () {
        $('select[name="grade_id"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Classrooms') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var classroomSelect = $('select[name="classroom_id"]');
                        classroomSelect.empty();
                        $.each(data, function (key, value) {
                            classroomSelect.append('<option value="' + key + '">' + value + '</option>');
                        });

                        // Trigger change event on classroom select to fetch sections
                        classroomSelect.trigger('change');
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

        $('select[name="classroom_id"]').on('change', function () {
            var Classroom_id = $(this).val();
            if (Classroom_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var sectionSelect = $('select[name="section_id"]');
                        sectionSelect.empty();
                        $.each(data, function (key, value) {
                            sectionSelect.append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
    </script>



<script>
    $(document).ready(function () {
        $('select[name="grade_id_new"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Classrooms') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var classroomSelect = $('select[name="classroom_id_new"]');
                        classroomSelect.empty();
                        $.each(data, function (key, value) {
                            classroomSelect.append('<option value="' + key + '">' + value + '</option>');
                        });

                        // Trigger change event on classroom select to fetch sections
                        classroomSelect.trigger('change');
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

        $('select[name="classroom_id_new"]').on('change', function () {
            var Classroom_id = $(this).val();
            if (Classroom_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var sectionSelect = $('select[name="section_id_new"]');
                        sectionSelect.empty();
                        $.each(data, function (key, value) {
                            sectionSelect.append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
    </script>


@endsection
