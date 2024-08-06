<?php $__env->startSection('content'); ?>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> / <?php echo e(__('global.users_list')); ?> / </span>
        <?php echo e(__('global.edit')); ?> : <?php echo e($user->name); ?>

    </h4>
    <div class="card">
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('admin.users.update', $user)); ?>" class="pt-3">
                <?php echo method_field('PATCH'); ?>
                <?php echo csrf_field(); ?>
                <div class="form-group <?php echo e($errors->has('name') ? 'invalid' : ''); ?>">
                    <label class="form-label required" for="name"><?php echo e(trans('cruds.user.fields.name')); ?></label>
                    <input class="form-control" type="text" name="name" id="name" required
                        value="<?php echo e($user->name); ?>">
                    <div class="validation-message">
                        <?php echo e($errors->first('name')); ?>

                    </div>
                    <div class="help-block">
                        <?php echo e(trans('cruds.user.fields.name_helper')); ?>

                    </div>
                </div>
                <div class="form-group <?php echo e($errors->has('email') ? 'invalid' : ''); ?>">
                    <label class="form-label required" for="email"><?php echo e(trans('cruds.user.fields.email')); ?></label>
                    <input class="form-control" type="email" name="email" id="email" required
                        value="<?php echo e($user->email); ?>">
                    <div class="validation-message">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                    <div class="help-block">
                        <?php echo e(trans('cruds.user.fields.email_helper')); ?>

                    </div>
                </div>
                <div class="form-group <?php echo e($errors->has('password') ? 'invalid' : ''); ?>">
                    <label class="form-label" for="password"><?php echo e(trans('cruds.user.fields.password')); ?></label>
                    <input class="form-control" type="password" name="password" id="password">
                    <div class="validation-message">
                        <?php echo e($errors->first('password')); ?>

                    </div>
                    <div class="help-block">
                        <?php echo e(trans('cruds.user.fields.password_helper')); ?>

                    </div>
                </div>
                <div class="form-group <?php echo e($errors->has('roles') ? 'invalid' : ''); ?>">

                    <div class="form-group mb-3 <?php echo e($errors->has('roles') ? 'invalid' : ''); ?>">
                        <label class="form-label required" for="roles"><?php echo e(trans('cruds.user.fields.roles')); ?></label>
                        <select class="select2 form-control" name="roles[]" multiple>
                            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e(in_array($key, $roles) ? 'selected' : ''); ?> value="<?php echo e($key); ?>">
                                    <?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="validation-message">
                            <?php echo e($errors->first('roles')); ?>

                        </div>
                        <div class="help-block">
                            <?php echo e(trans('cruds.user.fields.roles_helper')); ?>

                        </div>
                    </div>

                    <div class="validation-message">
                        <?php echo e($errors->first('roles')); ?>

                    </div>
                    <div class="help-block">
                        <?php echo e(trans('cruds.user.fields.roles_helper')); ?>

                    </div>
                </div>


                <div class="form-group">
                    <button class="btn btn-primary mr-2" type="submit">
                        <?php echo e(trans('global.save')); ?>

                    </button>
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-secondary">
                        <?php echo e(trans('global.cancel')); ?>

                    </a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/admin/user/edit.blade.php ENDPATH**/ ?>