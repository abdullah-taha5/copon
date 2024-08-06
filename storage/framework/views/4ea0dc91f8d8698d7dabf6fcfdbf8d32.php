<?php $__env->startSection('content'); ?>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> /
            <?php echo e(trans('cruds.lesson.title_singular')); ?>

        </span>
        <?php echo e(__('global.my_profile')); ?>

    </h4>
    <form wire:submit.prevent="updateProfileInformation" class="w-full">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <?php echo e(__('global.profile_information')); ?>

                </h5>
            </div>
            <div class="card-body">
                <div class="form-group px-4">
                    <label class="form-label" for="name"><?php echo e(__('global.user_name')); ?></label>
                    <input class="form-control" id="name" type="text" autocomplete="name">
                    <?php $__errorArgs = ['state.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
    
                <div class="form-group px-4">
                    <label class="form-label" for="email"><?php echo e(__('global.login_email')); ?></label>
                    <input class="form-control" id="email" type="text" name="email" autocomplete="email">
                    <?php $__errorArgs = ['state.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary mr-3">
                    <?php echo e(__('global.save')); ?>

                </button>
            </div>
        </div>
    </form>
    <hr class="mt-6 border-b-1 border-blueGray-300">
    <form class="w-full">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                <?php echo e(__('global.update')); ?> <?php echo e(__('global.login_password')); ?>

            </h5>
        </div>
        <div class="card-body">
            <div class="form-group px-4">
                <label class="form-label" for="current_password"><?php echo e(__('global.current_password')); ?></label>
                <input class="form-control" id="current_password" type="password" wire:model.defer="state.current_password" autocomplete="current-password">
                <?php $__errorArgs = ['state.current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group px-4">
                <label class="form-label" for="new_password"><?php echo e(__('global.new_password')); ?></label>
                <input class="form-control" id="new_password" type="password" wire:model.defer="state.password" autocomplete="new-password">
                <?php $__errorArgs = ['state.password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group px-4">
                <label class="form-label" for="password_confirmation"><?php echo e(__('global.confirm_password')); ?></label>
                <input class="form-control" id="password_confirmation" type="password" wire:model.defer="state.password_confirmation" autocomplete="new-password">
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary mr-3">
                <?php echo e(__('global.save')); ?>

            </button>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/profile/show.blade.php ENDPATH**/ ?>