@php

$about = getContent('about.content',true);

    #getContent('data_key','singleQuery true/false','limit');
@endphp
@include($activeTemplate.'includes.topbar')
@include($activeTemplate.'includes.navbar')

<section class="mt-lg-14 mt-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="offset-lg-1 col-lg-10 col-12">
                <div class="row align-items-center mb-14">
                    <div class="col-md-6">
                        <!-- text -->
                        <div class="ms-xxl-14 me-xxl-15 mb-8 mb-md-0 text-center text-md-start">
                            <h1 class="mb-6">{{__($about->data_values->heading)}}:</h1>
                            <p class="mb-0 lead">{{__($about->data_values->description)}}</p>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="me-6">
                            <!-- img -->
                            <img src="{{getImage(getFilePath('frontend').'/about/'.$about->data_values->about_image)}}" alt="" class="img-fluid rounded" />
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row mb-12">
                    <div class="col-12">
                        <div class="mb-8">
                            <!-- heading -->
                            <h2>Ready to get started?</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- card -->
                        <div class="card bg-light mb-6 border-0">
                            <!-- card body -->
                            <div class="card-body p-8">
                                <div class="mb-4">
                                    <!-- img -->
                                    <img src="../assets/images/about/about-icons-1.svg" alt="" />
                                </div>
                                <h4>Grow my business with Freshcart</h4>
                                <p>Duis placerat, urna ut dictum lobortis, erat libero feugiat nulla, ullamcorper fermentum lectus dolor ut tortor.</p>
                                <!-- btn -->
                                <a href="#" class="btn btn-dark mt-2">FreshCart Platform</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- card -->
                        <div class="card bg-light mb-6 border-0">
                            <!-- card body -->
                            <div class="card-body p-8">
                                <div class="mb-4">
                                    <!-- img -->
                                    <img src="../assets/images/about/about-icons-2.svg" alt="" />
                                </div>
                                <h4>Advertise my brand on Freshcart</h4>
                                <p>Duis placerat, urna ut dictum lobortis, erat libero feugiat nulla, ullamcorper fermentum lectus dolor ut tortor.</p>
                                <!-- btn -->
                                <a href="#" class="btn btn-dark mt-2">FreshCart ads</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- card -->
                        <div class="card bg-light mb-6 border-0">
                            <!-- card body -->
                            <div class="card-body p-8">
                                <div class="mb-4">
                                    <!-- img -->
                                    <img src="../assets/images/about/about-icons-3.svg" alt="" />
                                </div>
                                <h4>Learn more about Freshcart</h4>
                                <p>Vivamus non risus id sapien egestas tempus id sed lla mus justo metus, suscipit non hendrerit.</p>
                                <!-- btn -->
                                <a href="#" class="btn btn-dark mt-2">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- text -->
                        <p>
                            For assistance using Freshcart services, please visit our
                            <a href="#">Help Center</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section -->
<section class="bg-success py-14">
    <div class="container">
        <div class="row">
            <!-- col -->
            <div class="offset-lg-1 col-lg-10">
                <div class="row">
                    <!-- col -->
                    <div class="col-xl-4 col-md-6">
                        <div class="text-white me-8 mb-12">
                            <!-- text -->
                            <h2 class="text-white mb-4">Trusted by retailers. Loved by customers.</h2>
                            <p>We give everyone access to the food they love and more time to enjoy it together.</p>
                        </div>
                    </div>
                    <div class="row row-cols-2 row-cols-md-4">
                        <!-- col -->
                        <div class="col mb-4 mb-md-0">
                            <h3 class="display-5 fw-bold text-white mb-0">500k</h3>
                            <span class="fs-6 text-white">Shoppers</span>
                        </div>
                        <!-- col -->
                        <div class="col mb-4 mb-md-0">
                            <h3 class="display-5 fw-bold text-white mb-0">4,500+</h3>
                            <span class="fs-6 text-white">Cities</span>
                        </div>
                        <!-- col -->
                        <div class="col mb-4 mb-md-0">
                            <h3 class="display-5 fw-bold text-white mb-0">40k+</h3>
                            <span class="fs-6 text-white">Stores</span>
                        </div>
                        <!-- col -->
                        <div class="col mb-4 mb-md-0">
                            <h3 class="display-5 fw-bold text-white mb-0">650+</h3>
                            <span class="fs-6 text-white">Retail Brands</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section -->

<!-- section -->

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

        .logo img {
            max-width: 220px;
        }
    </style>
@endpush
