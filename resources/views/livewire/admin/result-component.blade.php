<div class=" rounded-xl mt-4" x-data="{
     openTable: $persist(true), modal: false, editMode: false,
      ans : @entangle('ans').defer,
      time : {{$quiz->seconds_per_item*$quiz->questions->count()}},
      date_time : {{$date_time}},
      now: new Date().getTime(),
      seconds: 00,
      minutes: 00,
      hours: 00,
      set_time: 00,

      format: function(value){
      if (value<10){
      return '0' + Math.floor(value);
      }else{
      return Math.floor(value);
      }
      }
     }"
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
    <div class="">
        <div class="mx-auto text-center">
            <h2 class="mx-auto">{{@$result->mark}} <span>out of {{@$items->count()}}</span></h2>
        </div>

{{--                    @foreach($item->options as $j => $option)--}}
{{--                        <label for="id-{{$option->id}}" wire:key="{{$option->id}}-fdsa">--}}
{{--                            <input x-model="ans[{{$i}}]"  value="{{$item->id.'-'.$option->id}}" id="id-{{$option->id}}" name="id-{{$item->id}}" type="radio">--}}
{{--                            <span class="{{$item->answer == $option->id?'text-blue-500':''}} {{$item->userAnswer->ans_id == $option->id?'text-xs text-red-400':''}}">{{$option->name}} </span>--}}
{{--                        </label>--}}
{{--                    @endforeach--}}
    </div>
    <div class="py-8 flex flex-col justify-start md:w-1/2 m-auto capitalize">
        @foreach($items as $i => $item)
            <div
                class="border border-2 rounded-lg border-purple-400 p-3 my-2 {{$item->answer == $item->userAnswer->ans_id?'bg-green-100':'bg-red-100'}} ">
                <legend class="text-lg font-medium my-1"><span>({{$i+1}})</span><span
                        class="text-primary">{{$item->name}}?</span></legend>
                <ul class="grid grid-cols-2 gap-4">
                        <li>
                            <label class="flex items-center text-sm">
                                    <span class="ml-3 text-md font-medium">Your ans:
                                        <span
                                            class="{{$item->answer == $item->userAnswer->ans_id?'text-blue-600':'text-red-600'}}">{{$item->userAnswer->option->name?$item->userAnswer->option->name:'no ans'}}</span>
                                    </span>
                            </label>
                        </li>

                        <li>
                            <label class="flex items-center text-sm">
                                    <span class="ml-3 text-md font-medium">Correct ans:
                                        <span class="text-green-600">{{$item->option->name}}</span>
                                    </span>
                            </label>
                        </li>
                </ul>
            </div>
        @endforeach
        <center>
            <a href="{{route('admin.question.option.exam', $quiz)}}" class="btn btn-outline btn-primary btn-xs btn-block w-48">Try
                again</a>
        </center>
    </div>

</div>

