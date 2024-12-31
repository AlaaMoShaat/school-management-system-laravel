<button type="button" class="btn btn-success btn-lg" wire:click="showformadd" >
    {{ trans('parent_trans.Add_Parent') }}
</button>
<br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('parent_trans.Email') }}</th>
            <th>{{ trans('parent_trans.Name_Father_th') }}</th>
            <th>{{ trans('parent_trans.National_ID_Father_th') }}</th>
            <th>{{ trans('parent_trans.Passport_ID_Father_th') }}</th>
            <th>{{ trans('parent_trans.Phone_Father_th') }}</th>
            <th>{{ trans('parent_trans.Job_Father_th') }}</th>
            <th>{{ trans('parent_trans.Name_Mother_th') }}</th>
            <th>{{ trans('parent_trans.National_ID_Mother_th') }}</th>
            <th>{{ trans('parent_trans.Passport_ID_Mother_th') }}</th>
            <th>{{ trans('parent_trans.Phone_Mother_th') }}</th>
            <th>{{ trans('parent_trans.Job_Mother_th') }}</th>
            <th>{{ trans('settings.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($my_parents as $my_parent)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $my_parent->email }}</td>
                <td>{{ $my_parent->Name_Father }}</td>
                <td>{{ $my_parent->National_ID_Father }}</td>
                <td>{{ $my_parent->Passport_ID_Father }}</td>
                <td>{{ $my_parent->Phone_Father }}</td>
                <td>{{ $my_parent->Job_Father }}</td>
                <td>{{ $my_parent->Name_Mother }}</td>
                <td>{{ $my_parent->National_ID_Mother }}</td>
                <td>{{ $my_parent->Passport_ID_Mother }}</td>
                <td>{{ $my_parent->Phone_Mother }}</td>
                <td>{{ $my_parent->Job_Mother }}</td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('settings.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $my_parent->id }}" title="{{ trans('settings.Delete') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>

            <!-- delete_modal_Parent -->
            <div class="modal fade" id="delete{{ $my_parent->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                               id="exampleModalLabel">
                               {{ trans('parent_trans.delete_Parent') }}
                           </h5>
                           <button type="button" class="close" data-dismiss="modal"
                                   aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <form action="{{route('my_parents.destroy','test')}}" method="post">
                               {{method_field('Delete')}}
                               @csrf
                               {{ trans('settings.Warning_Delete') }}
                               <input id="id" type="hidden" name="id" class="form-control"
                                      value="{{ $my_parent->id }}">
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

        @endforeach
    </table>
</div>
