<div class=" rounded-xl mt-4" x-data="{
     openTable: $persist(true), modal: false, editMode: false,
      ans : @entangle('ans').defer,
      time : {{$itemPerPage*60}},
    itemPerPage : {{$itemPerPage}},
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
    <div class="text-center items-center flex justify-center">
        @if($submitted)
            <h2>{{$true_ans}} out of {{$itemPerPage}}</h2>
        @endif
    </div>

    @if(!$submitted)
            <div class="relative scrollbar-none after:inset-x-0 overflow-x-auto after:h-0.5 mt-2 after:absolute after:top-1/2 after:-translate-y-1/2 after:block after:rounded-lg after:bg-gray-100">
                <ol class="relative z-10 flex justify-between text-sm font-medium text-gray-500">
                    <template x-for="(stp, i) in ans">
                        <li class="flex items-center p-2">
                            <span :class="{'bg-blue-600 text-white': step==i+1}" class="w-6 h-6 text-[10px] font-bold leading-6 bg-gray-100 text-center rounded-full" x-text="i+1">1</span>
                        </li>
                    </template>
                </ol>
            </div>

        <div class="py-4 flex flex-col justify-start md:w-1/2 m-auto">
            @foreach($items as $i => $item)
                <div x-show="step=={{$i+1}}" class="border border-2 rounded-lg border-purple-400 p-3 my-2">
                    <legend class="text-lg font-medium my-1"><span>({{$i+1}})</span> What is the symbol of <span
                            class="text-info">{{$item->name}}?</span></legend>
                    <ul class="grid grid-cols-2 gap-4">
                        @foreach($item->options($item)->shuffle() as $j => $option)
                            <li>
                                <label class="flex items-center text-sm">
                                    <input x-model="ans[{{$i}}]" value="{{$option->symbol}}" type="radio"
                                           class="w-4 h-4 border border-gray-300 rounded-md"/>
                                    <span class="ml-3 text-md font-medium">{{$option->symbol}}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
            <div class="flex justify-between grid-cols-2 gap-2">
                <button x-show="step>0" @click="step>1?step--:''" type="button" :class="{'cursor-not-allowed':step<2}" class="btn btn-sm btn-primary justify-self-start">Prev</button>
                <button x-show="step==itemPerPage" class="btn btn-sm btn-accent" wire:loading.class.add="loading" @click="$wire.set('ans', ans), $wire.submit(), step=0">submit</button>
                <button x-show="step<=itemPerPage" @click="step<itemPerPage?step++:''" :class="{'cursor-not-allowed':step==itemPerPage}" type="button" class="btn btn-sm btn-secondary">Next</button>
            </div>
        </div>
    @else
        <div class="py-8 flex flex-col justify-start md:w-1/2 m-auto">
            @foreach($items as $i => $item)
                <div class="border border-2 rounded-lg border-purple-400 p-3 my-2 {{$ans[$i]==$item->symbol?'bg-green-200':'bg-red-200'}} ">
                    <legend class="text-lg font-medium my-1"><span>({{$i+1}})</span> What is the symbol of <span
                            class="text-info">{{$item->name}}?</span></legend>
                    <ul class="grid grid-cols-2 gap-4">
                        @foreach($item->options($item)->shuffle() as $j => $option)
                            <li>
                                <label class="flex items-center text-sm {{$option->symbol==$item->symbol?'text-success':''}} ">
                                    <input disabled x-model="ans[{{$i}}]" value="{{$option->symbol}}" type="radio"
                                           class="w-4 h-4 border border-gray-300 rounded-md"/>
                                    <span class="ml-3 text-md font-medium">{{$option->symbol}}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
            <center>
                <a href="{{route('quiz.name.symbol')}}" class="btn btn-outline btn-primary btn-xs btn-block w-48">Try again</a>
            </center>
        </div>
    @endif
</div>

