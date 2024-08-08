@extends('admin.layouts.app')
@section('panel')
    <main class="main-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="card-body p-6">
                            <div class="d-md-flex justify-content-between">
                                <div class="d-flex align-items-center mb-2 mb-md-0">
                                    <h2 class="mb-0">@lang('Order ID'): {{__(@$detail->order->order_no)}}</h2>
                                    @if(@$detail->status == 1 )
                                        <span class="badge bg--warning text-light ms-2">@lang('Pending')
                                        </span>
                                    @elseif(@$detail->status == 2)
                                        <span class="badge bg--success text-light ms-2">@lang('Approved')
                                        </span>
                                    @else
                                        <span class="badge bg--info text-light ms-2">@lang('Shipped')
                                        </span>
                                    @endif

                                    @if(@$detail->is_paid == 1 )
                                        <span class="badge bg--success text-light ms-2">@lang('Paid')</span>
                                    @else
                                        <span class="badge bg--danger text-light ms-2">@lang('Unpaid')
                                        </span>
                                    @endif
                                </div>
                                <!-- select option -->
                                <div class="d-md-flex">
                                    <div class="ms-md-3">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-light-info">@lang('Download
                                            Invoice')</a>
                                    </div>
                                    <div class="mb-2 mb-md-0">
                                        <select class="form-control status" name="status" >
                                            <option selected="">@lang('Status')</option>
                                            <option value="1">@lang('Processing')</option>
                                            <option value="2">@lang('Approved')</option>
                                            <option value="3">@lang('Shipped')</option>
                                        </select>
                                    </div>
                                    <!-- button -->

                                </div>
                            </div>
                            <div class="mt-8">
                                <div class="row">
                                    <!-- address -->
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="mb-6">
                                            <h6>@lang('Customer Details')</h6>
                                            <p class="mb-1 lh-lg">
                                                {{$detail->user->firstname}} {{$detail->user->lastname}}
                                                <br>
                                                {{$detail->user->email}}
                                                <br>
                                                {{$detail->user->mobile}}
                                            </p>
                                            <a href="{{ route('admin.users.detail', $detail->user->id) }}">@lang('View Profile')</a>
                                        </div>
                                    </div>
                                    <!-- address -->
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="mb-6">
                                            <h6>@lang('Shipping Address')</h6>
                                            <p class="mb-1 lh-lg">
                                                @php
                                                $shipping = json_decode($detail->shipping_address);
                                                @endphp
                                                {{$shipping->address}}
                                                <br>
                                                {{$shipping->zip}}, {{$shipping->city}}
                                                <br>
                                                {{$shipping->state}},{{$shipping->country}}
                                                <br>
                                                @lang('Contact No'). {{$detail->user->mobile}}
                                            </p>
                                        </div>
                                    </div>
                                    <!-- address -->
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="mb-6">
                                            <h6>@lang('Order Details')</h6>
                                            <p class="mb-1 lh-lg">
                                                @lang('Order ID'):
                                                <span class="text-dark">{{$detail->order_no}}</span>
                                                <br>
                                                @lang('Order Date'):
                                                <span class="text-dark">{{ $detail->created_at }}</span>
                                                <br>
                                                @lang('Payment Info'):
                                                <span class="text-dark">{{$detail->payment_code == 1 ? 'Cash On Delivery':
                                    $detail->paymentMethod->name}}</span>
                                                <br>
                                                @lang('Order Total'):
                                                <span
                                                    class="text-dark">{{$general->cur_sym}}{{showAmount($detail->total_amount)
                                                    }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table mb-0 text-nowrap table-centered">
                                        <thead>
                                        <tr>
                                            <th>@lang('Products')</th>
                                            <th>@lang('Price')</th>
                                            <th>@lang('Quantity')</th>
                                            <th>@lang('Total')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $subTotal = 0;
                                            $charge = \App\Models\ServiceFee::first();
                                            $shipping = $charge->is_percent?$charge->percent:$charge->fixed;
                                        @endphp
                                        @foreach(@$detail->orderItems as $item)
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-inherit">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-lg-4 mt-2 mt-lg-0">
                                                                <h5 class="mb-0 h6">{{@$item->products->name}}</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td><span class="text-body">{{$general->cur_sym}}{{showAmount
                                                ($item->price)}}</span></td>
                                                <td>{{$item->quantity}}</td>
                                                <td>{{$general->cur_sym}}{{showAmount($item->price * $item->quantity)
                                                }}</td>
                                            </tr>

                                            @php $subTotal+= $item->price * $item->quantity @endphp
                                        @endforeach


                                        <tr>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td colspan="1" class="fw-medium text-dark">
                                                <!-- text -->
                                                @lang('Sub Total') :
                                            </td>
                                            <td class="fw-medium text-dark">
                                                {{$general->cur_sym}}{{showAmount($subTotal)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td colspan="1" class="fw-medium text-dark">
                                                <!-- text -->
                                                @lang('Shipping Cost')
                                            </td>
                                            <td class="fw-medium text-dark">
                                                <!-- text -->
                                                {{$shipping}} {{$charge->is_percent?'%':$general->cur_text}}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td colspan="1" class="fw-semibold text-dark">
                                                <!-- text -->
                                                @lang('Grand Total')
                                            </td>
                                            <td class="fw-semibold text-dark">
                                                <!-- text -->
                                                @php
                                                $fee = $charge->is_percent==1?$charge->percent:$charge->fixed;
                                                if($charge->is_percent == 1)
                                                    {
                                                        $grandTotal = $subTotal + $subTotal*($charge->percent/100);
                                                    }

                                                @endphp
                                                {{floor(showAmount($grandTotal))}} ({{$grandTotal}}) {{$general->cur_text}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('script')
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
    <script>
        (function ($) {
            "use strict"
            $('.status').on('change',function(){
                let status = $(this).val();
                let orderId = @json($detail->id);

                $.ajax({
                    url: "{{route('admin.order.update.status')}}",
                    type: 'GET',
                    data:{
                        orderId: orderId,
                        status: status
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log('Error');
                    }
                });

            })

        })(jQuery);

    </script>
@endpush
