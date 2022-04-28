<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use App\Models\TaskCount;
use App\Models\TaskPoint;
use Illuminate\Support\Carbon;
//use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class TaskwiseComponent extends Component
{
    use LivewireAlert;
    public $ans=[];
    public $tasks;
    public $task;
    public $lang;
    public $date;
    public $point;
    public $task_id;
    public $qurans=[];

    public function mount($id)
    {
        $this->task_id = $id;
        $this->lang= App::getLocale();
        $this->tasks = $this->data;
        $this->date = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
        $this->load();
    }

    public function load()
    {
        $this->task = Task::findOrFail($this->task_id);
        $this->task = $this->task->taskcount($this->task_id, \Carbon\Carbon::parse($this->date)->format('m-Y'));
        $this->ans = array_fill(0, $this->tasks->count(), null);
        $task = TaskCount::where(['user_id'=> auth()->id(), 'date' => Carbon::parse($this->date)->format('Y-m-d')])->first();
        if ($task){
//            dd($task->tasks);
            foreach ($task->tasks as $i => $task){
                $this->ans[$i] = $task>0?$task:null ;
            }

        }
        $this->point();
    }

    public function point()
    {
        $point = TaskPoint::where('user_id', auth()->id())->where('date', Carbon::parse($this->date)->format('Y-m-d'))->first();
        $this->point = $point?$point->points*5:null;
    }

    public function dateChange($d)
    {
        $today = \Carbon\Carbon::parse($this->date)->format('d');
        $diff = $today-$d;
        $this->date->addDays(-$diff);
        $this->load();
    }
    public function nextMonth()
    {
        $this->date->addMonth(1);
        $this->load();
    }
    public function prevMonth()
    {
        $this->date->addMonth(-1);
        $this->load();
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
    public function getDataProperty()
    {
        return Task::all();
    }
    public function render()
    {
//       $status =  Cache::get('is_online'.auth()->id());
        $this->tasks = $this->data;
        $items = $this->data;
        return view('livewire.task.taskwise-component', compact('items'));
    }
}
