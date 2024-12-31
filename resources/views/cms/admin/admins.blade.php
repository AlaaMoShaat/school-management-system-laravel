@extends('layouts.master')
@section('css')

@endsection
@section('title' , trans('main_trans.subjects'))
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.subjects') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.subjects') }}</li>
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
                {{ trans('subject_trans.add_subject') }}
            </button>
            <br><br>
          <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('subject_trans.Name') }}</th>
                    <th>{{ trans('subject_trans.Name_grade') }}</th>
                    <th>{{ trans('settings.Processes') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#edit{{ $user->id }}"
                                title="{{ trans('settings.Edit') }}"><i
                                class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete{{ $user->id }}"
                                title="{{ trans('settings.Delete') }}"><i
                                class="fa fa-trash"></i></button>
                    </td>
                </tr>

                <!-- edit_modal_Subject -->
                <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                   id="exampleModalLabel">
                                   {{ trans('subject_trans.edit_subject') }}
                               </h5>
                               <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                           <div class="modal-body">
                               <!-- add_form -->
                               <form action="{{route('users.update','test')}}" method="post">
                                   {{method_field('patch')}}
                                   @csrf
                                   <div class="row">
                                       <div class="col">
                                           <label for="name"
                                                  class="mr-sm-2">{{ trans('subject_trans.Name_subject_ar') }}
                                               :</label>
                                           <input id="name" type="text" name="name"
                                                  class="form-control"
                                                  value="{{$user->getTranslation('name', 'ar')}}"
                                                  required>
                                           <input id="id" type="hidden" name="id" class="form-control"
                                                  value="{{ $user->id }}">
                                       </div>
                                       <div class="col">
                                           <label for="name_en"
                                                  class="mr-sm-2">{{ trans('subject_trans.Name_subject_en') }}
                                               :</label>
                                           <input type="text" class="form-control"
                                                  value="{{$user->getTranslation('name', 'en')}}"
                                                  name="name_en" required>
                                       </div>
                                   </div>
                                   <br>

                                   <div class="row">
                                    <div class="col">
                                        <label for="email"
                                               class="mr-sm-2">{{ trans('subject_trans.Name_subject_ar') }}
                                            :</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required >
                                    </div>
                                    <div class="col">
                                        <label for="password"
                                               class="mr-sm-2">{{ trans('subject_trans.Name_subject_en') }}
                                            :</label>
                                        <input type="password" class="form-control" name="password" value="{{ $user->password }}" required >
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

               <!-- delete_modal_Subject -->
               <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                               id="exampleModalLabel">
                               {{ trans('subject_trans.delete_subject') }}
                           </h5>
                           <button type="button" class="close" data-dismiss="modal"
                                   aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <form action="{{route('users.destroy','test')}}" method="post">
                               {{method_field('Delete')}}
                               @csrf
                               {{ trans('settings.Warning_Delete') }}
                               <input id="id" type="hidden" name="id" class="form-control"
                                      value="{{ $user->id }}">
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
                   {{ trans('subject_trans.add_subject') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- add_form -->
               <form action="{{ route('users.store') }}" method="POST">
                   @csrf
                   <div class="row">
                       <div class="col">
                           <label for="name"
                                  class="mr-sm-2">{{ trans('subject_trans.Name_subject_ar') }}
                               :</label>
                           <input id="name" type="text" class="form-control" name="name" required >
                       </div>
                       <div class="col">
                           <label for="name_en"
                                  class="mr-sm-2">{{ trans('subject_trans.Name_subject_en') }}
                               :</label>
                           <input type="text" class="form-control" name="name_en" required >
                       </div>
                   </div>
                   <br>

                   <div class="row">
                    <div class="col">
                        <label for="email"
                               class="mr-sm-2">{{ trans('subject_trans.Name_subject_ar') }}
                            :</label>
                        <input id="email" type="email" class="form-control" name="email" required >
                    </div>
                    <div class="col">
                        <label for="password"
                               class="mr-sm-2">{{ trans('subject_trans.Name_subject_en') }}
                            :</label>
                        <input type="password" class="form-control" name="password" required >
                    </div>
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
