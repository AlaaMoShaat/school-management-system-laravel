@extends('layouts.master')
@section('css')
<style>
    .d-block {
        margin-bottom: 50px;
    }
</style>
@endsection
@section('title' , trans('studentdash_trans.ShowContent'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('studentdash_trans.ShowContent') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('studentdash_trans.ShowContent') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <div  style="height: 400px;" class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="tab nav-border" style="position: relative;">
                    <div class="d-block d-md-flex justify-content-between">

                        <div class="d-block d-md-flex nav-tabs-custom">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active show" id="quizzes-tab" data-toggle="tab"
                                       href="#quizzes" role="tab" aria-controls="quizzes"
                                       aria-selected="true">{{ trans('main_trans.Quizzes') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="meetings-tab" data-toggle="tab" href="#meetings"
                                       role="tab" aria-controls="meetings" aria-selected="false">{{ trans('main_trans.List_OnlineMeetings') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="books-tab" data-toggle="tab" href="#books"
                                       role="tab" aria-controls="books" aria-selected="false">الكتب
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">

                        {{--Quizzes Table--}}
                        <div class="tab-pane fade active show" id="quizzes" role="tabpanel" aria-labelledby="quizzes-tab">
                            <div class="table-responsive mt-15">
                                <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                    <thead>
                                    <tr  class="table-info text-danger">
                                        <th>#</th>
                                        <th>{{ trans('quiz_trans.Name') }}</th>
                                        <th>{{ trans('quiz_trans.Name_subject') }}</th>
                                        <th>{{ trans('quiz_trans.Name_grade') }}</th>
                                        <th>{{ trans('quiz_trans.Name_classroom') }}</th>
                                        <th>{{ trans('quiz_trans.Name_section') }}</th>
                                        <th>{{ trans('quiz_trans.Name_teacher') }}</th>
                                        <th>{{ trans('settings.Processes') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($quizz as $quiz)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $quiz->name }}</td>
                                            <td>{{ $quiz->subject->name }}</td>
                                            <td>{{ $quiz->grade->name }}</td>
                                            <td>{{ $quiz->classroom->name }}</td>
                                            <td>{{ $quiz->section->name }}</td>
                                            <td>{{ $quiz->teacher->Name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#edit{{ $quiz->id }}"
                                                        title="{{ trans('settings.Edit') }}"><i
                                                        class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#delete{{ $quiz->id }}"
                                                        title="{{ trans('settings.Delete') }}"><i
                                                        class="fa fa-trash"></i></button>
                                                <a href="{{ route('Quizzes.show' , $quiz->id) }}" class="btn btn-primary btn-sm" role="button"
                                                    aria-pressed="true">
                                                     {{ trans('teacherdash_trans.Questions') }}
                                                </a>
                                                <a href="{{route('studentsQuizzes' , $quiz->id)}}"
                                                    class="btn btn-primary btn-sm" title="عرض الطلاب المختبرين" role="button" aria-pressed="true"><i
                                                         class="fa fa-street-view"></i></a>
                                            </td>
                                        </tr>

                                        <!-- edit_modal_Quiz -->
                                        <div class="modal fade" id="edit{{ $quiz->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header">
                                                       <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                           id="exampleModalLabel">
                                                           {{ trans('quiz_trans.edit_quiz') }}
                                                       </h5>
                                                       <button type="button" class="close" data-dismiss="modal"
                                                               aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <!-- add_form -->
                                                       <form action="{{route('Quizzes.update','test')}}" method="post">
                                                           {{method_field('patch')}}
                                                           @csrf
                                                           <div class="row">
                                                               <div class="col">
                                                                   <label for="name"
                                                                          class="mr-sm-2">{{ trans('quiz_trans.Name_quiz_ar') }}
                                                                       :</label>
                                                                   <input id="name" type="text" name="name"
                                                                          class="form-control"
                                                                          value="{{$quiz->getTranslation('name', 'ar')}}"
                                                                          required>
                                                                   <input id="id" type="hidden" name="id" class="form-control"
                                                                          value="{{ $quiz->id }}">
                                                               </div>
                                                               <div class="col">
                                                                   <label for="name_en"
                                                                          class="mr-sm-2">{{ trans('quiz_trans.Name_quiz_en') }}
                                                                       :</label>
                                                                   <input type="text" class="form-control"
                                                                          value="{{$quiz->getTranslation('name', 'en')}}"
                                                                          name="name_en" required>
                                                               </div>
                                                           </div>
                                                           <br>
                                                           <div class="form-row">
                                                            <div class="form-group col">
                                                                <label for="grade_id">{{trans('quiz_trans.Name_grade')}}</label>
                                                                <select class="custom-select mr-sm-2" name="grade_id" required>
                                                                    @foreach($grades as $grade)
                                                                        <option @if($grade->id == $quiz->grade_id) selected @endif value="{{$grade->id}}">{{$grade->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('grade_id')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="classroom_id">{{trans('quiz_trans.Name_classroom')}}</label>
                                                                <select class="custom-select mr-sm-2" name="classroom_id" required>

                                                                    @php
                                                                        $classrooms = Classroom::where('grade_id' , $quiz->grade_id)->get();
                                                                    @endphp

                                                                    @foreach($classrooms as $classroom)
                                                                        <option @if($classroom->id == $quiz->classroom_id) selected @endif value="{{$classroom->id}}">{{$classroom->name}}</option>
                                                                    @endforeach

                                                                </select>
                                                                @error('classroom_id')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="section_id">{{trans('quiz_trans.Name_section')}}</label>
                                                                <select class="custom-select mr-sm-2" name="section_id" required>

                                                                    @php
                                                                        $sections = Section::where('classroom_id' , $quiz->classroom_id)->get();
                                                                    @endphp

                                                                    @foreach($sections as $section)
                                                                        <option @if($section->id == $quiz->section_id) selected @endif value="{{$section->id}}">{{$section->name}}</option>
                                                                    @endforeach

                                                                </select>
                                                                @error('section_id')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <br>

                                                        <div class="form-row">
                                                            <div class="form-group col">
                                                                <label for="subject_id">{{trans('quiz_trans.Name_subject')}}</label>
                                                                <select class="custom-select mr-sm-2" name="subject_id" required>
                                                                    @foreach($subjects as $subject)
                                                                        <option @if($subject->id == $quiz->subject_id) selected @endif value="{{$subject->id}}">{{$subject->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('subject_id')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <br><br>

                                                           <div class="modal-footer">
                                                               <button type="button" class="btn btn-secondary"
                                                                       data-dismiss="modal">{{ trans('settings.Close') }}</button>
                                                               <button type="submit"
                                                                       class="btn btn-success">{{ trans('settings.Edit') }}</button>
                                                           </div>
                                                       </form>

                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                       <!-- delete_modal_Quiz -->
                                       <div class="modal fade" id="delete{{ $quiz->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                       id="exampleModalLabel">
                                                       {{ trans('quiz_trans.delete_quiz') }}
                                                   </h5>
                                                   <button type="button" class="close" data-dismiss="modal"
                                                           aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                               </div>
                                               <div class="modal-body">
                                                   <form action="{{route('Quizzes.destroy','test')}}" method="post">
                                                       {{method_field('Delete')}}
                                                       @csrf
                                                       {{ trans('settings.Warning_Delete') }}
                                                       <input id="id" type="hidden" name="id" class="form-control"
                                                              value="{{ $quiz->id }}">
                                                       <div class="modal-footer">
                                                           <button type="button" class="btn btn-secondary"
                                                                   data-dismiss="modal">{{ trans('settings.Close') }}</button>
                                                           <button type="submit"
                                                                   class="btn btn-danger">{{ trans('settings.Delete') }}</button>
                                                       </div>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{--Meetings Table--}}
                        <div class="tab-pane fade" id="meetings" role="tabpanel" aria-labelledby="meetings-tab">
                            <div class="table-responsive mt-15">
                                <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                    <thead>
                                    <tr  class="table-info text-danger">
                                        <th>#</th>
                                        <th>{{ trans('meeting_trans.Name_grade') }}</th>
                                            <th>{{ trans('meeting_trans.Name_classroom') }}</th>
                                            <th>{{ trans('meeting_trans.Name_section') }}</th>
                                            <th>{{ trans('meeting_trans.Name_teacher') }}</th>
                                            <th>{{ trans('meeting_trans.Topic') }}</th>
                                            <th>{{ trans('meeting_trans.Start') }}</th>
                                            <th>{{ trans('meeting_trans.Duration') }}</th>
                                            <th>{{ trans('meeting_trans.Link') }}</th>
                                    </tr>
                                    </thead>

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
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection





























