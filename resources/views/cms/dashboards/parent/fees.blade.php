@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('main_trans.List_Invoices'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.List_Invoices') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.List_Invoices') }}</li>
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
                                            <th>{{ trans('fee_trans.Type') }}</th>
                                            <th>{{ trans('parentdash_trans.InvoiceFees') }}</th>
                                            <th>{{ trans('parentdash_trans.RemainingAmount') }}</th>
                                            <th>{{ trans('fee_trans.Date') }}</th>
                                            <th>{{ trans('fee_trans.Description') }}</th>
                                            <th>{{ trans('settings.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($fee_invoices as $fee_invoice)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{ $fee_invoice->student->name }}</td>
                                            <td>{{ $fee_invoice->fee->type->name }}</td>
                                            <td>{{ number_format($fee_invoice->fee->amount , 2) }}</td>
                                            <td>
                                                @if($fee_invoice->receipts->sum('debit') == $fee_invoice->fee->amount)
                                                    <span class="btn-success">{{ trans('parentdash_trans.Full') }}</span>
                                                @else
                                                    <span class="btn-danger">{{ number_format($fee_invoice->fee->amount - $fee_invoice->receipts->sum('debit') , 2) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $fee_invoice->invoice_date }}</td>
                                            <td>{{ $fee_invoice->description }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" role="button" aria-pressed="true" href="{{ route('sonsReceipts', $fee_invoice->id) }}">
                                                    <i style="color: #ffc107" class="far fa-eye"></i>{{ trans('receipt_trans.Receipts') }}
                                                </a>
                                            </td>
                                            </tr>
                                        @endforeach
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
