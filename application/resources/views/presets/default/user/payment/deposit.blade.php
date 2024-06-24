@extends($activeTemplate.'layouts.master')
@section('content')
    <section>
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center d-md-none py-4">
                        <!-- heading -->
                        <h3 class="fs-5 mb-0">@lang('Account Setting')</h3>
                        <!-- button -->
                        <button class="btn btn-outline-gray-400 text-muted d-md-none btn-icon btn-sm ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount" aria-controls="offcanvasAccount">
                            <i class="bi bi-text-indent-left fs-3"></i>
                        </button>
                    </div>
                </div>
                @include($activeTemplate.'user.order.sidebar')
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="py-6 p-md-6 p-lg-10">
                        <!-- heading -->
                        <div class="d-flex justify-content-between mb-6 align-items-center">
                            <h2 class="mb-0">{{$pageTitle}}</h2>
{{--                            <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal"--}}
{{--                               data-bs-target="#paymentModal">@lang('Add Payment')</a>--}}
                        </div>
                        <ul class="list-group list-group-flush">
                            @forelse($gatewayCurrency as $data)
                                <li class="list-group-item px-0 py-5 border-bottom">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">
                                            <!-- img -->
                                            <img src="{{getImage(getFilePath('gatewayImage').'/'.$data->img_path.'/'.$data->image)}}" alt="gateway_img" class="me-3">
                                            <div>
                                                <!-- text -->
                                                <h5 class="mb-0 h6">{{__($data->name)}}</h5>
                                                <p class="mb-0 small">Expires in 10/2021</p>
                                            </div>
                                        </div>
                                        <div>
                                            <!-- btn -->
                                            <a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">Remove</a>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item px-0 py-5 border-bottom">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">
                                            <!-- img -->
                                            <img src="{{asset('assets/images/credit-card.png')}}" alt="" class="me-3">
                                            <div>
                                                <h5 class="mb-0 h6 text-muted align-items-center mt-2">{{__
                                                ($emptyMessage)}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforelse

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="{{route('user.deposit.insert')}}" method="post">
                @csrf
                <input type="hidden" name="method_code">
                <input type="hidden" name="currency">
                <div class="card custom--card">
                    <div class="card-header">
                        <h5 class="card-title">@lang('Deposit')</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">@lang('Select Gateway')</label>
                            <select class="form-control form--control" name="gateway" required>
                                <option value="">@lang('Select One')</option>
                                @foreach($gatewayCurrency as $data)
                                <option value="{{$data->method_code}}" @selected(old('gateway')==$data->method_code)
                                    data-gateway="{{ $data }}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">@lang('Amount')</label>
                            <div class="input-group">
                                <input type="number" step="any" name="amount" class="form-control form--control"
                                    value="{{ old('amount') }}" autocomplete="off" required>
                                <span class="input-group-text">{{ $general->cur_text }}</span>
                            </div>
                        </div>
                        <div class="mt-3 preview-details d-none">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>@lang('Limit')</span>
                                    <span><span class="min fw-bold">0</span> {{__($general->cur_text)}} - <span
                                            class="max fw-bold">0</span> {{__($general->cur_text)}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>@lang('Charge')</span>
                                    <span><span class="charge fw-bold">0</span> {{__($general->cur_text)}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>@lang('Payable')</span> <span><span class="payable fw-bold"> 0</span>
                                        {{__($general->cur_text)}}</span>
                                </li>
                                <li class="list-group-item justify-content-between d-none rate-element">

                                </li>
                                <li class="list-group-item justify-content-between d-none in-site-cur">
                                    <span>@lang('In') <span class="base-currency"></span></span>
                                    <span class="final_amo fw-bold">0</span>
                                </li>
                                <li class="list-group-item justify-content-center crypto_currency d-none">
                                    <span>@lang('Conversion with') <span class="method_currency"></span> @lang('and
                                        final value will Show on next step')</span>
                                </li>
                            </ul>
                        </div>
                        <button type="submit" class="btn btn--base w-100 mt-3">@lang('Save')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    (function ($) {
        "use strict";
        $('select[name=gateway]').change(function () {
            if (!$('select[name=gateway]').val()) {
                $('.preview-details').addClass('d-none');
                return false;
            }
            var resource = $('select[name=gateway] option:selected').data('gateway');
            var fixed_charge = parseFloat(resource.fixed_charge);
            var percent_charge = parseFloat(resource.percent_charge);
            var rate = parseFloat(resource.rate)
            if (resource.method.crypto == 1) {
                var toFixedDigit = 8;
                $('.crypto_currency').removeClass('d-none');
            } else {
                var toFixedDigit = 2;
                $('.crypto_currency').addClass('d-none');
            }
            $('.min').text(parseFloat(resource.min_amount).toFixed(2));
            $('.max').text(parseFloat(resource.max_amount).toFixed(2));
            var amount = parseFloat($('input[name=amount]').val());
            if (!amount) {
                amount = 0;
            }
            if (amount <= 0) {
                $('.preview-details').addClass('d-none');
                return false;
            }
            $('.preview-details').removeClass('d-none');
            var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
            $('.charge').text(charge);
            var payable = parseFloat((parseFloat(amount) + parseFloat(charge))).toFixed(2);
            $('.payable').text(payable);
            var final_amo = (parseFloat((parseFloat(amount) + parseFloat(charge))) * rate).toFixed(toFixedDigit);
            $('.final_amo').text(final_amo);
            if (resource.currency != '{{ $general->cur_text }}') {
                var rateElement = `<span class="fw-bold">@lang('Conversion Rate')</span> <span><span  class="fw-bold">1 {{__($general->cur_text)}} = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span></span>`;
                $('.rate-element').html(rateElement)
                $('.rate-element').removeClass('d-none');
                $('.in-site-cur').removeClass('d-none');
                $('.rate-element').addClass('d-flex');
                $('.in-site-cur').addClass('d-flex');
            } else {
                $('.rate-element').html('')
                $('.rate-element').addClass('d-none');
                $('.in-site-cur').addClass('d-none');
                $('.rate-element').removeClass('d-flex');
                $('.in-site-cur').removeClass('d-flex');
            }
            $('.base-currency').text(resource.currency);
            $('.method_currency').text(resource.currency);
            $('input[name=currency]').val(resource.currency);
            $('input[name=method_code]').val(resource.method_code);
            $('input[name=amount]').on('input');
        });
        $('input[name=amount]').on('input', function () {
            $('select[name=gateway]').change();
            $('.amount').text(parseFloat($(this).val()).toFixed(2));
        });
    })(jQuery);
</script>
@endpush
