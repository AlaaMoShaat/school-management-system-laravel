@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('payment_trans.Add_Receipt'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('payment_trans.Add_Receipt') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('payment_trans.Add_Receipt') }}</li>
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
                    <form method="post" action="{{ route('payment_students.store') }}">
                        @csrf
                        <input type="hidden" value="{{ $student->id }}" name="student_id">
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="amount">{{trans('payment_trans.Amount')}}</label>
                                <input type="text" name="amount" class="form-control">
                                @error('amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label>{{trans('proc_trans.Account')}}</label>
                                <input type="text" readonly class="form-control" value="{{ number_format($student->student_accounts->sum('debit') - $student->student_accounts->sum('credit') , 2) }}">
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <label for="description">{{trans('payment_trans.Description')}}</label>
                            <input type="text" name="description" class="form-control">
                            @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
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
