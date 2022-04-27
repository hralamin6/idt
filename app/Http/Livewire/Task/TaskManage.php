<?php
namespace App\Http\Livewire\Task;
use App\Models\Task;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
class TaskManage extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $state=[];
    public $task;
    public $name;
    public $selected_rows = [];
    public $select_page_rows = false;
    public $item_per_page = 20;
    protected $listeners = ['deleteMultiple', 'deleteSingle'];
    public function getDataProperty()
    {
        return Task::paginate($this->item_per_page)->withQueryString();
    }

    public function loadData(Task $task)
    {
        $this->task = $task;
        $this->state = $task->toArray();
        $this->emit('openEditModal');
    }

    public function openModal()
    {
        $this->reset();
        $this->emit('openModal');

    }
    public function editData()
    {
        Validator::make($this->state, [
            'name' => ['required', Rule::unique('tasks', 'name')->ignore($this->task['id'])],
            'name_bn' => ['required', Rule::unique('tasks', 'name_bn')->ignore($this->task['id'])],
            'description' => ['nullable'],
            'description_bn' => ['nullable'],
            ])->validate();
        $this->task->update($this->state);
        $this->emit('dataAdded', ['dataId' => 'item-id-'.$this->task->id]);
        $this->alert('success', __('Data updated successfully'));
        $this->reset();
    }
    public function saveData()
    {
        Validator::make($this->state, [
            'name' => ['required', Rule::unique('tasks', 'name')],
            'name_bn' => ['required', Rule::unique('tasks', 'name_bn')],
            'description' => ['nullable'],
            'description_bn' => ['nullable'],

        ])->validate();
        $data = Task::create($this->state);
        $this->goToPage($this->getDataProperty()->lastPage());
//        $this->emit('dataAdded', ['dataId' => 'item-id-'.$data->id]);
        $this->reset();
        $this->alert('success', __('Data updated successfully'));

    }

    public function updatedselect_page_rows($value)
    {
        if ($value) {
            $this->selected_rows = $this->data->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset('selected_rows', 'select_page_rows');
        }
    }
    public function changeStatus(Task $task)
    {
        $task->is_active?$task->update(['status'=>0]):$task->update(['status'=>1]);
        $this->alert('success', __('Data updated successfully'));
//        $this->emit('dataAdded');
    }
    public function deleteMultiple()
    {
        Task::whereIn('id', $this->selected_rows)->delete();
        $this->select_page_rows = false;
        $this->selected_rows = [];
    }
    public function deleteSingle(Task $task)
    {
        $task->delete();
        $this->alert('success', __('Data deleted successfully'));
    }

    public function render()
    {
        $items = $this->data;
        return view('livewire.task.task-manage', compact('items'));
    }
}
