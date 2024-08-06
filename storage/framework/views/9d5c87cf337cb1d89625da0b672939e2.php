<?php $__env->startSection('content'); ?>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> /
            <?php echo e(trans('cruds.course.title_singular')); ?>

            <?php echo e(trans('global.list')); ?> /
        </span>
        <?php echo e(trans('global.create')); ?>

        <?php echo e(trans('cruds.course.title_singular')); ?>

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
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('admin.courses.store')); ?>" method="POST" class="pt-3"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-2 <?php echo e($errors->has('title') ? 'invalid' : ''); ?>">

                            <label class="form-label required"
                                for="title"><?php echo e(trans('cruds.course.fields.title')); ?></label>
                            <input class="form-control" type="text" name="title" id="title" required
                                value="<?php echo e(old('title')); ?>">
                            <div class="validation-message">
                                <?php echo e($errors->first('title')); ?>

                            </div>
                            <div class="help-block">
                                <?php echo e(trans('cruds.course.fields.title_helper')); ?>

                            </div>
                        </div>
                        <div class="form-group mb-2 <?php echo e($errors->has('description') ? 'invalid' : ''); ?>">
                            <label class="form-label required"
                                for="description"><?php echo e(trans('cruds.course.fields.description')); ?></label>
                            <textarea class="form-control" name="description" id="description" required rows="4"><?php echo e(old('description')); ?></textarea>
                            <div class="validation-message"><?php echo e($errors->first('description')); ?></div>
                            <div class="help-block">
                                <?php echo e(trans('cruds.course.fields.description_helper')); ?>

                            </div>
                        </div>
                        <div class="form-group mb-2 <?php echo e($errors->has('course.price') ? 'invalid' : ''); ?>">
                            <label class="form-label" for="price"><?php echo e(trans('cruds.course.fields.price')); ?></label>
                            <input class="form-control" type="number" name="price" id="price"
                                value="<?php echo e(old('price')); ?>" step="0.01">
                            <div class="validation-message">
                                <?php echo e($errors->first('course.price')); ?>

                            </div>
                            <div class="help-block">
                                <?php echo e(trans('cruds.course.fields.price_helper')); ?>

                            </div>
                        </div>

                        <div class="marketopia-zone">
                            <input type="file" name="file" class="file-input">                        
                            <div class="dz-message">
                                Thumbnail
                                <span class="note">Drop files here or click to upload</span>
                            </div>
                            <div class="dz-images" id="dz-images"></div>
                        </div>   
                        <br>
                        <div class="form-group mb-2 <?php echo e($errors->has('course.is_published') ? 'invalid' : ''); ?>">
                            <label class="switch">
                                <input type="checkbox" class="switch-input" name="is_published">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="ti ti-check"></i>
                                    </span>
                                    <span class="switch-off">
                                        <i class="ti ti-x"></i>
                                    </span>
                                </span>
                                <span class="switch-label"><?php echo e(trans('cruds.course.fields.is_published')); ?></span>
                            </label>
                            <div class="validation-message">
                                <?php echo e($errors->first('course.is_published')); ?>

                            </div>
                        </div>
                        <button class="btn btn-primary mr-2" type="submit">
                            <?php echo e(trans('global.save')); ?>

                        </button>
                        <a href="<?php echo e(route('admin.courses.index')); ?>" class="btn btn-secondary">
                            <?php echo e(trans('global.cancel')); ?>

                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('styles'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('/')); ?>assets/vendor/libs/dropzone/dropzone.css" />
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('/')); ?>assets/vendor/libs/dropzone/dropzone.js"></script>
        <script src="<?php echo e(asset('assets/js/forms-file-upload.js')); ?>"></script>
        <script src="<?php echo e(asset('js/file-upload.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/admin/course/create.blade.php ENDPATH**/ ?>