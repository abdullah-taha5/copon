<?php $__env->startSection('content'); ?>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> / 
            <?php echo e(trans('cruds.role.title_singular')); ?>

            <?php echo e(trans('global.list')); ?>

        </span>
        <?php echo e(trans('global.create')); ?>

        <?php echo e(trans('cruds.role.title_singular')); ?>


    </h4>

    <form action="<?php echo e(route('admin.roles.store')); ?>" method="POST" class="pt-3">
        <?php echo csrf_field(); ?>
        <div class="form-group <?php echo e($errors->has('title') ? 'invalid' : ''); ?>">
            <label class="form-label required" for="title"><?php echo e(trans('cruds.role.fields.title')); ?></label>
            <input class="form-control" type="text" name="title" id="title" required>
            <div class="validation-message">
                <?php echo e($errors->first('title')); ?>

            </div>
            <div class="help-block">
                <?php echo e(trans('cruds.role.fields.title_helper')); ?>

            </div>
        </div>
        <div class="form-group <?php echo e($errors->has('permissions') ? 'invalid' : ''); ?>">
            <label class="form-label required"
                for="course"><?php echo e(trans('cruds.role.fields.permissions')); ?></label>
            <select id="select2Basic" class="select2 form-select form-select-lg" name="permissions[]" data-allow-clear="true" multiple>
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>" <?php echo e($key == old('permissions') ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div class="validation-message">
                <?php echo e($errors->first('permissions')); ?>

            </div>
            <div class="help-block">
                <?php echo e(trans('cruds.role.fields.permissions_helper')); ?>

            </div>
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-primary mr-2" type="submit">
                <?php echo e(trans('global.save')); ?>

            </button>
            <a href="<?php echo e(route('admin.roles.index')); ?>" class="btn btn-secondary">
                <?php echo e(trans('global.cancel')); ?>

            </a>
        </div>
    </form>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/admin/role/create.blade.php ENDPATH**/ ?>