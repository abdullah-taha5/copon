<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand">
        <a href="<?php echo e(route('admin.home')); ?>" class="app-brand-link">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" width="200px">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        

        <li class="menu-item <?php echo e(request()->is('admin') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.home')); ?>" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">
                    <?php echo e(trans('global.dashboard')); ?>

                </div>
            </a>
        </li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
            
            <li
                class="menu-item <?php echo e(request()->is('admin/permissions*') || request()->is('admin/roles*') || request()->is('admin/users*') ? 'active open' : ''); ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-key"></i>
                    <div>
                        <?php echo e(trans('cruds.userManagement.title')); ?>

                    </div>
                </a>
                <ul class="menu-sub">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                        <li class="menu-item <?php echo e(request()->is('admin/permissions*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.permissions.index')); ?>" class="menu-link">
                                <div>
                                    <?php echo e(trans('cruds.permission.title')); ?>

                                </div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                        <li class="menu-item <?php echo e(request()->is('admin/roles*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.roles.index')); ?>" class="menu-link">
                                <div>
                                    <?php echo e(trans('cruds.role.title')); ?>

                                </div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                        <li class="menu-item <?php echo e(request()->is('admin/users*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.users.index')); ?>" class="menu-link">
                                <div>
                                    <?php echo e(trans('cruds.user.title')); ?>

                                </div>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_access')): ?>
            <li
                class="menu-item <?php echo e(request()->is('admin/courses*') || request()->is('admin/lessons*') || request()->is('admin/users*') ? 'active open' : ''); ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-video"></i>
                    <div>
                        <?php echo e(trans('cruds.course.title')); ?>

                    </div>
                </a>
                <ul class="menu-sub">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_access')): ?>
                        <li class="menu-item <?php echo e(request()->is('admin/courses*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.courses.index')); ?>" class="menu-link">
                                <div>
                                    <?php echo e(trans('cruds.course.title')); ?>

                                </div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lesson_access')): ?>
                        <li class="menu-item <?php echo e(request()->is('admin/lessons*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.lessons.index')); ?>" class="menu-link">
                                <div>
                                    <?php echo e(trans('cruds.lesson.title')); ?>

                                </div>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon_access')): ?>
            <li class="menu-item <?php echo e(request()->is('admin/coupons*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.coupons.index')); ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-ticket"></i>
                    <div>
                        <?php echo e(trans('cruds.coupon.title')); ?>

                    </div>
                </a>
            </li>
        <?php endif; ?>
        <?php if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('auth_profile_edit')): ?>
                <li class="menu-item <?php echo e(request()->is('profile') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('profile.show')); ?>" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user-edit"></i>
                        <div>
                            <?php echo e(trans('global.my_profile')); ?>

                        </div>
                    </a>
                </li>
            <?php endif; ?>
        <?php endif; ?>
        <li class="menu-item">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                class="menu-link">
                <i class="menu-icon tf-icons ti ti-logout"></i>
                <div>
                  <?php echo e(trans('global.logout')); ?>

                </div>
                
            </a>
        </li>
    </ul>
</aside>
<form action="<?php echo e(route('logout')); ?>" method="POST" id="logoutform">
<?php echo csrf_field(); ?>
</form><?php /**PATH /home/omar/omar/Marketopia/copon/resources/views/components/sidebar.blade.php ENDPATH**/ ?>