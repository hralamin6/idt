<?php

namespace App\Http\Livewire\Admin;

use App\Models\Atom;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class AtomComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $search = '';
    protected $queryString = [
        'page'
    ];
    public $selectedRows = [];
    public $selectPageRows = false;
    public $itemPerPage;
    public $orderBy = 'id';
    public $orderDirection = 'asc';
    protected $listeners = ['deleteMultiple', 'deleteSingle'];

    public function orderByDirection($field)
    {
        $this->orderBy = $field;
        $this->orderDirection==='asc'? $this->orderDirection='desc': $this->orderDirection='asc';
    }
    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->data->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset('selectedRows', 'selectPageRows');
        }
    }

    public function getDataProperty()
    {
        return Atom::orderBy($this->orderBy, $this->orderDirection)->paginate($this->itemPerPage, ['category', 'id', 'name', 'number', 'symbol', 'atomic_mass'])->withQueryString();
    }

    public function updatingSearch()

    {

        $this->resetPage();

    }

    public function render()
    {
        $atoms = $this->data;

        return view('livewire.admin.atom-component', compact('atoms'));
    }
}
