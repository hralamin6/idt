
<div class="container mx-auto grid">
    <x-dialog-modal wire:model="showModal">
        <x-slot name="content">
            <div class="bg-white max-w-2xl shadow overflow-hidden sm:rounded-lg">
                <div class="px-1 py-1 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        User database
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Details and informations about user.
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->name}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">appearance</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->appearance}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">atomic_mass</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->atomic_mass}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">boil</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->boil}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">category</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->category}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">density</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->density}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">discovered_by</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->discovered_by}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">melt</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->melt}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">molar_heat</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->molar_heat}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">named_by</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->named_by}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">number</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->number}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">period</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->period}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">phase</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->phase}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">source</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->source}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">summary</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->summary}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">symbol</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->symbol}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">xpos</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->xpos}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">ypos</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->ypos}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">shells</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->shells}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">electron_configuration</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->electron_configuration}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">electron_configuration_semantic</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{@$atom->electron_configuration_semantic}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">electron_affinity</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->electron_affinity}}</dd>
                        </div>
                        <div class="bg-gray-50 px-2 py-1 flex gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">electronegativity_pauling</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{@$atom->electronegativity_pauling}}</dd>
                        </div>
                    </dl>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-m-button wire:click="$set('showModal', false)" class="bg-gray-600 hover:bg-gray-800 text-white">Cancel</x-m-button>
                <x-m-button wire:click="createTag">Create</x-m-button>
        </x-slot>
    </x-dialog-modal>

{{--    <form wire:submit.prevent="import">--}}
{{--            @csrf--}}
{{--            <div--}}

{{--                x-data="{ isUploading: false, progress: 0 }"--}}

{{--                x-on:livewire-upload-start="isUploading = true"--}}

{{--                x-on:livewire-upload-finish="isUploading = false"--}}

{{--                x-on:livewire-upload-error="isUploading = false"--}}

{{--                x-on:livewire-upload-progress="progress = $event.detail.progress"--}}

{{--            >--}}
{{--            <input type="file" wire:model="photo">--}}
{{--                @error('photo') <span class="error">{{ $message }}</span> @enderror--}}
{{--        </form>--}}
{{--    <button type="submit" class="btn btn-primary">Import Users</button>--}}
{{--    <div wire:loading wire:target="photo, import">Uploading...</div>--}}
{{--    <div x-show="isUploading">--}}
{{--        <progress max="100" x-bind:value="progress"></progress>--}}
{{--    </div>--}}

    <div class="lg:m-2 m-1 w-max overflow-visible sm:w-full">
        <div class="text-2x grid grid-cols-18 gap-0.5 lg:gap-1">
            @foreach($atoms as $atom)
                @if($atom->number<58 || $atom->number>71 && $atom->number<90 || $atom->number>103)
                    <div wire:click="showModal({{ $atom->id }})" class="cursor-pointer  hover:w-6 hover:h-6 hover:md:w-8 hover:md:h-8 hover:lg:w-12 hover:lg:h-12 w-8 h-8 md:w-10 md:h-10 lg:w-16 lg:h-16 rounded-md border border-1
                    {{ $atom->number==1? 'col-span-17':''}}
                    {{in_array($atom->number, array(4, 12))? 'col-span-11':''}}
                    {{ $atom->number==57? 'border-indigo-600 text-indigo-300':''}}
                    {{ $atom->number==89? 'border-purple-600 text-purple-300':''}}
                    {{ $atom->category=='alkaline earth metal'? 'border-green-600 text-green-200':''}}
                    {{ $atom->category=='diatomic nonmetal'? 'border-green-600 text-green-200':''}}
                    {{ $atom->category=='alkali metal'? 'border-yellow-600 text-yellow-300':''}}
                    {{ $atom->category=='noble gas'? 'border-orange-600 text-orange-300':''}}
                    {{ $atom->category=='metalloid'? 'border-blue-600 text-blue-300':''}}
                    {{ $atom->category=='polyatomic nonmetal'? 'border-red-600 text-red-300':''}}
                    {{ $atom->category=='post-transition metal'? 'border-yellow-500 text-yellow-200':''}}
                    {{ $atom->category=='transition metal'? 'border-pink-600 text-pink-300':''}}
                    {{ in_array($atom->number, array(109,110,111,113,115,116,117,118))? ' border-gray-600 text-gray-300':''}}
                         bg-black text-xs flex flex-col justify-center text-center p-0.5 lg:p-1 overflow-hidden">
                        <div>
                            <span class="lg:font-semibold lg:text-xs text-[7px] justify-start float-left">{{$atom->number}}</span>
                            <span class="font-bold lg:text-lg text-[9px]">{{$atom->symbol}}</span>
                        </div>
                        <span class="lg:font-semibold lg:text-xs text-[7px] hidden lg:block">{{$atom->name}}</span>
                        <span class="lg:font-semibold lg:text-xs text-[7px]">{{ number_format($atom->atomic_mass, 2) }}</span>
                    </div>
                @endif
             @endforeach
        </div>
        <div class="text-2x grid grid-cols-18 gap-0.5 lg:gap-1 my-0.5 lg:my-1">
            @foreach($atoms as $atom)
                @if($atom->number>57 && $atom->number<72)
                    <div wire:click="showModal({{ $atom->id }})" class="cursor-pointer  hover:w-6 hover:h-6 hover:md:w-8 hover:md:h-8 hover:lg:w-12 hover:lg:h-12 w-8 h-8 md:w-10 md:h-10 lg:w-16 lg:h-16 rounded-md border border-1 border-indigo-600 text-indigo-300
                                {{ $atom->number==58? 'col-start-3 ':''}}
                        bg-black text-white text-xs flex flex-col justify-center text-center p-0.5 lg:p-1 overflow-hidden">
                        <div>
                            <span class="lg:font-semibold lg:text-xs text-[7px] justify-start float-left">{{$atom->number}}</span>
                            <span class="font-bold lg:text-lg text-[9px]">{{$atom->symbol}}</span>
                        </div>
                        <span class="lg:font-semibold lg:text-xs text-[7px] hidden lg:block">{{$atom->name}}</span>
                        <span class="lg:font-semibold lg:text-xs text-[7px]">{{ number_format($atom->atomic_mass, 2) }}</span>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="text-2x grid grid-cols-18 gap-0.5 lg:gap-1">
            @foreach($atoms as $atom)
                @if($atom->number>89 && $atom->number<104)
                    <div wire:click="showModal({{ $atom->id }})" class="cursor-pointer  hover:w-6 hover:h-6 hover:md:w-8 hover:md:h-8 hover:lg:w-12 hover:lg:h-12 w-8 h-8 md:w-10 md:h-10 lg:w-16 lg:h-16 rounded-md border border-1 border-purple-600 text-purple-300
                                                    {{ $atom->number==90? 'col-start-3 ':''}}
                        bg-black text-white text-xs flex flex-col justify-center text-center p-0.5 lg:p-1 overflow-hidden">
                        <div>
                            <span class="lg:font-semibold lg:text-xs text-[6px] justify-start float-left">{{$atom->number}}</span>
                            <span class="font-bold lg:text-lg text-[9px]">{{$atom->symbol}}</span>
                        </div>
                        <span class="lg:font-semibold lg:text-xs text-[7px] hidden lg:block">{{$atom->name}}</span>
                        <span class="lg:font-semibold lg:text-xs text-[7px]">{{ number_format($atom->atomic_mass, 2) }}</span>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

</div>
