<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon_create')): ?>
                <a href="<?php echo e(route('admin.coupons.create')); ?>" class="btn btn-success ml-3">
                    <?php echo e(__('global.create_new')); ?>

                </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon_delete')): ?>
                <button class="btn btn-danger ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteSelected" wire:loading.attr="disabled" <?php echo e($this->selectedCount ? '' : 'disabled'); ?>>
                    <?php echo e(__('global.delete_selected')); ?>

                </button>
                <?php endif; ?>
                <?php if(file_exists(app_path('Http/Livewire/ExcelExport.php'))): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Coupon','format' => 'csv'])->html();
} elseif ($_instance->childHasBeenRendered('l1470348006-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1470348006-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1470348006-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1470348006-0');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Coupon','format' => 'csv']);
    $html = $response->html();
    $_instance->logRenderedChild('l1470348006-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Coupon','format' => 'xlsx'])->html();
} elseif ($_instance->childHasBeenRendered('l1470348006-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l1470348006-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1470348006-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1470348006-1');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Coupon','format' => 'xlsx']);
    $html = $response->html();
    $_instance->logRenderedChild('l1470348006-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Coupon','format' => 'pdf'])->html();
} elseif ($_instance->childHasBeenRendered('l1470348006-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l1470348006-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1470348006-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1470348006-2');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Coupon','format' => 'pdf']);
    $html = $response->html();
    $_instance->logRenderedChild('l1470348006-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endif; ?>
                <div class="d-inline-block">
                    <input type="text" wire:model.debounce.300ms="search" id="SearchInput" placeholder="<?php echo e(__('global.search')); ?>" class="form-control" />
                </div>
            </div>
            <div class="col-lg-4">
                
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
                        <th class="w-28">
                            <?php echo e(trans('cruds.coupon.fields.id')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.coupon.fields.coupon')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.coupon.fields.total_views_limit')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.coupon.fields.daily_views_limit')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.coupon.fields.started_at')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.coupon.fields.expire_at')); ?>

                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <input type="checkbox" value="<?php echo e($coupon->id); ?>" wire:model="selected">
                            </td>
                            <td>
                                <?php echo e($coupon->id); ?>

                            </td>
                            <td>
                                <?php echo e($coupon->coupon); ?>

                            </td>
                            <td>
                                <?php echo e($coupon->total_views_limit); ?>

                            </td>
                            <td>
                                <?php echo e($coupon->daily_views_limit); ?>

                            </td>
                            <td>
                                <?php echo e($coupon->started_at); ?>

                            </td>
                            <td>
                                <?php echo e($coupon->expire_at); ?>

                            </td>
                            <td>
                                <div class="flex justify-end">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon_show')): ?>
                                        <a class="btn btn-sm btn-primary mr-2" href="<?php echo e(route('admin.coupons.show', $coupon)); ?>">
                                            <?php echo e(trans('global.view')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon_edit')): ?>
                                        <a class="btn btn-sm btn-success mr-2" href="<?php echo e(route('admin.coupons.edit', $coupon)); ?>">
                                            <?php echo e(trans('global.edit')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon_delete')): ?>
                                        <button class="btn btn-sm btn-danger mr-2" type="button" wire:click="confirm('delete', <?php echo e($coupon->id); ?>)" wire:loading.attr="disabled">
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
            <?php echo e($coupons->links()); ?>

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
<?php $__env->stopPush(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/livewire/coupon/index.blade.php ENDPATH**/ ?>