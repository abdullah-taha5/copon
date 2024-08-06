<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_create')): ?>
                <a href="<?php echo e(route('admin.permissions.create')); ?>" class="btn btn-success ml-3">
                    <?php echo e(__('global.create_new')); ?>

                </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_delete')): ?>
                <button class="btn btn-danger ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteSelected" wire:loading.attr="disabled" <?php echo e($this->selectedCount ? '' : 'disabled'); ?>>
                    <?php echo e(__('global.delete_selected')); ?>

                </button>
                <?php endif; ?>
                <?php if(file_exists(app_path('Http/Livewire/ExcelExport.php'))): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Permission','format' => 'csv'])->html();
} elseif ($_instance->childHasBeenRendered('l2425815715-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2425815715-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2425815715-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2425815715-0');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Permission','format' => 'csv']);
    $html = $response->html();
    $_instance->logRenderedChild('l2425815715-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Permission','format' => 'xlsx'])->html();
} elseif ($_instance->childHasBeenRendered('l2425815715-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l2425815715-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2425815715-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2425815715-1');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Permission','format' => 'xlsx']);
    $html = $response->html();
    $_instance->logRenderedChild('l2425815715-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Permission','format' => 'pdf'])->html();
} elseif ($_instance->childHasBeenRendered('l2425815715-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l2425815715-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2425815715-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2425815715-2');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Permission','format' => 'pdf']);
    $html = $response->html();
    $_instance->logRenderedChild('l2425815715-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
                        <th class="w-9">
                        </th>
                        <th class="w-28 text-center">
                            <?php echo e(trans('cruds.permission.fields.id')); ?>

                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.permission.fields.title')); ?>

                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" value="<?php echo e($permission->id); ?>" wire:model="selected">
                            </td>
                            <td class="text-center">
                                <?php echo e($permission->id); ?>

                            </td>
                            <td class="text-center">
                                <?php echo e($permission->title); ?>

                            </td>
                            <td>
                                <div class="flex justify-center">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_show')): ?>
                                        <a class="btn btn-sm btn-primary mr-2" href="<?php echo e(route('admin.permissions.show', $permission)); ?>">
                                            <?php echo e(trans('global.view')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_edit')): ?>
                                        <a class="btn btn-sm btn-success mr-2" href="<?php echo e(route('admin.permissions.edit', $permission)); ?>">
                                            <?php echo e(trans('global.edit')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_delete')): ?>
                                        <button class="btn btn-sm btn-danger mr-2" type="button" wire:click="confirm('delete', <?php echo e($permission->id); ?>)" wire:loading.attr="disabled">
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
            <?php echo e($permissions->links()); ?>

        </div>
    </div>
</div>
<?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/livewire/permission/index.blade.php ENDPATH**/ ?>