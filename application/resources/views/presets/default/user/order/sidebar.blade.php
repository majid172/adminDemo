<div class="col-lg-3 col-md-4 col-12 border-end d-none d-md-block">
    <div class="pt-10 pe-lg-10">
        <!-- nav -->
        <ul class="nav flex-column nav-pills nav-pills-dark">
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.orders.list') ? 'active' : '' }}" aria-current="page" href="{{route('user.orders.list')}}">
                    <i class="feather-icon icon-shopping-bag me-2"></i>
                    @lang('My Orders')
                </a>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.profile.setting') ? 'active' : '' }}" href="{{route('user.profile.setting')}}">
                    <i class="feather-icon icon-settings me-2"></i>
                    @lang('Settings')
                </a>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.change.password') ? 'active' : '' }}" href="{{route('user.change.password')}}">
                    <i class="feather-icon icon-key me-2"></i> @lang('Change Password')
                </a>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link" href="account-payment-method.html">
                    <i class="feather-icon icon-credit-card me-2"></i>
                    Payment Method
                </a>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link" href="account-notification.html">
                    <i class="feather-icon icon-bell me-2"></i>
                    Notification
                </a>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <hr />
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.logout') ? 'active' : '' }}" href="{{route('user.logout')
                }}">
                    <i class="feather-icon icon-log-out me-2"></i>
                    @lang('Log out')
                </a>
            </li>
        </ul>
    </div>
</div>
