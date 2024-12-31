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
                    <form method="post" action="{{ route('fee_invoices.update' , 'test') }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" value="{{ $fee_invoice->id }}" name="id">
                        <div class="form-row">
                                <label for="fee_id">{{trans('fee_trans.Type')}}</label>
                                <select class="custom-select mr-sm-2" name="fee_id" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($fees as $fee)
                                        <option @if($fee->id == $fee_invoice->fee_id) selected @endif value="{{$fee->id}}">{{$fee->type->name}}</option>
                                    @endforeach
                                </select>
                                @error('fee_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <br>
                        <div class="form-row">
                            <label for="description">{{trans('fee_trans.Description')}}</label>
                            <input type="text" name="description" value="{{ $fee_invoice->description }}" class="form-control">
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
