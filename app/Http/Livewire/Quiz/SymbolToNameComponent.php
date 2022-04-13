<?php

namespace App\Http\Livewire\Quiz;

use App\Models\Atom;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SymbolToNameComponent extends Component
{
    use LivewireAlert;
    public $ans=[];
//    public $ans=['','','','','','','','','',''];
    public $itemPerPage = 10;
    public $sameItems;
    public $items;
    public $submitted=false;
    public $true_ans;
    public $date_time;
    public function getDataProperty()
    {
        return Atom::inRandomOrder()->limit($this->itemPerPage)->get();
    }

    public function mount()
    {
        $this->ans = array_fill(0, $this->itemPerPage, null);
        $this->items = $this->data;
        $this->sameItems = $this->data;

    }
    public function submit()
    {
        $this->true_ans = 0;
        foreach ($this->sameItems as $i=> $question){
            if (isset($this->ans[$i])){
                if (strtolower($question->symbol) === strtolower($this->ans[$i])){
                    $this->true_ans++;
                }
            }
        }
        $this->submitted = true;
        $this->emit('timeFinished');
        $this->alert('success', __('Data successfully created'));
    }


    public function render()
    {
        return view('livewire.quiz.symbol-to-name-component');
    }
}
