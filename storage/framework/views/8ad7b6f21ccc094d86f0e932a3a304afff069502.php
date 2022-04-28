<div x-data="{
      ans : <?php if ((object) ('ans') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('ans'->value()); ?>')<?php echo e('ans'->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('ans'); ?>')<?php endif; ?>.defer,
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
    <?php
        $days = cal_days_in_month( 0, \Carbon\Carbon::parse($date)->format('m'), \Carbon\Carbon::parse($date)->format('Y'));

     $today = $date;
$dates = [];

for($i=1; $i < $today->daysInMonth + 1; ++$i) {
    $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
}
    ?>
    <marquee class="dark:text-green-300 dark:bg-gray-600 bg-gray-200 text-purple-500">
        <?php $__currentLoopData = $qurans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=> $quran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span><?php echo e($quran['text']); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </marquee>
    <div
        class='w-full lg:w-1/2 max-w-lg mx-auto bg-white rounded-2xl shadow-xl flex flex-col mt-3 p-3 dark:text-gray-300 dark:bg-darkSidebar'>
        <div class="flex justify-between pb-4">
            <div class="cursor-pointer">
                <a class="text-gray-500 dark:text-gray-300" wire:click.prevent="prevMonth">
                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-o-arrow-left'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
                </a>
            </div>
            <span
                class="uppercase text-sm font-semibold text-gray-600 dark:text-gray-300"><?php echo e(\Carbon\Carbon::parse($date)->format('M-Y')); ?></span>
            <div class="cursor-pointer">
                <a class="text-gray-500 dark:text-gray-300" wire:click.prevent="nextMonth">
                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-o-arrow-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
                </a>
            </div>
        </div>
        <div class="flex justify-between font-medium uppercase text-xs pt-4 pb-2 border-t dark:border-gray-500">
            <span
                class="px-1 lg:px-3 border rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">sat</span>
            <span
                class="px-1 lg:px-3 border rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">sun</span>
            <span
                class="px-1 lg:px-3 border rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">mon</span>
            <span
                class="px-1 lg:px-3 border rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">tue</span>
            <span
                class="px-1 lg:px-3 border rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">wed</span>
            <span
                class="px-1 lg:px-3 border rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">thu</span>
            <span
                class="px-1 lg:px-3 border  rounded-sm w-14 h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">fri</span>
        </div>

        <div class="grid grid-cols-7 justify-between font-medium text-sm pb-2 ">

            <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=> $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    if(\Carbon\Carbon::parse($d)->format('d')==01){
                    if(\Carbon\Carbon::parse($d)->format('D')==='Sun'){
                        $col_span = 'col-start-2';
                    }elseif (\Carbon\Carbon::parse($d)->format('D')==='Mon'){
                        $col_span = 'col-start-3';
                    }elseif (\Carbon\Carbon::parse($d)->format('D')==='Tue'){
                        $col_span = 'col-start-4';
                    }elseif (\Carbon\Carbon::parse($d)->format('D')==='Wed'){
                        $col_span = 'col-start-5';
                    }elseif (\Carbon\Carbon::parse($d)->format('D')==='Thu'){
                        $col_span = 'col-start-6';
                    }elseif (\Carbon\Carbon::parse($d)->format('D')==='Fri'){
                        $col_span = 'col-start-7';
                    }else{
                        $col_span = 'col-start-1';
                    }
}
                ?>
                <?php $__currentLoopData = $task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(\Carbon\Carbon::parse($t->date)->format('d')==\Carbon\Carbon::parse($d)->format('d')): ?>
                        <span wire:click.prevent="dateChange(<?php echo e(\Carbon\Carbon::parse($d)->format('d')); ?>)"
                              class="lg:w-14 w-12 <?php if(\Carbon\Carbon::parse($d)->format('d')==01): ?> <?php echo e($col_span); ?> <?php endif; ?> text-white bg-green-500 rounded-2xl
                                  flex justify-center items-center border dark:border-purple-400 hover:border-green-500 cursor-pointer">
                    <?php echo e(\Carbon\Carbon::parse($d)->format('d')); ?>

                </span>                <?php else: ?>
                        <span wire:click.prevent="dateChange(<?php echo e(\Carbon\Carbon::parse($d)->format('d')); ?>)"
                              class="lg:w-14 w-12 <?php if(\Carbon\Carbon::parse($d)->format('d')==01): ?> <?php echo e($col_span); ?> <?php endif; ?> text-white bg-red-500 rounded-2xl
                                  flex justify-center items-center border dark:border-purple-400 hover:border-green-500 cursor-pointer">
                    <?php echo e(\Carbon\Carbon::parse($d)->format('d')); ?>

                </span>                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($task->count()==0): ?><span wire:click.prevent="dateChange(<?php echo e(\Carbon\Carbon::parse($d)->format('d')); ?>)"
                                      class="lg:w-14 w-12 <?php if(\Carbon\Carbon::parse($d)->format('d')==01): ?> <?php echo e($col_span); ?> <?php endif; ?>
                                          flex justify-center items-center border dark:border-purple-400 hover:border-green-500 cursor-pointer">
                    <?php echo e(\Carbon\Carbon::parse($d)->format('d')); ?>

                </span>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\idt\resources\views/livewire/task/taskwise-component.blade.php ENDPATH**/ ?>