@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('main_trans.Grade'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.Grade') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Grade') }}</li>
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
                {{ trans('grade_trans.add_Grade') }}
            </button>
            <br><br>
          <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('grade_trans.Name') }}</th>
                    <th>{{ trans('grade_trans.Num') }}</th>
                    <th>{{ trans('grade_trans.Note') }}</th>
                    <th>{{ trans('settings.Processes') }}</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($grades as $grade)
                <?php $i++; ?>
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $grade->name }}</td>
                    <td>{{ $grade->classrooms_count }}</td>
                    <td>{{ $grade->note }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#edit{{ $grade->id }}"
                                title="{{ trans('settings.Edit') }}"><i
                                class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete{{ $grade->id }}"
                                title="{{ trans('settings.Delete') }}"><i
                                class="fa fa-trash"></i></button>
                    </td>
                </tr>

                <!-- edit_modal_Grade -->
                <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                   id="exampleModalLabel">
                                   {{ trans('grade_trans.edit_Grade') }}
                               </h5>
                               <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                           <div class="modal-body">
                               <!-- add_form -->
                               <form action="{{route('grades.update','test')}}" method="post">
                                   {{method_field('patch')}}
                                   @csrf
                                   <div class="row">
                                       <div class="col">
                                           <label for="Name"
                                                  class="mr-sm-2">{{ trans('grade_trans.stage_name_ar') }}
                                               :</label>
                                           <input id="name" type="text" name="name"
                                                  class="form-control"
                                                  value="{{$grade->getTranslation('name', 'ar')}}"
                                                  required>
                                           <input id="id" type="hidden" name="id" class="form-control"
                                                  value="{{ $grade->id }}">
                                       </div>
                                       <div class="col">
                                           <label for="name_en"
                                                  class="mr-sm-2">{{ trans('grade_trans.stage_name_en') }}
                                               :</label>
                                           <input type="text" class="form-control"
                                                  value="{{$grade->getTranslation('name', 'en')}}"
                                                  name="name_en" required>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <label
                                           for="exampleFormControlTextarea1">{{ trans('grade_trans.note') }}
                                           :</label>
                                       <textarea class="form-control" name="note"
                                                 id="exampleFormControlTextarea1"
                                                 rows="3">{{ $grade->note }}</textarea>
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
               <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                               id="exampleModalLabel">
                               {{ trans('grade_trans.delete_Grade') }}
                           </h5>
                           <button type="button" class="close" data-dismiss="modal"
                                   aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <form action="{{route('grades.destroy','test')}}" method="post">
                               {{method_field('Delete')}}
                               @csrf
                               {{ trans('settings.Warning_Delete') }}
                               <input id="id" type="hidden" name="id" class="form-control"
                                      value="{{ $grade->id }}">
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
    <!-- add_modal_Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   {{ trans('grade_trans.add_Grade') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- add_form -->
               <form action="{{ route('grades.store') }}" method="POST">
                   @csrf
                   <div class="row">
                       <div class="col">
                           <label for="name"
                                  class="mr-sm-2">{{ trans('grade_trans.stage_name_ar') }}
                               :</label>
                           <input id="name" type="text" class="form-control" name="name" required >
                       </div>
                       <div class="col">
                           <label for="name_en"
                                  class="mr-sm-2">{{ trans('grade_trans.stage_name_en') }}
                               :</label>
                           <input type="text" class="form-control" name="name_en" required >
                       </div>
                   </div>
                   <div class="form-group">
                       <label
                           for="exampleFormControlTextarea1">{{ trans('grade_trans.Note') }}
                           :</label>
                       <textarea class="form-control" name="note" id="exampleFormControlTextarea1"
                                 rows="3"></textarea>
                   </div>
                   <br><br>
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

@endsection
