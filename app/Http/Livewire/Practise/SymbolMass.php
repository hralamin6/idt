<?php

namespace App\Http\Livewire\Practise;

use App\Models\Atom;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SymbolMass extends Component
{
    use LivewireAlert;
    public $ans=[];
    public $item_per_page = 10, $time_per_question = 30, $same_items, $options, $items, $submitted=false, $true_ans, $range, $is_single_page=0, $is_mcq=0, $date_time, $q_start=1, $q_end=25, $is_minus=0;

    public function getDataProperty()
    {
        return Atom::where('number', '>=', $this->q_start)->where('number', '<=', $this->q_end)->inRandomOrder()->limit($this->item_per_page)->get();
    }

    public function mount()
    {
        if (session()->has('q_range')){
            $r = session()->get('q_range');
            $parts = explode('-', $r);
            $this->q_start = $parts[0];
            $this->q_end = $parts[1];
            $this->range = $parts[1]-$parts[0];
        }
        if (session()->has('q_number')){
            if (session()->get('q_number')>$this->range){
                $this->item_per_page = 20;
            }else{
                $this->item_per_page = session()->get('q_number');
            }
        }
        session()->has('is_single_page')? $this->is_single_page = session()->get('is_single_page'):'';
        session()->has('q_time')? $this->time_per_question = session()->get('q_time'):'';
        session()->has('is_minus')? $this->is_minus = session()->get('is_minus'):'';
        session()->has('is_mcq')? $this->is_mcq = session()->get('is_mcq'):'';
        $this->ans = array_fill(0, $this->item_per_page, null);
        $this->items = $this->data;
        $this->same_items = $this->data;
    }
    public function submit()
    {
        $this->true_ans = 0;
        foreach ($this->same_items as $i=> $question){
            if (isset($this->ans[$i])){
                if (number_format($question->atomic_mass) == number_format($this->ans[$i])){
                    $this->true_ans++;
                }else{
                    $this->is_minus? $this->true_ans--:'';
                }
            }
        }
        $this->submitted = true;
        $this->emit('timeFinished');
        $this->alert('success', __('Practise successfully finished'));
    }


    public function render()
    {
        return view('livewire.practise.symbol-mass');
    }
}
