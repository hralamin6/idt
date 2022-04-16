<div class=" rounded-xl mt-4" x-data="{openTable: $persist(true), modal: false,
 ans : @entangle('ans').defer,
 editMode: false}"
     x-init="
     $wire.on('openModal', (e) => {modal = true})
     $wire.on('openEditModal', (e) => {modal = true, editMode=true})
     $wire.on('closeModal', (e) => {modal = false, editMode=false})
     $wire.on('dataAdded', (e) => {
            modal = false
            editMode = false

            element = document.getElementById(e.dataId)
            console.log(element)
            element.scrollIntoView({behavior: 'smooth'})
            element.classList.add('bg-green-50')
            element.classList.add('dark:bg-gray-500')
            element.classList.add('animate-pulse')
            setTimeout(() => {
            element.classList.remove('bg-green-50')
            element.classList.remove('dark:bg-gray-500')
            element.classList.remove('animate-pulse')
            }, 5000)
            })
@if (session('scrollToComment'))
         const commentToScrollTo = document.getElementById({{session('scrollToComment')}})
            commentToScrollTo.scrollIntoView({ behavior: 'smooth'})
            commentToScrollTo.classList.add('bg-green-50')
            setTimeout(() => {
                commentToScrollTo.classList.remove('bg-green-50')
            }, 5000)
        @endif"

     @open-delete-modal.window="
     model = event.detail.model
     eventName = event.detail.eventName
Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit(eventName, model )
                }
            })
"
>
    <div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 divide-blue-400">
            @foreach ($quiz->questions as $x => $question)
                <div class="text-center">
                    <label for="">{{$question->name}}</label>
                    <input wire:model.lazy="ques.{{$x}}" type="text" placeholder="Question here" class="input input-sm input-bordered input-primary mb-2 w-full max-w-xs">
                    @error('ques'.$x)<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                    <a class="btn btn-error btn-xs" wire:click="delete({{$question->id}})">delete</a>
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-2">
                        @foreach ($question->options as $y => $option)
                            <div class="flex flex-row justify-start gap-2">
                                <input name="name.{{$option->id}}" x-model="ans[{{$x}}]" {{$option->id==$question->answer?'checked':''}} value="{{$option->id}}" type="radio">
                                <input wire:model.lazy="questions.{{$x}}.{{$y}}" type="text" placeholder="Option {{$y+1}}" class="input input-sm input-bordered input-info w-full max-w-xs">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <a wire:click.prevent="asdf" class="btn btn-outline btn-primary btn-xs btn-block w-48">test</a>
        <a wire:click.prevent="deleteAll" class="btn btn-outline btn-primary btn-xs btn-block w-48">deleteAll</a>
    </div>

</div>

