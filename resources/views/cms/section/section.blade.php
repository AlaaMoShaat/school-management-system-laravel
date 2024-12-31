@extends('layouts.master')
@section('css')

@section('title' , trans('main_trans.sections'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.sections') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.sections') }}</li>
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
                    <a class="btn btn-success btn-lg" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('section_trans.add_section') }}</a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            @foreach ($grades as $grade)

                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $grade->name }}</a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('section_trans.Name') }}</th>
                                                                    <th>{{ trans('section_trans.Name_classroom') }}</th>
                                                                    <th>{{ trans('section_trans.status') }}</th>
                                                                    <th>{{ trans('settings.Processes') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($grade->sections as $section)
                                                                    <tr>
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $section->name }}</td>
                                                                        <td>{{ $section->classroom->name }}
                                                                        </td>
                                                                        <td>
                                                                            @if ($section->status == 1)
                                                                                <label
                                                                                    class="badge badge-success">{{ trans('section_trans.status_true') }}</label>
                                                                            @else
                                                                                <label
                                                                                    class="badge badge-danger">{{ trans('section_trans.status_false') }}</label>
                                                                            @endif

                                                                        </td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                                                    data-target="#edit{{ $section->id }}"
                                                                                    title="{{ trans('settings.Edit') }}"><i
                                                                                    class="fa fa-edit"></i></button>
                                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                                                    data-target="#delete{{ $section->id }}"
                                                                                    title="{{ trans('settings.Delete') }}"><i
                                                                                    class="fa fa-trash"></i></button>
                                                                            <a href="{{ route('library.show' , $section->id) }}" class="btn btn-primary btn-sm">
                                                                                <i class="fa fa-plus"></i> {{ trans('library_trans.add_books') }}
                                                                            </a>
                                                                        </td>
                                                                    </tr>


                                                                    <!--تعديل قسم جديد -->
                                                                    <div class="modal fade"
                                                                         id="edit{{ $section->id }}"
                                                                         tabindex="-1" role="dialog"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('section_trans.edit_section') }}
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form
                                                                                        action="{{ route('sections.update', 'test') }}"
                                                                                        method="POST">
                                                                                        {{ method_field('patch') }}
                                                                                        {{ csrf_field() }}
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                       name="name"
                                                                                                       class="form-control"
                                                                                                       value="{{ $section->getTranslation('name', 'ar') }}">
                                                                                            </div>

                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                       name="name_en"
                                                                                                       class="form-control"
                                                                                                       value="{{ $section->getTranslation('name', 'en') }}">
                                                                                                <input id="id"
                                                                                                       type="hidden"
                                                                                                       name="id"
                                                                                                       class="form-control"
                                                                                                       value="{{ $section->id }}">
                                                                                            </div>

                                                                                        </div>
                                                                                        <br>


                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                   class="control-label">{{ trans('section_trans.Name_grade') }}</label>
                                                                                            <select name="grade_id"
                                                                                                    class="custom-select"
                                                                                                    onclick="console.log($(this).val())">
                                                                                                @foreach ($grades as $grade )
                                                                                                    <option @if($grade->id == $section->grade_id) selected @endif value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                   class="control-label">{{ trans('section_trans.Name_classroom') }}</label>
                                                                                            <select name="classroom_id"
                                                                                                    class="custom-select">
                                                                                                <option
                                                                                                    value="{{ $section->classroom->id }}">
                                                                                                    {{ $section->classroom->name }}
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <div class="form-check">

                                                                                                @if ($section->status == 1)
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        checked
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">
                                                                                                @else
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">
                                                                                                @endif
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleCheck1">{{ trans('section_trans.status') }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <label for="inputName" class="control-label">{{ trans('Teacher_trans.Name_Teacher') }}</label>
                                                                                            <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                                                                @foreach($teachers as $teacher)
                                                                                                    <?php $selected = false; ?>
                                                                                                    @foreach($section->teachers as $st)
                                                                                                        @if($teacher->id == $st->id)
                                                                                                            <?php $selected = true; ?>
                                                                                                            @break
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                    <option @if($selected) selected @endif value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>


                                                                                </div>
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


                                                                    <!-- delete_modal_Grade -->
                                                                    <div class="modal fade"
                                                                         id="delete{{ $section->id }}"
                                                                         tabindex="-1" role="dialog"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('section_trans.delete_section') }}
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form
                                                                                        action="{{ route('sections.destroy', 'test') }}"
                                                                                        method="post">
                                                                                        {{ method_field('Delete') }}
                                                                                        @csrf
                                                                                        {{ trans('settings.Warning_Delete') }}
                                                                                        <input id="id" type="hidden"
                                                                                               name="id"
                                                                                               class="form-control"
                                                                                               value="{{ $section->id }}">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
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
                                    @endforeach
                                </div>
                        </div>
                    </div>

                    <!--اضافة قسم جديد -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                        {{ trans('section_trans.add_section') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('sections.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="{{ trans('section_trans.Name_section_ar') }}">
                                            </div>

                                            <div class="col">
                                                <input type="text" name="name_en" class="form-control"
                                                       placeholder="{{ trans('section_trans.Name_section_en') }}">
                                            </div>

                                        </div>
                                        <br>


                                        <div class="col">
                                            <label for="inputName" class="control-label">{{ trans('section_trans.Name_grade') }}</label>
                                            <select name="grade_id" class="custom-select" onchange="console.log($(this).val())">
                                                <!--placeholder-->
                                                <option value="" selected disabled>{{ trans('section_trans.select_grade') }}</option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade->id }}"> {{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col">
                                            <label for="inputName" class="control-label">{{ trans('section_trans.Name_classroom') }}</label>
                                            <select name="classroom_id" class="custom-select">

                                            </select>
                                        </div>
                                        <br>

                                        <div class="col">
                                            <label for="inputName" class="control-label">{{ trans('Teacher_trans.Name_Teacher') }}</label>
                                            <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                @endforeach
                                            </select>
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
                            url: "{{ URL::to('classes') }}/" + Grade_id,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                $('select[name="classroom_id"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
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
