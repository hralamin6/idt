<div class="container mx-auto grid" x-data="{rows: @entangle('selectedRows').defer, selectPage: @entangle('selectPageRows')}">
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <div class="w-24">
{{--                <div class="mt-1 rounded-md shadow-sm">--}}
{{--                    <input placeholder="per page" wire:model.debounce="search" id="search" name="search" type="search" required autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('search') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />--}}
{{--                </div>--}}
                <div class="mt-1 rounded-md shadow-sm">
                    <input placeholder="per page" wire:model.debounce.1000ms="itemPerPage" id="itemPerPage" name="itemPerPage" type="search" required autofocus class="appearance-none h-4 block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('itemPerPage') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                </div>

                @error('itemPerPage')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                    <th class="px-4 py-3">
                        <input class="ring-0 dark:bg-gray-400" x-model="selectPage" type="checkbox" value="1">
                    </th>
                    <th wire:click.prevent="orderByDirection('id')" class="px-4 py-3"> Sl <span class="text-xs text-purple-400">{{$orderBy=='id'?'('.$orderDirection.')':''}}</span></th>
                    <th wire:click.prevent="orderByDirection('number')" class="px-4 py-3"> Number <span class="text-xs text-purple-400">{{$orderBy=='number'?'('.$orderDirection.')':''}}</span></th>
                    <th wire:click.prevent="orderByDirection('symbol')" class="px-4 py-3"> Symbol <span class="text-xs text-purple-400">{{$orderBy=='symbol'?'('.$orderDirection.')':''}}</span></th>
                    <th wire:click.prevent="orderByDirection('name')" class="px-4 py-3"> Name <span class="text-xs text-purple-400">{{$orderBy=='name'?'('.$orderDirection.')':''}}</span></th>
                    <th wire:click.prevent="orderByDirection('atomic_mass')" class="px-4 py-3"> Mass <span class="text-xs text-purple-400">{{$orderBy=='atomic_mass'?'('.$orderDirection.')':''}}</span></th>
                </tr>
                </thead>
                <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                >
                @foreach($atoms as $i => $atom)

                    <tr id="atom-id-{{$atom->id}}" class="text-gray-700 dark:text-gray-300 capitalize" :class="{'bg-gray-200 dark:bg-gray-600': rows.includes('{{$atom->id}}') }">
                        <td class="px-4 py-3">
                            <input x-model="rows" class="ring-none dark:bg-gray-400" type="checkbox" value="{{ $atom->id }}" name="todo2" id="{{ $atom->id }}">
                        </td>
                        <td class="px-4 py-3">{{$atoms->firstItem() + $i}}</td>
                        <td class="px-4 py-3 text-sm">{{$atom->number}}</td>
                        <td class="px-4 py-3 text-sm">{{$atom->symbol}}</td>
                        <td class="px-4 py-3 text-sm {{$atom->gettype()}} ">{{$atom->name}}</td>
                        <td class="px-4 py-3 text-sm">{{$atom->atomic_mass}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="items-center text-center mx-auto my-8">
            {{ $atoms->links() }}
        </div>
    </div>
</div>
