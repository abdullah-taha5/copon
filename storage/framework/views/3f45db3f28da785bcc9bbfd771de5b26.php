<div>
    

    <div class="flex flex-wrap">
        <form wire:submit.prevent="updateProfileInformation" class="w-full">
            <div class="form-group px-4">
                <label class="form-label" for="name"><?php echo e(__('global.user_name')); ?></label>
                <input class="form-control" id="name" type="text" wire:model.defer="state.name" autocomplete="name">
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
                <input class="form-control" id="email" type="text" wire:model.defer="state.email" autocomplete="email">
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

            <div class="form-group px-4 flex items-center">
               

                <div >
                    <?php echo e(__('global.saved')); ?>

                </div>

            </div>
        </form>
    </div>
</div><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/livewire/update-profile-information-form.blade.php ENDPATH**/ ?>