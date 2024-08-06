<?php $__env->startSection('content'); ?>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> /</span> 
        <?php echo e(__('global.users_list')); ?>

    </h4>   
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.index')->html();
} elseif ($_instance->childHasBeenRendered('vIaK612')) {
    $componentId = $_instance->getRenderedChildComponentId('vIaK612');
    $componentTag = $_instance->getRenderedChildComponentTagName('vIaK612');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('vIaK612');
} else {
    $response = \Livewire\Livewire::mount('user.index');
    $html = $response->html();
    $_instance->logRenderedChild('vIaK612', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/copon/resources/views/admin/user/index.blade.php ENDPATH**/ ?>