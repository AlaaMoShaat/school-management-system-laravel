@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('student_trans.Add_Promotion'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student_trans.Add_Promotion') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student_trans.Add_Promotion') }}</li>
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
                                <a href="{{route('promotions.create')}}" class="btn btn-success btn-lg" role="button"
                                   aria-pressed="true">{{ trans('student_trans.Add_Promotion') }}</a>
                                <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#Deleteall">
                                    {{ trans('student_trans.Delete_Promotions') }}
                                </button>
                                <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('student_trans.Name') }}</th>
                                            <th class="alert-danger">{{ trans('student_trans.Previous_year') }}</th>
                                            <th class="alert-danger">{{ trans('student_trans.Previous_Grade') }}</th>
                                            <th class="alert-danger">{{ trans('student_trans.Previous_Class') }}</th>
                                            <th class="alert-danger">{{ trans('student_trans.Previous_Section') }}</th>
                                            <th class="alert-success">{{ trans('student_trans.Next_year') }}</th>
                                            <th class="alert-success">{{ trans('student_trans.Next_Grade') }}</th>
                                            <th class="alert-success">{{ trans('student_trans.Next_Class') }}</th>
                                            <th class="alert-success">{{ trans('student_trans.Next_Section') }}</th>
                                            <th>{{ trans('settings.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{ $promotion->student->name }}</td>
                                            <td>{{ $promotion->from_year }}</td>
                                            <td>{{ $promotion->f_grade->name }}</td>
                                            <td>{{ $promotion->f_class->name }}</td>
                                            <td>{{ $promotion->f_section->name }}</td>
                                            <td>{{ $promotion->to_year }}</td>
                                            <td>{{ $promotion->t_grade->name }}</td>
                                            <td>{{ $promotion->t_class->name }}</td>
                                            <td>{{ $promotion->t_section->name }}</td>
                                                <td>
                                                    {{-- <a href="{{route('promotions.edit',$promotion->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a> --}}
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Deleteone{{ $promotion->id }}" title="{{ trans('settings.Delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            {{-- DeleteAll --}}
                                            <div class="modal fade" id="Deleteall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('promotions.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('student_trans.Delete_Promotions') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('settings.Warning_Delete') }}</p>
                                                            <input type="hidden" name="choose_id"  value="1">
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

                                            {{-- DeleteOne --}}
                                            <div class="modal fade" id="Deleteone{{ $promotion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('promotions.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('student_trans.Delete_Promotion') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('settings.Warning_Delete') }}</p>
                                                            <input type="hidden" name="id"  value="{{ $promotion->id }}">
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
