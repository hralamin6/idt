
<div class="container mx-auto grid">
        <form wire:submit.prevent="import">
            @csrf
            <div

                x-data="{ isUploading: false, progress: 0 }"

                x-on:livewire-upload-start="isUploading = true"

                x-on:livewire-upload-finish="isUploading = false"

                x-on:livewire-upload-error="isUploading = false"

                x-on:livewire-upload-progress="progress = $event.detail.progress"

            >
            <input type="file" wire:model="photo">
                @error('photo') <span class="error">{{ $message }}</span> @enderror
        </form>
    <button type="submit" class="btn btn-primary">Import Users</button>
    <div wire:loading wire:target="photo, import">Uploading...</div>
    <div x-show="isUploading">
        <progress max="100" x-bind:value="progress"></progress>
    </div>

    <div class="container m-2 w-max overflow-visible sm:w-full">
        <div class="text-2x grid grid-cols-18 gap-1">
            @foreach($atoms as $atom)
                @if($atom->number<58 || $atom->number>71 && $atom->number<90 || $atom->number>103)
                    <div class="w-16 w-16 rounded-md border border-2  hover:w-24 hover:h-24 hover:shadow-2xl
{{--           {{ $atom->number==1? 'col-span-17 border-green-600 text-green-200':''}}--}}
           {{ $atom->number==1? 'col-span-17':''}}
            {{ $atom->number==57? 'border-indigo-600 text-indigo-300':''}}
            {{ $atom->number==89? 'border-purple-600 text-purple-300':''}}
{{--            {{ in_array($atom->number, array(10-1, 18-1, 36-1, 54-1, 86-1, 118-1))? ' border-green-600 text-green-200':''}}--}}
{{--            {{ in_array($atom->number, array(2, 10, 18, 36, 54, 86, 118))? ' border-blue-600 text-blue-300':''}}--}}
{{--            {{ in_array($atom->number, array(13, 31, 49, 50, 81, 82, 83, 113, 114, 115, 116))? ' border-yellow-600 text-yellow-300':''}}--}}
{{--            {{ in_array($atom->number, array(2+1, 10+1, 18+1, 36+1, 54+1, 86+1))? ' border-yellow-600 text-yellow-300':''}}--}}
{{--            {{ in_array($atom->number, array(2+2, 10+2, 18+2, 36+2, 54+2, 86+2))? ' border-indigo-600 text-indigo-300':''}}--}}

                    {{ $atom->category=='alkaline earth metal'? 'border-green-600 text-green-200':''}}
                    {{ $atom->category=='diatomic nonmetal'? 'border-green-600 text-green-200':''}}
                    {{ $atom->category=='alkali metal'? 'border-yellow-600 text-yellow-300':''}}
                    {{ $atom->category=='noble gas'? 'border-orange-600 text-orange-300':''}}
                    {{ $atom->category=='metalloid'? 'border-blue-600 text-blue-300':''}}
                    {{ $atom->category=='polyatomic nonmetal'? 'border-red-600 text-red-300':''}}
                    {{ $atom->category=='post-transition metal'? 'border-yellow-500 text-yellow-200':''}}
                    {{ $atom->category=='transition metal'? 'border-pink-600 text-pink-300':''}}
{{--                    {{ $atom->category=='lanthanide'? 'border-purple-600 text-purple-300':''}}--}}
{{--                    {{ $atom->category=='actinide'? 'border-indigo-600 text-indigo-300':''}}--}}
                    {{ in_array($atom->number, array(109,110,111,113,115,116,117,118))? ' border-gray-600 text-gray-300':''}}
                    {{in_array($atom->number, array(4, 12))? 'col-span-11':''}}
                         bg-black text-xs flex flex-col justify-center text-center p-1 overflow-hidden">
                        <div>
                            <span class="font-semibold justify-start float-left">{{$atom->number}}</span>
                            <span class="font-bold text-lg uppercase">{{$atom->symbol}}</span>
                        </div>
                        <span class="font-semibold capitalize">{{$atom->name}}</span>
                        <span class="font-semibold">{{ number_format($atom->atomic_mass, 2) }}</span>
                    </div>
                @endif
             @endforeach
        </div>
        <div class="text-2x grid grid-cols-18 gap-1 my-1">
            @foreach($atoms as $atom)
                @if($atom->number>57 && $atom->number<72)
                    <div class="w-16 w-16 rounded-md border border-2 border-indigo-600 text-indigo-300
                                {{ $atom->number==58? 'col-start-3 ':''}}
                        bg-black text-white text-xs flex flex-col justify-center text-center p-1">
                        <div>
                            <span class="font-semibold justify-start float-left">{{$atom->number}}</span>
                            <span class="font-bold text-lg uppercase">{{$atom->symbol}}</span>
                        </div>
                        <span class="font-semibold capitalize">{{$atom->name}}</span>
                        <span class="font-semibold">{{ number_format($atom->atomic_mass, 2) }}</span>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="text-2x grid grid-cols-18 gap-1">
            @foreach($atoms as $atom)
                @if($atom->number>89 && $atom->number<104)
                    <div class="w-16 w-16 rounded-md border border-2 border-purple-600 text-purple-300
                                                    {{ $atom->number==90? 'col-start-3 ':''}}
                        bg-black text-white text-xs flex flex-col justify-center text-center p-1">
                        <div>
                            <span class="font-semibold justify-start float-left">{{$atom->number}}</span>
                            <span class="font-bold text-lg uppercase">{{$atom->symbol}}</span>
                        </div>
                        <span class="font-semibold capitalize">{{$atom->name}}</span>
                        <span class="font-semibold">{{ number_format($atom->atomic_mass, 2) }}</span>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

</div>
