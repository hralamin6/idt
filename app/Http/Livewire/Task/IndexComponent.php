<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use App\Models\TaskCount;
use App\Models\TaskPoint;
use Illuminate\Support\Carbon;
//use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class IndexComponent extends Component
{
    use LivewireAlert;
    public $ans=[];
    public $tasks;
    public $date;

    public function mount()
    {
        $this->date = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
        $this->load();
    }

    public function load()
    {
        $this->ans = array_fill(0, 3, false);
        $tasks = TaskCount::where(['user_id'=> auth()->id(), 'date' => Carbon::parse($this->date)->format('Y-m-d')])->get();
        foreach ($tasks as $i => $task){
            $this->ans[$i] = $task->value?true:false;
        }

    }

    public function nextDate()
    {
        $this->date->addDays(1);
        $this->load();
    }
    public function prevDate()
    {
        $this->date->addDays(-1);
        $this->load();
    }
    public function submit()
    {
        $points = 0;
        foreach ($this->tasks as $i=> $task){
            TaskCount::updateOrCreate(['user_id'=>auth()->id(), 'task_id'=>$task->id, 'date' => Carbon::parse($this->date)->format('Y-m-d')], ['value' => $this->ans[$i]]);
       if ($this->ans[$i]==1){
           $points++;
       }
        }
        TaskPoint::updateOrCreate(['user_id'=>auth()->id(), 'date' => Carbon::parse($this->date)->format('Y-m-d')], ['point' => $points]);

        $this->alert('success', __('Practise successfully finished'));
    }
    public function getDataProperty()
    {
        return Task::all();
    }

    public function render()
    {
//        dd(date('Y-m-d'));
        $this->tasks = $this->data;
        $items = $this->data;
        return view('livewire.task.index-component', compact('items'));
    }
}
