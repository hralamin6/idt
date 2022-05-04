
<div class="container flex flex-col mx-auto w-full items-center justify-center">
    <div class="flex items-center justify-center mb-2">
        <span class="text-purple-500 dark:text-white capitalize"><?php echo app('translator')->get('users according to their activities'); ?></span>
    </div>
    <ul class="flex flex-col">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="border-gray-400 flex flex-row mb-2 capitalize">
            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md flex flex-1 space-x-3 items-center p-4">
                <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                    <a href="#" class="block relative">
                        <img alt="profil" src="https://www.gravatar.com/avatar/<?php echo e(md5($user->email)); ?>?d=mp" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                    </a>
                </div>
                <div class="flex-1 md:mr-16">
                    <div class="font-medium dark:text-white"><?php echo e($user->name); ?></div>
                    <div class="text-gray-600 dark:text-gray-200 text-xs"><?php echo e(\Carbon\Carbon::parse($user->last_seen)->diffForHumans()); ?></div>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="text-green-600 dark:text-green-200 text-sm"><?php echo app('translator')->get('total point:'); ?> <?php echo e($user->point()); ?></div>
                    <div class="text-pink-600 dark:text-pink-200 text-xs"><?php echo app('translator')->get('average point:'); ?> <?php echo e(number_format($user->avgpoint(), 2)); ?></div>
                </div>
            </div>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
    <div class="mx-auto my-4 px-4">
        <?php echo e($users->links()); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\idt\resources\views/livewire/task/user-component.blade.php ENDPATH**/ ?>