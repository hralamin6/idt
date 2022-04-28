<div class="dark:bg-darkSidebar">
    <?php
        $days = cal_days_in_month( 0, \Carbon\Carbon::parse($date)->format('m'), \Carbon\Carbon::parse($date)->format('Y'));

     $today = $date;
$dates = [];

for($i=1; $i < $today->daysInMonth + 1; ++$i) {
    $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
}
    ?>
    <div class="flex justify-between pb-4 p-2">
        <div class="cursor-pointer">
            <a class="dark:text-gray-300 text-gray-500" wire:click.prevent="prevMonth">
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
        <span class="uppercase text-sm font-semibold dark:text-gray-300 text-gray-600"><?php echo e(\Carbon\Carbon::parse($date)->format('M-Y')); ?></span>
        <div class="cursor-pointer">
            <a class="dark:text-gray-300 text-gray-500" wire:click.prevent="nextMonth">
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
        <div class="flex flex-col h-screen" x-data="{ hover: 0 }">
            <div class="overflow-scroll scrollbar-none w-full">
                <table class="relative w-full border dark:border-indigo-400 capitalize text-center text-xs lg:text-sm">
                    <thead class="">
                    <tr>
                        <th class="break-words w-16 lg:w-12 h-4 text-red-900 border dark:border-indigo-400 dark:text-purple-400"><span>date</span></th>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th class="px-1 w-36 text-purple-800 dark:text-purple-400 border dark:border-indigo-400">
                                <div @mouseenter="hover = <?php echo e($item->id); ?>" @mouseleave="hover = 0" class="flex flex-col mx-auto items-center justify-center">
                                    <span><?php echo e($lang==='en'?$item->name:$item->name_bn); ?></span>
                                    <center>
                                        <svg  class="w-4 mx-auto text-center h-4 ml-1 md:mt-1 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                              xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </center>
                                    <div
                                        class="absolute top-8 inline-block w-48 px-2 py-1 mb-2 -ml-12 text-white bg-purple-600 rounded-lg"
                                        x-show="hover==<?php echo e($item->id); ?>" x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 transform scale-90"
                                        x-transition:enter-end="opacity-100 transform scale-100"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100 transform scale-100"
                                        x-transition:leave-end="opacity-0 transform scale-90" x-cloak>
                                        <span class="inline-block text-xs leading-tight"><?php echo $lang==='en'?$item->description:$item->description_bn; ?></span>
                                    </div>
                                </div>
                            </th>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <th class="break-words w-16 text-red-900 border dark:border-indigo-400 dark:text-purple-400"><span>daily</span></th>
                    </tr>
                    </thead>
                    <tbody class="divide-y dark:divide-indigo-400">
                    <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="">
                            <?php
                                $task = \App\Models\TaskCount::where(['user_id'=> auth()->id(), 'date' => $d])->first();
                                $point = \App\Models\TaskPoint::where(['user_id'=> auth()->id(), 'date' => $d])->first();
                            ?>
                            <th class="py-1 font-semibold text-green-600 dark:text-green-300"><span><?php echo e(\Carbon\Carbon::parse($d)->format('d')); ?></span></th>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td class="py-1 font-medium text-gray-900 border dark:border-indigo-400"> <?php if($task!=null): ?> <?php if(in_array($item->id, @$task->tasks)): ?>
                                       <span class="font-bold text-blue-600">&#10004</span>  <?php else: ?> &#10060 <?php endif; ?> <?php endif; ?> </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <td class="py-1 font-medium text-gray-900 border dark:text-gray-200 dark:border-indigo-400"><?php echo e(@$point->points); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th class="py-1 font-semibold text-green-600 dark:text-green-300"><span>monthly</span></th>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="py-1 font-medium text-gray-900 dark:text-red-200 border dark:border-indigo-400"><?php echo e($item->monthlyCount($item->id, \Carbon\Carbon::parse($date)->format('m-Y'))); ?> </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\idt\resources\views/livewire/task/monthly-task.blade.php ENDPATH**/ ?>