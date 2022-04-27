<div x-data="{
      ans : @entangle('ans').defer,
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
   }">
    @php
        $days = cal_days_in_month( 0, \Carbon\Carbon::parse($date)->format('m'), \Carbon\Carbon::parse($date)->format('Y'));

     $today = $date;
$dates = [];

for($i=1; $i < $today->daysInMonth + 1; ++$i) {
    $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
}
    @endphp
    <div class='w-full lg:w-1/2 max-w-lg mx-auto bg-white rounded-2xl shadow-xl flex flex-col mt-3 p-3 dark:text-gray-300 dark:bg-darkSidebar'>
        <div class="flex justify-between pb-4">
            <div class="cursor-pointer">
                <a class="text-gray-500 dark:text-gray-300" wire:click.prevent="prevMonth">
                    <x-h-o-arrow-left class="w-5"/>
                </a>
            </div>
            <span
                class="uppercase text-sm font-semibold text-gray-600 dark:text-gray-300">{{\Carbon\Carbon::parse($date)->format('M-Y')}}</span>
            <div class="cursor-pointer">
                <a class="text-gray-500 dark:text-gray-300" wire:click.prevent="nextMonth">
                    <x-h-o-arrow-right class="w-5"/>
                </a>
            </div>
        </div>
        <div class="flex justify-between font-medium uppercase text-xs pt-4 pb-2 border-t dark:border-gray-500">
            <span
                class="px-1 lg:px-3 border rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">sat</span>
            <span
                class="px-1 lg:px-3 border rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">sun</span>
            <span
                class="px-1 lg:px-3 border rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">mon</span>
            <span
                class="px-1 lg:px-3 border rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">tue</span>
            <span
                class="px-1 lg:px-3 border rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">wed</span>
            <span
                class="px-1 lg:px-3 border rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">thu</span>
            <span
                class="px-1 lg:px-3 border  rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">fri</span>
        </div>

        <div class="grid grid-cols-7 justify-between font-medium text-sm pb-2 ">

            @foreach($dates as $d)
                @php
                    if(\Carbon\Carbon::parse($d)->format('d')==01){
                    if(\Carbon\Carbon::parse($d)->format('D')==='Sun'){
                        $col_span = 'col-start-2';
                    }elseif (\Carbon\Carbon::parse($d)->format('D')==='Mon'){
                        $col_span = 'col-start-3';
                    }elseif (\Carbon\Carbon::parse($d)->format('D')==='Tue'){
                        $col_span = 'col-start-4';
                    }elseif (\Carbon\Carbon::parse($d)->format('D')==='Wed'){
                        $col_span = 'col-start-5';
                    }elseif (\Carbon\Carbon::parse($d)->format('D')==='Thu'){
                        $col_span = 'col-start-6';
                    }elseif (\Carbon\Carbon::parse($d)->format('D')==='Fri'){
                        $col_span = 'col-start-7';
                    }else{
                        $col_span = 'col-start-1';
                    }
}
                @endphp
                <span wire:click.prevent="dateChange({{\Carbon\Carbon::parse($d)->format('d')}})"
                      class="lg:w-14 w-12 @if(\Carbon\Carbon::parse($d)->format('d')==01) {{$col_span}} @endif @if(\Carbon\Carbon::parse($d)->format('d')==\Carbon\Carbon::parse($date)->format('d')) text-white bg-green-500 rounded-2xl @endif
                          flex justify-center items-center border dark:border-purple-400 hover:border-green-500 hover:text-green-500 cursor-pointer">
                    {{\Carbon\Carbon::parse($d)->format('d')}}
                </span>
            @endforeach
        </div>

    </div>
    <div class="items-center lg:w-1/2 m-auto">
        <div class="flex justify-between gap-4 p-4">
            <div class="cursor-pointer">
                <a class="text-gray-500 dark:text-gray-300" wire:click.prevent="prevDate">
                    <x-h-o-arrow-left class="w-5"/>
                </a>
            </div>
            <div class="block rounded-t overflow-hidden bg-white dark:bg-darkSidebar text-center w-24">
                <div class="bg-red-500 text-white py-1">
                    Feb
                </div>
                <div class="pt-1 border-l border-r">
                    <span class="text-xl dark:text-white font-bold">{{\Carbon\Carbon::parse($date)->format('d')}}</span>
                </div>
                <div class="pb-2 px-2 border-l border-r border-b rounded-b flex justify-between">
                    <span class="text-xs dark:text-gray-300 font-bold">{{\Carbon\Carbon::parse($date)->format('D')}}</span>
                    <span class="text-xs dark:text-gray-300 font-bold">{{\Carbon\Carbon::parse($date)->format('Y')}}</span>
                </div>
            </div>
            <div class="cursor-pointer">
                <a class="text-gray-500 dark:text-gray-300" wire:click.prevent="nextDate">
                    <x-h-o-arrow-right class="w-5"/>
                </a>
            </div>
        </div>
            @foreach($items as $i => $item)
                    <div class="w-full px-6 mx-auto mt-5 bg-white dark:bg-darkSidebar rounded-md  border border-gray-200 dark:border-purple-500  sm:px-8 md:px-12 sm:py-4 py-2 sm:rounded-lg sm:shadow">
                          <label class="label cursor-pointer justify-end my-auto flex justify-between">
                               <h3  class="text-lg font-bold sm:text-xl md:text-2xl align-middle" :class="ans[{{$i}}]!=null?'text-green-500 line-through': 'text-pink-500 text' ">{{$lang==='en'?$item->name:$item->name_bn}}</h3>
                               <input id="{{$item->id}}"
                                      @click="if(ans[{{$i}}]==null){ans[{{$i}}]=$el.value}else{ans[{{$i}}]=null};console.log($el.value)"
                                      x-ref="text" name="{{$item->name}}" @if($ans[$i]==$item->id) checked
                                      @endif value="{{$item->id}}" type="checkbox" class="checkbox checkbox-primary dark:bg-gray-400">
                           </label>
                        <p class="text-gray-600 md:text-lg lg:text-base text-sm w-10/12 dark:text-gray-300">{{$lang==='en'?$item->description:$item->description_bn}}</p>
                    </div>
            @endforeach
        <center>
            <a wire:click.prevent="submit"
               class="btn my-4 btn-outline btn-primary btn-xs cursor-pointer capitalize">@lang('save')</a>
        </center>
    </div>
</div>
