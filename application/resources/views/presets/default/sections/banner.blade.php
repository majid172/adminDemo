@php
    $content = getContent('banner.content',true);
@endphp
<section class="mt-8">
    <div class="container">
        <div class="hero-slider">

            <div style="background: url({{asset('assets/images/frontend/banner/663773f8ea0e91714910200.jpg')}}) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
                <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                    <span class="badge text-bg-warning">{{__($content->data_values->subheading_1)}}</span>

                    <h2 class="text-dark display-5 fw-bold mt-4">{{__($content->data_values->heading_1)}}</h2>
                    <p class="lead">{{__($content->data_values->paragraph_1)}}</p>
                    <a href="#" class="btn btn-dark mt-3">
                        Shop Now
                        <i class="feather-icon icon-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <div style="background: url({{asset('assets/images/frontend/banner/663773f8ea0e91714910200.jpg')}}) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
                <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                    <span class="badge text-bg-warning">{{__($content->data_values->subheading_2)}}</span>
                    <h2 class="text-dark display-5 fw-bold mt-4">
                        {{__($content->data_values->heading_2)}}
                    </h2>
                    <p class="lead">{{__($content->data_values->paragraph_2)}}</p>
                    <a href="#" class="btn btn-dark mt-3">
                        Shop Now
                        <i class="feather-icon icon-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
