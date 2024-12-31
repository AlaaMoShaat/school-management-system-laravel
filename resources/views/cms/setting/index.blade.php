@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('main_trans.Settings'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.Settings') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Settings') }}</li>
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
                    <form method="post" action="{{ route('settings.update' , 'test') }}" enctype="multipart/form-data">
                        {{method_field('patch')}}
                        @csrf
                        <div class="row">
                            <div class="col-md-6 border-right-2 border-right-blue-400">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('school_trans.name') }}</label>
                                    <div class="col-lg-9">
                                        <input name="school_name" value="{{ $setting['school_name'] }}" required type="text" class="form-control" placeholder="Name of School">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="academic_year" class="col-lg-2 col-form-label font-weight-semibold">{{ trans('school_trans.academic') }}</label>
                                    <div class="col-lg-9">
                                        <select data-placeholder="Choose..." required name="academic_year" id="academic_year" class="select-search form-control">
                                            <option value=""></option>
                                            @for($y=date('Y', strtotime('- 3 years')); $y<=date('Y', strtotime('+ 1 years')); $y++)
                                                <option {{ ($setting['academic_year'] == (($y-=1).'-'.($y+=1))) ? 'selected' : '' }}>{{ ($y-=1).'-'.($y+=1) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('school_trans.nm') }}</label>
                                    <div class="col-lg-9">
                                        <input name="school_title" value="{{ $setting['school_title'] }}" type="text" class="form-control" placeholder="School Acronym">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('school_trans.phone') }}</label>
                                    <div class="col-lg-9">
                                        <input name="phone" value="{{ $setting['phone'] }}" type="text" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('school_trans.email') }}</label>
                                    <div class="col-lg-9">
                                        <input name="school_email" value="{{ $setting['school_email'] }}" type="email" class="form-control" placeholder="School Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('school_trans.address') }}</label>
                                    <div class="col-lg-9">
                                        <input required name="address" value="{{ $setting['address'] }}" type="text" class="form-control" placeholder="School Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('school_trans.endfirst') }}</label>
                                    <div class="col-lg-9">
                                        <input name="end_first_term" value="{{ $setting['end_first_term'] }}" type="text" class="form-control date-pick" placeholder="Date Term Ends">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('school_trans.endsecond') }}</label>
                                    <div class="col-lg-9">
                                        <input name="end_second_term" value="{{ $setting['end_second_term'] }}" type="text" class="form-control date-pick" placeholder="Date Term Ends">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('school_trans.logo') }}</label>
                                    <div class="col-lg-9">
                                        <div class="mb-3">
                                            <img style="width: 100px" height="100px" src="{{ URL::asset('attachments/logo/'.$setting['logo']) }}" alt="">
                                        </div>
                                        <input name="logo" accept="image/*" type="file" class="file-input" data-show-caption="false" data-show-upload="false" data-fouc>
                                    </div>
                                </div>
                            </div>
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

@endsection
