@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('proc_trans.Edit_Proc'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('proc_trans.Edit_Proc') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('proc_trans.Edit_Proc') }}</li>
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
                    <form method="post" action="{{ route('processing_fees.update' , 'test') }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" value="{{ $proc->id }}" name="id">
                        <div class="form-row">
                            <label for="amount">{{trans('proc_trans.Amount')}}</label>
                            <input type="text" name="amount" value="{{ $proc->amount }}" class="form-control">
                            @error('amount')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-row">
                            <label for="description">{{trans('proc_trans.Description')}}</label>
                            <input type="text" name="description" value="{{ $proc->description }}" class="form-control">
                            @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
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
