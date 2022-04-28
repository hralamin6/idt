<?php

namespace App\Http\Livewire\Task;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $users = User::withCount('points')->orderBy('points_count', 'desc')->paginate();
        return view('livewire.task.user-component', compact('users'));
    }
}
