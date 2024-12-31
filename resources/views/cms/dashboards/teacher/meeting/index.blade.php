@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('main_trans.OnlineMeetings'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.OnlineMeetings') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.OnlineMeetings') }}</li>
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
                        <a href="{{route('Online_meetings.create')}}" class="btn btn-success btn-lg" role="button"
                                   aria-pressed="true">{{ trans('meeting_trans.Add_meeting') }}</a>
                                <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('meeting_trans.Name_grade') }}</th>
                                            <th>{{ trans('meeting_trans.Name_classroom') }}</th>
                                            <th>{{ trans('meeting_trans.Name_section') }}</th>
                                            <th>{{ trans('meeting_trans.Name_teacher') }}</th>
                                            <th>{{ trans('meeting_trans.Topic') }}</th>
                                            <th>{{ trans('meeting_trans.Start') }}</th>
                                            <th>{{ trans('meeting_trans.Duration') }}</th>
                                            <th>{{ trans('meeting_trans.Link') }}</th>
                                            <th>{{ trans('settings.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($meetings as $meeting)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $meeting->grade->name }}</td>
                                            <td>{{ $meeting->classroom->name }}</td>
                                            <td>{{ $meeting->section->name }}</td>
                                            <td>{{ $meeting->teacher->Name }}</td>
                                            <td>{{ $meeting->topic }}</td>
                                            <td>{{ $meeting->start_at }}</td>
                                            <td>{{ $meeting->duration }}</td>
                                            <td class="text-danger"><a href="{{$meeting->join_url}}" target="_blank">{{ trans('meeting_trans.Join') }}</a></td>
                                                <td>
                                                    <a href="{{route('Online_meetings.edit',$meeting->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteMeeting{{ $meeting->id }}" title="{{ trans('settings.Delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>



                                            <div class="modal fade" id="DeleteMeeting{{ $meeting->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Online_meetings.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('meeting_trans.Delete_meeting') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('settings.Warning_Delete') }}</p>
                                                            <input type="hidden" name="id"  value="{{ $meeting->id }}">
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
