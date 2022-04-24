<div class="container mx-auto grid" x-data="{rows: @entangle('selectedRows').defer, selectPage: @entangle('selectPageRows')}">
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto text-[12px] md:text-sm">
            <div class="w-24 flex justify-between gap-2">

                <div class="mt-1 rounded-md shadow-sm">
                    <input placeholder="per page" wire:model.debounce.1000ms="itemPerPage" type="number"  class="focus:ring-indigo-500 border-l border-b border-t border-gray-300 py-2 px-4 focus:border-indigo-500 block pl-7 pr-12 sm:text-sm text-gray-500 rounded-md @error('itemPerPage') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                </div>

                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input  placeholder="search" wire:model.debounce="search"  class="focus:ring-indigo-500 border-l border-b border-t border-gray-300 h-10 py-2 px-4 focus:border-indigo-500 block pl-7 pr-12 text-gray-500 rounded-md"/>
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <select wire:model="searchBy" class="focus:ring-indigo-500 py-2 px-3  border-gray-300 focus:border-indigo-500 w-24 pl-2 pr-7 h-10 bg-transparent text-gray-500 rounded-r-md">
                                <option value="id">id</option>
                                <option value="number">number</option>
                                <option value="symbol">symbol</option>
                                <option value="name">name</option>
                                <option value="xpos">xpos</option>
                                <option value="ypos">ypos</option>
                                <option value="phase">phase</option>
                                <option value="category">category</option>
                                <option value="atomic_mass">atomic_mass</option>
                            </select>
                        </div>
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
{{--                    <x-field :OB="$orderBy" :OD="$orderDirection" :field="'id'"> Sl </x-field>--}}
                    <x-field :OB="$orderBy" :OD="$orderDirection" :field="'number'"> number </x-field>
                    <x-field :OB="$orderBy" :OD="$orderDirection" :field="'symbol'"> symbol </x-field>
                    <x-field :OB="$orderBy" :OD="$orderDirection" :field="'name'"> name </x-field>
                    <x-field :OB="$orderBy" :OD="$orderDirection" :field="'xpos'"> group </x-field>
                    <x-field :OB="$orderBy" :OD="$orderDirection" :field="'ypos'"> period </x-field>
                    <x-field :OB="$orderBy" :OD="$orderDirection" :field="'phase'"> phase </x-field>
                    <x-field :OB="$orderBy" :OD="$orderDirection" :field="'category'"> category </x-field>
                    <x-field :OB="$orderBy" :OD="$orderDirection" :field="'atomic_mass'"> mass </x-field>
                    <x-field :OB="$orderBy" :OD="$orderDirection" :field="'atomic_mass'"> cpk_hex </x-field>
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
{{--                        <td class="px-4 py-3">{{$atoms->firstItem() + $i}}</td>--}}
                        <td class="p-2">{{$atom->number}}</td>
                        <td class="p-2">{{$atom->symbol}}</td>
                        <td class="p-2 {{$atom->gettype()}} ">{{$atom->name}}</td>
                        <td class="p-2">{{$atom->xpos}}</td>
                        <td class="p-2">{{$atom->ypos}}</td>
                        <td class="p-2">{{$atom->phase}}</td>
                        <td class="p-2 {{$atom->gettype()}} ">{{$atom->category}}</td>
                        <td class="p-2">{{number_format($atom->atomic_mass, 2)}}</td>
                        <td class="p-2">{{$atom->cpk_hex}}</td>
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
