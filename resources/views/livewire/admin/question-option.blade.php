<div class=" rounded-xl mt-4" x-data="{openTable: $persist(true), modal: false, editMode: false}"
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 divide-blue-400">
            @for ($x = 0; $x <= 9; $x++)
            <div class="text-center">
{{--                <div class="flex flex-col">--}}
                    <input wire:model.lazy="ques.{{$x}}" type="text" placeholder="Question here" class="input input-sm input-bordered input-info mb-2 w-full max-w-xs">
                    @error('ques.'.$x)<p class="text-sm text-red-600">The question field is required</p>@enderror
{{--                </div>--}}
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-2">
                    @for ($y = 0; $y <= 3; $y++)
                                        <div class="flex flex-col">
                    <input wire:model.lazy="questions.{{$x}}.{{$y}}" type="text" placeholder="Option {{$y+1}}" class="input input-sm input-bordered input-primary w-full max-w-xs">
                    @error('questions.'.$x.'.'.$y)<p class="text-sm text-red-600">The option field is required</p>@enderror
                                        </div>
                    @endfor
                </div>
            </div>
            @endfor
        </div>
        <a wire:click.prevent="asdf" class="btn btn-outline btn-primary btn-xs btn-block w-48">test</a>
    </div>

</div>

