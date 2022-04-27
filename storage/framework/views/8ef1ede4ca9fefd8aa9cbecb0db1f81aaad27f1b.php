<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"  />
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" ></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title', __('Task manage')); ?>
<?php $__env->startSection('description', __('this page for task management system only for admin')); ?>


<div class=" rounded-xl mt-4" x-data="{openTable: $persist(true), modal: false, editMode: false}"
     x-init="
     $wire.on('openModal', (e) => {modal = true})
     $wire.on('openEditModal', (e) => {modal = true, editMode=true})
     $wire.on('closeModal', (e) => {modal = false, editMode=false})
     $wire.on('dataAdded', (e) => {
            modal = false
            editMode = false

            element = document.getElementById(e.dataId)
            console.log(element)
            element.scrollIntoView({behavior: 'smooth'})
            element.classList.add('bg-green-50')
            element.classList.add('dark:bg-gray-500')
            element.classList.add('animate-pulse')
            setTimeout(() => {
            element.classList.remove('bg-green-50')
            element.classList.remove('dark:bg-gray-500')
            element.classList.remove('animate-pulse')
            }, 5000)
            })
<?php if(session('scrollToComment')): ?>
         const commentToScrollTo = document.getElementById(<?php echo e(session('scrollToComment')); ?>)
            commentToScrollTo.scrollIntoView({ behavior: 'smooth'})
            commentToScrollTo.classList.add('bg-green-50')
            setTimeout(() => {
                commentToScrollTo.classList.remove('bg-green-50')
            }, 5000)
        <?php endif; ?>"

     @open-delete-modal.window="
     model = event.detail.model
     eventName = event.detail.eventName
Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit(eventName, model )
                }
            })
