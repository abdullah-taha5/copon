<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
                <a href="<?php echo e(route('admin.roles.create')); ?>" class="btn btn-success ml-3">
                    <?php echo e(__('global.create_new')); ?>

                </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_delete')): ?>
                <button class="btn btn-danger ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteSelected" wire:loading.attr="disabled" <?php echo e($this->selectedCount ? '' : 'disabled'); ?>>
                    <?php echo e(__('global.delete_selected')); ?>

                </button>
                <?php endif; ?>
                <?php if(file_exists(app_path('Http/Livewire/ExcelExport.php'))): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Role','format' => 'csv'])->html();
} elseif ($_instance->childHasBeenRendered('l346474642-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l346474642-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l346474642-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l346474642-0');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Role','format' => 'csv']);
    $html = $response->html();
    $_instance->logRenderedChild('l346474642-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Role','format' => 'xlsx'])->html();
} elseif ($_instance->childHasBeenRendered('l346474642-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l346474642-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l346474642-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l346474642-1');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Role','format' => 'xlsx']);
    $html = $response->html();
    $_instance->logRenderedChild('l346474642-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Role','format' => 'pdf'])->html();
} elseif ($_instance->childHasBeenRendered('l346474642-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l346474642-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l346474642-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l346474642-2');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Role','format' => 'pdf']);
    $html = $response->html();
    $_instance->logRenderedChild('l346474642-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endif; ?>
                <div class="d-inline-block">
                    <input type="text" wire:model.debounce.300ms="search" id="SearchInput" placeholder="<?php echo e(__('global.search')); ?>" class="form-control" />
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="w-9 text-center">
                        </th>
                        <th class="w-28 text-center">
                            <?php echo e(trans('cruds.role.fields.id')); ?>

                            <?php echo $__env->make('components.table.sort', ['field' => 'id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.role.fields.title')); ?>

                            <?php echo $__env->make('components.table.sort', ['field' => 'title'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.role.fields.permissions')); ?>

                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" value="<?php echo e($role->id); ?>" wire:model="selected">
                            </td>
                            <td class="text-center">
                                <?php echo e($role->id); ?>

                            </td>
                            <td class="text-center">
                                <?php echo e($role->title); ?>

                            </td>
                            <td class="text-center">
                                <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge bg-primary mb-1"><?php echo e($entry->title); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td class="text-center">
                                <div class="flex justify-center">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_show')): ?>
                                        <a class="btn btn-sm btn-primary mr-2" href="<?php echo e(route('admin.roles.show', $role)); ?>">
                                            <?php echo e(trans('global.view')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_edit')): ?>
                                        <a class="btn btn-sm btn-success mr-2" href="<?php echo e(route('admin.roles.edit', $role)); ?>">
                                            <?php echo e(trans('global.edit')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_delete')): ?>
                                        <button class="btn btn-sm btn-danger mr-2" type="button" wire:click="confirm('delete', <?php echo e($role->id); ?>)" wire:loading.attr="disabled">
                                            <?php echo e(trans('global.delete')); ?>

                                        </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php echo e($roles->links()); ?>

        </div>
    </div>
</div>




    
    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                
               
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            <?php if($this->selectedCount): ?>
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        <?php echo e($this->selectedCount); ?>

                    </span>
                    <?php echo e(__('Entries selected')); ?>

                </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("<?php echo e(trans('global.areYouSure')); ?>")) {
        return
    }
window.livewire.find('<?php echo e($_instance->id); ?>')[e.callback](...e.argv)
})
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/livewire/role/index.blade.php ENDPATH**/ ?>