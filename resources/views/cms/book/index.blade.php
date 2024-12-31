@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('main_trans.library'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.library') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.library') }}</li>
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
                                            <th>{{ trans('library_trans.Title') }}</th>
                                            <th>{{ trans('library_trans.File_name') }}</th>
                                            <th>{{ trans('library_trans.Name_grade') }}</th>
                                            <th>{{ trans('library_trans.Name_classroom') }}</th>
                                            <th>{{ trans('library_trans.Name_section') }}</th>
                                            <th>{{ trans('library_trans.Name_teacher') }}</th>
                                            <th>{{ trans('settings.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($books as $book)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->file_name }}</td>
                                            <td>{{ $book->grade->name }}</td>
                                            <td>{{ $book->classroom->name }}</td>
                                            <td>{{ $book->section->name }}</td>
                                            <td>{{ $book->teacher->Name }}</td>
                                                <td>
                                                    <a href="{{route('library.edit',$book->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteBook{{ $book->id }}" title="{{ trans('settings.Delete') }}"><i class="fa fa-trash"></i></button>
                                                    <a href="{{route('downloadAttachment',$book->file_name)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fas fa-download"></i></a>
                                                </td>
                                            </tr>



                                            <div class="modal fade" id="DeleteBook{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('library.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('library_trans.delete_book') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('settings.Warning_Delete') }}</p>
                                                            <input type="hidden" name="id"  value="{{ $book->id }}">
                                                            <input type="hidden" name="file_name" value="{{$book->file_name}}">
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
