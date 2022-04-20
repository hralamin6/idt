<?php
namespace App\Http\Livewire\Admin\Hadith;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
class HadithChapter extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $state=[];
    public $chapter;
    public $book;
    public $quiz, $question, $name;
    public $selected_rows = [];
    public $select_page_rows = false;
    public $item_per_page = 5;
    protected $listeners = ['deleteMultiple', 'deleteSingle'];
//    protected $queryString = [
//        'page'
//    ];

    public function mount(Book  $book)
    {
        $this->book = $book;
    }


    public function getDataProperty()
    {
        return Chapter::paginate($this->item_per_page)->withQueryString();
    }

    public function loadData(Chapter $chapter)
    {
        $this->chapter = $chapter;
        $this->state = $chapter->toArray();
        $this->emit('openEditModal');
    }

    public function openModal()
    {
        $this->resetExcept('book');
        $this->emit('openModal');

    }
    public function editData()
    {
        Validator::make(
            $this->state,
            [
                'name_bn' => 'required',
                'name_en' => 'required',
                'range_start' => 'numeric|required',
                'range_end' => 'numeric|required',
                'hadith_number' => 'numeric|required',
                'is_active' => 'required|in:1,0',
            ],
            [
                'hadith_number.required' => 'The hadith number field is required.'
            ])->validate();
        $this->chapter->update($this->state);
        $this->emit('dataAdded', ['dataId' => 'item-id-'.$this->chapter->id]);
        $this->alert('success', __('Data updated successfully'));
    }
    public function saveData()
    {
        Validator::make(
            $this->state,
            [
                'name_bn' => 'required',
                'name_en' => 'required',
                'range_start' => 'numeric|required',
                'range_end' => 'numeric|required',
                'hadith_number' => 'numeric|required',
                'is_active' => 'required|in:1,0',
            ],
            [
                'hadith_number.required' => 'The hadith number field is required.'
            ])->validate();
        $data = Chapter::create($this->state);
        $this->goToPage($this->getDataProperty()->lastPage());
        $this->emit('dataAdded', ['dataId' => 'item-id-'.$data->id]);
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
    public function changeStatus(Chapter $chapter)
    {
        $chapter->is_active?$chapter->update(['is_active'=>0]):$chapter->update(['is_active'=>1]);
        $this->alert('success', __('Data updated successfully'));
//        $this->emit('dataAdded');
    }
    public function deleteMultiple()
    {
        Chapter::whereIn('id', $this->selected_rows)->delete();
        $this->select_page_rows = false;
        $this->selected_rows = [];
    }
    public function deleteSingle(Chapter $chapter)
    {
        $chapter->delete();
        $this->alert('success', __('Data deleted successfully'));
    }

    public function render()
    {
//        Chapter::truncate();
        $isset = Chapter::first();
        if ($isset==null){
            $chapters = Http::get('http://alquranbd.com/api/hadith/'.$this->book->book_key)->json();
            foreach ($chapters as $i => $chapter){
                Chapter::create([
                    'name_en' => $chapter['nameEnglish'],
                    'name_bn' => $chapter['nameBengali'],
                    'range_start' => $chapter['range_start'],
                    'range_end' => $chapter['range_end'],
                    'hadith_number' => $chapter['hadith_number'],
                    'is_active' => $chapter['isActive'],
                ]);
            }
        }
        $items = $this->data;
        return view('livewire.admin.hadith.hadith-chapter', compact('items'));
    }
}
