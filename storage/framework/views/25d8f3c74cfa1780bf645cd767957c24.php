<?php $__env->startSection('content'); ?>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> /</span> 
        <?php echo e(trans('cruds.lesson.title_singular')); ?>

        <?php echo e(trans('global.list')); ?>

    </h4>   
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('lesson.index')->html();
} elseif ($_instance->childHasBeenRendered('UHNpiLl')) {
    $componentId = $_instance->getRenderedChildComponentId('UHNpiLl');
    $componentTag = $_instance->getRenderedChildComponentTagName('UHNpiLl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('UHNpiLl');
} else {
    $response = \Livewire\Livewire::mount('lesson.index');
    $html = $response->html();
    $_instance->logRenderedChild('UHNpiLl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/admin/lesson/index.blade.php ENDPATH**/ ?>