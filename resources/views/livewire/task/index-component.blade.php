<div x-data="{
      ans : @entangle('ans').defer,
    step : 1,
    progress : 0,
    now: new Date().getTime(),
    seconds: 00,
    minutes: 00,
    hours: 00,
    percentage: 00,

    format: function(value){
    if (value<10){
    return '0' + Math.floor(value);
    }else{
    return Math.floor(value);
    }
    }
   }">
   <div class="items-center lg:w-1/2 m-auto">
       <h2 class="text-center" x-text="ans"></h2>
       <div class="flex justify-between gap-4 p-4">
               <a wire:click.prevent="prevDate" class="btn btn-outline btn-primary btn-xs btn-block cursor-pointer w-48">Prev</a>
           <h1>{{\Carbon\Carbon::parse($date)->format('d-m-Y')}}</h1>
           <a wire:click.prevent="nextDate" class="btn btn-outline btn-primary btn-xs btn-block cursor-pointer w-48">Next</a>
       </div>
       <div>
           @foreach($items as $i => $item)
               <div class="form-control">
                   <label class="label cursor-pointer">
                       <span class="">{{$item->name}}</span>
                       <input id="{{$item->id}}" @click="if(ans[{{$i}}]==null){ans[{{$i}}]=$el.value}else{ans[{{$i}}]=null};console.log($el.value)" x-ref="text" name="{{$item->name}}" @if($ans[$i]==$item->id) checked @endif value="{{$item->id}}" type="checkbox" class="toggle">
                   </label>
               </div>
           @endforeach
       </div>
       <center>
           <a wire:click.prevent="submit" class="btn btn-outline btn-primary btn-xs btn-block cursor-pointer w-48">Save</a>
       </center>
   </div>
</div>
