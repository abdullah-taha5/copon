<?php $__env->startSection('content'); ?>
<div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Login -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center mb-4 mt-2">
            <a href="<?php echo e(url('/')); ?>" class="app-brand-link gap-2">
              <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" width="200px">
            </a>
          </div>
          <!-- /Logo -->
          <form id="formAuthentication" class="mb-3" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
              <label for="email" class="form-label"><?php echo e(__('global.login_email')); ?></label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="<?php echo e(__('global.login_email')); ?>"
                autofocus />
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">
                    <?php echo e(__('global.forgot_password')); ?>

                </label>
                <a href="<?php echo e(route('password.request')); ?>">
                    <small><?php echo e(__('global.forgot_password')); ?></small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  id="password"
                  class="form-control"
                  name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password" />
                <span class="input-group-text cursor-pointer">
                    <i class="ti ti-eye-off"></i>
                </span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember-me" <?php echo e(old('remember') ? 'checked' : ''); ?>/>
                <label class="form-check-label" for="remember-me"> 
                    <?php echo e(__('global.remember_me')); ?>    
                </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit"><?php echo e(__('global.login')); ?></button>
            </div>
          </form>

        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
  <?php $__env->startPush('scripts'); ?>
  <script src="<?php echo e(asset('assets/js/pages-auth.js')); ?>"></script>
  <?php $__env->stopPush(); ?>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/auth/login.blade.php ENDPATH**/ ?>