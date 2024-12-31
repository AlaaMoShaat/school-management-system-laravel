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
                        <form action="{{route('upload_attachments')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="photos">{{trans('student_trans.Attachments')}}</label>
                                    <input type="file" accept="image/*" name="photos[]" multiple>
                                    <input type="hidden" name="student_name" value="{{$students->name}}">
                                    <input type="hidden" name="student_id" value="{{$students->id}}">
                                </div>
                                <button class="btn btn-success nextBtn btn-sm" type="submit">{{trans('settings.Submit')}}</button>
                            </div>
                        </form>
                                <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('student_trans.filename')}}</th>
                                            <th>{{trans('student_trans.created_at')}}</th>
                                            <th>{{ trans('settings.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students->images as $attachment)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$attachment->filename}}</td>
                                            <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                <td>
                                                    <a href="{{url('download_attachment')}}/{{ $attachment->imageable->name }}/{{$attachment->filename}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">{{ trans('student_trans.Download') }}</a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Attachment{{ $attachment->id }}" title="{{ trans('settings.Delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_Attachment{{$attachment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('delete_attachment','test')}}" method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('student_trans.Delete_Attachment') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('settings.Warning_Delete') }}</p>
                                                            <input type="hidden" name="id"  value="{{$attachment->id}}">
                                                            <input type="hidden" name="student_name" value="{{$attachment->imageable->name}}">
                                                            <input type="hidden" name="student_id" value="{{$attachment->imageable->id}}">
                                                            <input type="hidden" name="file_name" value="{{$attachment->filename}}">
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
