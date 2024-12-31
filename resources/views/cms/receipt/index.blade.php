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
                                            <th>{{ trans('parentdash_trans.InvoiceFees') }}</th>
                                            <th>{{ trans('receipt_trans.Amount') }}</th>
                                            <th>{{ trans('receipt_trans.Date') }}</th>
                                            <th>{{ trans('receipt_trans.Description') }}</th>
                                            <th>{{ trans('settings.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($receipts as $receipt)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{ $receipt->student->name }}</td>
                                            <td>{{ $receipt->fee_invoice->fee->type->name }}</td>
                                            <td>{{ number_format($receipt->debit , 2) }}</td>
                                            <td>{{ $receipt->date }}</td>
                                            <td>{{ $receipt->description }}</td>
                                                <td>
                                                    <a href="{{route('receipt_students.edit',$receipt->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteReceipt{{ $receipt->id }}" title="{{ trans('settings.Delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>



                                            <div class="modal fade" id="DeleteReceipt{{ $receipt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('receipt_students.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('receipt_trans.Delete_Receipt') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('settings.Warning_Delete') }}</p>
                                                            <input type="hidden" name="id"  value="{{ $receipt->id }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('settings.Close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">{{ trans('settings.Delete') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
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
