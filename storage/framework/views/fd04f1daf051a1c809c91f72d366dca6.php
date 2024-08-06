<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group <?php echo e($errors->has('role.title') ? 'invalid' : ''); ?>">
        <label class="form-label required" for="title"><?php echo e(trans('cruds.role.fields.title')); ?></label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="role.title">
        <div class="validation-message">
            <?php echo e($errors->first('role.title')); ?>

        </div>
        <div class="help-block">
            <?php echo e(trans('cruds.role.fields.title_helper')); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('permissions') ? 'invalid' : ''); ?>">
        <label class="form-label required" for="permissions"><?php echo e(trans('cruds.role.fields.permissions')); ?></label>
        <?php if (isset($component)) { $__componentOriginal93dc7e40dea6cee167a9b0a1adfe85d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal93dc7e40dea6cee167a9b0a1adfe85d1 = $attributes; } ?>
<?php $component = App\View\Components\SelectList::resolve(['options' => $this->listsForFields['permissions']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SelectList::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-control','required' => true,'id' => 'permissions','name' => 'permissions','wire:model' => 'permissions','multiple' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal93dc7e40dea6cee167a9b0a1adfe85d1)): ?>
<?php $attributes = $__attributesOriginal93dc7e40dea6cee167a9b0a1adfe85d1; ?>
<?php unset($__attributesOriginal93dc7e40dea6cee167a9b0a1adfe85d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal93dc7e40dea6cee167a9b0a1adfe85d1)): ?>
<?php $component = $__componentOriginal93dc7e40dea6cee167a9b0a1adfe85d1; ?>
<?php unset($__componentOriginal93dc7e40dea6cee167a9b0a1adfe85d1); ?>
<?php endif; ?>
        <div class="validation-message">
            <?php echo e($errors->first('permissions')); ?>

        </div>
        <div class="help-block">
            <?php echo e(trans('cruds.role.fields.permissions_helper')); ?>

        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            <?php echo e(trans('global.save')); ?>

        </button>
        <a href="<?php echo e(route('admin.roles.index')); ?>" class="btn btn-secondary">
            <?php echo e(trans('global.cancel')); ?>

        </a>
    </div>
</form><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/livewire/role/edit.blade.php ENDPATH**/ ?>