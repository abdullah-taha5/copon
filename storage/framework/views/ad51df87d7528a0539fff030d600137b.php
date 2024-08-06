<?php $__env->startSection('content'); ?>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> /</span> 
        <?php echo e(trans('cruds.course.title_singular')); ?>

        <?php echo e(trans('global.list')); ?>

    </h4>   
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('course.index')->html();
} elseif ($_instance->childHasBeenRendered('XQMn1AF')) {
    $componentId = $_instance->getRenderedChildComponentId('XQMn1AF');
    $componentTag = $_instance->getRenderedChildComponentTagName('XQMn1AF');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('XQMn1AF');
} else {
    $response = \Livewire\Livewire::mount('course.index');
    $html = $response->html();
    $_instance->logRenderedChild('XQMn1AF', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/copon/resources/views/admin/course/index.blade.php ENDPATH**/ ?>