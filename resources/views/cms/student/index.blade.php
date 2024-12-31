@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('main_trans.students'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.students') }}</li>
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
                                <a href="{{route('students.create')}}" class="btn btn-success btn-lg" role="button"
                                   aria-pressed="true">{{ trans('student_trans.Add_Student') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('student_trans.Name') }}</th>
                                            <th>{{ trans('student_trans.Grade') }}</th>
                                            <th>{{ trans('student_trans.Classroom') }}</th>
                                            <th>{{ trans('student_trans.Section') }}</th>
                                            <th>{{ trans('student_trans.Parents_Email') }}</th>
                                            <th>{{ trans('student_trans.Date') }}</th>
                                            <th>{{ trans('student_trans.Academic') }}</th>
                                            <th>{{ trans('settings.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($students as $student)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->grade->name }}</td>
                                            <td>{{ $student->classroom->name }}</td>
                                            <td>{{ $student->section->name }}</td>
                                            <td>{{ $student->parent->email }}</td>
                                            <td>{{ $student->date_birth }}</td>
                                            <td>{{ $student->academic_year }}</td>
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{ trans('settings.Processes') }}
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="{{route('students.edit' , $student->id)}}">تعديل بيانات الطالب</a>
                                                        <a class="dropdown-item" href="{{route('student_attachments' , $student->id)}}">المرفقات</a>
                                                        <a class="dropdown-item" href="{{route('fee_invoices.show' , $student->id)}}">اضافة فاتورة</a>
                                                        <a class="dropdown-item" href="{{route('receipt_students.show' , $student->id)}}">سند قبض</a>
                                                        <a class="dropdown-item" href="{{route('payment_students.show' , $student->id)}}">سند صرف</a>
                                                        <a class="dropdown-item" href="{{route('processing_fees.show' , $student->id)}}">استبعاد رسوم</a>
                                                        <a class="dropdown-item" data-target="#delete_Student{{ $student->id }}" data-toggle="modal" href="##delete_Student{{ $student->id }}">حذف طالب</a>
                                                    </div>
                                                </div>
                                            </td>
                                            </tr>

                                            <div class="modal fade" id="delete_Student{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('students.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('student_trans.Delete_Student') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('settings.Warning_Delete') }}</p>
                                                            <input type="hidden" name="id"  value="{{$student->id}}">
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
