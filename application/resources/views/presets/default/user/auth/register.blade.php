@extends($activeTemplate.'layouts.frontend')
@section('content')
    @php
        $policyPages = getContent('policy_pages.element',false,null,true);
    @endphp
    <div class="border-bottom shadow-sm">
        <nav class="navbar navbar-light py-2">
            <div class="container justify-content-center justify-content-lg-between">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{ getImage('assets/images/general/logo.png') }}" alt="" class="d-inline-block align-text-top" />
                </a>
                <span class="navbar-text">
                  @lang('Already have an account?')
                  <a href="{{route('user.login')}}">@lang('Sign in')</a>
               </span>
            </div>
        </nav>
    </div>

    <main>
        <!-- section -->
        <section class="my-lg-14 my-8">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                        <!-- img -->
                        <img src="../assets/images/svg-graphics/signup-g.svg" alt="" class="img-fluid">
                    </div>
                    <!-- col -->
                    <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                        <div class="mb-lg-9 mb-5">
                            <h1 class="mb-1 h2 fw-bold">@lang('Get Start Shopping')</h1>
                            <p>@lang('Welcome to FreshCart! Enter your email to get started.')</p>
                        </div>
                        <!-- form -->
                        <form class="needs-validation" novalidate="" action="{{ route('user.register') }}" method="POST">
                            @csrf

                            <div class="row g-2">
                                @if(session()->get('reference') != null)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="referenceBy" class="form-label">@lang('Reference by')</label>
                                            <input type="text" name="referBy" id="referenceBy" class="form-control form--control" value="{{session()->get('reference')}}" readonly>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <label for="formSignupfname" class="form-label visually-hidden">@lang('First Name')
                                    </label>
                                    <input type="text" class="form-control" name="fname" id="formSignupfname" placeholder="First Name" required="">
                                    <div class="invalid-feedback">@lang('Please enter first name.')</div>
                                </div>
                                    <div class="col-md-6">
                                        <!-- input -->
                                        <label for="formSignuplname" class="form-label visually-hidden">@lang('Last Name')
                                        </label>
                                        <input type="text" class="form-control" id="formSignuplname" placeholder="Last Name" name="lname" required="">
                                        <div class="invalid-feedback">@lang('Please enter last name.')</div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control form--control checkUser" name="username" value="{{ old('username') }}" required>
                                            <small class="text-danger usernameExist"></small>
                                        </div>
                                    </div>

                                <div class="col-12">
                                    <!-- input -->
                                    <label for="formSignupEmail" class="form-label visually-hidden">@lang('Email
                                        address')</label>
                                    <input type="email" class="form-control" id="formSignupEmail" placeholder="Email" value="{{ old('email') }}" name="email"
                                           required="" >
                                    <div class="invalid-feedback">@lang('Please enter email.')</div>
                                </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select name="country" class="form-control form--control">
                                                <option value="">@lang('Choose Country')</option>
                                                @foreach($countries as $key => $country)
                                                    <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group ">
                                            <span class="input-group-text mobile-code">

                                            </span>
                                                <input type="hidden" name="mobile_code">
                                                <input type="hidden" name="country_code">
                                                <input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control form--control checkUser" required>
                                            </div>
                                            <small class="text-danger mobileExist"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control form--control"
                                                   name="password" placeholder="Enter Secure Password" required>
                                            @if($general->secure_password)
                                                <div class="input-popup">
                                                    <p class="error lower">@lang('1 small letter minimum')</p>
                                                    <p class="error capital">@lang('1 capital letter minimum')</p>
                                                    <p class="error number">@lang('1 number minimum')</p>
                                                    <p class="error special">@lang('1 special character minimum')</p>
                                                    <p class="error minimum">@lang('6 character password')</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control form--control"
                                                   name="password_confirmation" placeholder="@lang('Confirm Password')"
                                                   required>
                                        </div>
                                    </div>

                                    <x-captcha></x-captcha>
                                <div class="col-12 d-grid"><button type="submit" class="btn btn-primary">@lang('Register')</button></div>
                                <p>
                                    <small>
                                        @lang('By continuing, you agree to our')
                                        <a href="javascript:void(0)">@lang('Terms of Service')</a>
                                        &amp;
                                        <a href="javascript:void(0)">@lang('Privacy Policy')</a>
                                    </small>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="existModalLongTitle">@lang('You are with us')</h5>
                    <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <i class="las la-times"></i>
        </span>
                </div>
                <div class="modal-body">
                    <h6 class="text-center">@lang('You already have an account please Login ')</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">@lang('Close')</button>
                    <a href="{{ route('user.login') }}" class="btn btn--base btn-sm">@lang('Login')</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script-lib')
    <script src="{{ asset('assets/common/js/secure_password.js') }}"></script>
@endpush
@push('script')
    <script>
        "use strict";
        (function ($) {
            @if($mobileCode)
            $(`option[data-code={{ $mobileCode }}]`).attr('selected','');
            @endif

            $('select[name=country]').change(function(){
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            @if($general->secure_password)
            $('input[name=password]').on('input',function(){
                secure_password($(this));
            });

            $('[name=password]').focus(function () {
                $(this).closest('.form-group').addClass('hover-input-popup');
            });

            $('[name=password]').focusout(function () {
                $(this).closest('.form-group').removeClass('hover-input-popup');
            });


            @endif

            $('.checkUser').on('focusout',function(e){
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {mobile:mobile,_token:token}
                }
                if ($(this).attr('name') == 'email') {
                    var data = {email:value,_token:token}
                }
                if ($(this).attr('name') == 'username') {
                    var data = {username:value,_token:token}
                }
                $.post(url,data,function(response) {
                    if (response.data != false && response.type == 'email') {
                        $('#existModalCenter').modal('show');
                    }else if(response.data != false){
                        $(`.${response.type}Exist`).text(`${response.type} already exist`);
                    }else{
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);

    </script>
@endpush
