<div>
    {{-- Stop trying to control. --}}
</div>


<div>
    <label for="range_start" class="text-gray-800 dark:text-gray-200 text-sm font-bold leading-tight tracking-normal">@lang('range start')</label>
    <input wire:model.lazy="state.range_start" class="input input-bordered input-info w-full input-sm max-w-xs"/>
    @error('range_start')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
</div>
<div>
    <label for="range_end" class="text-gray-800 dark:text-gray-200 text-sm font-bold leading-tight tracking-normal">@lang('range end')</label>
    <input wire:model.lazy="state.range_end" class="input input-bordered input-info w-full input-sm max-w-xs"/>
    @error('range_end')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
</div>
<div>
    <label for="hadith_number" class="text-gray-800 dark:text-gray-200 text-sm font-bold leading-tight tracking-normal">@lang('hadith number')</label>
    <input wire:model.lazy="state.hadith_number" class="input input-bordered input-info w-full input-sm max-w-xs"/>
    @error('hadith_number')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
</div>
