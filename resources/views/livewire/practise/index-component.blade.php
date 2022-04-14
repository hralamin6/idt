<div>
    <div class="m-2 md:w-1/2">
        <div class="grid grid-cols-2  justify-between gap-2  capitalize my-3">
            <label for="is_single_page">question pattern</label>
            <select wire:model.lazy="is_single_page" class="select select-bordered  max-w-xs">
                <option disabled selected>Q. pattern</option>
                <option value="1">In a single page</option>
                <option value="0">One Q. per page</option>
            </select>
        </div>
        <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
            <label for="is_single_page">question range</label>
            <select wire:model.lazy="q_range" class="select select-bordered  max-w-xs">
                <option value="1-25">1-25</option>
                <option value="26-50">26-50</option>
                <option value="51-75">51-75</option>
                <option value="76-100">76-100</option>
                <option value="101-118">101-118</option>
                <option value="1-60">1-60</option>
                <option value="61-100">61-100</option>
                <option value="1-118">1-118</option>
            </select>
        </div>
        <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
            <label for="is_single_page">question number</label>
            <select wire:model.lazy="q_number" class="select select-bordered  max-w-xs">
                <option disabled selected>Q. number</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>
        <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
            <label for="is_single_page">time per question</label>
            <select wire:model.lazy="q_time" class="select select-bordered  max-w-xs">
                <option disabled selected>Time per Q.</option>
                <option value="10">10 sec</option>
                <option value="15">15 sec</option>
                <option value="30">30 sec</option>
                <option value="45">45 sec</option>
                <option value="60">60 sec</option>
            </select>
        </div>
        <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
            <label for="is_single_page">result system</label>
            <select wire:model.lazy="is_minus" class="select select-bordered  max-w-xs">
                <option disabled selected>Result system</option>
                <option value="1">Minus for wrong ans.</option>
                <option value="0">No Minus for wrong ans.</option>
            </select>
        </div>
        <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
            <label for="is_single_page">question type</label>
            <select wire:model.lazy="is_mcq" class="select select-bordered  max-w-xs">
                <option disabled selected>Result system</option>
                <option value="0">question answer</option>
                <option value="1">multiple choice question</option>
            </select>
        </div>
        <button class="btn btn-outline btn-primary btn-sm w-24 col-start-2" wire:target="startPractise" wire:click.prevent="startPractise" wire:loading.class.add="loading">Save</button>

    </div>
    <div class="flex flex-col justify-center items-center space-y-2">
        <a class="btn btn-outline btn-primary btn-sm w-48 col-start-2" href="{{route('practise.symbol.name')}}">symbol to name</a>
        <a class="btn btn-outline btn-accent btn-sm w-48 col-start-2" href="{{route('practise.symbol.number')}}">symbol to number</a>
        <a class="btn btn-outline btn-active btn-sm w-48 col-start-2" href="{{route('practise.symbol.mass')}}">symbol to mass</a>
        <a class="btn btn-outline btn-secondary btn-sm w-48 col-start-2" href="{{route('practise.symbol.group')}}">symbol to group</a>


        <a class="btn btn-outline btn-secondary btn-sm w-48 col-start-2" href="{{route('practise.name.symbol')}}">name to symbol</a>
        <a class="btn btn-outline btn-error btn-sm w-48 col-start-2" href="{{route('practise.number.symbol')}}">number to symbol</a>
        <a class="btn btn-outline btn-success btn-sm w-48 col-start-2" href="{{route('practise.mass.symbol')}}">mass to symbol</a>
    </div>
</div>
