<div>
    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
        <?php echo e(__('global.update')); ?> <?php echo e(__('global.login_password')); ?>

    </h6>

    <div class="flex flex-wrap">
        <form wire:submit.prevent="updatePassword" class="w-full">
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

            <div class="form-group px-4 flex items-center">
                <button class="btn btn-indigo mr-3">
                    <?php echo e(__('global.save')); ?>

                </button>

                <div x-data="{ shown: false, timeout: null }" x-init="window.livewire.find('<?php echo e($_instance->id); ?>').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })" x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms class="text-sm" style="display: none;">
                    <?php echo e(__('global.saved')); ?>

                </div>

            </div>
        </form>
    </div>
</div><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/livewire/update-password-form.blade.php ENDPATH**/ ?>