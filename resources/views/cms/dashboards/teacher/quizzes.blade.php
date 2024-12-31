@php
    use App\Models\Classroom;
    use App\Models\Section;
@endphp
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

            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModal">
                {{ trans('quiz_trans.add_quiz') }}
            </button>
            <br><br>
          <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
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
                @foreach ($quizzes as $quiz)
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
      </div>
    </div>
    <!-- add_modal_Subject -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   {{ trans('quiz_trans.add_quiz') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- add_form -->
               <form action="{{route('Quizzes.store')}}" method="POST">
                   @csrf
                   <div class="row">
                       <div class="col">
                           <label for="name"
                                  class="mr-sm-2">{{ trans('quiz_trans.Name_quiz_ar') }}
                               :</label>
                           <input id="name" type="text" class="form-control" name="name" required >
                       </div>
                       <div class="col">
                           <label for="name_en"
                                  class="mr-sm-2">{{ trans('quiz_trans.Name_quiz_en') }}
                               :</label>
                           <input type="text" class="form-control" name="name_en" required >
                       </div>
                   </div>
                   <br>
                   <div class="form-row">
                    <div class="form-group col">
                        <label for="grade_id">{{trans('quiz_trans.Name_grade')}}</label>
                        <select class="custom-select mr-sm-2" name="grade_id" required>
                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                            @endforeach
                        </select>
                        @error('grade_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="classroom_id">{{trans('quiz_trans.Name_classroom')}}</label>
                        <select class="custom-select mr-sm-2" name="classroom_id" required>

                        </select>
                        @error('classroom_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="section_id">{{trans('quiz_trans.Name_section')}}</label>
                        <select class="custom-select mr-sm-2" name="section_id" required>

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
                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                        @error('subject_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary"
                       data-dismiss="modal">{{ trans('settings.Close') }}</button>
               <button type="submit"
                       class="btn btn-success">{{ trans('settings.Submit') }}</button>
           </div>
           </form>

       </div>
   </div>
</div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('select[name="grade_id"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Classrooms') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var classroomSelect = $('select[name="classroom_id"]');
                        classroomSelect.empty();
                        $.each(data, function (key, value) {
                            classroomSelect.append('<option value="' + key + '">' + value + '</option>');
                        });

                        // Trigger change event on classroom select to fetch sections
                        classroomSelect.trigger('change');
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

        $('select[name="classroom_id"]').on('change', function () {
            var Classroom_id = $(this).val();
            if (Classroom_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var sectionSelect = $('select[name="section_id"]');
                        sectionSelect.empty();
                        $.each(data, function (key, value) {
                            sectionSelect.append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
    </script>
@endsection
