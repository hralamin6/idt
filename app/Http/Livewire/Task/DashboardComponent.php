<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $lang;

    public function mount()
    {
        $this->lang = App::getLocale();

    }
    public function getDataProperty()
    {
        return Task::all();
    }

    public function render()
    {
        $items = $this->data;

        return view('livewire.task.dashboard-component', compact('items'));
    }
}
