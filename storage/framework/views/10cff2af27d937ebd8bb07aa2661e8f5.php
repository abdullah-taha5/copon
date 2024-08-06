<?php $__env->startSection('content'); ?>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> /</span> 
        <?php echo e(__('global.permissions_list')); ?>

    </h4>       
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('permission.index')->html();
} elseif ($_instance->childHasBeenRendered('H3KfA0O')) {
    $componentId = $_instance->getRenderedChildComponentId('H3KfA0O');
    $componentTag = $_instance->getRenderedChildComponentTagName('H3KfA0O');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('H3KfA0O');
} else {
    $response = \Livewire\Livewire::mount('permission.index');
    $html = $response->html();
    $_instance->logRenderedChild('H3KfA0O', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/admin/permission/index.blade.php ENDPATH**/ ?>