@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('fee_trans.Edit_Fee'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('fee_trans.Edit_Fee') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fee_trans.Edit_Fee') }}</li>
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
                    <form method="post" action="{{ route('fees.update' , 'test') }}">
                        {{method_field('patch')}}
                        @csrf
                        <div class="form-row">

                            <input type="hidden" value="{{$fees->id}}" name="id">

                            <div class="form-group col">
                                <label for="type_id">{{trans('fee_trans.Type')}}</label>
                                <select class="custom-select mr-sm-2" name="type_id" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($types as $type)
                                        <option @if($type->id == $fees->type_id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="grade_id">{{trans('fee_trans.Grade_Name')}}</label>
                                <select class="custom-select mr-sm-2" name="grade_id" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option @if($grade->id == $fees->grade_id) selected @endif value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="classroom_id">{{trans('fee_trans.Class_Name')}}</label>
                                <select class="custom-select mr-sm-2" name="classroom_id" required>
                                    @foreach($classrooms as $classroom)
                                        <option @if($classroom->id == $fees->classroom_id) selected @endif value="{{$classroom->id}}">{{$classroom->name}}</option>
                                    @endforeach
                                </select>
                                @error('classroom_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="year">{{trans('fee_trans.Year')}}</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    <option selected disabled>{{trans('parent_trans.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}" @if($year == $fees->year) selected @endif >{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="amount">{{trans('fee_trans.Amount')}}</label>
                            <input type="text" name="amount" value="{{ $fees->amount }}" class="form-control">
                            @error('amount')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-success nextBtn btn-sm pull-right" type="submit">{{trans('settings.Edit')}}</button>
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
                    url: "{{ URL::to('classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="classroom_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
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
