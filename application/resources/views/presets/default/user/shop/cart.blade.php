@php

@endphp
@extends($activeTemplate.'layouts.master')
@section('content')
    @include($activeTemplate.'includes.breadcumb')
    <section class="mb-lg-14 mb-8 mt-8">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card py-1 border-0 mb-8">
                        <div>
                            <h1 class="fw-bold">@lang('Shop Cart')</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="py-3">
{{--                        <div class="alert alert-danger p-2" role="alert">--}}
{{--                            You’ve got FREE delivery. Start--}}
{{--                            <a href="#!" class="alert-link">checkout now!</a>--}}
{{--                        </div>--}}
                        <ul class="list-group list-group-flush">
                            @forelse($carts as $cart)
                                <li class="list-group-item py-3 ps-0 border-top">
                                    <div class="row align-items-center">
                                        <div class="col-6 col-md-6 col-lg-7">
                                            <div class="d-flex">
                                                <img src="{{getImage(getFilePath('product').'/'.$cart->products->path.'/'.$cart->products->image)}}" alt="Ecommerce" class="icon-shape
                                                icon-xxl">
                                                <div class="ms-3">
                                                    <!-- title -->
                                                    <a href="{{route('user.shop.single',$cart->product_id)}}"
                                                       class="text-inherit">
                                                        <h6 class="mb-0">{{optional($cart->products)->name}}</h6>
                                                    </a>
                                                    <span><small class="text-muted">.98 / lb</small></span>
                                                    <!-- text -->
                                                    <div class="mt-2 small lh-1 remove"  data-bs-toggle="modal"
                                                         data-bs-target="#removeModal" data-product_name =
                                                             "{{@$cart->products->name}}" data-id="{{$cart->id}}">
                                                        <a href="#!" class="text-decoration-none text-inherit">
                                                <span class="me-1 align-text-bottom">
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-success">
                                                      <polyline points="3 6 5 6 21 6"></polyline>
                                                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                      <line x1="10" y1="11" x2="10" y2="17"></line>
                                                      <line x1="14" y1="11" x2="14" y2="17"></line>
                                                   </svg>
                                                </span>
                                                            <span class="text-muted">@lang('Remove')</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4 col-md-3 col-lg-3">
                                            <div class="input-group input-spinner">
                                                <input type="button" value="-" class="button-minus btn btn-sm minus"
                                                       id="minus_{{$cart->id}}"
                                                       data-field="quantity" data-id="{{$cart->id}}">
                                                <input type="number" step="1" max="10" value="{{$cart->quantity}}"
                                                       id="quantity_{{$cart->id}}"
                                                       name="quantity" data-id="{{$cart->id}}" class="quantity-field form-control-sm
                                                       form-input">
                                                <input type="button" value="+" id="plus_{{$cart->id}}"
                                                       class="button-plus btn
                                                btn-sm plus" data-field="quantity" data-id="{{$cart->id}}">
                                            </div>
                                        </div>
                                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                                            <span class="fw-bold">{{$general->cur_sym}}{{showAmount((optional
                                            ($cart->products)->price))}}</span>
                                        </div>
                                    </div>
                                </li>

                                @empty
                                <li class="list-group-item py-3 ps-0 border-top">
                                    <div class="row align-items-center">
                                        <p class="text-center text-muted">{{ __($emptyMessage) }}</p>
                                    </div>
                                </li>
                            @endforelse
                        </ul>
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{route('user.shop.list')}}" class="btn btn-primary">@lang('Continue Shopping')</a>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 col-md-5">
                    <div class="mb-5 card mt-6">
                        <div class="card-body p-6">
                            <h2 class="h5 mb-4">@lang('Summary')</h2>
                            <div class="card mb-2">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div>@lang('Item Subtotal')</div>
                                        </div>
                                        {{$general->cur_sym}}<span class="subtotal">{{showAmount($subTotal)}}</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div>@lang('Service Fee')</div>
                                        </div>
                                        <span>
                                            @if($charge->is_fixed ==1)
                                                {{$general->cur_sym}}{{showAmount($charge->fixed)}}
                                            @elseif($charge->is_percent == 1)
                                                {{$charge->percent}}%
                                            @endif

                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="fw-bold">@lang('Subtotal')</div>
                                        </div>
                                        @php
                                            $fee = $charge->is_fixed ? $charge->fixed:($charge->percent/100);
                                            $total = $subTotal+$fee;
                                        @endphp
                                        <span class="fw-bold">{{$general->cur_sym}}{{showAmount($total)}}</span>
                                    </li>
                                </ul>
                            </div>
                                <div class="d-grid mb-1 mt-4">
                                    <a href="{{route('user.shop.checkout',auth()->user()->id)}}" class="btn btn-primary
                                    btn-lg
                                    d-flex
                                    justify-content-between
                                    align-items-center" type="submit">
                                        @lang('Go to Checkout')
                                        <span class="fw-bold">{{$general->cur_sym}}{{showAmount($total)}}</span>
                                    </a>
                                </div>
                            <p>
                                <small>
                                    @lang('By placing your order, you agree to be bound by the') {{$general->site_name}}
                                    <a href="#!">@lang('Terms of Service')</a>
                                    @lang('and')
                                    <a href="#!">@lang('Privacy Policy').</a>
                                </small>
                            </p>

                            <!-- heading -->
                            <div class="mt-8">
                                <h2 class="h5 mb-3">Add Promo or Gift Card</h2>
                                <form>
                                    <div class="mb-2">
                                        <!-- input -->
                                        <label for="giftcard" class="form-label sr-only">Email address</label>
                                        <input type="text" class="form-control" id="giftcard" placeholder="Promo or Gift Card">
                                    </div>
                                    <!-- btn -->
                                    <div class="d-grid"><button type="submit" class="btn btn-outline-dark mb-1">Redeem</button></div>
                                    <p class="text-muted mb-0"><small>Terms &amp; Conditions apply</small></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title product" id="removeModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('user.shop.cart.remove')}}" method="GET" >
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" value="" name="id" class="id">
                        @lang('Are you confirm to remove this product?')
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-danger btn-sm">@lang('Remove')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('.minus,.plus').on('click',function(){
            let cart_id = $(this).data('id');
            let qn = '#quantity_'+$(this).data('id');
            let quantity = parseInt($(qn).val());

            $.ajax({
                url: "{{route('user.shop.update.quantity')}}",
                type: "GET",
                data:{
                    cart_id: cart_id,
                    quantity:quantity
                },
                success: function (data) {
                    if (data == 'success') {
                        notify('success', 'Import Data Successfully');
                        window.location.href = "{{url()->current()}}"
                    }
                }

            });
        });

        $('.remove').on('click',function (){
            let product_name = $(this).data('product_name');
            $('.product').text(product_name);
            $('.id').val($(this).data('id'));
        })
    </script>

    <script>
        $(document).ready(function(){
            $('.button-minus, .button-plus').on('click', function() {
                // var $input = $(this).closest('.input-group').find('.quantity-field');
                var quantity = parseInt($input.val());
                if ($(this).hasClass('button-minus')) {
                    if (quantity > 1) quantity--;
                } else {
                    quantity++;
                }
                $input.val(quantity);

                // Recalculate subtotal
                var subtotal = 0;
                $('.quantity-field').each(function() {
                    var qty = parseInt($(this).val());
                    var prc = parseFloat($(this).data('price'));
                    subtotal += qty * prc;
                });
                $('.subtotal').text(subtotal.toFixed(2));
            });
        });
    </script>
    <script>
        setInterval(function() {
            $('.container').load();
        }, 3000);
    </script>
@endpush


