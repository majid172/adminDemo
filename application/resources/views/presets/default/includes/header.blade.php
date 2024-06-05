<div class="border-bottom shadow-sm">
    <nav class="navbar navbar-light py-2">
        <div class="container justify-content-center justify-content-lg-between">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{ getImage('assets/images/general/logo.png') }}" alt="logo"  class="d-inline-block
                align-text-top logo" height="30px;">
            </a>
            <span class="navbar-text">
                 @lang('Already have an account?')
                  <a href="{{route('user.login')}}">@lang('Sign in')</a>
               </span>
        </div>
    </nav>
</div>
