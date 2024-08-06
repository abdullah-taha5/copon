<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group <?php echo e($errors->has('lesson.course_id') ? 'invalid' : ''); ?>">
        <label class="form-label required" for="course"><?php echo e(trans('cruds.lesson.fields.course')); ?></label>
        <?php if (isset($component)) { $__componentOriginal93dc7e40dea6cee167a9b0a1adfe85d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal93dc7e40dea6cee167a9b0a1adfe85d1 = $attributes; } ?>
<?php $component = App\View\Components\SelectList::resolve(['options' => $this->listsForFields['course']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SelectList::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-control','required' => true,'id' => 'course','name' => 'course','wire:model' => 'lesson.course_id']); ?>
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
            <?php echo e($errors->first('lesson.course_id')); ?>

        </div>
        <div class="help-block">
            <?php echo e(trans('cruds.lesson.fields.course_helper')); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('lesson.title') ? 'invalid' : ''); ?>">
        <label class="form-label required" for="title"><?php echo e(trans('cruds.lesson.fields.title')); ?></label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="lesson.title">
        <div class="validation-message">
            <?php echo e($errors->first('lesson.title')); ?>

        </div>
        <div class="help-block">
            <?php echo e(trans('cruds.lesson.fields.title_helper')); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('mediaCollections.lesson_thumbnail') ? 'invalid' : ''); ?>">
        <label class="form-label" for="thumbnail"><?php echo e(trans('cruds.lesson.fields.thumbnail')); ?></label>
        <?php if (isset($component)) { $__componentOriginal6f74d80eeb6701d3109b6a080545c001 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6f74d80eeb6701d3109b6a080545c001 = $attributes; } ?>
<?php $component = App\View\Components\Dropzone::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropzone'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dropzone::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'thumbnail','name' => 'thumbnail','action' => ''.e(route('admin.lessons.storeMedia')).'','collection-name' => 'lesson_thumbnail','max-file-size' => '2','max-width' => '4096','max-height' => '4096']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6f74d80eeb6701d3109b6a080545c001)): ?>
<?php $attributes = $__attributesOriginal6f74d80eeb6701d3109b6a080545c001; ?>
<?php unset($__attributesOriginal6f74d80eeb6701d3109b6a080545c001); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6f74d80eeb6701d3109b6a080545c001)): ?>
<?php $component = $__componentOriginal6f74d80eeb6701d3109b6a080545c001; ?>
<?php unset($__componentOriginal6f74d80eeb6701d3109b6a080545c001); ?>
<?php endif; ?>
        <div class="validation-message">
            <?php echo e($errors->first('mediaCollections.lesson_thumbnail')); ?>

        </div>
        <div class="help-block">
            <?php echo e(trans('cruds.lesson.fields.thumbnail_helper')); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('lesson.short_text') ? 'invalid' : ''); ?>">
        <label class="form-label" for="short_text"><?php echo e(trans('cruds.lesson.fields.short_text')); ?></label>
        <textarea class="form-control" name="short_text" id="short_text" wire:model.defer="lesson.short_text" rows="4"></textarea>
        <div class="validation-message">
            <?php echo e($errors->first('lesson.short_text')); ?>

        </div>
        <div class="help-block">
            <?php echo e(trans('cruds.lesson.fields.short_text_helper')); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('lesson.long_text') ? 'invalid' : ''); ?>">
        <label class="form-label" for="long_text"><?php echo e(trans('cruds.lesson.fields.long_text')); ?></label>
        <textarea class="form-control" name="long_text" id="long_text" wire:model.defer="lesson.long_text" rows="4"></textarea>
        <div class="validation-message">
            <?php echo e($errors->first('lesson.long_text')); ?>

        </div>
        <div class="help-block">
            <?php echo e(trans('cruds.lesson.fields.long_text_helper')); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('mediaCollections.lesson_video') ? 'invalid' : ''); ?>">
        <label class="form-label" for="video"><?php echo e(trans('cruds.lesson.fields.video')); ?></label>
        <?php if (isset($component)) { $__componentOriginal6f74d80eeb6701d3109b6a080545c001 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6f74d80eeb6701d3109b6a080545c001 = $attributes; } ?>
<?php $component = App\View\Components\Dropzone::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropzone'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dropzone::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'video','name' => 'video','action' => ''.e(route('admin.lessons.storeMedia')).'','collection-name' => 'lesson_video','max-file-size' => '2','max-files' => '1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6f74d80eeb6701d3109b6a080545c001)): ?>
<?php $attributes = $__attributesOriginal6f74d80eeb6701d3109b6a080545c001; ?>
<?php unset($__attributesOriginal6f74d80eeb6701d3109b6a080545c001); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6f74d80eeb6701d3109b6a080545c001)): ?>
<?php $component = $__componentOriginal6f74d80eeb6701d3109b6a080545c001; ?>
<?php unset($__componentOriginal6f74d80eeb6701d3109b6a080545c001); ?>
<?php endif; ?>
        <div class="validation-message">
            <?php echo e($errors->first('mediaCollections.lesson_video')); ?>

        </div>
        <div class="help-block">
            <?php echo e(trans('cruds.lesson.fields.video_helper')); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('lesson.position') ? 'invalid' : ''); ?>">
        <label class="form-label" for="position"><?php echo e(trans('cruds.lesson.fields.position')); ?></label>
        <input class="form-control" type="number" name="position" id="position" wire:model.defer="lesson.position" step="1">
        <div class="validation-message">
            <?php echo e($errors->first('lesson.position')); ?>

        </div>
        <div class="help-block">
            <?php echo e(trans('cruds.lesson.fields.position_helper')); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('lesson.is_published') ? 'invalid' : ''); ?>">
        <input class="form-control" type="checkbox" name="is_published" id="is_published" wire:model.defer="lesson.is_published">
        <label class="form-label inline ml-1" for="is_published"><?php echo e(trans('cruds.lesson.fields.is_published')); ?></label>
        <div class="validation-message">
            <?php echo e($errors->first('lesson.is_published')); ?>

        </div>
        <div class="help-block">
            <?php echo e(trans('cruds.lesson.fields.is_published_helper')); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('lesson.is_free') ? 'invalid' : ''); ?>">
        <input class="form-control" type="checkbox" name="is_free" id="is_free" wire:model.defer="lesson.is_free">
        <label class="form-label inline ml-1" for="is_free"><?php echo e(trans('cruds.lesson.fields.is_free')); ?></label>
        <div class="validation-message">
            <?php echo e($errors->first('lesson.is_free')); ?>

        </div>
        <div class="help-block">
            <?php echo e(trans('cruds.lesson.fields.is_free_helper')); ?>

        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            <?php echo e(trans('global.save')); ?>

        </button>
        <a href="<?php echo e(route('admin.lessons.index')); ?>" class="btn btn-secondary">
            <?php echo e(trans('global.cancel')); ?>

        </a>
    </div>
</form><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/livewire/lesson/create.blade.php ENDPATH**/ ?>