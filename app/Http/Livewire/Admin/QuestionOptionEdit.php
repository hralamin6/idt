<?php

namespace App\Http\Livewire\Admin;

use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionOptionEdit extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $quiz, $question,$questions=[],$ques=[], $option, $name, $ans=[];
    protected $queryString = [
        'page'
    ];
    public $selectedRows = [];
    public $selectPageRows = false;
    public $itemPerPage = 5;
    protected $listeners = ['deleteMultiple', 'deleteSingle'];

    public function asdf()
    {

        foreach ($this->quiz->questions as $i => $question){
            if (isset($this->ans[$i])){
                $option = Option::find($this->ans[$i]);
                $option->question->update(['answer'=>$option->id]);
            }

                $data = $question->update(['user_id'=> 1, 'name' => $this->ques[$i]]);
            foreach ($question->options as $j => $option){
//                dd($this->ans[$i][$j]);
                $opt = $option->update(['name' => $this->questions[$i][$j]]);
            }
//            $question->update(['answer'=>$this->ans[$i]]);
            $this->alert('success', __('Data saved successfully'));
        }
    }

    public function change(Option $option)
    {
        $option->question()->update(['answer'=>$option->id]);
    }
    public function mount(Quiz  $quiz)
    {
        foreach ($this->quiz->questions()->get() as $i => $question){
            $this->ques[$i] =  $question->name;
            $this->ans[$i] =  $question->answer;
            foreach ($question->options()->get() as $j => $option){
                $this->questions[$i][$j] = $option->name;
            }
        }
        $this->quiz = $quiz;
    }
    public function delete(Question $question)
    {
        $question->delete();
        $this->alert('success', __('Data deleted successfully'));
    }
    public function getDataProperty()
    {
        return $this->quiz->questions()->paginate($this->itemPerPage)->withQueryString();
    }
    public function render()
    {

        return view('livewire.admin.question-option-edit');
    }

    public function deleteAll()
    {
        $this->quiz->questions()->delete();
    }

}
