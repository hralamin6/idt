<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"  />
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" ></script>
<?php $__env->stopPush(); ?>
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General Setting</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form wire:submit.prevent="updateSetting">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Admin Name</label>
                                <input wire:model.defer="admin" type="text" class="form-control" placeholder="Enter admin name">
                                <?php $__errorArgs = ['admin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger text-bold"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input wire:model.defer="phone" type="text" class="form-control" placeholder="Enter phone no">
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger text-bold"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input wire:model.defer="email" type="email" class="form-control" placeholder="Enter email">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger text-bold"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="form-group">
                                <label>Site name</label>
                                <input wire:model.defer="site_name" type="text" class="form-control" placeholder="Enter site name">
                                <?php $__errorArgs = ['site_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger text-bold"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="form-group">
                                <label>Site url</label>
                                <input wire:model.defer="site_url" type="url" class="form-control" placeholder="Enter site url">
                                <?php $__errorArgs = ['site_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger text-bold"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="form-group">
                                <label>Site url</label>
                                <input wire:model.defer="logoUrl" type="url" class="form-control" placeholder="Enter site url">
                                <?php $__errorArgs = ['logoUrl'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger text-bold"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="form-group">
                                <label>Facobook url</label>
                                <input wire:model.defer="facebook" type="url" class="form-control" placeholder="Enter facebook url">
                                <?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger text-bold"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="form-group">
                                <label>Twitter url</label>
                                <input wire:model.defer="twitter" type="url" class="form-control" placeholder="Enter twitter url">
                                <?php $__errorArgs = ['twitter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger text-bold"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="form-group">
                                <label>Youtube url</label>
                                <input wire:model.defer="youtube" type="url" class="form-control" placeholder="Enter youtube url">
                                <?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger text-bold"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input wire:model.defer="location" type="text" class="form-control" placeholder="Enter location">
                                <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger text-bold"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="form-group">
                                <label>About</label>
                                <span wire:ignore>
                                        <trix-editor class="formatted-content" x-data x-on:trix-change="$dispatch('input', event.target.value)" wire:model.debounce.1000ms="about" wire:key="uniqueKey"></trix-editor>
                                    </span>
                                <?php $__errorArgs = ['about'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger text-bold"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                            <label class="block mt-3">
                                <div class="list-inline flex justify-between gap-3"  x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <label class="cursor-pointer flex justify-content-start gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <?php echo e(__("Choose logo image")); ?>

                                        <input type="file" class="hidden" wire:model.lazy="logo">
                                    </label>
                                    <div class="col-md-4 list-inline-item" x-show="isUploading">
                                        <progress max="100" x-bind:value="progress"></progress>
                                    </div>
                                    <?php if($logo): ?>
                                        
                                    <?php elseif($setup->getFirstMediaUrl('logo')!=null): ?>
                                        <img style="height: 66px; width: 66px;" src="<?php echo e($setup->getFirstMediaUrl('logo')); ?>" alt="">
                                    <?php endif; ?>
                                    <button wire:click.prevent="logo" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Save logo
                                        <span wire:loading wire:target="logo" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-sm text-red-600 dark:text-red-400"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </label>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Save changes
                                <span wire:loading wire:target="updateSetting" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\idt\resources\views/livewire/admin/setup-component.blade.php ENDPATH**/ ?>