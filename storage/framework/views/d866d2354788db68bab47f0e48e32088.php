<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_create')): ?>
                <a href="<?php echo e(route('admin.lessons.create')); ?>" class="btn btn-success ml-3">
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
} elseif ($_instance->childHasBeenRendered('l1836757457-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1836757457-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1836757457-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1836757457-0');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Course','format' => 'csv']);
    $html = $response->html();
    $_instance->logRenderedChild('l1836757457-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Course','format' => 'xlsx'])->html();
} elseif ($_instance->childHasBeenRendered('l1836757457-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l1836757457-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1836757457-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1836757457-1');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Course','format' => 'xlsx']);
    $html = $response->html();
    $_instance->logRenderedChild('l1836757457-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'Course','format' => 'pdf'])->html();
} elseif ($_instance->childHasBeenRendered('l1836757457-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l1836757457-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1836757457-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1836757457-2');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'Course','format' => 'pdf']);
    $html = $response->html();
    $_instance->logRenderedChild('l1836757457-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
                            <?php echo e(trans('cruds.lesson.fields.id')); ?>

                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.lesson.fields.course')); ?>

                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.lesson.fields.title')); ?>

                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.lesson.fields.thumbnail')); ?>

                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.lesson.fields.position')); ?>

                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.lesson.fields.is_published')); ?>

                        </th>                       
                        <th class="text-center">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" value="<?php echo e($lesson->id); ?>" wire:model="selected">
                            </td>
                            <td class="text-center">
                                <?php echo e($lesson->id); ?>

                            </td>
                            <td class="text-center">
                                <?php if($lesson->course): ?>
                                    <span class="badge badge-relationship"><?php echo e($lesson->course->title ?? ''); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php echo e($lesson->title); ?>

                            </td>
                            <td class="text-center">
                                <?php $__currentLoopData = $lesson->thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="link-photo" href="<?php echo e($entry['url']); ?>">
                                        <img src="<?php echo e($entry['thumbnail']); ?>" alt="<?php echo e($entry['name']); ?>" title="<?php echo e($entry['name']); ?>">
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                           
                            <td class="text-center">
                                <?php echo e($lesson->position); ?>

                            </td>
                            <td class="text-center">
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled <?php echo e($lesson->is_published ? 'checked' : ''); ?>>
                            </td>
                           
                            <td class="text-center">
                                <div class="flex justify-center">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lesson_show')): ?>
                                        <a class="btn btn-sm btn-primary mr-2" href="<?php echo e(route('admin.lessons.show', $lesson)); ?>">
                                            <?php echo e(trans('global.view')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lesson_edit')): ?>
                                        <a class="btn btn-sm btn-success mr-2" href="<?php echo e(route('admin.lessons.edit', $lesson)); ?>">
                                            <?php echo e(trans('global.edit')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lesson_delete')): ?>
                                        <button class="btn btn-sm btn-danger mr-2" type="button" wire:click="confirm('delete', <?php echo e($lesson->id); ?>)" wire:loading.attr="disabled">
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
        </div>
    </div>
</div>






<?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/livewire/lesson/index.blade.php ENDPATH**/ ?>