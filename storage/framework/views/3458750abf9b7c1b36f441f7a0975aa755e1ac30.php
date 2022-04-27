<?php $__env->startSection('body'); ?>

    <div class="dark:bg-darkBg flex h-screen text-tahiti scrollbar-none"
         x-data="{nav: false, dark: $persist(false)}" :class="{'dark': dark, 'overflow-hidden': nav}"

    >
        <div x-cloak
             x-show="nav"
             x-transition:enter="transition ease-in-out duration-150"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in-out duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        ></div>

        <div class="flex flex-col flex-1 w-full">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.header-component', [])->html();
} elseif ($_instance->childHasBeenRendered('U4afoaQ')) {
    $componentId = $_instance->getRenderedChildComponentId('U4afoaQ');
    $componentTag = $_instance->getRenderedChildComponentTagName('U4afoaQ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('U4afoaQ');
} else {
    $response = \Livewire\Livewire::mount('admin.header-component', []);
    $html = $response->html();
    $_instance->logRenderedChild('U4afoaQ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <main class="h-full overflow-y-auto dark:bg-darkBg">
                <div class="m-2">








                    <?php echo $__env->yieldContent('content'); ?>
                    <?php if(isset($slot)): ?>
                        <?php echo e($slot); ?>

                    <?php endif; ?>

                </div>
            </main>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\idt\resources\views/layouts/app.blade.php ENDPATH**/ ?>