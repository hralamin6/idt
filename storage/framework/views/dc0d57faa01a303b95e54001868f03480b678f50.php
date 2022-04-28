<div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
        <div class=" flex gap-3 bg-white border dark:border-gray-600 dark:bg-darkSidebar px-4 py-2 rounded-md">
            <div class="flex flex-row gap-2 text-sm text-gray-500 font-semibold dark:text-gray-200">
                <p class=""><?php echo app('translator')->get('total point:'); ?></p>
                <p class=""><?php echo e(auth()->user()->point()); ?></p>
            </div>
        </div>
        <div class=" flex gap-3 bg-white border dark:border-gray-600 dark:bg-darkSidebar px-4 py-2 rounded-md">
            <div class="flex flex-row gap-2 text-sm text-gray-500 font-semibold dark:text-gray-200">
                <p class=""><?php echo app('translator')->get('average point:'); ?></p>
                <p class=""><?php echo e(auth()->user()->avgpoint()); ?></p>
            </div>
        </div>
        <div class=" flex gap-3 bg-white border dark:border-gray-600 dark:bg-darkSidebar px-4 py-2 rounded-md">
            <div class="flex flex-row gap-2 text-sm text-gray-500 font-semibold dark:text-gray-200">
                <p class=""><?php echo app('translator')->get('max point a day:'); ?></p>
                <p class=""><?php echo e(auth()->user()->maxpoint()); ?></p>
            </div>
        </div>
        <div class=" flex gap-3 bg-white border dark:border-gray-600 dark:bg-darkSidebar px-4 py-2 rounded-md">
            <div class="flex flex-row gap-2 text-sm text-gray-500 font-semibold dark:text-gray-200">
                <p class=""><?php echo app('translator')->get('min point a day:'); ?></p>
                <p class=""><?php echo e(auth()->user()->minpoint()); ?></p>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-center m-2">
        <span class="text-purple-500 dark:text-white capitalize"><?php echo app('translator')->get('points according to tasks'); ?></span>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class=" flex gap-3 bg-white border dark:border-gray-600 dark:bg-darkSidebar px-4 py-2 rounded-md">
            <a href="<?php echo e(route('taskwise', $item->id)); ?>" class="flex flex justify-between gap-2 text-sm text-gray-500 font-semibold dark:text-gray-200">
                <p class=""><?php echo e($lang==='en'?$item->name:$item->name_bn); ?></p>
                <p class="justify-end"><?php echo e($item->count($item->id)*5); ?></p>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\idt\resources\views/livewire/task/dashboard-component.blade.php ENDPATH**/ ?>