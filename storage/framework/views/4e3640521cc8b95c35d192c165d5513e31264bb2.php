<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            $setup = \App\Models\Setup::first();
        ?>
        <title><?php echo $__env->yieldContent('title', 'Home Page'); ?> - <?php echo e(config('app.name')); ?></title>
        <meta name="description" content="<?php echo $__env->yieldContent('description', 'This is site Description'); ?> - <?php echo e(config('app.name')); ?>">

        <meta property="og:title" content="<?php echo $__env->yieldContent('title', 'Home Page'); ?> - <?php echo e(config('app.name')); ?>" />
        <meta property="og:description" content="<?php echo $__env->yieldContent('description', 'This is site Description'); ?> - <?php echo e(config('app.name')); ?>" />
        <meta property="og:url" content="<?php echo $__env->yieldContent('url', config('app.url')); ?>" />
        <meta property="og:image" content="<?php echo $__env->yieldContent('image', $setup->logo); ?>" />
        <meta property="og:image:secure_url" content="<?php echo $__env->yieldContent('image', $setup->logo); ?>" />
        <meta property="og:site_name" content="<?php echo e(config('app.name')); ?>" />
        <meta property="og:image:width" content="1536" />
        <meta property="og:image:height" content="1024" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:description" content="<?php echo $__env->yieldContent('description', 'This is site Description'); ?> - <?php echo e(config('app.name')); ?>" />
        <meta name="twitter:title" content="<?php echo $__env->yieldContent('title', 'Home Page'); ?> - <?php echo e(config('app.name')); ?>" />
        <meta name="twitter:image" content="<?php echo $__env->yieldContent('image', $setup->logo); ?>" />

        <link rel="shortcut icon" href="<?php echo e($setup->logo); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo e($setup->logo); ?>" type="image/x-icon">

        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" href="<?php echo e(asset('css/tw.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(url(mix('css/app.css'))); ?>">
        <?php echo $__env->yieldPushContent('css'); ?>
        <?php echo \Livewire\Livewire::styles(); ?>

        <script src="<?php echo e(url(mix('js/app.js'))); ?>" defer></script>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <?php echo $__env->yieldPushContent('js'); ?>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2561735618453583"
                crossorigin="anonymous"></script>
    </head>

    <body>
        <?php echo $__env->yieldContent('body'); ?>
        <?php echo \Livewire\Livewire::scripts(); ?>


        <script src="<?php echo e(asset('js/sa.js')); ?>"></script>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-alert::components.scripts','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-alert::scripts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <script src="<?php echo e(asset('js/spa.js')); ?>" data-turbolinks-eval="false"></script>

    </body>
</html>
<?php /**PATH C:\xampp\htdocs\idt\resources\views/layouts/base.blade.php ENDPATH**/ ?>