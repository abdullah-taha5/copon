<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-3">
            <?php $__currentLoopData = $course->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <div class="card-body">
                    <?php if($lesson->iframe != null): ?>
                        <?php echo $lesson->iframe; ?>

                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
    </div>

    <?php $__env->startPush('styles'); ?>
    <style>
        iframe {
            width: 100%;
        }
    </style>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/admin/singlee.blade.php ENDPATH**/ ?>