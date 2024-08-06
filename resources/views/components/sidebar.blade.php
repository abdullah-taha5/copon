<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand">
        <a href="{{ route('admin.home') }}" class="app-brand-link">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="200px">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        {{-- --}}

        <li class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">
                    {{ trans('global.dashboard') }}
                </div>
            </a>
        </li>
        @can('user_management_access')
            {{--  --}}
            <li
                class="menu-item {{ request()->is('admin/permissions*') || request()->is('admin/roles*') || request()->is('admin/users*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-key"></i>
                    <div>
                        {{ trans('cruds.userManagement.title') }}
                    </div>
                </a>
                <ul class="menu-sub">
                    @can('permission_access')
                        <li class="menu-item {{ request()->is('admin/permissions*') ? 'active' : '' }}">
                            <a href="{{ route('admin.permissions.index') }}" class="menu-link">
                                <div>
                                    {{ trans('cruds.permission.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="menu-item {{ request()->is('admin/roles*') ? 'active' : '' }}">
                            <a href="{{ route('admin.roles.index') }}" class="menu-link">
                                <div>
                                    {{ trans('cruds.role.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="menu-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                            <a href="{{ route('admin.users.index') }}" class="menu-link">
                                <div>
                                    {{ trans('cruds.user.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('course_access')
            <li
                class="menu-item {{ request()->is('admin/courses*') || request()->is('admin/lessons*') || request()->is('admin/users*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-video"></i>
                    <div>
                        {{ trans('cruds.course.title') }}
                    </div>
                </a>
                <ul class="menu-sub">
                    @can('course_access')
                        <li class="menu-item {{ request()->is('admin/courses*') ? 'active' : '' }}">
                            <a href="{{ route('admin.courses.index') }}" class="menu-link">
                                <div>
                                    {{ trans('cruds.course.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('lesson_access')
                        <li class="menu-item {{ request()->is('admin/lessons*') ? 'active' : '' }}">
                            <a href="{{ route('admin.lessons.index') }}" class="menu-link">
                                <div>
                                    {{ trans('cruds.lesson.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('coupon_access')
            <li class="menu-item {{ request()->is('admin/coupons*') ? 'active' : '' }}">
                <a href="{{ route('admin.coupons.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-ticket"></i>
                    <div>
                        {{ trans('cruds.coupon.title') }}
                    </div>
                </a>
            </li>
        @endcan
        @if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
            @can('auth_profile_edit')
                <li class="menu-item {{ request()->is('profile') ? 'active' : '' }}">
                    <a href="{{ route('profile.show') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user-edit"></i>
                        <div>
                            {{ trans('global.my_profile') }}
                        </div>
                    </a>
                </li>
            @endcan
        @endif
        <li class="menu-item">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                class="menu-link">
                <i class="menu-icon tf-icons ti ti-logout"></i>
                <div>
                  {{ trans('global.logout') }}
                </div>
                
            </a>
        </li>
    </ul>
</aside>
<form action="{{ route('logout') }}" method="POST" id="logoutform">
@csrf
</form>