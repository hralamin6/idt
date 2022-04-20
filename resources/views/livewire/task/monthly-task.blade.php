<div>
    <div>
        @php
            $days = cal_days_in_month( 0, \Carbon\Carbon::parse($date)->format('m'), \Carbon\Carbon::parse($date)->format('Y'));

         $today = today();
    $dates = [];

    for($i=1; $i < $today->daysInMonth + 1; ++$i) {
        $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
    }
        @endphp
    </div>
    <div class="overflow-x-auto">
        <table class="table capitalize text-center" style="margin: 0!important; padding: 0!important;">
            <tr class="">
                <th>date</th>
            @foreach($items as $i => $item)
                    <th style="word-wrap: break-word; overflow: hidden; max-width: 95px">{{$item->name}} asd fasdf asdfasdf</th>
                @endforeach
                <th>date</th>
            </tr>
            @foreach($dates as $date)
                <tr>
                    @php
                        $tasks = \App\Models\TaskCount::where(['user_id'=> auth()->id(), 'date' => $date])->get();
                    @endphp
                <th>{{\Carbon\Carbon::parse($date)->format('d')}}</th>
                    @forelse($tasks as  $task)
                        <td> @if($task->value) &#10004 @else &#10060 @endif </td>
                    @empty
                        @foreach($items as  $item)
                            <td> &#10060 </td>
                        @endforeach
                    @endforelse
                    <td>{{$tasks->sum('value')}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
