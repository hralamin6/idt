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
        $this->tasks = $this->data;
        $this->date = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
        $this->load();
    }

    public function load()
    {
        $this->ans = array_fill(0, $this->tasks->count(), null);
        $task = TaskCount::where(['user_id'=> auth()->id(), 'date' => Carbon::parse($this->date)->format('Y-m-d')])->first();
//        dd($task->tasks);
        if ($task){
            foreach ($task->tasks as $i => $task){
                $this->ans[$i] = $task>0?$task:null ;
            }
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
//        dd($this->ans);
        $points = 0;
//        foreach ($this->tasks as $i=> $task){
            if ($this->ans !=null){
                TaskCount::updateOrCreate(['user_id'=>auth()->id(), 'date' => Carbon::parse($this->date)->format('Y-m-d')], ['tasks' => $this->ans]);
            }
//       if ($this->ans[$i]==1){
//           $points++;
//       }
//        }
        TaskPoint::updateOrCreate(['user_id'=>auth()->id(), 'date' => Carbon::parse($this->date)->format('Y-m-d')], ['point' => count(array_filter($this->ans))]);
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
