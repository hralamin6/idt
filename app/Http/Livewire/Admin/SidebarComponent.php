<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setup;
use Livewire\Component;

class SidebarComponent extends Component
{
    public function render()
    {
        $setup = Setup::first();

        return view('livewire.admin.sidebar-component', compact('setup'));
    }
}
