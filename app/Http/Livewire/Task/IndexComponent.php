<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use App\Models\TaskCount;
use App\Models\TaskPoint;
use Illuminate\Support\Carbon;
//use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class IndexComponent extends Component
{
    use LivewireAlert;
    public $ans=[];
    public $tasks;
    public $lang;
    public $date;
    public $qurans=[];

    public function mount()
    {
        $sura = rand(10, 114);
        $this->qurans = Http::get('https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/ben-muhiuddinkhan/'.$sura.'.json')->json();
        $this->qurans = $this->qurans['chapter']??[];
        $this->lang= App::getLocale();
        $this->tasks = $this->data;
        $this->date = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
        $this->load();
    }

    public function load()
    {
        $this->ans = array_fill(0, $this->tasks->count(), null);
        $task = TaskCount::where(['user_id'=> auth()->id(), 'date' => Carbon::parse($this->date)->format('Y-m-d')])->first();
        if ($task){
//            dd($task->tasks);
            foreach ($task->tasks as $i => $task){
                $this->ans[$i] = $task>0?$task:null ;
            }
            }
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
    public function submit()
    {

            if ($this->ans !=null){
                TaskCount::updateOrCreate(['user_id'=>auth()->id(), 'date' => Carbon::parse($this->date)->format('Y-m-d')], ['tasks' => $this->ans]);
            }
        $task_poing = TaskPoint::updateOrCreate(['user_id'=>auth()->id(), 'date' => Carbon::parse($this->date)->format('Y-m-d')], ['point' => count(array_filter($this->ans))]);
                $points = $task_poing->point*5;
        $this->alert('success', __('Congratulations! You got '.$points.' out of 100'), [
            'position' => 'center',
            'toast' => false,
            'text' => __('best wishes for next day'),
            'showCancelButton' => true,
            'allowOutsideClick' => true,
            'timer' => 5000,
        ]);
    }
    public function getDataProperty()
    {
        return Task::all();
    }
    public function render()
    {
        $this->tasks = $this->data;
        $items = $this->data;
        return view('livewire.task.index-component', compact('items'));
    }
}
