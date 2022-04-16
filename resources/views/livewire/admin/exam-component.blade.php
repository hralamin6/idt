<div class=" rounded-xl mt-4" x-data="{
     openTable: $persist(true),
      ans : @entangle('ans').defer,
      aaa : @entangle('aaa').defer,
      time : {{$item_per_page*$time_per_question}},
    itemPerPage : {{$item_per_page}},
    step : 1,
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
">
<div class="">
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
                <div :style="`width: ${percentage}%; background:hsl(${progress.toFixed(0)},100%,50%)`"
                     class="w-3/4 h-full text-center text-xs text-white rounded-full"></div>
            </div>
        </div>
    @endif
{{--        @if(!$is_single_page)--}}
            <div
                class="relative scrollbar-none after:inset-x-0 overflow-x-auto after:h-0.5 mt-2 after:absolute after:top-1/2 after:-translate-y-1/2 after:block after:rounded-lg after:bg-gray-100">
                <ol class="relative z-10 flex justify-between text-sm font-medium text-gray-500">
                    <template x-for="(stp, i) in ans">
                        <li class="flex items-center p-2">
                            <span :class="{'bg-blue-600 text-white': step==i+1}"
                                  class="w-6 h-6 text-[10px] font-bold leading-6 bg-gray-100 text-center rounded-full"
                                  x-text="i+1">1</span>
                        </li>
                    </template>
                </ol>
            </div>
{{--        @endif--}}
        <div class="py-4 flex flex-col justify-start md:w-1/2 m-auto">
            @foreach($items as $i => $item)
                <div @if(!$is_single_page) x-cloak x-show="step=={{$i+1}}"
                     @endif class=" border border-2 rounded-lg border-purple-400 p-3 my-2">
                    <legend class="text-lg font-medium my-1"><span>({{$i+1}})</span><span
                            class="text-primary">{{$item->name}}?</span></legend>
                        <ul class="grid grid-cols-2 gap-4">
                            @foreach($item->options as $j => $option)
                                <li>
                                    <label class="flex items-center text-sm">
                                        <input x-model="ans[{{$i}}]" value="{{$item->id.'-'.$option->id}}" type="radio"
                                               class="w-4 h-4 border border-gray-300 rounded-md"/>
                                        <span class="ml-3 text-md font-medium">{{$option->name}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                </div>
            @endforeach
            <div class="grid grid-cols-3 justify-between gap-2 my-6">
                @if($is_single_page)
                    <button class="btn btn-outline btn-primary col-start-2" wire:loading.class.add="loading"
                            @click="$wire.set('ans', ans), $wire.submit(), step=0">submit
                    </button>
                @else
                    <button x-cloak x-show="step>1" @click="step>1?step--:''" type="button"
                            :class="{'cursor-not-allowed':step<2}" class="btn btn-sm btn-primary justify-self-start">
                        Prev
                    </button>
                    <button x-cloak x-show="step==itemPerPage"
                            class="btn btn-sm btn-outline btn-secondary col-start-3 justify-self-end"
                            wire:loading.class.add="loading" @click="$wire.set('ans', ans), $wire.submit(), step=0">
                        submit
                    </button>
                    <button x-cloak x-show="step<itemPerPage" @click="step<itemPerPage?step++:''"
                            :class="{'cursor-not-allowed':step==itemPerPage}" type="button"
                            class="btn btn-sm btn-secondary col-start-3 justify-self-end">Next
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>

