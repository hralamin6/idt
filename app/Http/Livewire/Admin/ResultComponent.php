<?php

namespace App\Http\Livewire\Admin;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ResultComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $quiz, $name;
    public $ans=[];
    protected $queryString = [
        'page'
    ];
    public $selectedRows = [];
    public $selectPageRows = false;
    public $itemPerPage = 20;
    public $sameItems;
    public $date_time;

    public function submit()
    {
        $this->quiz->answers()->delete();
        $this->quiz->results()->delete();
        $x = 0;
        foreach ($this->data as $i=> $question){
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
        dd($x);
    }
    public function mount(Quiz  $quiz)
    {
        $this->quiz = $quiz;
        $this->date_time = strtotime( $quiz->date_time );
    }
    public function getDataProperty()
    {
        return $this->quiz->questions()->Paginate($this->itemPerPage);
    }

    public function render()
    {
        $result = $this->quiz->results->first();
        $items = $this->data;
        $this->sameItems = $items->toArray();
        return view('livewire.admin.result-component', compact('items', 'result'));
    }
}
