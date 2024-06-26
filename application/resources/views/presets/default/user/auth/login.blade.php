@extends($activeTemplate.'layouts.frontend')
@section('content')
    <div class="border-bottom shadow-sm">
        <nav class="navbar navbar-light py-2">
            <div class="container justify-content-center justify-content-lg-between">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{ getImage('assets/images/general/logo.png') }}" alt="logo" class="d-inline-block
                    align-text-top" />
                </a>
                <span class="navbar-text">
                  @lang('Don\'t have an account?')
                  <a href="{{route('user.register')}}">@lang('Sign Up')</a>
               </span>
            </div>
        </nav>
    </div>

    <main>
        <!-- section -->
        <section class="my-lg-14 my-8">
            <div class="container">
                <!-- row -->
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                        <!-- img -->
                        <img src="{{asset('assets/images/signin.png')}}" alt="signin" class="img-fluid" />
                    </div>
                    <!-- col -->
                    <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                        <div class="mb-lg-9 mb-5">
                            <h1 class="mb-1 h2 fw-bold">@lang('Sign in to') {{$general->site_name}}</h1>
                            <p>@lang('Welcome back to'.' '. $general->site_name.' '. 'Enter your email to get started.')</p>
                        </div>

                        <form method="POST" action="{{ route('user.login') }}" class="verify-gcaptcha
                        needs-validation" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="formSigninEmail" class="form-label visually-hidden">@lang('Username')</label>
                                    <input type="text" class="form-control" name="username" id="formSigninEmail" value="{{ old('username') }}"
                                           placeholder="Enter Username" required />
                                    <div class="invalid-feedback">@lang('Please enter username.')</div>
                                </div>
                                <div class="col-12">
                                    <!-- input -->
                                    <div class="password-field position-relative">
                                        <label for="formSigninPassword" class="form-label visually-hidden">@lang('Password')</label>
                                        <div class="password-field position-relative">
                                            <input type="password" name="password" class="form-control fakePassword"
                                                   id="formSigninPassword" placeholder="*****" required />
                                            <span><i class="bi bi-eye-slash passwordToggler"></i></span>
                                            <div class="invalid-feedback">@lang('Please enter password.')</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <!-- form check -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                        <!-- label -->
                                        <label class="form-check-label" for="flexCheckDefault">@lang('Remember me')
                                        </label>
                                    </div>
                                    <div>
                                        @lang('Forgot password?')
                                        <a href="{{ route('user.password.request') }}">@lang('Reset It')</a>
                                    </div>
                                </div>
                                <!-- btn -->
                                <div class="col-12 d-grid"><button type="submit" class="btn btn-primary">@lang('Sign In')
                                    </button></div>
                                <!-- link -->
                                <div>
                                    @lang('Don\’t have an account?')
                                    <a href="{{route('user.register')}}">@lang('Sign Up')</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
