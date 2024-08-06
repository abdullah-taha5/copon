<?php $__env->startSection('content'); ?>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> /
            <?php echo e(trans('cruds.lesson.title_singular')); ?>

            <?php echo e(trans('global.list')); ?> /
        </span>
        <?php echo e(trans('global.edit')); ?>

        <?php echo e(trans('cruds.lesson.title_singular')); ?>:
        <?php echo e(trans('cruds.lesson.fields.id')); ?>

        <?php echo e($lesson->id); ?>

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
            <form action="<?php echo e(route('admin.lessons.update', $lesson)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="nav-tabs-shadow nav-align-top">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#ar-lang" aria-controls="ar-lang" aria-selected="true">عربي</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#en-lang" aria-controls="en-lang" aria-selected="false">English</button>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="ar-lang" role="tabpanel">
                            <div class="form-group mb-2 <?php echo e($errors->has('title_ar') ? 'invalid' : ''); ?>">
                                <label class="form-label required" for="title_ar"><?php echo e(trans('cruds.course.fields.title')); ?>

                                    (عربي)</label>
                                <input class="form-control" type="text" name="title_ar" id="title_ar" required
                                    value="<?php echo e($lesson->translate('ar')->title); ?>">
                                <div class="validation-message">
                                    <?php echo e($errors->first('title_ar')); ?>

                                </div>
                                <div class="help-block">
                                    <?php echo e(trans('cruds.lesson.fields.title_helper')); ?>

                                </div>
                            </div>
                            <div class="form-group mb-2 <?php echo e($errors->has('short_text_ar') ? 'invalid' : ''); ?>">
                                <label class="form-label required"
                                    for="short_text_ar"><?php echo e(trans('cruds.lesson.fields.short_text')); ?> (عربي)</label>
                                <textarea class="form-control" name="short_text_ar" id="short_text_ar" required rows="4"><?php echo e($lesson->translate('ar')->short_text); ?></textarea>
                                <div class="validation-message">
                                    <?php echo e($errors->first('short_text_ar')); ?>

                                </div>
                                <div class="help-block">
                                    <?php echo e(trans('cruds.lesson.fields.short_text_helper')); ?>

                                </div>
                            </div>
                            <div class="form-group mb-2 <?php echo e($errors->has('long_text_ar') ? 'invalid' : ''); ?>">
                                <label class="form-label required"
                                    for="long_text_ar"><?php echo e(trans('cruds.lesson.fields.short_text')); ?> (عربي)</label>
                                <textarea class="form-control" name="long_text_ar" id="long_text_ar" required rows="6"><?php echo e($lesson->translate('ar')->long_text); ?></textarea>
                                <div class="validation-message">
                                    <?php echo e($errors->first('long_text_ar')); ?>

                                </div>
                                <div class="help-block">
                                    <?php echo e(trans('cruds.lesson.fields.short_text_helper')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="en-lang" role="tabpanel">
                            <div class="form-group mb-2 <?php echo e($errors->has('title_en') ? 'invalid' : ''); ?>">
                                <label class="form-label required" for="title_en"><?php echo e(trans('cruds.lesson.fields.title')); ?>

                                    (English)</label>
                                <input class="form-control" type="text" name="title_en" id="title_en" required
                                    value="<?php echo e($lesson->translate('en')->title); ?>">
                                <div class="validation-message">
                                    <?php echo e($errors->first('title_en')); ?>

                                </div>
                                <div class="help-block">
                                    <?php echo e(trans('cruds.lesson.fields.title_helper')); ?>

                                </div>
                            </div>
                            <div class="form-group mb-2 <?php echo e($errors->has('short_text_en') ? 'invalid' : ''); ?>">
                                <label class="form-label required"
                                    for="description_ar"><?php echo e(trans('cruds.lesson.fields.short_text')); ?> (English)</label>
                                <textarea class="form-control" name="short_text_en" id="short_text_en" required rows="4"><?php echo e($lesson->translate('en')->short_text); ?></textarea>
                                <div class="validation-message">
                                    <?php echo e($errors->first('short_text_en')); ?>

                                </div>
                                <div class="help-block">
                                    <?php echo e(trans('cruds.lesson.fields.short_text_helper')); ?>

                                </div>
                            </div>
                            <div class="form-group mb-2 <?php echo e($errors->has('long_text_en') ? 'invalid' : ''); ?>">
                                <label class="form-label required"
                                    for="long_text_en"><?php echo e(trans('cruds.lesson.fields.short_text')); ?> (عربي)</label>
                                <textarea class="form-control" name="long_text_en" id="long_text_en" required rows="6"><?php echo e($lesson->translate('en')->long_text); ?></textarea>
                                <div class="validation-message">
                                    <?php echo e($errors->first('long_text_en')); ?>

                                </div>
                                <div class="help-block">
                                    <?php echo e(trans('cruds.lesson.fields.short_text_helper')); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="form-group <?php echo e($errors->has('course_id') ? 'invalid' : ''); ?>">
                            <label class="form-label required"
                                for="course"><?php echo e(trans('cruds.lesson.fields.course')); ?></label>
                            <select id="select2Basic" class="select2 form-select form-select-lg" name="course_id" data-allow-clear="true">
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e($key == $lesson->course_id ? 'selected' : ''); ?>><?php echo e($value); ?></option>
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
                                <div
                                    class="marketopia-zone <?php echo e($errors->has('mediaCollections.lesson_thumbnail') ? 'invalid' : ''); ?>">
                                    <input type="file" name="thumbnail" class="file-input">
                                    <div class="dz-message">
                                        <?php echo e(trans('cruds.lesson.fields.thumbnail')); ?>

                                        <span class="note">Drop files here or click to upload</span>
                                    </div>
                                    <div class="dz-images" id="dz-images"></div>
                                </div>
                                <div class="validation-message">
                                    <?php echo e($errors->first('mediaCollections.lesson_thumbnail')); ?>

                                </div>
                                <div class="help-block">
                                    <?php echo e(trans('cruds.lesson.fields.thumbnail_helper')); ?>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div
                                    class="marketopia-zone <?php echo e($errors->has('mediaCollections.lesson_video') ? 'invalid' : ''); ?>">
                                    <input type="file" name="video" class="file-input">
                                    <div class="dz-message">
                                        <?php echo e(trans('cruds.lesson.fields.video')); ?>

                                        <span class="note">Drop files here or click to upload</span>
                                    </div>
                                    <div class="dz-images" id="dz-images"></div>
                                </div>
                                <div class="validation-message">
                                    <?php echo e($errors->first('mediaCollections.lesson_video')); ?>

                                </div>
                                <div class="help-block">
                                    <?php echo e(trans('cruds.lesson.fields.video_helper')); ?>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group <?php echo e($errors->has('iframe') ? 'invalid' : ''); ?>">
                            <label class="form-label" for="iframe"><?php echo e(trans('cruds.lesson.fields.iframe')); ?></label>
                            <textarea class="form-control" name="iframe" id="iframe" rows="4"><?php echo e($lesson->iframe); ?></textarea>
                            <div class="validation-message">
                                <?php echo e($errors->first('iframe')); ?>

                            </div>
                            <div class="help-block">
                                <?php echo e(trans('cruds.lesson.fields.position_helper')); ?>

                            </div>
                        </div>
                        <br>
                        <div class="form-group <?php echo e($errors->has('position') ? 'invalid' : ''); ?>">
                            <label class="form-label" for="position"><?php echo e(trans('cruds.lesson.fields.position')); ?></label>
                            <input class="form-control" type="number" name="position" id="position"
                                value="<?php echo e($lesson->position); ?>" step="1">
                            <div class="validation-message">
                                <?php echo e($errors->first('position')); ?>

                            </div>
                            <div class="help-block">
                                <?php echo e(trans('cruds.lesson.fields.position_helper')); ?>

                            </div>
                        </div>
                        <br><br>
                        <div class="form-group <?php echo e($errors->has('lesson.is_published') ? 'invalid' : ''); ?>">

                            <label class="switch switch-primary">
                                <input type="checkbox" class="switch-input" checked="" name="is_published"
                                    id="is_published">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="ti ti-check"></i>
                                    </span>
                                    <span class="switch-off">
                                        <i class="ti ti-x"></i>
                                    </span>
                                </span>
                                <span class="switch-label"><?php echo e(trans('cruds.lesson.fields.is_published')); ?></span>
                            </label>
                            <div class="validation-message">
                                <?php echo e($errors->first('is_published')); ?>

                            </div>
                            <div class="help-block">
                                <?php echo e(trans('cruds.lesson.fields.is_published_helper')); ?>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="btn btn-primary mr-2" type="submit">
                                <?php echo e(trans('global.save')); ?>

                            </button>
                            <a href="<?php echo e(route('admin.lessons.index')); ?>" class="btn btn-secondary">
                                <?php echo e(trans('global.cancel')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </form>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/admin/lesson/edit.blade.php ENDPATH**/ ?>