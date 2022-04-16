<?php

namespace App\Http\Livewire\Admin;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ExamComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $quiz, $name;
    public $ans=[];
    public $aaa=[[],[],[],[]];
    public $item_per_page = 10, $time_per_question = 30, $items, $same_items, $options,  $submitted=false, $true_ans, $range, $is_single_page=0, $is_mcq=1, $date_time, $is_minus=0;
    public function submit()
    {
        $this->quiz->answers()->delete();
        $this->quiz->results()->delete();
        $x = 0;
        foreach ($this->same_items as $i=> $question){
            if (isset($this->ans[$i])){
                $parts = explode('-', $this->ans[$i]);
                $q = Question::find($parts[0]);
                $ans = new Answer();
                $ans->user_id = auth()->id();
                $ans->quiz_id = $this->quiz->id;
                $ans->question_id = $q->id;
                $ans->ans_id = $parts[1];
                if (Question::find($parts[0])->answer == $parts[1]){
                    $x++;
                    $ans->is_correct = true;
                }else{
                    $ans->is_correct = false;
                }
                $ans->save();
            }
        }
        $this->quiz->results()->create([
            'user_id' => auth()->id(),
            'mark' => $x,
        ]);
        $this->alert('success', __('Data successfully created'));
        return redirect()->route('admin.question.option.result', $this->quiz->id);
    }
    public function mount(Quiz  $quiz)
    {
        $this->quiz = $quiz;
        $this->date_time = strtotime( $quiz->date_time );
        $this->item_per_page = $this->quiz->questions()->count();
        $this->time_per_question = $this->quiz->seconds_per_item;

        $this->items = $this->data;
        $this->same_items = $this->items->toArray();
        $this->ans = array_fill(0, $this->item_per_page, null);

    }
    public function getDataProperty()
    {
        return $this->quiz->questions()->limit($this->item_per_page)->get();
    }


    public function render()
    {
        return view('livewire.admin.exam-component');
    }

}
