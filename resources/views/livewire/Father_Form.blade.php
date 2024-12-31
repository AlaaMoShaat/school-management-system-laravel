@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Email')}}</label>
                        <input type="email" wire:model="email"  class="form-control">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Password')}}</label>
                        <input type="password" wire:model="password" class="form-control" >
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Name_Father')}}</label>
                        <input type="text" wire:model="Name_Father" class="form-control" >
                        @error('Name_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Name_Father_en')}}</label>
                        <input type="text" wire:model="Name_Father_en" class="form-control" >
                        @error('Name_Father_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Job')}}</label>
                        <input type="text" wire:model="Job_Father" class="form-control">
                        @error('Job_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Job_en')}}</label>
                        <input type="text" wire:model="Job_Father_en" class="form-control">
                        @error('Job_Father_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Address')}}</label>
                        <input type="text" wire:model="Address_Father" class="form-control">
                        @error('Address_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Address_en')}}</label>
                        <input type="text" wire:model="Address_Father_en" class="form-control">
                        @error('Address_Father_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col-md-2">
                        <label for="title">{{trans('parent_trans.National_ID')}}</label>
                        <input type="text" wire:model="National_ID_Father" class="form-control">
                        @error('National_ID_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="title">{{trans('parent_trans.Passport_ID')}}</label>
                        <input type="text" wire:model="Passport_ID_Father" class="form-control">
                        @error('Passport_ID_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="title">{{trans('parent_trans.Phone')}}</label>
                        <input type="text" wire:model="Phone_Father" class="form-control">
                        @error('Phone_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="inputCity">{{trans('parent_trans.Nationality')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Father_id">
                            <option selected>{{trans('parent_trans.Choose')}}...</option>
                            @foreach($Nationalities as $National)
                                <option value="{{$National->id}}">{{$National->name}}</option>
                            @endforeach
                        </select>
                        @error('Nationality_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="inputState">{{trans('parent_trans.Blood_Type')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Father_id">
                            <option selected>{{trans('parent_trans.Choose')}}...</option>
                            @foreach($Type_Bloods as $Type_Blood)
                                <option value="{{$Type_Blood->id}}">{{$Type_Blood->name}}</option>
                            @endforeach
                        </select>
                        @error('Blood_Type_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="inputZip">{{trans('parent_trans.Religion')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Father_id">
                            <option selected>{{trans('parent_trans.Choose')}}...</option>
                            @foreach($Religions as $Religion)
                                <option value="{{$Religion->id}}">{{$Religion->name}}</option>
                            @endforeach
                        </select>
                        @error('Religion_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <br>

                @if($updateMode)
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit_edit"
                            type="button">{{trans('parent_trans.Next')}}
                    </button>
                @else
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                            type="button">{{trans('parent_trans.Next')}}
                    </button>
                @endif

            </div>
        </div>
    </div>
