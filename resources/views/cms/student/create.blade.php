@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('student_trans.Add_Student'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student_trans.Add_Student') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item">{{ trans('main_trans.students') }}</li>
                <li class="breadcrumb-item active">{{ trans('student_trans.Add_Student') }}</li>
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

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
                             @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('student_trans.Email')}}</label>
                                    <input type="email" name="email" class="form-control">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('student_trans.Password')}}</label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('Teacher_trans.Name_ar')}}</label>
                                    <input type="text" name="Name_ar" class="form-control">
                                    @error('Name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('Teacher_trans.Name_en')}}</label>
                                    <input type="text" name="Name_en" class="form-control">
                                    @error('Name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col-md-4">
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
                                @error('academic_year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="inputCity">{{trans('student_trans.Parents_Email')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="parent_id">
                                        <option selected disabled>{{trans('parent_trans.Choose')}}...</option>
                                        @foreach($parents as $parent)
                                            <option value="{{$parent->id}}">{{$parent->email}}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="inputCity">{{trans('student_trans.Gender')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                        <option selected disabled>{{trans('parent_trans.Choose')}}...</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="religion_id">{{trans('student_trans.Religion')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="religion_id">
                                        <option selected disabled>{{trans('parent_trans.Choose')}}...</option>
                                        @foreach($religions as $religion)
                                            <option value="{{$religion->id}}">{{$religion->name}}</option>
                                        @endforeach
                                    </select>
                                @error('religion_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="nationality_id">{{trans('student_trans.Nationality')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="nationality_id">
                                        <option selected disabled>{{trans('parent_trans.Choose')}}...</option>
                                        @foreach($nationalities as $nationality)
                                            <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('nationality_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="blood_id">{{trans('student_trans.Blood')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="blood_id">
                                        <option selected disabled>{{trans('parent_trans.Choose')}}...</option>
                                        @foreach($bloods as $blood)
                                            <option value="{{$blood->id}}">{{$blood->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('blood_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="grade_id">{{trans('student_trans.Grade')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="grade_id">
                                        <option selected disabled>{{trans('parent_trans.Choose')}}...</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                @error('grade_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="classroom_id">{{trans('student_trans.Classroom')}}</label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">

                                    </select>
                                    @error('classroom_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="section_id">{{trans('student_trans.Section')}}</label>
                                    <select class="custom-select mr-sm-2" name="section_id">

                                    </select>
                                    @error('section_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="date_birth">{{trans('student_trans.Date')}}</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text"  id="datepicker-action" name="date_birth" data-date-format="yyyy-mm-dd"  required>
                                    </div>
                                    @error('date_birth')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="photos">{{trans('student_trans.Attachments')}}</label>
                                    <input type="file" accept="image/*" name="photos[]" multiple>
                                </div>
                            </div>
                            <br>

                            <a href="{{route('students.index')}}" class="btn btn-danger btn-sm" role="button"
                                   aria-pressed="true">{{ trans('parent_trans.Back') }}</a>
                            <button class="btn btn-success nextBtn btn-sm pull-right" type="submit">{{trans('settings.Submit')}}</button>
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
