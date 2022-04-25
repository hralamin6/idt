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
        'page', 'search', 'searchBy', 'itemPerPage'
    ];
    public $selectedRows = [];
    public $selectPageRows = false;
    public $itemPerPage;
    public $orderBy = 'id';
    public $searchBy = 'id';
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
        return Atom::where($this->searchBy, 'like', '%'.$this->search.'%')->orderBy($this->orderBy, $this->orderDirection)->paginate($this->itemPerPage, ['name', 'mass', 'boiling_point', 'category', 'density', 'discovered_by', 'melting_point', 'molar_heat', 'number', 'period', 'phase', 'symbol', 'group', 'shells', 'electron_configuration', 'electron_affinity'])->withQueryString();
    }

    public function updating($p, $v)

    {
        if (in_array($p, array('itemPerPage','search','searchBy'))){
            $this->resetPage();
        }

    }

    public function render()
    {
        $atoms = $this->data;

        return view('livewire.admin.atom-component', compact('atoms'));
    }
}
