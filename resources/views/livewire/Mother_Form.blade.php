@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Name_Mother')}}</label>
                        <input type="text" wire:model="Name_Mother" class="form-control" >
                        @error('Name_Mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Name_Mother_en')}}</label>
                        <input type="text" wire:model="Name_Mother_en" class="form-control" >
                        @error('Name_Mother_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Job')}}</label>
                        <input type="text" wire:model="Job_Mother" class="form-control">
                        @error('Job_Mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Job_en')}}</label>
                        <input type="text" wire:model="Job_Mother_en" class="form-control">
                        @error('Job_Mother_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Address')}}</label>
                        <input type="text" wire:model="Address_Mother" class="form-control">
                        @error('Address_Mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Address_en')}}</label>
                        <input type="text" wire:model="Address_Mother_en" class="form-control">
                        @error('Address_Mother_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col-md-2">
                        <label for="title">{{trans('parent_trans.National_ID')}}</label>
                        <input type="text" wire:model="National_ID_Mother" class="form-control">
                        @error('National_ID_Mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="title">{{trans('parent_trans.Passport_ID')}}</label>
                        <input type="text" wire:model="Passport_ID_Mother" class="form-control">
                        @error('Passport_ID_Mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="title">{{trans('parent_trans.Phone')}}</label>
                        <input type="text" wire:model="Phone_Mother" class="form-control">
                        @error('Phone_Mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="inputCity">{{trans('parent_trans.Nationality')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Mother_id">
                            <option selected>{{trans('parent_trans.Choose')}}...</option>
                            @foreach($Nationalities as $National)
                                <option value="{{$National->id}}">{{$National->name}}</option>
                            @endforeach
                        </select>
                        @error('Nationality_Mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="inputState">{{trans('parent_trans.Blood_Type')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Mother_id">
                            <option selected>{{trans('parent_trans.Choose')}}...</option>
                            @foreach($Type_Bloods as $Type_Blood)
                                <option value="{{$Type_Blood->id}}">{{$Type_Blood->name}}</option>
                            @endforeach
                        </select>
                        @error('Blood_Type_Mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="inputZip">{{trans('parent_trans.Religion')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Mother_id">
                            <option selected>{{trans('parent_trans.Choose')}}...</option>
                            @foreach($Religions as $Religion)
                                <option value="{{$Religion->id}}">{{$Religion->name}}</option>
                            @endforeach
                        </select>
                        @error('Religion_Mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <br>

                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                            wire:click="back(1)">{{ trans('parent_trans.Back') }}</button>

                @if($updateMode)
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondStepSubmit_edit"
                            type="button">{{trans('parent_trans.Next')}}
                    </button>
                @else
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                            wire:click="secondStepSubmit">{{trans('parent_trans.Next')}}</button>
                @endif

            </div>
        </div>
    </div>
