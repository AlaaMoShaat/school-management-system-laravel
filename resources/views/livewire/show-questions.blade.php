<div>
    <div>
        <div class="card card-statistics mb-30">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{$data[$counter]->title}}</h5>
                    <span class="score">{{ trans('studentdash_trans.Degree') }} : {{$data[$counter]->score}}</span>
                </div>

                <style>
                    .score {
                        text-align: right;
                        color: #6c757d;
                        font-size: 14px;
                    }
                </style>

                @foreach(preg_split('/(-)/', $data[$counter]->choices) as $index=>$choice)
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio{{$index}}" name="customRadio" class="custom-control-input" wire:model="selectedChoice" value="{{$choice}}">
                        <label class="custom-control-label" for="customRadio{{$index}}"> {{$choice}} </label>
                    </div>
                @endforeach

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="nextQuestion('{{$selectedChoice}}' , '{{$data[$counter]->right_answer}}' , {{$data[$counter]->score}})" type="button">
                        @if ($counter == $questionsCount - 1)
                            {{ trans('studentdash_trans.Finish') }}
                        @else
                            {{ trans('studentdash_trans.Next') }}
                        @endif
                    </button>
            </div>
        </div>
    </div>
</div>
