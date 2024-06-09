@php
    $contact = getContent('contact_us.content',true);
@endphp
@extends($activeTemplate.'layouts.frontend')
@section('content')
    @include($activeTemplate.'includes.topbar')
    @include($activeTemplate.'includes.navbar')

    <section class="my-lg-14 my-8">
        <!-- container -->
        <div class="container">
            <div class="row">
                <!-- col -->
                <div class="offset-lg-2 col-lg-8 col-12">
                    <div class="mb-8">
                        <!-- heading -->
                        <h1 class="h3">{{$contact->data_values->title}}</h1>
                        <p class="lead mb-0">{{$contact->data_values->short_details}}</p>
                    </div>
                    <!-- form -->
                    <form class="row needs-validation" method="post" action="" novalidate>
                        @csrf
                        <!-- input -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="contactFName">
                                First Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="contactFName" name="fname" class="form-control"  value="@if(auth()->user()){{ auth()->user()->fullname }} @else{{ old('name') }}@endif"
                                   @if(auth()->user()) readonly @endif placeholder="Enter Your First Name" required />
                            <div class="invalid-feedback">@lang('Please enter firstname.')</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <!-- input -->
                            <label class="form-label" for="contactLName" >
                                Last Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="contactLName" class="form-control" name="lname" placeholder="Enter Your Last name" required />
                            <div class="invalid-feedback">@lang('Please enter lastname.')</div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="contactEmail">
                                @lang('Email')
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" id="contactEmail" name="contactEmail" class="form-control" value="@if(auth()->user()){{ auth()->user()->email }}@else{{  old('email') }}@endif"
                                   @if(auth()->user()) readonly @endif  placeholder="Enter Your First Name" required />
                            <div class="invalid-feedback">@lang('Please enter email.')</div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <!-- input -->
                            <label class="form-label" for="contactTitle">@lang('Subject')</label>
                            <input type="text" id="contactTitle" name="subject" class="form-control" placeholder="Your Title" required />
                            <div class="invalid-feedback">@lang('Please enter Subject.')</div>
                        </div>


                        <div class="col-md-12 mb-3">
                            <!-- input -->
                            <label class="form-label" for="contactTearea">@lang('Message')</label>
                            <textarea rows="3" id="contactTearea" class="form-control" placeholder="Additional Comments" name="message" required></textarea>
                            <div class="invalid-feedback">@lang('Please enter a message in the textarea').</div>
                        </div>
                        <div class="col-md-12">
                            <!-- btn -->
                            <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('style')
    <style>
        p {
            margin-bottom: 0;
            color: #444
        }

        .document-wrapper {
            background-color: #fff;
            box-shadow: 0 3px 35px rgba(0, 0, 0, .1);
            border-radius: 7px;
            overflow: hidden;

        }

        div[class*='col']:nth-child(odd) .document-item {
            border-right: 1px solid rgba(0, 0, 0, .1)
        }

        div[class*='col-lg-12']:nth-child(odd) .document-item {
            border-right: 0;
        }

        div[class*='col']:nth-child(1) .document-item {
            border-top: 0;
        }

        div[class*='col']:nth-child(2) .document-item {
            border-top: 0;
        }

        .dark-mode {
            background-color: #1A202C;
        }

        .dark-mode p,
        .dark-mode .share-links li a {
            color: rgba(255, 255, 255, 0.8);
        }

        .dark-mode .document-wrapper {
            box-shadow: 0 3px 25px rgba(255, 255, 255, 0.03);
        }

        .dark-mode .document-item {
            background-color: #2D3748;
            color: rgba(255, 255, 255, 0.8);
            border-color: rgba(255, 255, 255, 0.1) !important;
        }

        .dark-mode .document-item__icon,
        .dark-mode .document-item__content .title a {
            color: #fff;
        }

        .document-item {
            background-color: #fff;
            padding: 45px 35px;
            border-top: 1px solid rgba(0, 0, 0, .1);
            height: 100%;
        }

        .document-item__icon {
            font-size: 32px;
            width: 35px;
            line-height: 1px;
        }

        .document-item__content {
            width: calc(100% - 35px);
            padding-left: 15px;
        }

        .document-item__content .title {
            margin-bottom: 13px;
        }

        .document-item__content .title a {
            color: #111;
            display: inline-block;
        }

        .document-footer ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .share-links li a {
            color: #444
        }

        .share-links li:not(:last-child) {
            padding-right: 25px;
        }

    </style>
@endpush
