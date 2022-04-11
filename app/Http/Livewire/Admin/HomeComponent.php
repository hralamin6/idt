<?php

namespace App\Http\Livewire\Admin;

use App\Imports\AtomImport;
use App\Models\Atom;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class HomeComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $photo;


    public function import(Request $request){
//        $this->validate([
//            'photo' => 'image|max:1024', // 1MB Max
//        ]);
        Excel::import(new AtomImport, $this->photo->store('photos'));
        $this->alert('success', 'Successfully imported');
    }
    public function render()
    {
        $atoms = Atom::all('id', 'name', 'number', 'symbol', 'atomic_mass', 'category');
        return view('livewire.admin.home-component', compact('atoms'));
    }
}
