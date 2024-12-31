@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('main_trans.Questions'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.Questions') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Questions') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <a href="{{route('Questions.show' , $quiz->id)}}" class="btn btn-success btn-lg" role="button"
            aria-pressed="true">{{ trans('teacherdash_trans.AddQuestion') }}</a>
            <br><br>

          <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('question_trans.Name_quiz') }}</th>
                    <th>{{ trans('question_trans.Name') }}</th>
                    <th>{{ trans('question_trans.Choices') }}</th>
                    <th>{{ trans('question_trans.Right_answer') }}</th>
                    <th>{{ trans('question_trans.score') }}</th>
                    <th>{{ trans('settings.Processes') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $question->quiz->name }}</td>
                    <td>{{ $question->title }}</td>
                    <td>{{ $question->choices }}</td>
                    <td>{{ $question->right_answer }}</td>
                    <td>{{ $question->score }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#edit{{ $question->id }}"
                                title="{{ trans('settings.Edit') }}"><i
                                class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete{{ $question->id }}"
                                title="{{ trans('settings.Delete') }}"><i
                                class="fa fa-trash"></i></button>
                    </td>
                </tr>

                <!-- edit_modal_Question -->
                <div class="modal fade" id="edit{{ $question->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                   id="exampleModalLabel">
                                   {{ trans('question_trans.edit_question') }}
                               </h5>
                               <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                           <div class="modal-body">
                               <form action="{{route('Questions.update','test')}}" method="post">
                                   {{method_field('patch')}}
                                   @csrf
                                   <input type="hidden" name="id" value="{{ $question->id }}">
                                   <div class="form-group">
                                    <label for="title">{{ trans('question_trans.title_ar') }}</label>
                                    <textarea class="form-control" style="resize: none;" id="title" name="title" rows="4" cols="50">{{ $question->getTranslation('title', 'ar') }} </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="title_en">{{ trans('question_trans.title_en') }}</label>
                                        <textarea class="form-control" style="resize: none;" id="title_en" name="title_en" rows="4" cols="50">{{ $question->getTranslation('title', 'en') }} </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="choices">{{ trans('question_trans.choices_ar') }}</label>
                                        <textarea class="form-control" style="resize: none;" id="choices" name="choices" rows="4" cols="50">{{ $question->getTranslation('choices', 'ar') }} </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="choices_en">{{ trans('question_trans.choices_en') }}</label>
                                        <textarea class="form-control" style="resize: none;" id="choices_en" name="choices_en" rows="4" cols="50">{{ $question->getTranslation('choices', 'en') }} </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="right_answer">{{ trans('question_trans.right_ar') }}</label>
                                        <textarea class="form-control" style="resize: none;" id="right_answer" name="right_answer" rows="4" cols="50">{{ $question->getTranslation('right_answer', 'ar') }} </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="right_answer_en">{{ trans('question_trans.right_en') }}</label>
                                        <textarea class="form-control" style="resize: none;" id="right_answer_en" name="right_answer_en" rows="4" cols="50">{{ $question->getTranslation('right_answer', 'en') }} </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="score">{{ trans('question_trans.score') }}</label>
                                        <input type="text" class="form-control" name="score" value="{{ $question->score }}" required>
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

               <!-- delete_modal_Qustion -->
               <div class="modal fade" id="delete{{ $question->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                               id="exampleModalLabel">
                               {{ trans('question_trans.delete_question') }}
                           </h5>
                           <button type="button" class="close" data-dismiss="modal"
                                   aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <form action="{{route('Questions.destroy','test')}}" method="post">
                               {{method_field('Delete')}}
                               @csrf
                               {{ trans('settings.Warning_Delete') }}
                               <input id="id" type="hidden" name="id" class="form-control"
                                      value="{{ $question->id }}">
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
        </div>
      </div>
    </div>
</div>
</div>
<!-- row closed -->
@endsection
@section('js')
@endsection
