<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setup;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class HeaderComponent extends Component
{
    use LivewireAlert;

    public $lang = 'en';

    public function ChangeLang()
    {
        if (session()->has('my_locale')){
            if (session()->get('my_locale')=='en'){
                session(['my_locale' => 'bn']);
            }else{
                session(['my_locale' => 'en']);
            }
        }else{
            session()->put('my_locale', 'bn');
        }
        return redirect()->to(url()->previous());


    }
    public function logout()
    {
        session()->flush();
        Auth::logout();
            return redirect()->route('login');
    }
    public function render()
    {
        $setup = Setup::first();
        return view('livewire.admin.header-component', compact('setup'));
    }
}
