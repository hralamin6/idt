<?php
namespace App\Http\Livewire\Admin\Hadith;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Hadith;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
class HadithHadith extends Component
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

    public function mount(Book  $book, Chapter $chapter)
    {
        $this->book = $book;
        $this->chapter = $chapter;
    }


    public function getDataProperty()
    {
        return Hadith::paginate($this->item_per_page)->withQueryString();
    }

    public function loadData(Hadith $hadith)
    {
        $this->hadith = $hadith;
        $this->state = $hadith->toArray();
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
        $this->hadith->update($this->state);
        $this->emit('dataAdded', ['dataId' => 'item-id-'.$this->hadith->id]);
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
        $data = Hadith::create($this->state);
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
    public function changeStatus(Hadith $hadith)
    {
        $hadith->is_active?$hadith->update(['is_active'=>0]):$hadith->update(['is_active'=>1]);
        $this->alert('success', __('Data updated successfully'));
//        $this->emit('dataAdded');
    }
    public function deleteMultiple()
    {
        Hadith::whereIn('id', $this->selected_rows)->delete();
        $this->select_page_rows = false;
        $this->selected_rows = [];
    }
    public function deleteSingle(Hadith $hadith)
    {
        $hadith->delete();
        $this->alert('success', __('Data deleted successfully'));
    }

    public function render()
    {
//        Hadith::truncate();
        $isset = Hadith::first();
        if ($isset==null){
            $hadiths = Http::get('http://alquranbd.com/api/hadith/'.$this->book->book_key.'/'.$this->chapter->id)->json();
            foreach ($hadiths as $i => $hadith){
                Hadith::create([
                    'name_en' => $hadith['nameEnglish'],
                    'name_bn' => $hadith['nameBengali'],
                    'range_start' => $hadith['range_start'],
                    'range_end' => $hadith['range_end'],
                    'hadith_number' => $hadith['hadith_number'],
                    'is_active' => $hadith['isActive'],
                ]);
            }
        }
        $items = $this->data;
        return view('livewire.admin.hadith.hadith-hadith', compact('items'));
    }
}
