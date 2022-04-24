<div>
    @php
        $days = cal_days_in_month( 0, \Carbon\Carbon::parse($date)->format('m'), \Carbon\Carbon::parse($date)->format('Y'));

     $today = $date;
$dates = [];

for($i=1; $i < $today->daysInMonth + 1; ++$i) {
    $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
}
    @endphp
    <div class="flex flex-row justify-between gap-4 p-4 my-3">
        <a wire:click.prevent="prevDate" class="btn btn-outline btn-primary btn-xs cursor-pointer">Prev</a>
        <h1>{{\Carbon\Carbon::parse($date)->format('d-m-Y')}}</h1>
        <a wire:click.prevent="nextDate" class="btn btn-outline btn-primary btn-xs cursor-pointer">Next</a>
    </div>
    <div>
        <div class="flex flex-col h-screen">
            <div class="flex-grow overflow-auto scrollbar-none">
                <table class="relative w-full border capitalize text-center text-xs lg:text-sm">
                    <thead class="">
                    <tr>
                        <th class="sticky break-words w-16 lg:w-12 h-4 top-0 text-red-900 "> <span class="bg-white">date</span> </th>
                        @foreach($items as $i => $item)
                            <th class="px-2 break-words sticky w-16 top-0 text-red-900 "> <span class="bg-white">{{$item->name}}</span>  </th>
                        @endforeach
                        <th class="sticky break-words w-16 top-0 text-red-900 "> <span class="bg-white">daily</span> </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y">
                    @foreach($dates as $d)
                        <tr>
                            @php
                                $task = \App\Models\TaskCount::where(['user_id'=> auth()->id(), 'date' => $d])->first();
                                $point = \App\Models\TaskPoint::where(['user_id'=> auth()->id(), 'date' => $d])->first();
                            @endphp
                            <th  class="py-1 sticky left-0 font-semibold text-purple-600"><span class="bg-white">{{\Carbon\Carbon::parse($d)->format('d')}}</span></th>
                            @foreach($items as $i => $item)
                                <td class="py-1 font-medium text-gray-900"> @if($task!=null) @if(in_array($item->id, @$task->tasks)) &#10004 @else &#10060 @endif @endif </td>
                            @endforeach
                            <td class="py-1 font-medium text-gray-900">{{@$point->point}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th  class="py-1 sticky left-0 font-semibold text-purple-600"><span class="bg-white">monthly</span> </th>
                        @foreach($items as $i => $item)
                            <td class="py-1 font-medium text-gray-900">{{$item->monthlyCount($item->id, \Carbon\Carbon::parse($date)->format('m-Y'))}} </td>
                        @endforeach

                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
