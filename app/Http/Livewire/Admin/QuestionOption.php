<?php

namespace App\Http\Livewire\Admin;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionOption extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $quiz, $question,$questions=[],$ques=[], $option, $name;
    protected $queryString = [
        'page'
    ];

    public function asdf()
    {
//        dd( $this->questions);
        $data =  $this->validate([
            'ques.*' => ['required'],
            'questions.*.*' => ['required'],
        ]);

        foreach ($this->questions as $i => $question){

            if ($this->quiz->questions->count()>=$this->quiz->total_question){
                $this->alert('error', __('You are unable to add more question in this quiz'));
            }else{
//                dd($this->ques[$i]);
                $data = $this->quiz->questions()->create(['user_id'=> 1, 'name' => $this->ques[$i]]);
                foreach ($this->questions[$i] as $j => $option){
                   $opt = $data->options()->create(['name' => $this->questions[$i][$j]]);
                    $data->update(['answer'=>$opt->id]);
                }
                $this->alert('success', __('Data saved successfully'));
            }
        }
    }
    public function mount(Quiz  $quiz)
    {
//        dd(array( 1, 2));
        $this->quiz = $quiz;
    }
    public $selectedRows = [];
    public $selectPageRows = false;
    public $itemPerPage = 5;
    protected $listeners = ['deleteMultiple', 'deleteSingle'];


    public function getDataProperty()
    {
        return $this->quiz->questions()->paginate($this->itemPerPage)->withQueryString();

//        return Question::Paginate($this->itemPerPage);
//        return Question::Paginate($this->itemPerPage);
    }

    public function loadData(Question $question)
    {
        $this->reset('name');
        $this->question = $question;
        $this->name = $question->name;
        $this->emit('openEditModal');
    }

    public function openModal()
    {
        $this->reset('name');
        $this->emit('openModal');

    }
    public function editData()
    {
        $data = $this->validate([
            'name' => ['required', 'min:2', 'max:33', Rule::unique('questions', 'name')->ignore($this->question['id'])],
        ]);
        $this->question->update($data);
        $this->emit('dataAdded', ['dataId' => 'item-id-'.$this->question->id]);
        $this->alert('success', __('Data updated successfully'));
        $this->reset('name');
    }
    public function saveData()
    {

        $data =  $this->validate([
            'name' => ['required', 'min:2', 'max:33', Rule::unique('questions', 'name')],
        ]);
        if ($this->quiz->questions->count()>=$this->quiz->total_question){
            $this->alert('error', __('You are unable to add more question in this quiz'));
        }else{
            $data = $this->quiz->questions()->create(['user_id'=> 1, 'name' => $this->name]);
            $this->goToPage($this->getDataProperty()->lastPage());
            $this->alert('success', __('Data saved successfully'));
        }
        $this->reset('name');
        $this->emit('closeModal');

    }

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->data->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset('selectedRows', 'selectPageRows');
        }
    }
    public function changeStatus(Question $question)
    {
        $question->status?$question->update(['status'=>0]):$question->update(['status'=>1]);
        $this->alert('success', 'Basic Alert');
        $this->emit('dataAdded');
    }

    public function render()
    {
        $items = $this->data;
//        dd($items);
        return view('livewire.admin.question-option', compact('items'));
    }
    public function deleteMultiple()
    {
        Question::whereIn('id', $this->selectedRows)->delete();
        $this->selectPageRows = false;
        $this->selectedRows = [];
    }
    public function deleteSingle(Question $question)
    {
        $question->delete();
        $this->alert('success', __('Data deleted successfully'));
    }
}
