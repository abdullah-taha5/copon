<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_create')): ?>
                <a href="<?php echo e(route('admin.courses.create')); ?>" class="btn btn-success ml-3">
                    <?php echo e(__('global.create_new')); ?>

                </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_delete')): ?>
                <button class="btn btn-danger ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteSelected" wire:loading.attr="disabled" <?php echo e($this->selectedCount ? '' : 'disabled'); ?>>
                    <?php echo e(__('global.delete_selected')); ?>

                </button>
                <?php endif; ?>
                <?php if(file_exists(app_path('Http/Livewire/ExcelExport.php'))): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Course','format' => 'csv'])->html();
} elseif ($_instance->childHasBeenRendered('l2764541215-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2764541215-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2764541215-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2764541215-0');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Course','format' => 'csv']);
    $html = $response->html();
    $_instance->logRenderedChild('l2764541215-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Course','format' => 'xlsx'])->html();
} elseif ($_instance->childHasBeenRendered('l2764541215-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l2764541215-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2764541215-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2764541215-1');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Course','format' => 'xlsx']);
    $html = $response->html();
    $_instance->logRenderedChild('l2764541215-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Course','format' => 'pdf'])->html();
} elseif ($_instance->childHasBeenRendered('l2764541215-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l2764541215-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2764541215-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2764541215-2');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Course','format' => 'pdf']);
    $html = $response->html();
    $_instance->logRenderedChild('l2764541215-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
                        <th class="w-9 text-center">
                        </th>
                        <th class="text-center w-28">
                            <?php echo e(trans('cruds.course.fields.id')); ?>

                        </th>
                       
                        <th class="text-center">
                            <?php echo e(trans('cruds.course.fields.title')); ?>

                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.course.fields.description')); ?>

                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.course.fields.price')); ?>

                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.course.fields.thumbnail')); ?>

                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.course.fields.is_published')); ?>

                        </th>
                        <th class="text-center">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" value="<?php echo e($course->id); ?>" wire:model="selected">
                            </td>
                            <td class="text-center">
                                <?php echo e($course->id); ?>

                            </td>
                            <td class="text-center">
                                <?php echo e($course->title); ?>

                            </td>
                            <td class="text-center">
                                <?php echo e($course->description); ?>

                            </td>
                            <td class="text-center">
                                <?php echo e(number_format($course->price)); ?> EGP
                            </td>
                            <td class="text-center">
                                <?php $__currentLoopData = $course->thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="link-photo" href="<?php echo e($entry['url']); ?>">
                                        <img src="<?php echo e($entry['thumbnail']); ?>" alt="<?php echo e($entry['name']); ?>" title="<?php echo e($entry['name']); ?>">
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td class="text-center">
                                
                                <i class="ti <?php echo e(!$course->is_published ? 'ti-xbox-x text-danger' : 'ti-checkbox text-success'); ?>"></i>
                            </td>
                            <td>
                                <div class="flex justify-center">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_show')): ?>
                                        <a class="btn btn-sm btn-primary mr-2" href="<?php echo e(route('admin.courses.show', $course)); ?>">
                                            <?php echo e(trans('global.view')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_edit')): ?>
                                        <a class="btn btn-sm btn-success mr-2" href="<?php echo e(route('admin.courses.edit', $course)); ?>">
                                            <?php echo e(trans('global.edit')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_delete')): ?>
                                        <button class="btn btn-sm btn-danger mr-2" type="button" wire:click="confirm('delete', <?php echo e($course->id); ?>)" wire:loading.attr="disabled">
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
            <?php echo e($courses->links()); ?>


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
<?php $__env->stopPush(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/livewire/course/index.blade.php ENDPATH**/ ?>