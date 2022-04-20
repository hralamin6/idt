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
       <center><h1>{{$date}}</h1></center>
       <div>
           @foreach($items as $i => $item)
               <div class="form-control">
                   <label class="label cursor-pointer">
                       <span class="">{{$item->name}}</span>
                       <input x-model="ans[{{$i}}]" type="checkbox" class="checkbox checkbox-primary">
                   </label>
               </div>
           @endforeach
       </div>
       <center>
           <a wire:click.prevent="prevDate" class="btn btn-outline btn-primary btn-xs btn-block cursor-pointer w-48">Prev</a>
       </center>
       <center>
           <a wire:click.prevent="submit" class="btn btn-outline btn-primary btn-xs btn-block cursor-pointer w-48">Save</a>
       </center>
       <center>
           <a wire:click.prevent="nextDate" class="btn btn-outline btn-primary btn-xs btn-block cursor-pointer w-48">Next</a>
       </center>

   </div>
</div>
