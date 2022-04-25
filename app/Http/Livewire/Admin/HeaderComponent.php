<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
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

    public function logout()
    {
        session()->flush();
            return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.admin.header-component');
    }
}
