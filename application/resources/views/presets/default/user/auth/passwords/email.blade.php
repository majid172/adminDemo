@extends($activeTemplate.'layouts.frontend')
@section('content')
    @include($activeTemplate.'includes.header')
    <section class="my-lg-14 my-8">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                    <!-- img -->
                    <img src="{{ getImage('assets/images/general/fp.png') }}"alt="forget password" class="img-fluid">
                </div>
                <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1 d-flex align-items-center">
                    <div>
                        <div class="mb-lg-9 mb-5">
                            <!-- heading -->
                            <h1 class="mb-2 h2 fw-bold">{{__($pageTitle)}}</h1>
                            <p>@lang('Please enter the email address associated with your account and We will email you a link to reset your password.')</p>
                        </div>
                        <!-- form -->

                        <form class="needs-validation" method="POST" action="{{ route('user.password.email') }}" novalidate>
                            @csrf
                            <!-- row -->
                            <div class="row g-3">
                                <!-- col -->
                                <div class="col-12">
                                    <!-- input -->
                                    <label for="formForgetEmail" class="form-label visually-hidden">@lang('Email
                                        address')</label>
                                    <input type="text" class="form-control" id="formForgetEmail" placeholder="Email or Username"name="value"
                                           value="{{ old('value') }}"
                                           required />
                                    <div class="invalid-feedback">@lang('Please enter correct password.')</div>
                                </div>

                                <!-- btn -->
                                <div class="col-12 d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">@lang('Reset Password')</button>
                                    <a href="{{ route('home') }}" class="btn btn-light">@lang('Back')</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
