<!doctype html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ $general->siteName(__($pageTitle)) }}</title>

    @include('includes.seo')

    <link href="{{ asset('assets/common/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/common/css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/common/css/line-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'css/custom.css') }}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/theme.min.css')}}" />

    <!-- Libs CSS -->
    <link href="{{asset($activeTemplateTrue.'libs/bootstrap-icons/font/bootstrap-icons.min.css')}}" rel="stylesheet" />
    <link href="{{asset($activeTemplateTrue.'libs/feather-webfont/dist/feather-icons.css')}}" rel="stylesheet" />
    <link href="{{asset($activeTemplateTrue.'libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/theme.min.css')}}" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    @stack('style-lib')
    @stack('style')
    <style>

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
            .logo img{
                max-width: 220px;
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
@include($activeTemplate.'includes.topbar')
@include($activeTemplate.'includes.navbar')
    <main>
        @yield('content')
    </main>
    @include($activeTemplate.'includes.footer')

    <script src="{{asset('assets/common/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/common/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset($activeTemplateTrue.'js/jquery.validate.js') }}"></script>

    @stack('script-lib')
    @include('includes.notify')
    @include('includes.plugins')
    @stack('script')

    <script>
        (function ($) {
            "use strict";
            $(".langSel").on("change", function () {
                window.location.href = "{{ route('home') }}/change/" + $(this).val();
            });

        })(jQuery);

    </script>


    <script>
        (function ($) {
            "use strict";

            $('form').on('submit', function () {
                if ($(this).valid()) {
                    $(':submit', this).attr('disabled', 'disabled');
                }
            });

            var inputElements = $('[type=text],[type=password],select,textarea');
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


            $('.showFilterBtn').on('click',function(){
                $('.responsive-filter-card').slideToggle();
            });


            let headings = $('.table th');
            let rows = $('.table tbody tr');
            let columns
            let dataLabel;

            $.each(rows, function (index, element) {
                columns = element.children;
                if (columns.length == headings.length) {
                    $.each(columns, function (i, td) {
                    dataLabel = headings[i].innerText;
                    $(td).attr('data-label', dataLabel)
                    });
                }
            });

        })(jQuery);

    </script>

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
