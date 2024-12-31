@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('main_trans.Quizzes'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.Quizzes') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Quizzes') }}</li>
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
                                            <th>{{ trans('studentdash_trans.Degree') }}</th>
                                            <th>{{ trans('studentdash_trans.Date') }}</th>
                                            <th>{{ trans('settings.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($degrees as $degree)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $degree->student->name }}</td>
                                            <td>{{ $degree->score }}/{{ $degree->mark }}</td>
                                            <td>{{ $degree->date }}</td>
                                            <td>
                                                        <button type="button" class="btn btn-info btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#repeat_quiz{{ $degree->quiz_id }}" title="إعادة">
                                                            <i class="fas fa-repeat"></i></button>
                                            </td>
                                            </tr>
                                            <div class="modal fade" id="repeat_quiz{{$degree->quiz_id}}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                               <div class="modal-dialog" role="document">
                                                   <form action="{{route('repeatQuiz')}}" method="post">
                                                       {{method_field('post')}}
                                                       {{csrf_field()}}
                                                       <div class="modal-content">
                                                           <div class="modal-header">
                                                                <input type="hidden" name="student_id" value="{{$degree->student_id}}">
                                                               <input type="hidden" name="quiz_id" value="{{$degree->quiz_id}}">
                                                               <h5 style="font-family: 'Cairo', sans-serif;"
                                                                   class="modal-title" id="exampleModalLabel">{{ trans('studentdash_trans.Reopen') }}</h5>
                                                               <button type="button" class="close" data-dismiss="modal"
                                                                       aria-label="Close">
                                                                   <span aria-hidden="true">&times;</span>
                                                               </button>
                                                           </div>
                                                           <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('settings.Close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-success">{{ trans('settings.Submit') }}</button>
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
