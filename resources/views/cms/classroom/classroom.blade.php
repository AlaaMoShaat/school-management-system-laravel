@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('main_trans.classes'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.classes') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.classes') }}</li>
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
                {{ trans('classroom_trans.add_class') }}
            </button>

            <button class="btn btn-danger btn-lg" id="btn_delete_all">
                {{ trans('settings.delete_checkbox') }}
            </button>

            <br><br>



            <form action="{{ route('classrooms.index') }}" method="GET" class="filter-form">
                <select name="grade_id" class="grade-select">
                    <option selected disabled value="">{{ trans('classroom_trans.Search_By_Grade') }}</option>
                    @foreach($grades as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="filter-btn">{{ trans('settings.Filter') }}</button>
            </form>
            <style>
                .filter-form {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 20px;
                }

                .grade-select {
                    padding: 10px;
                    font-size: 16px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    margin-right: 10px;
                }

                .filter-btn {
                    padding: 10px 20px;
                    font-size: 16px;
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }

                .filter-btn:hover {
                    background-color: #0056b3;
                }
            </style>


          <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                    <th>#</th>
                    <th>{{ trans('classroom_trans.Name') }}</th>
                    <th>{{ trans('classroom_trans.Name_grade') }}</th>
                    <th>{{ trans('settings.Processes') }}</th>
                </tr>
            </thead>
            <tbody>



                <?php $i = 0; ?>
                @foreach ($classrooms as $classroom)
                <?php $i++; ?>
                <tr>
                    <td><input type="checkbox"  value="{{ $classroom->id }}" class="box1" ></td>
                    <td>{{ $i }}</td>
                    <td>{{ $classroom->name }}</td>
                    <td>{{ $classroom->grade->name}}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#edit{{ $classroom->id }}"
                                title="{{ trans('settings.Edit') }}"><i
                                class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete{{ $classroom->id }}"
                                title="{{ trans('settings.Delete') }}"><i
                                class="fa fa-trash"></i></button>
                    </td>
                </tr>

                <!-- edit_modal_Grade -->
                <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                   id="exampleModalLabel">
                                   {{ trans('classroom_trans.edit_class') }}
                               </h5>
                               <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                           <div class="modal-body">
                               <!-- add_form -->
                               <form action="{{route('classrooms.update','test')}}" method="post">
                                   {{method_field('patch')}}
                                   @csrf
                                   <div class="row">
                                       <div class="col">
                                           <label for="name"
                                                  class="mr-sm-2">{{ trans('classroom_trans.Name_class_ar') }}
                                               :</label>
                                           <input id="name" type="text" name="name"
                                                  class="form-control"
                                                  value="{{$classroom->getTranslation('name', 'ar')}}"
                                                  required>
                                           <input id="id" type="hidden" name="id" class="form-control"
                                                  value="{{ $classroom->id }}">
                                       </div>
                                       <div class="col">
                                           <label for="name_en"
                                                  class="mr-sm-2">{{ trans('classroom_trans.Name_class_en') }}
                                               :</label>
                                           <input type="text" class="form-control"
                                                  value="{{$classroom->getTranslation('name', 'en')}}"
                                                  name="name_en" required>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <label
                                           for="grade_id">{{ trans('classroom_trans.Name_grade') }}
                                           :</label>
                                           <select class="form-control select2" name="grade_id" id="grade_id" style="width: 100%;">
                                            @foreach ($grades as $grade )
                                                <option @if($grade->id == $classroom->grade_id) selected @endif value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                          </select>
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

               <!-- delete_modal_Grade -->
               <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                               id="exampleModalLabel">
                               {{ trans('classroom_trans.delete_class') }}
                           </h5>
                           <button type="button" class="close" data-dismiss="modal"
                                   aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <form action="{{route('classrooms.destroy','test')}}" method="post">
                               {{method_field('Delete')}}
                               @csrf
                               {{ trans('settings.Warning_Delete') }}
                               <input id="id" type="hidden" name="id" class="form-control"
                                      value="{{ $classroom->id }}">
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
    <!-- add_modal_class -->
<di class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ trans('classroom_trans.add_class') }}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form class=" row mb-30" action="{{ route('classrooms.store') }}" method="POST">
                @csrf

                <div class="card-body">
                    <div class="repeater">
                        <div data-repeater-list="List_Classes">
                            <div data-repeater-item>

                                <div class="row">

                                    <div class="col">
                                        <label for="name"
                                            class="mr-sm-2">{{ trans('classroom_trans.Name_class_ar') }}
                                            :</label>
                                        <input class="form-control" type="text" name="name"  />
                                    </div>


                                    <div class="col">
                                        <label for="name"
                                            class="mr-sm-2">{{ trans('classroom_trans.Name_class_en') }}
                                            :</label>
                                        <input class="form-control" type="text" name="name_en" required />
                                    </div>


                                    <div class="col">
                                        <label for="grade_id"
                                            class="mr-sm-2">{{ trans('classroom_trans.Name_grade') }}
                                            :</label>

                                        <div class="box">
                                            <select class="fancyselect" name="grade_id">
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col">
                                        <label for="Name_en"
                                            class="mr-sm-2">{{ trans('settings.Processes') }}
                                            :</label>
                                        <input class="btn btn-danger btn-block" data-repeater-delete
                                            type="button" value="{{ trans('classroom_trans.delete_row') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-12">
                                <input class="button" data-repeater-create type="button" value="{{ trans('classroom_trans.add_row') }}"/>
                            </div>

                        </div>

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
</div>
</div>




<!-- حذف مجموعة صفوف -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('classroom_trans.delete_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('delete_all') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    {{ trans('settings.Warning_Delete') }}
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('settings.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('settings.Delete') }}</button>
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
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;

        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>


<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });
</script>



@endsection
