@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('receipt_trans.Receipts'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('receipt_trans.Receipts') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('receipt_trans.Receipts') }}</li>
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
                    <div class="col-xl-12 mb-30">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('student_trans.Name') }}</th>
                                            <th>{{ trans('receipt_trans.Amount') }}</th>
                                            <th>{{ trans('receipt_trans.Date') }}</th>
                                            <th>{{ trans('receipt_trans.Description') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($receipts as $receipt)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $receipt->student->name }}</td>
                                            <td>{{ number_format($receipt->debit , 2) }}</td>
                                            <td>{{ $receipt->date }}</td>
                                            <td>{{ $receipt->description }}</td>
                                            @empty
                                                <td class="alert-danger" colspan="5">{{ trans('parentdash_trans.empty') }}</td>
                                            </tr>
                                        @endforelse
                                    </table>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
