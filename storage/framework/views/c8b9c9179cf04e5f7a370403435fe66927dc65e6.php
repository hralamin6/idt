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
<a <?php echo e($attributes); ?> href="<?php echo e(route($route)); ?>" class="px-2 pb-0 rounded-md capitalize
<?php echo e(Route::is($route.'*')?'text-blue-700 dark:text-blue-400':'text-gray-700 dark:text-gray-300'); ?>">
    <?php echo e(@$icon); ?><span class=""><?php echo e($slot); ?></span>
</a>
<?php /**PATH C:\xampp\htdocs\idt\resources\views/components/m.blade.php ENDPATH**/ ?>