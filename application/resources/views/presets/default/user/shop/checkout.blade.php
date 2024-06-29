@extends($activeTemplate.'layouts.master')

@section('content')
    @include($activeTemplate.'includes.breadcumb')
    <section class="mb-lg-14 mb-8 mt-8">
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <div>
                        <div class="mb-8">
                            <!-- text -->
                            <h1 class="fw-bold mb-0">{{$pageTitle}}</h1>

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-7 col-md-12">
                        <!-- accordion -->
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <!-- accordion item -->
                            <div class="accordion-item py-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- heading one -->
                                    <a href="#" class="fs-5 text-inherit collapsed h4" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                        <i class="feather-icon icon-map-pin me-2 text-muted"></i>
                                        @lang('Add delivery address')
                                    </a>
                                    <!-- btn -->
                                    <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                       data-bs-target="#addAddressModal">@lang('Change Address')</a>
                                    <!-- collapse -->
                                </div>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                                    <div class="mt-5">
                                        <div class="row">
                                            <div class="col-lg-6 col-12 mb-4">
                                                <!-- form -->
                                                <div class="card card-body p-6">
                                                    <div class="form-check mb-4">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="homeRadio" checked="">
                                                        <label class="form-check-label text-dark"
                                                               for="homeRadio">@lang('Present Address')</label>
                                                    </div>
                                                    <!-- address -->
                                                    <address>
                                                        <strong>{{ucfirst(auth()->user()->firstname)}} {{ucfirst(auth()->user()->lastname)}}</strong>
                                                        <br> {{auth()->user()->address->address}}
                                                        <br>
                                                        {{auth()->user()->address->state}}, {{auth()->user()
                                                        ->address->country}}
                                                        <br>

                                                        <abbr title="Phone">P: {{auth()->user()->mobile}}</abbr>
                                                    </address>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- accordion item -->
                            <div class="accordion-item py-4">
                                <a href="#" class="text-inherit h5" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    <i class="feather-icon icon-shopping-bag me-2 text-muted"></i>
                                    @lang('Delivery instructions')
                                    <!-- collapse -->
                                </a>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="mt-5">
                                        <label for="DeliveryInstructions" class="form-label sr-only">@lang('Delivery instructions')</label>
                                        <textarea class="form-control delivery_ins" id="DeliveryInstructions" name="delivery_ins"
                                                  rows="3" placeholder="Write delivery instructions "></textarea>
                                        <p class="form-text">@lang('Add instructions for how you want your order shopped and/or delivered')</p>
                                        <div class="mt-5 d-flex justify-content-end">
                                            <a href="#" class="btn btn-outline-gray-400 text-muted" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                @lang('Prev')
                                            </a>
                                            <a href="#" class="btn btn-primary ms-2" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                                @lang('Next')
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- accordion item -->
                            <div class="accordion-item py-4">
                                <a href="#" class="text-inherit h5" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                    <i class="feather-icon icon-credit-card me-2 text-muted"></i>
                                    Payment Method
                                    <!-- collapse -->
                                </a>
                                <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="mt-5">
                                        <div>
                                            <div class="card card-bordered shadow-none mb-2">
                                                <!-- card body -->
                                                <div class="card-body p-6">
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <!-- checkbox -->
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="paypal">
                                                            <label class="form-check-label ms-2" for="paypal"></label>
                                                        </div>
                                                        <div>
                                                            <!-- title -->
                                                            <h5 class="mb-1 h6">Payment with Paypal</h5>
                                                            <p class="mb-0 small">You will be redirected to PayPal website to complete your purchase securely.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card -->
                                            <div class="card card-bordered shadow-none mb-2">
                                                <!-- card body -->
                                                <div class="card-body p-6">
                                                    <div class="d-flex mb-4">
                                                        <div class="form-check">
                                                            <!-- input -->
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="creditdebitcard">
                                                            <label class="form-check-label ms-2" for="creditdebitcard"></label>
                                                        </div>
                                                        <div>
                                                            <h5 class="mb-1 h6">Credit / Debit Card</h5>
                                                            <p class="mb-0 small">Safe money transfer using your bank accou k account. We support Mastercard tercard, Visa, Discover and Stripe.</p>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-12">
                                                            <!-- input -->
                                                            <div class="mb-3">
                                                                <label class="form-label">Card Number</label>
                                                                <input type="text" class="form-control" placeholder="1234 4567 6789 4321">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <!-- input -->
                                                            <div class="mb-3 mb-lg-0">
                                                                <label class="form-label">Name on card</label>
                                                                <input type="text" class="form-control" placeholder="Enter your first name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <!-- input -->
                                                            <div class="mb-3 mb-lg-0 position-relative">
                                                                <label class="form-label">Expiry date</label>
                                                                <input class="form-control flatpickr flatpickr-input" type="text" placeholder="Select Date" readonly="readonly">
                                                                <div class="position-absolute bottom-0 end-0 p-3 lh-1">
                                                                    <i class="bi bi-calendar text-muted"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <!-- input -->
                                                            <div class="mb-3 mb-lg-0">
                                                                <label class="form-label">CVV code</label>
                                                                <input type="password" class="form-control" placeholder="***">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card -->
                                            <div class="card card-bordered shadow-none mb-2">
                                                <!-- card body -->
                                                <div class="card-body p-6">
                                                    <!-- check input -->
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="payoneer">
                                                            <label class="form-check-label ms-2" for="payoneer"></label>
                                                        </div>
                                                        <div>
                                                            <!-- title -->
                                                            <h5 class="mb-1 h6">Pay with Payoneer</h5>
                                                            <p class="mb-0 small">You will be redirected to Payoneer website to complete your purchase securely.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card -->
                                            <div class="card card-bordered shadow-none">
                                                <div class="card-body p-6">
                                                    <!-- check input -->
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="cashonDelivery">
                                                            <label class="form-check-label ms-2" for="cashonDelivery"></label>
                                                        </div>
                                                        <div>
                                                            <!-- title -->
                                                            <h5 class="mb-1 h6">Cash on Delivery</h5>
                                                            <p class="mb-0 small">Pay with cash when your order is delivered.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button -->
                                            <div class="mt-5 d-flex justify-content-end">
                                                <a href="#" class="btn btn-outline-gray-400 text-muted" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                    Prev
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-primary ms-2 order"
                                                   data-carts = "{{$carts}}" data-subTotal="{{$subTotal}}"
                                                   data-charge="{{$fee->is_fixed?$fee->fixed:($fee->percent/100)}}"
                                                   data-bs-toggle="modal" data-bs-target="#orderModal">@lang('Place Order')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 offset-lg-1 col-lg-4">
                        <div class="mt-4 mt-lg-0">
                            <div class="card shadow-sm">
                                <h5 class="px-6 py-4 bg-transparent mb-0">@lang('Order Details')</h5>
                                <ul class="list-group list-group-flush">
                                    @forelse($carts as $cart)
                                        <li class="list-group-item px-4 py-3">
                                            <div class="row align-items-center">
                                                <div class="col-2 col-md-2">
                                                    <img src="{{getImage(getFilePath('product').'/'
                                                    .@$cart->products->path.'/'
                                                    .@$cart->products->image)}}" alt="Ecommerce" class="img-fluid">
                                                </div>
                                                <div class="col-5 col-md-5">
                                                    <h6 class="mb-0">{{optional($cart->products)->name}}</h6>
                                                </div>
                                                <div class="col-2 col-md-2 text-center text-muted">
                                                    <span>{{__($cart->quantity)}}</span>
                                                </div>
                                                <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                                    <span class="fw-bold">{{$general->cur_sym}}{{showAmount
                                                    (optional($cart->products)->price)}}</span>
                                                </div>

                                            </div>
                                        </li>
                                    @empty
                                        <li class="list-group-item px-4 py-3">
                                            <div class="row align-items-center">
                                                <div class="col-2 col-md-2">
                                                    <img src="{{asset('assets/images/empty-cart.png')}}"
                                                         alt="Ecommerce" class="img-fluid">
                                                </div>
                                                <div class="col-5 col-md-5">
                                                    <h6 class="mb-0">@lang('Empty Cart')</h6>
                                                </div>

                                            </div>
                                        </li>
                                    @endforelse

                                    <!-- list group item -->
                                    <li class="list-group-item px-4 py-3">
                                        <div class="d-flex align-items-center justify-content-between fw-bold">
                                            <div>@lang('Subtotal')</div>
                                            <div>{{$general->cur_sym}}{{showAmount($subTotal)}}</div>
                                        </div>
                                    </li>
                                        @if($carts->count() < 0)
                                            <li class="list-group-item px-4 py-3">
                                                <div class="d-flex align-items-center justify-content-between fw-bold">
                                                    <div>@lang('Delivery Charge')</div>
                                                    <div>
                                                        @if($fee->is_fixed)
                                                            {{$general->cur_sym}}{{showAmount($fee->fixed)}}
                                                        @else  {{$fee->percent}}%
                                                        @endif</div>
                                                </div>
                                            </li>
                                        @endif


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--    place order modal --}}
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">@lang('Order')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('user.orders.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div id="productInputs"></div>
                        <input type="hidden" name="amount">
                        <textarea name="delivery_ins" cols="30" rows="10" hidden ></textarea>
                        @lang('Confirm your order')
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">@lang('Order Now')</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('.order').on('click',function (){
            let carts = $(this).data('carts');
            let subtotal = $(this).data('subtotal');
            let charge = $(this).data('charge');
            let total = subtotal+charge;
            let delivery_ins = $('.delivery_ins').val();
            var productInput ='';
            $('#orderModal').find("input[name='amount']").val(total);
            $.each(carts, function (index, value) {
                productInput = `
                    <div class="product-input">
                        <input type="hidden" name="product_ids[]" value="${value.product_id}">

                    </div>`;
                $('#productInputs').append(productInput);
            });
            $('#orderModal').find("textarea[name='delivery_ins']").val(delivery_ins)

        });
    </script>
@endpush
