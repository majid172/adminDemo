<!doctype html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ $general->siteName(__($pageTitle)) }}</title>
    @include('includes.seo')
    <link href="{{ asset('assets/common/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/common/css/line-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/custom.css')}}">

    <link href="{{asset($activeTemplateTrue.'libs/slick-carousel/slick/slick.css')}}" rel="stylesheet" />
    <link href="{{asset($activeTemplateTrue.'libs/slick-carousel/slick/slick-theme.css')}}" rel="stylesheet" />
    <link href="{{asset($activeTemplateTrue.'libs/tiny-slider/dist/tiny-slider.css')}}" rel="stylesheet" />

    <link href="{{asset($activeTemplateTrue.'libs/bootstrap-icons/font/bootstrap-icons.min.css')}}" rel="stylesheet" />
    <link href="{{asset($activeTemplateTrue.'libs/feather-webfont/dist/feather-icons.css')}}" rel="stylesheet" />
    <link href="{{asset($activeTemplateTrue.'libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/theme.min.css')}}" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>

    @stack('style-lib')

    @stack('style')
    <style>
        .cookies-card {
            position: fixed;
            bottom: 16px;
            width: 40%;
            padding: 20px;
            background: #fff;
            border: 2px solid #108ce6;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            right: 16px;
            z-index: 99;
            border: 2px solid #108ce6;
        }
        .dark-mode .cookies-card {
            background: #2d3748;
            border: 1px solid #404040;
        }
        @media (max-width:576px) {
            .cookies-card {
                width: 90%;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'css/color.php') }}?color={{ $general->base_color }}&secondColor={{ $general->secondary_color }}">
</head>
<body>

@stack('fbComment')
<main>
    @yield('content')
</main>

@include($activeTemplate.'includes.footer')
@php
    $cookie = App\Models\Frontend::where('data_keys','cookie.data')->first();
@endphp
@if(($cookie->data_values->status == 1) && !\Cookie::get('gdpr_cookie'))
    <!-- cookies dark version start -->
    <div class="cookies-card text-center hide">
        <div class="cookies-card__icon bg--base">
            <i class="las la-cookie-bite"></i>
        </div>
        <p class="mt-4 cookies-card__content">{{ $cookie->data_values->short_desc }} <a href="{{ route('cookie.policy') }}" target="_blank">@lang('learn more')</a></p>
        <div class="cookies-card__btn mt-4">
            <a href="javascript:void(0)" class="btn btn--base w-100 policy">@lang('Allow')</a>
        </div>
    </div>
    <!-- cookies dark version end -->
@endif


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/common/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/common/js/bootstrap.bundle.min.js')}}"></script>

@stack('script-lib')

@stack('script')

@include('includes.plugins')

@include('includes.notify')


<script>
    (function ($) {
        "use strict";
        $(".langSel").on("change", function() {
            window.location.href = "{{route('home')}}/change/"+$(this).val() ;
        });

        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
            matched = event.matches;
            if(matched){
                $('body').addClass('dark-mode');
                $('.navbar').addClass('navbar-dark');
            }else{
                $('body').removeClass('dark-mode');
                $('.navbar').removeClass('navbar-dark');
            }
        });

        let matched = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if(matched){
            $('body').addClass('dark-mode');
            $('.navbar').addClass('navbar-dark');
        }else{
            $('body').removeClass('dark-mode');
            $('.navbar').removeClass('navbar-dark');
        }

        var inputElements = $('input,select');
        $.each(inputElements, function (index, element) {
            element = $(element);
            element.closest('.form-group').find('label').attr('for',element.attr('name'));
            element.attr('id',element.attr('name'))
        });

        $('.policy').on('click',function(){
            $.get('{{route('cookie.accept')}}', function(response){
                $('.cookies-card').addClass('d-none');
            });
        });

        setTimeout(function(){
            $('.cookies-card').removeClass('hide')
        },2000);

        var inputElements = $('[type=text],select,textarea');
        $.each(inputElements, function (index, element) {
            element = $(element);
            element.closest('.form-group').find('label').attr('for',element.attr('name'));
            element.attr('id',element.attr('name'))
        });

        $.each($('input, select, textarea'), function (i, element) {

            if (element.hasAttribute('required')) {
                $(element).closest('.form-group').find('label').addClass('required');
            }

        });

    })(jQuery);
</script>
<script src="{{asset($activeTemplateTrue.'libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'libs/simplebar/dist/simplebar.min.js')}}"></script>

<!-- Theme JS -->
<script src="{{asset($activeTemplateTrue.'js/theme.min.js')}}"></script>

<script src="{{asset($activeTemplateTrue.'js/vendors/jquery.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/vendors/countdown.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'libs/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/vendors/slick-slider.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'libs/tiny-slider/dist/min/tiny-slider.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/vendors/tns-slider.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/vendors/zoom.js')}}"></script>
</body>
</html>
