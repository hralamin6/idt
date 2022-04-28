<div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
        <div class=" flex gap-3 bg-white border dark:border-gray-600 dark:bg-darkSidebar px-4 py-2 rounded-md">
            <div class="flex flex-row gap-2 text-sm text-gray-500 font-semibold dark:text-gray-200">
                <p class="">@lang('total point:')</p>
                <p class="">{{auth()->user()->point()}}</p>
            </div>
        </div>
        <div class=" flex gap-3 bg-white border dark:border-gray-600 dark:bg-darkSidebar px-4 py-2 rounded-md">
            <div class="flex flex-row gap-2 text-sm text-gray-500 font-semibold dark:text-gray-200">
                <p class="">@lang('average point:')</p>
                <p class="">{{auth()->user()->avgpoint()}}</p>
            </div>
        </div>
        <div class=" flex gap-3 bg-white border dark:border-gray-600 dark:bg-darkSidebar px-4 py-2 rounded-md">
            <div class="flex flex-row gap-2 text-sm text-gray-500 font-semibold dark:text-gray-200">
                <p class="">@lang('max point a day:')</p>
                <p class="">{{auth()->user()->maxpoint()}}</p>
            </div>
        </div>
        <div class=" flex gap-3 bg-white border dark:border-gray-600 dark:bg-darkSidebar px-4 py-2 rounded-md">
            <div class="flex flex-row gap-2 text-sm text-gray-500 font-semibold dark:text-gray-200">
                <p class="">@lang('min point a day:')</p>
                <p class="">{{auth()->user()->minpoint()}}</p>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-center m-2">
        <span class="text-purple-500 dark:text-white capitalize">@lang('points according to tasks')</span>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
        @foreach($items as $i => $item)
        <div class=" flex gap-3 bg-white border dark:border-gray-600 dark:bg-darkSidebar px-4 py-2 rounded-md">
            <a href="{{route('taskwise', $item->id)}}" class="flex flex justify-between gap-2 text-sm text-gray-500 font-semibold dark:text-gray-200">
                <p class="">{{$lang==='en'?$item->name:$item->name_bn}}</p>
                <p class="justify-end">{{$item->count($item->id)*5}}</p>
            </a>
        </div>
        @endforeach

    </div>
</div>
