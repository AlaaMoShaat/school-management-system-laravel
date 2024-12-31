<?php
namespace App\Http\Livewire;

use App\Models\Degree;
use App\Models\Question;
use Livewire\Component;

class ShowQuestions extends Component
{
    public $selectedChoice;
    public $data, $student_id, $quiz_id, $counter = 0, $questionsCount = 0;
    public $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->counter = session()->get('current_question_counter', 0);
    }

    public function render()
    {
        $this->data = Question::where('quiz_id', $this->quiz_id)->orderBy('id', 'asc')->get();
        $this->questionsCount = $this->data->count();
        return view('livewire.show-questions', ['data']);
    }

    public function nextQuestion($choice, $right_answer, $score)
    {
        $this->recordScore($choice, $right_answer, $score);

        if ($this->counter < $this->questionsCount - 1) {
            $this->counter++;
        } else {
            $this->submitButton();
        }
        session()->put('current_question_counter', $this->counter);
        $this->emit('refreshComponent');
    }

    public function submitButton()
    {
        toastr()->success(trans('studentdash_trans.FinishQuiz'));
        $this->redirect(route('stddash'));
        $this->counter = 0;
    }

    private function recordScore($choice, $right_answer, $score)
    {
        $std_degree = Degree::where('student_id', $this->student_id)
            ->where('quiz_id', $this->quiz_id)
            ->first();

        if (!$std_degree) {
            $std_degree = new Degree();
            $std_degree->student_id = $this->student_id;
            $std_degree->quiz_id = $this->quiz_id;
            $std_degree->date = date('Y-m-d');
        }

        if (strcmp(trim($choice), trim($right_answer)) === 0) {
            $std_degree->score += $score;
        }
        else{
            $std_degree->score += 0;
        }
        $std_degree->mark += $score;
        $std_degree->save();
    }
}