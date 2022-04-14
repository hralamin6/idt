<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class HeaderComponent extends Component
{
    public  $is=10;
    protected $listeners = ['startPractise' => 'startPractise'];
    public function startPractise($isMinus)
    {
        $this->is = $isMinus;
//        dd($this->is);
    }

    public function render()
    {
        return view('livewire.admin.header-component');
    }
}
