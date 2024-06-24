@extends($activeTemplate.'layouts.master')

@section('content')
    <section>
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                @include($activeTemplate.'user.order.sidebar')
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="py-6 p-md-6 p-lg-10">
                        <div class="mb-6">
                            <!-- heading -->
                            <h2 class="mb-0">@lang($pageTitle)</h2>
                        </div>
                        <div class="pe-lg-14">
                            <!-- heading -->
                            <h5 class="mb-4">@lang('Password')</h5>
                            <form class="row row-cols-1 row-cols-lg-2" action="" method="POST">
                                @csrf
                                <div class="mb-3 col">
                                    <label class="form-label">@lang('Current Password')</label>
                                    <input type="password" class="form-control" placeholder="**********"
                                           name="current_password" required autocomplete="current-password">
                                </div>

                                <div class="mb-3 col">
                                    <label class="form-label">@lang('New Password')</label>
                                    <input type="password" class="form-control" placeholder="**********"
                                           name="password" required autocomplete="current-password">
                                </div>

                                @if($general->secure_password)
                                    <div class="input-popup">
                                        <p class="error lower">@lang('1 small letter minimum')</p>
                                        <p class="error capital">@lang('1 capital letter minimum')</p>
                                        <p class="error number">@lang('1 number minimum')</p>
                                        <p class="error special">@lang('1 special character minimum')</p>
                                        <p class="error minimum">@lang('6 character password')</p>
                                    </div>
                                @endif

                                <div class="mb-3 col">
                                    <label class="form-label">@lang('Confirm Password')</label>
                                    <input type="password" class="form-control" placeholder="**********"
                                           name="password_confirmation" required autocomplete="current-password">
                                </div>

                                <div class="mb-3 col">
                                </div>
                                <div class="mb-3 col">
                                        <p class="mb-4">
                                            @lang('Can’t remember your current password?')
                                            <a href="{{route('user.password.request')}}">@lang('Reset your password.')</a>
                                        </p>
                                    </div>

                                <div class="mb-3 col">
                                </div>
                                <div class="mb-3 col">
                                    <button type="submit" class="btn btn-primary w-50">@lang('Save Password')</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>




@endsection
@push('script-lib')
<script src="{{ asset('assets/common/js/secure_password.js') }}"></script>
@endpush
@push('script')
<script>
    (function ($) {
        "use strict";
        @if ($general -> secure_password)
            $('input[name=password]').on('input', function () {
                secure_password($(this));
            });

        $('[name=password]').focus(function () {
            $(this).closest('.form-group').addClass('hover-input-popup');
        });

        $('[name=password]').focusout(function () {
            $(this).closest('.form-group').removeClass('hover-input-popup');
        });

        @endif
    })(jQuery);
</script>
@endpush
