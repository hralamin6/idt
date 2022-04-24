<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Illuminate\Support\Carbon;
use Livewire\Component;

class MonthlyTask extends Component
{
    public $date;
    public function getDataProperty()
    {
        return Task::all();
    }

    public function mount()
    {
        $this->date = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));

    }
    public function nextDate()
    {
        $this->date->addMonth(1);
    }
    public function prevDate()
    {
        $this->date->addMonth(-1);
    }

    public function render()
    {
        $items = $this->data;

        return view('livewire.task.monthly-task', compact('items'));
    }
}
