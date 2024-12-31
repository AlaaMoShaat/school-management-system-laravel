@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('library_trans.add_books'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('library_trans.add_books') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('library_trans.add_books') }}</li>
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
                    <form method="post" action="{{ route('library.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $section->id }}" name="section_id">
                        <input type="hidden" value="{{ $section->classroom->id }}" name="classroom_id">
                        <input type="hidden" value="{{ $section->grade->id }}" name="grade_id">
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="title">{{trans('library_trans.Title_book_ar')}}</label>
                                <input type="text" name="title" class="form-control">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="title_en">{{trans('library_trans.Title_book_en')}}</label>
                                <input type="text" name="title_en" class="form-control">
                                @error('title_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="file_name">{{ trans('library_trans.add_file') }}</label>
                                    <input type="file" accept="application/pdf" name="file_name">
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

@endsection
