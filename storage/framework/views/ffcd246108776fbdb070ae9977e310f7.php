<?php $__env->startSection('content'); ?>
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> / 
        <?php echo e(trans('cruds.course.title_singular')); ?>

        <?php echo e(trans('global.list')); ?> /
    </span> 
    <?php echo e(trans('global.view')); ?>

    <?php echo e(trans('cruds.course.title_singular')); ?>:
    <?php echo e(trans('cruds.course.fields.id')); ?>

    <?php echo e($course->id); ?>

</h4>   
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.course.fields.id')); ?>

                            </th>
                            <td>
                                <?php echo e($course->id); ?>

                            </td>
                        </tr>
                       
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.course.fields.title')); ?> (AR)
                            </th>
                            <td>
                                <?php echo e($course->translate('ar')->title); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.course.fields.title')); ?> (EN)
                            </th>
                            <td>
                                <?php echo e($course->translate('en')->title); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.course.fields.description')); ?> (AR)
                            </th>
                            <td>
                                <?php echo e($course->translate('ar')->description); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.course.fields.description')); ?> (EN)
                            </th>
                            <td>
                                <?php echo e($course->translate('en')->description); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.course.fields.price')); ?>

                            </th>
                            <td>
                                <?php echo e(number_format($course->price)); ?> EGP
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.course.fields.thumbnail')); ?>

                            </th>
                            <td>
                                <?php $__currentLoopData = $course->thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="link-photo" href="<?php echo e($entry['url']); ?>">
                                        <img src="<?php echo e($entry['preview_thumbnail']); ?>" alt="<?php echo e($entry['name']); ?>" title="<?php echo e($entry['name']); ?>">
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.course.fields.is_published')); ?>

                            </th>
                            <td>
                                <i class="ti <?php echo e(!$course->is_published ? 'ti-xbox-x text-danger' : 'ti-checkbox text-success'); ?>"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="card-footer">
            <div class="form-group mt-1">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_edit')): ?>
                    <a href="<?php echo e(route('admin.courses.edit', $course)); ?>" class="btn btn-primary mr-2">
                        <?php echo e(trans('global.edit')); ?>

                    </a>
                <?php endif; ?>
                <a href="<?php echo e(route('admin.courses.index')); ?>" class="btn btn-secondary">
                    <?php echo e(trans('global.back')); ?>

                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/admin/course/show.blade.php ENDPATH**/ ?>