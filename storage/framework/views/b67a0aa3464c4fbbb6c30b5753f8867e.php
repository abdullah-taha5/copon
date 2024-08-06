<?php $__env->startSection('content'); ?>
    <div class="card p-0 mb-4">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
            <div class="app-academy-md-25 card-body py-0">
                <img src="<?php echo e(asset('assets/img/illustrations/bulb-light.png')); ?>"
                    class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand"
                    data-app-light-img="illustrations/bulb-light.png" data-app-dark-img="illustrations/bulb-dark.png"
                    height="90">
            </div>
            <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                <h3 class="card-title mb-4 lh-sm px-md-5 lh-lg">
                    <?php echo e(__('student.enter_coupon_code_to')); ?>

                    <span class="text-primary fw-medium text-nowrap"><?php echo e(__('student.open_course')); ?></span>.
                </h3>

                <div class="d-flex align-items-center justify-content-between app-academy-md-80">
                    <input type="search" placeholder="Find your course" class="form-control me-2">
                    <button type="submit" class="btn btn-primary btn-icon waves-effect waves-light"><i
                            class="ti ti-search"></i></button>
                </div>
            </div>
            <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                <img src="<?php echo e(asset('assets/img/illustrations/pencil-rocket.png')); ?>" alt="pencil rocket" height="188"
                    class="scaleX-n1-rtl">
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header d-flex flex-wrap justify-content-between gap-3">
            <div class="card-title mb-0 me-1">
                <h5 class="mb-1"><?php echo e(__('student.my_courses')); ?></h5>
                <p class="text-muted mb-0"><?php echo e(__('student.total')); ?> <?php echo e($coupons_count); ?> <?php echo e(__('student.course_you_have_purchased')); ?> </p>
            </div>
        </div>
        <div class="card-body">
            <?php if(auth()->user()->coupons != null && count(auth()->user()->coupons) > 0): ?>
                <div class="row gy-4 mb-4">
                    <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="card p-2 h-100 shadow-none border">
                                <div class="rounded-2 text-center mb-3">
                                    <a href="app-academy-course-details.html">
                                        <?php $__currentLoopData = $coupon->course->thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <img class="img-fluid" src="<?php echo e($entry['url']); ?>" alt="<?php echo e($entry['name']); ?>" />
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </a>
                                </div>
                                <div class="card-body p-3 pt-2">

                                    <a href="app-academy-course-details.html"
                                        class="h5"><?php echo e($coupon->course->title); ?></a>
                                    <p class="mt-2">
                                        <?php echo e($coupon->course->description); ?>

                                    </p>


                                    <div class="d-flex flex-column flex-md-row gap-2 text-nowrap">
                                        <a class="app-academy-md-50 btn btn-label-secondary me-md-2 d-flex align-items-center"
                                            href="app-academy-course-details.html">
                                            <i
                                                class="ti ti-rotate-clockwise-2 align-middle scaleX-n1-rtl me-2 mt-n1 ti-sm"></i><span>Start
                                                Over</span>
                                        </a>
                                        <a class="app-academy-md-50 btn btn-label-primary d-flex align-items-center"
                                            href="app-academy-course-details.html">
                                            <span class="me-2">Continue</span><i
                                                class="ti ti-chevron-right scaleX-n1-rtl ti-sm"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            
        </div>
    </div>
    <?php $__env->startPush('scripts'); ?>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/student/index.blade.php ENDPATH**/ ?>