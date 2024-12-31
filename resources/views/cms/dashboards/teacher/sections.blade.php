<?php
    use App\Models\Teacher;
?>
@extends('layouts.master')
@section('css')

@section('title' , trans('main_trans.sections'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.sections') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.sections') }}</li>
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
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            @foreach ($grades as $grade)

                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $grade->name }}</a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('section_trans.Name') }}</th>
                                                                    <th>{{ trans('section_trans.Name_classroom') }}</th>
                                                                    <th>{{ trans('section_trans.status') }}</th>
                                                                    <th>{{ trans('settings.Processes') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php $i = 0; ?>

                                                                 <?php
                                                                    $sections = Teacher::findOrFail(auth()->user()->id)->sections()->where('grade_id', $grade->id)->get();
                                                                 ?>

                                                                            @foreach ($sections as $section)
                                                                                <tr>
                                                                                    <?php $i++; ?>
                                                                                    <td>{{ $i }}</td>
                                                                                    <td>{{ $section->name }}</td>
                                                                                    <td>{{ $section->classroom->name }}</td>
                                                                                    <td>
                                                                                        @if ($section->status == 1)
                                                                                            <label
                                                                                                class="badge badge-success">{{ trans('section_trans.status_true') }}</label>
                                                                                        @else
                                                                                            <label
                                                                                                class="badge badge-danger">{{ trans('section_trans.status_false') }}</label>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="{{route('MyStudents' , $section->id )}}" class="btn btn-success btn-lg" role="button" aria-pressed="true">{{ trans('teacherdash_trans.Sectionstudents') }}</a>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>
        </div>
        <!-- row closed -->
        @endsection
@section('js')

@endsection
