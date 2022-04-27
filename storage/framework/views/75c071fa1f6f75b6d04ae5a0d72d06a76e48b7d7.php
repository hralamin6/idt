<?php foreach($attributes->onlyProps(['route' => 'home']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['route' => 'home']); ?>
<?php foreach (array_filter((['route' => 'home']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<a <?php echo e($attributes); ?> href="<?php echo e(route($route)); ?>" class="m-2 px-3 py-2 flex justify-start rounded-md gap-2 hover:bg-purple-600 hover:text-white
<?php echo e(Route::is($route.'*')?'bg-purple-600 text-white':'text-gray-700 dark:text-gray-200'); ?>">
    <?php echo e(@$icon); ?><span class=""><?php echo e($slot); ?></span>
</a>
<?php /**PATH C:\xampp\htdocs\idt\resources\views/components/menu.blade.php ENDPATH**/ ?>