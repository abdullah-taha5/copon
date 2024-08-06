<?php $__env->startSection('content'); ?>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> / </span>
        <?php echo e(trans('cruds.role.title_singular')); ?>

        <?php echo e(trans('global.list')); ?>

    </h4>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('role.index')->html();
} elseif ($_instance->childHasBeenRendered('g9G02Yc')) {
    $componentId = $_instance->getRenderedChildComponentId('g9G02Yc');
    $componentTag = $_instance->getRenderedChildComponentTagName('g9G02Yc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('g9G02Yc');
} else {
    $response = \Livewire\Livewire::mount('role.index');
    $html = $response->html();
    $_instance->logRenderedChild('g9G02Yc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/admin/role/index.blade.php ENDPATH**/ ?>