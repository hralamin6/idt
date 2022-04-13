<div class=" rounded-xl mt-4" x-data="{
     openTable: $persist(true), modal: false, editMode: false,
      ans : @entangle('ans').defer,
{{--      time : {{$itemPerPage*60}},--}}
    time : 150,
    progress : 0,
    now: new Date().getTime(),
    seconds: 00,
    minutes: 00,
    hours: 00,
    percentage: 00,

    format: function(value){
    if (value<10){
    return '0' + Math.floor(value);
    }else{
    return Math.floor(value);
    }
    }
   }"
     x-init="
     full_time = time;
     set_time = time*1000;
     counter = setInterval(() => {
     time--
     past_time = full_time-time;
     seconds = format(time % 60);
     percentage = past_time*100/full_time;
     progress = 100-percentage;
     minutes = format(time / 60 % 60);
     hours = format(time / 3600 % 24);
     if(time<=0){clearInterval(counter);
         $wire.set('ans', ans);
               $wire.submit()
     }  }, 1000),
         $wire.on('timeFinished', (e) => {clearInterval(counter)})
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
    <div class="text-center items-center justify-center">
        @if(!$submitted)
            <div class="mx-auto text-center">
            <span class="countdown font-mono text-2xl">
                <span :style="`--value:${hours}`"></span>:
                <span :style="`--value:${minutes}`"></span>:
                <span :class="{'text-red-600': seconds<10}" :style="`--value:${seconds}`"></span>
           </span>
            </div>
            <div class="rounded-lg w-72 shadow block m-auto">
                <div class="w-full items-center gap-2 h-4 bg-gray-400 rounded-full">
                    <div :style="`width: ${percentage}%; background:hsl(${progress.toFixed(0)},100%,50%)`" class="w-3/4 h-full text-center text-xs text-white rounded-full" ></div>
                </div>
            </div>
        @endif
        <div class="text-center items-center flex justify-center">
            @if($submitted)
                <h2>{{$true_ans}} out of {{$itemPerPage}}</h2>
            @endif
        </div>
        <form x-on:submit.prevent="$wire.set('ans', ans), $wire.submit()" class="mx-auto md:w-1/2">
            @foreach($items as $i => $item)
                <div class="flex flex-col md:flex-row gap-2 justify-between my-2" wire:key="{{$item->id}}-asdf">
                    <div>
                        <span>({{$i+1}})</span>
                        <span>What is the symbol of </span>
                        <span class="font-semibold text-lg text-green-400">{{$item->name}}?</span>
                    </div>
                    <div class="flex justify-between gap-2 capitalize px-2">
                        @if(!$submitted)
                            <input required autofocus placeholder="Enter symbol, e.g: Ca" x-model="ans[{{$i}}]" id="email{{$i}}" data-index="{{$i}}" name="email{{$i}}" type="text" class="appearance-none block px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        @else
                            <span class="{{strtolower($item->symbol)==strtolower($ans[$i])?'text-green-400':'text-red-400'}}">Your ans: {{$ans[$i]}}</span>
                            <span>Correct ans: {{$item->symbol}}</span>
                        @endif
                    </div>
                </div>
                <div class="grid grid-2 md:grid-4 justify-between">
                    {{--                    @foreach($item->options as $j => $option)--}}
                    {{--                        <label for="id-{{$option->id}}" wire:key="{{$option->id}}-fdsa">--}}
                    {{--                            <input x-model="ans[{{$i}}]"  value="{{$item->id.'-'.$option->id}}" id="id-{{$option->id}}" name="id-{{$item->id}}" type="radio">--}}
                    {{--                            <span class="{{$item->answer == $option->id?'text-blue-500':''}} {{$item->trueAnswer->ans_id == $option->id?'text-xs text-red-400':''}}">{{$option->name}} </span>--}}
                    {{--                        </label>--}}
                    {{--                    @endforeach--}}
                </div>
            @endforeach
            <button hidden type="submit" class="text-center mx-auto text-blue-500">submit</button>
        </form>
        @if(!$submitted)
            <button class="btn btn-outline btn-primary btn-xs btn-block w-48" wire:loading.class.add="loading" @click="$wire.set('ans', ans), $wire.submit()">submit</button>
        @endif
    </div>

    <div x-cloak x-show="modal">
        <div class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <div  class="inset-0 py-4 rounded-2xl transition duration-150 ease-in-out z-50 absolute" id="modal">
            <div @click.outside="modal= false, editMode = false" class="container mx-auto w-11/12 md:w-2/3 max-w-lg ">
                <form @submit.prevent="editMode? $wire.editData(): $wire.saveData()" class="relative py-3 px-5 md:px-10 bg-white dark:bg-darkSidebar shadow-md rounded border border-gray-400 dark:border-gray-600 capitalize">
                    <h1 x-cloak x-show="!editMode" class="text-gray-800 dark:text-gray-200 font-lg font-bold tracking-normal text-center leading-tight mb-4">@lang('add new data')</h1>
                    <h1 x-cloak x-show="editMode" class="text-gray-800 dark:text-gray-200 font-lg font-bold tracking-normal text-center leading-tight mb-4">@lang('edit this data')</h1>

                    <label for="name" class="text-gray-800 dark:text-gray-200 text-sm font-bold leading-tight tracking-normal">@lang('name')</label>
                    <input wire:model.lazy="name" class="mb-1 mt-2 text-gray-600 dark:text-gray-300 focus:outline-none focus:border focus:border-indigo-700 font-normal dark:bg-darkBg w-full h-10 flex items-center pl-3 text-sm border-gray-300 dark:border-gray-600 rounded border"/>
                    @error('name')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    <div class="flex items-center justify-between w-full mt-4">
                        <button type="button" @click="modal= false, editMode = false" class="bg-red-600 focus:ring-gray-400 transition duration-150 text-white ease-in-out hover:bg-red-300 rounded px-8 py-2 text-sm">Cancel</button>
                        <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

