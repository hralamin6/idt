<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class MonthlyTask extends Component
{
    public $date;
    public $lang;
    public function getDataProperty()
    {
        return Task::all();
    }

    public function mount()
    {
        $this->lang = App::getLocale();
        $this->date = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));

    }
    public function nextMonth()
    {
        $this->date->addMonth(1);
    }
    public function prevMonth()
    {
        $this->date->addMonth(-1);
    }

    public function render()
    {
        $items = $this->data;

        return view('livewire.task.monthly-task', compact('items'));
    }
}
