<div class="border dark:bg-darkSidebar border-gray-500">
    @php
        $days = cal_days_in_month( 0, \Carbon\Carbon::parse($date)->format('m'), \Carbon\Carbon::parse($date)->format('Y'));

     $today = $date;
$dates = [];

for($i=1; $i < $today->daysInMonth + 1; ++$i) {
    $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
}
    @endphp
    <div class="flex justify-between pb-4 p-2">
        <div class="cursor-pointer">
            <a class="dark:text-gray-300 text-gray-500" wire:click.prevent="prevMonth">
                <x-h-o-arrow-left class="w-5"/>
            </a>
        </div>
        <span class="uppercase text-sm font-semibold dark:text-gray-300 text-gray-600">{{\Carbon\Carbon::parse($date)->format('M-Y')}}</span>
        <div class="cursor-pointer">
            <a class="dark:text-gray-300 text-gray-500" wire:click.prevent="nextMonth">
                <x-h-o-arrow-right class="w-5"/>
            </a>
        </div>
    </div>
        <div class="flex flex-col h-screen" x-data="{ hover: 0 }">
            <div class="flex-grow overflow-auto scrollbar-none">
                <table class="relative w-full border dark:border-indigo-400 capitalize text-center text-xs lg:text-sm">
                    <thead class="">
                    <tr>
                        <th class="break-words w-16 lg:w-12 h-4 text-red-900 border dark:border-indigo-400 dark:text-purple-400"><span>date</span></th>
                        @foreach($items as $i => $item)
                            <th class="px-2 break-words w-16 text-red-900 dark:text-purple-400 border dark:border-indigo-400">
                                <div @mouseenter="hover = {{$item->id}}" @mouseleave="hover = 0" class="flex m-auto">
{{--                                    <span>{{$item->name}}</span>--}}
                                    <span>{{$lang==='en'?$item->name:$item->name_bn}} {{$lang}}</span>
                                    <svg  class="w-4 m-auto h-4 ml-1 md:mt-1 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div
                                        class="absolute top-8 inline-block w-48 px-2 py-1 mb-2 -ml-12 text-white bg-purple-600 rounded-lg"
                                        x-show="hover=={{$item->id}}" x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 transform scale-90"
                                        x-transition:enter-end="opacity-100 transform scale-100"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100 transform scale-100"
                                        x-transition:leave-end="opacity-0 transform scale-90" x-cloak>
                                        <span class="inline-block text-sm leading-tight">{!! $lang==='en'?$item->description:$item->description_bn !!}</span>
                                    </div>
                                </div>

                            </th>

                        @endforeach
                        <th class="break-words w-16 text-red-900 border dark:border-indigo-400 dark:text-purple-400"><span>daily</span></th>
                    </tr>
                    </thead>
                    <tbody class="divide-y dark:divide-indigo-400">
                    @foreach($dates as $d)
                        <tr class="">
                            @php
                                $task = \App\Models\TaskCount::where(['user_id'=> auth()->id(), 'date' => $d])->first();
                                $point = \App\Models\TaskPoint::where(['user_id'=> auth()->id(), 'date' => $d])->first();
                            @endphp
                            <th class="py-1 font-semibold text-green-600 dark:text-green-300"><span>{{\Carbon\Carbon::parse($d)->format('d')}}</span></th>
                            @foreach($items as $i => $item)
                                <td class="py-1 font-medium text-gray-900 border dark:border-indigo-400"> @if($task!=null) @if(in_array($item->id, @$task->tasks))
                                        &#10004 @else &#10060 @endif @endif </td>
                            @endforeach
                            <td class="py-1 font-medium text-gray-900 border dark:text-gray-200 dark:border-indigo-400">{{@$point->point}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th class="py-1 font-semibold text-green-600 dark:text-green-300"><span>monthly</span></th>
                        @foreach($items as $i => $item)
                            <td class="py-1 font-medium text-gray-900 dark:text-red-200 border dark:border-indigo-400">{{$item->monthlyCount($item->id, \Carbon\Carbon::parse($date)->format('m-Y'))}} </td>
                        @endforeach

                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