"
>
    <aside class="border dark:border-gray-600 row-span-4 bg-white dark:bg-darkSidebar" x-data="{rows: <?php if ((object) ('selected_rows') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('selected_rows'->value()); ?>')<?php echo e('selected_rows'->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('selected_rows'); ?>')<?php endif; ?>.defer, selectPage: <?php if ((object) ('select_page_rows') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('select_page_rows'->value()); ?>')<?php echo e('select_page_rows'->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('select_page_rows'); ?>')<?php endif; ?>}">
        <div class="flex justify-between gap-3 bg-white border dark:border-gray-600 dark:bg-darkSidebar px-4 py-2">
            <p class="text-gray-600 dark:text-gray-200">Products Table</p>
            
            <div class="flex justify-center gap-4 text-gray-500 dark:text-gray-300 capitalize">
                <button @click="$wire.openModal()" class="px-1 mt-1 mb-0.5 text-white pb-0.5 font-semibold text-xs bg-pink-400 rounded-lg"><?php echo app('translator')->get('add new'); ?></button>
                <button class="" @click="openTable = !openTable">
                    <svg x-show="openTable" xmlns="http://www.w3.org/2000/svg" class="h-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                    <svg x-show="!openTable" xmlns="http://www.w3.org/2000/svg" class="h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
                <div x-cloak x-show="rows.length > 0 " class="flex items-center justify-center" x-data="{bulk: false}">
                    <div class="relative inline-block">
                        <!-- Dropdown toggle button -->
                        <button @click="bulk=!bulk" class="relative z-10 block px-2 text-gray-700 border border-transparent rounded-md dark:text-white focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-800 dark:text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div x-show="bulk" class="absolute right-0 z-20 w-48 py-2 mt-2 bg-white rounded-md shadow-xl dark:bg-gray-800" @click.outside="bulk= false">
                            <a @click="$dispatch('open-delete-modal', { title: 'Hello World!', text: 'you cant revert', icon: 'error', eventName: 'deleteMultiple', model: '' })" class="cursor-pointer block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                Delete </a>
                            <a wire:click.prevent="" class="cursor-pointer block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                Your projects </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div x-cloak x-show="openTable" x-collapse>
            <div class="mb-1 overflow-y-scroll scrollbar-none">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-300 dark:bg-darkSidebar"
                        >
                            <th class="px-4 py-3">
                                <input class="ring-0 dark:bg-gray-400" x-model="selectPage" type="checkbox" value="" name="todo2" id="todoCheck2">
                            </th>
                            <th class="px-4 py-3"><?php echo app('translator')->get('sl'); ?></th>
                            <th class="px-4 py-3"><?php echo app('translator')->get('name'); ?></th>
                            <th class="px-4 py-3"><?php echo app('translator')->get('name bn'); ?></th>
                            <th class="px-4 py-3"><?php echo app('translator')->get('status'); ?></th>
                            <th class="px-4 py-3"><?php echo app('translator')->get('action'); ?></th>
                        </tr>
                        </thead>
                        <tbody
                            class="bg-white divide-y dark:divide-gray-700 dark:bg-darkSidebar"
                        >
                        <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr id="item-id-<?php echo e($item->id); ?>" class="text-gray-700 dark:text-gray-300 capitalize" :class="{'bg-gray-200 dark:bg-gray-600': rows.includes('<?php echo e($item->id); ?>') }">
                                <td class="px-4 py-3">
                                    <input x-model="rows" class="ring-none dark:bg-gray-400" type="checkbox" value="<?php echo e($item->id); ?>" name="todo2" id="<?php echo e($item->id); ?>">
                                </td>
                                <td class="px-4 py-3"><?php echo e($items->firstItem() + $i); ?></td>
                                <td class="px-4 py-3 text-sm"><?php echo $item->name; ?> </td>
                                <td class="px-4 py-3 text-sm"><?php echo $item->name_bn; ?> </td>
                                <td class="px-4 py-3 text-xs">
                                <span wire:click.prevent="changeStatus(<?php echo e($item->id); ?>)" class=" cursor-pointer px-2 py-1 font-semibold rounded-full <?php echo e($item->status? 'bg-green-300 dark:bg-green-700': 'bg-red-300 dark:bg-red-700'); ?> ">
                                    <?php echo e($item->status?__('active'):__('inactive')); ?>

                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.loader','data' => ['wire:target' => 'changeStatus('.e($item->id).')']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:target' => 'changeStatus('.e($item->id).')']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </span></td>
                                <td class="px-4 py-3 text-sm flex space-x-4">
                                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-o-pencil-alt'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => '$wire.loadData('.e($item->id).')','class' => 'w-5 text-purple-600 cursor-pointer']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-o-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click.prevent' => '$dispatch(\'open-delete-modal\', { title: \'Hello World!\', text: \'you cant revert\', icon: \'error\', eventName: \'deleteSingle\', model: '.e($item->id).' })','class' => 'w-5 text-pink-500 cursor-pointer']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mx-auto my-4 px-4">
                    
                    <?php echo e($items->links()); ?>

                </div>
            </div>
        </div>
    </aside>

    <div x-cloak x-show="modal">
        <div class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <div  class="inset-0 py-4 rounded-2xl transition duration-150 ease-in-out z-50 absolute" id="modal">
            <div @click.outside="modal= false, editMode = false" class="container mx-auto w-11/12 md:w-2/3 max-w-lg ">
                <form @submit.prevent="editMode? $wire.editData(): $wire.saveData()" class="relative py-3 px-5 md:px-10 bg-white dark:bg-darkSidebar shadow-md rounded border border-gray-400 dark:border-gray-600 capitalize">
                    <h1 x-cloak x-show="!editMode" class="text-gray-800 dark:text-gray-200 font-lg font-bold tracking-normal text-center leading-tight mb-4"><?php echo app('translator')->get('add new data'); ?></h1>
                    <h1 x-cloak x-show="editMode" class="text-gray-800 dark:text-gray-200 font-lg font-bold tracking-normal text-center leading-tight mb-4"><?php echo app('translator')->get('edit this data'); ?></h1>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                        <div>
                            <label for="name" class="text-gray-800 dark:text-gray-200 text-sm font-bold leading-tight tracking-normal"><?php echo app('translator')->get('name'); ?></label>
                            <input wire:model.lazy="state.name" class="input input-bordered input-info w-full input-sm max-w-xs"/>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-sm text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label for="name_bn" class="text-gray-800 dark:text-gray-200 text-sm font-bold leading-tight tracking-normal"><?php echo app('translator')->get('name bn'); ?></label>
                            <input wire:model.lazy="state.name_bn" class="input input-bordered input-info w-full input-sm max-w-xs"/>
                            <?php $__errorArgs = ['name_bn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-sm text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="grid grid-cols-1">
                        <div>
                            <label for="description" class="text-gray-800 dark:text-gray-200 text-sm font-bold leading-tight tracking-normal"><?php echo app('translator')->get('description'); ?></label>
                            <span wire:ignore>
                                <trix-editor class="formatted-content" x-data x-on:trix-change="$dispatch('input', event.target.value)" wire:model.debounce.1000ms="state.description" wire:key="description"></trix-editor>
                            </span>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger text-bold"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label for="description_bn" class="text-gray-800 dark:text-gray-200 text-sm font-bold leading-tight tracking-normal"><?php echo app('translator')->get('description bn'); ?></label>
                            <span wire:ignore>
                                <trix-editor class="formatted-content" x-data x-on:trix-change="$dispatch('input', event.target.value)" wire:model.debounce.1000ms="state.description_bn" wire:key="description_bn"></trix-editor>
                            </span>
                            <?php $__errorArgs = ['description_bn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger text-bold"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="flex items-center justify-between w-full mt-4">
                        <button type="button" @click="modal= false, editMode = false" class="bg-red-600 focus:ring-gray-400 transition duration-150 text-white ease-in-out hover:bg-red-300 rounded px-8 py-2 text-sm">Cancel</button>
                        <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\idt\resources\views/livewire/task/task-manage.blade.php ENDPATH**/ ?>