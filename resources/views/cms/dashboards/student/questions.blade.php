@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('studentdash_trans.Quiz'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('studentdash_trans.Quiz') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('studentdash_trans.Quiz') }}</li>
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
                @livewire('show-questions' , ['student_id' => $student_id , 'quiz_id' => $quiz_id])
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @livewireScripts
@endsection
