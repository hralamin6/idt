<?php
namespace App\Http\Livewire\Admin\Hadith;
use App\Models\Book;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
class HadithBook extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $state=[];
    public $book;
    public $quiz, $question, $name;
    public $selected_rows = [];
    public $select_page_rows = false;
    public $item_per_page = 5;
    protected $listeners = ['deleteMultiple', 'deleteSingle'];
//    protected $queryString = [
//        'page'
//    ];

//    public function mount(Quiz  $quiz)
//    {
//        $this->quiz = $quiz;
//    }


    public function getDataProperty()
    {
        return Book::paginate($this->item_per_page)->withQueryString();
    }

    public function loadData(Book $book)
    {
        $this->book = $book;
        $this->state = $book->toArray();
        $this->emit('openEditModal');
    }

    public function openModal()
    {
        $this->reset();
        $this->emit('openModal');

    }
    public function editData()
    {
        Validator::make(
            $this->state,
            [
                'name_bn' => 'required',
                'name_en' => 'required',
                'book_key' => 'nullable',
                'priority' => ['required', Rule::unique('books', 'priority')->ignore($this->book['id'])],
                'section_number' => 'numeric|required',
                'hadith_number' => 'numeric|required',
                'is_active' => 'required|in:1,0',
            ],
            [
                'hadith_number.required' => 'The hadith number field is required.'
            ])->validate();
        $this->book->update($this->state);
        $this->emit('dataAdded', ['dataId' => 'item-id-'.$this->book->id]);
        $this->alert('success', __('Data updated successfully'));
        $this->reset();
    }
    public function saveData()
    {
        Validator::make(
            $this->state,
            [
                'name_bn' => 'required',
                'name_en' => 'required',
                'book_key' => 'nullable',
                'priority' => ['required'],
                'section_number' => 'numeric|required',
                'hadith_number' => 'numeric|required',
                'is_active' => 'required|in:1,0',
            ],
            [
                'hadith_number.required' => 'The hadith number field is required.'
            ])->validate();
        $data = Book::create($this->state);
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
    public function changeStatus(Book $book)
    {
        $book->is_active?$book->update(['is_active'=>0]):$book->update(['is_active'=>1]);
        $this->alert('success', __('Data updated successfully'));
//        $this->emit('dataAdded');
    }
    public function deleteMultiple()
    {
        Book::whereIn('id', $this->selected_rows)->delete();
        $this->select_page_rows = false;
        $this->selected_rows = [];
    }
    public function deleteSingle(Book $book)
    {
        $book->delete();
        $this->alert('success', __('Data deleted successfully'));
    }

    public function render()
    {
//        Book::truncate();
        $isset = Book::first();
        if ($isset==null){
            $books = Http::get('http://alquranbd.com/api/hadith')->json();
            foreach ($books as $i => $book){
            Book::create([
                'name_en' => $book['nameEnglish'],
                'name_bn' => $book['nameBengali'],
                'book_key' => $book['book_key'],
                'priority' => $book['priority'],
                'section_number' => $book['section_number'],
                'hadith_number' => $book['hadith_number'],
                'is_active' => $book['isActive'],
            ]);
            }
        }
        $items = $this->data;
        return view('livewire.admin.hadith.hadith-book', compact('items'));
    }
}
