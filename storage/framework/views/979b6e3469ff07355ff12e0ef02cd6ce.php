<?php $__env->startSection('content'); ?>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> /</span> 
        <?php echo e(trans('cruds.course.title_singular')); ?>

        <?php echo e(trans('global.list')); ?>

    </h4>   
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('course.index')->html();
} elseif ($_instance->childHasBeenRendered('EHl3Wx7')) {
    $componentId = $_instance->getRenderedChildComponentId('EHl3Wx7');
    $componentTag = $_instance->getRenderedChildComponentTagName('EHl3Wx7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('EHl3Wx7');
} else {
    $response = \Livewire\Livewire::mount('course.index');
    $html = $response->html();
    $_instance->logRenderedChild('EHl3Wx7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/admin/course/index.blade.php ENDPATH**/ ?>