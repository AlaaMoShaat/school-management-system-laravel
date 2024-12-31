@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('meeting_trans.Add_meeting'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('meeting_trans.Add_meeting') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('meeting_trans.Add_meeting') }}</li>
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
                    <form method="post" action="{{ route('Online_meetings.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="grade_id">{{ trans('meeting_trans.Name_grade') }}</label>
                                    <select class="custom-select mr-sm-2" name="grade_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="classroom_id">{{ trans('meeting_trans.Name_classroom') }}</label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="section_id">{{ trans('meeting_trans.Name_section') }}</label>
                                    <select class="custom-select mr-sm-2" name="section_id">

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="subject_id">{{ trans('subject_trans.Name') }}</label>
                                    <select class="custom-select mr-sm-2" name="subject_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{ trans('meeting_trans.Id_meeting') }}</label>
                                    <input class="form-control" name="meeting_id" type="text">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{ trans('meeting_trans.Topic') }}</label>
                                    <input class="form-control" name="topic" type="text">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('meeting_trans.Start') }}</label>
                                    <input class="form-control" type="datetime-local" name="start_at">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{ trans('meeting_trans.Duration') }}</label>
                                    <input class="form-control" name="duration" type="text">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{ trans('meeting_trans.Password') }}</label>
                                    <input class="form-control" name="password" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('meeting_trans.Start_Url') }}</label>
                                    <input class="form-control" name="start_url" type="text">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>{{ trans('meeting_trans.Join_Url') }}</label>
                                    <input class="form-control" name="join_url" type="text">
                                </div>
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
@endsection
