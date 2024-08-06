<?php $__env->startSection('content'); ?>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> /
            <?php echo e(trans('cruds.coupon.title_singular')); ?>

            <?php echo e(trans('global.list')); ?> /
        </span>
        <?php echo e(trans('global.create')); ?>

        <?php echo e(trans('cruds.coupon.title_singular')); ?>

    </h4>
    <div class="row">
        <div class="col-lg-9">
            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger mb-2" role="alert">
                        <?php echo e($error); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <form action="<?php echo e(route('admin.coupons.store')); ?>" method="POST" class="pt-3" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="form-group <?php echo e($errors->has('coupon.coupon') ? 'invalid' : ''); ?>">
                            <label class="form-label" for="coupon"><?php echo e(trans('cruds.coupon.fields.coupon')); ?></label>
                            <input class="form-control" type="text" name="coupon" id="coupon" value="<?php echo e(old('coupon')); ?>">
                            <div class="validation-message">
                                <?php echo e($errors->first('coupon.coupon')); ?>

                            </div>
                            <div class="help-block">
                                <?php echo e(trans('cruds.coupon.fields.coupon_helper')); ?>

                            </div>
                        </div>
                        <br>
                        <div class="form-group <?php echo e($errors->has('course_id') ? 'invalid' : ''); ?>">
                            <label class="form-label required"
                                for="course"><?php echo e(trans('cruds.lesson.fields.course')); ?></label>
                            <select id="select2Basic" class="select2 form-select form-select-lg" name="course_id" data-allow-clear="true">
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e($key == old('course_id') ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="validation-message">
                                <?php echo e($errors->first('course_id')); ?>

                            </div>
                            <div class="help-block">
                                <?php echo e(trans('cruds.lesson.fields.course_helper')); ?>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group <?php echo e($errors->has('coupon.total_views_limit') ? 'invalid' : ''); ?>">
                                    <label class="form-label" for="total_views_limit"><?php echo e(trans('cruds.coupon.fields.total_views_limit')); ?></label>
                                    <input class="form-control" type="number" name="total_views_limit" id="total_views_limit" wire:model.defer="coupon.total_views_limit" step="1">
                                    <div class="validation-message">
                                        <?php echo e($errors->first('coupon.total_views_limit')); ?>

                                    </div>
                                    <div class="help-block">
                                        <?php echo e(trans('cruds.coupon.fields.total_views_limit_helper')); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group <?php echo e($errors->has('coupon.daily_views_limit') ? 'invalid' : ''); ?>">
                                    <label class="form-label" for="daily_views_limit"><?php echo e(trans('cruds.coupon.fields.daily_views_limit')); ?></label>
                                    <input class="form-control" type="number" name="daily_views_limit" id="daily_views_limit" wire:model.defer="coupon.daily_views_limit" step="1">
                                    <div class="validation-message">
                                        <?php echo e($errors->first('coupon.daily_views_limit')); ?>

                                    </div>
                                    <div class="help-block">
                                        <?php echo e(trans('cruds.coupon.fields.daily_views_limit_helper')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group <?php echo e($errors->has('coupon.started_at') ? 'invalid' : ''); ?>">
                                    <label class="form-label" for="started_at"><?php echo e(trans('cruds.coupon.fields.started_at')); ?></label>
                                    <input type="text" class="form-control flatpickr-input active" placeholder="YYYY-MM-DD HH:MM" id="started_at" name="started_at">
                                    <div class="validation-message">
                                        <?php echo e($errors->first('coupon.started_at')); ?>

                                    </div>
                                    <div class="help-block">
                                        <?php echo e(trans('cruds.coupon.fields.started_at_helper')); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group <?php echo e($errors->has('coupon.expire_at') ? 'invalid' : ''); ?>">
                                    <label class="form-label" for="expire_at"><?php echo e(trans('cruds.coupon.fields.expire_at')); ?></label>
                                    <input type="text" class="form-control flatpickr-input active" placeholder="YYYY-MM-DD HH:MM" id="expire_at" name="expire_at">
                                    <div class="validation-message">
                                        <?php echo e($errors->first('coupon.expire_at')); ?>

                                    </div>
                                    <div class="help-block">
                                        <?php echo e(trans('cruds.coupon.fields.expire_at_helper')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="btn btn-primary mr-2" type="submit">
                                <?php echo e(trans('global.save')); ?>

                            </button>
                            <a href="<?php echo e(route('admin.coupons.index')); ?>" class="btn btn-secondary">
                                <?php echo e(trans('global.cancel')); ?>

                            </a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/forms-pickers.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/admin/coupon/create.blade.php ENDPATH**/ ?>