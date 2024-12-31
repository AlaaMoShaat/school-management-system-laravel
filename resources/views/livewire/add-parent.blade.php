<div>

    @if ($catchError)
            <div class="alert alert-danger" id="success-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ $catchError }}
            </div>
    @endif


    @if($show_table)

        @include('livewire.Parent_Table')

    @else

        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                    class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                    <p>{{ trans('parent_trans.Step1') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                    class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                    <p>{{ trans('parent_trans.Step2') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                    class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                    disabled="disabled">3</a>
                    <p>{{ trans('parent_trans.Step3') }}</p>
                </div>
            </div>
        </div>


        @include('livewire.Father_Form')

        @include('livewire.Mother_Form')


        <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
            @if ($currentStep != 3)
        <div style="display: none" class="row setup-content" id="step-3">
            @endif

            <div class="col-xs-12">
                <div class="col-md-12" style="margin-left: 300px;"><br>
                    <label class="l" style="display: flex ; justify-content:center">{{trans('parent_trans.Attachments')}}</label>
                    <div class="form-group" style="display: flex ; justify-content:center" >
                        <input class="i" type="file" wire:model="photos" accept="image/*" multiple>
                    </div>
                    <style>
                        /* CSS Styles */
                        .l {
                            color: red;
                            font-weight: bold;
                            display: block;
                            margin-bottom: 10px;
                        }

                        .i {
                            padding: 10px;
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            background-color: #f9f9f9;
                            width: 50%;
                            box-sizing: border-box;
                        }
                    </style>
                    <br>

                    <input type="hidden" wire:model="parent_id">

                    <div style="display: flex; justify-content:center">

                        <button class="btn btn-danger btn-sm nextBtn btn-lg" type="button"
                            wire:click="back(2)">{{ trans('parent_trans.Back') }}</button>

                        @if($updateMode)

                        <button class="btn btn-success btn-sm nextBtn btn-lg" wire:click="submitForm_edit"
                                type="button">{{trans('parent_trans.Finish')}}
                        </button>

                        @else

                        <button class="btn btn-success btn-sm btn-lg" wire:click="submitForm"
                                type="button">{{ trans('parent_trans.Finish') }}</button>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif
</div>
