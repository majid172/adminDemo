@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                    <div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-inherit">@lang('Dashboard')</a> / </li>
                                <li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- button -->
                    <div>
                        <a href="{{route('user.orders.list')}}" class="btn btn-primary">@lang('Show Orders')</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row" id="invoice-content">
            <div class="col-xl-12 col-12 mb-5">
                <!-- card -->
                <div class="card h-100 card-lg">
                    <div class="card-body p-6">
                        <div class="d-md-flex justify-content-between">
                            <div class="d-flex align-items-center mb-2 mb-md-0">
                                <h2 class="mb-0">@lang('Order ID'): {{__($order->order_no)}}</h2>
                                @if($order->status == 1)
                                    <span class="badge bg-light-warning text-dark-warning ms-2">@lang('Pending')</span>
                                @elseif($order->status == 2)
                                    <span class="badge bg-light-success text-dark-success ms-2">@lang('Approved')</span>
                                @elseif($order->status == 3)
                                    <span class="badge bg-light-warning text-dark-warning ms-2">@lang('Shipped')</span>
                                @endif

                            </div>
                            <!-- select option -->
                            <div class="d-md-flex">
                                <div class="ms-md-3">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-light-info" id="download"><i
                                            class="las la-download fs-5"></i> @lang('Download Invoice')</a>
                                    <button class="btn btn-sm btn-light-danger"><i class="las la-money-bill-wave "></i> @lang('Unpaid')</button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            <div class="row">
                                <!-- address -->
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="mb-6">
                                        <h6>@lang('Customer Details')</h6>
                                        <p class="mb-1 lh-lg">
                                            {{ucfirst(@$order->user->firstname)}} {{ucfirst(@$order->user->lastname)}}
                                            <br>
                                            {{__(@$order->user->email)}}
                                            <br>
                                            {{__(@$order->user->mobile)}}
                                        </p>
                                        <a href="{{route('user.profile.setting')}}">@lang('View Profile')</a>
                                    </div>
                                </div>
                                <!-- address -->
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="mb-6">
                                        <h6>@lang('Shipping Address')</h6>
                                        <p class="mb-1 lh-lg">
                                            {{__(@$order->shipping_address->address)}}
                                            <br>
                                            {{__(@$order->shipping_address->zip)}}, {{__(@$order->shipping_address->city)}}.
                                            <br>
                                            {{__(@$order->shipping_address->country)}}
                                            <br>
                                            @lang('Contact No'). +{{__(@$order->user->mobile)}}
                                        </p>
                                    </div>
                                </div>
                                <!-- address -->
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="mb-6">
                                        <h6>@lang('Order Details')</h6>
                                        <p class="mb-1 lh-lg">
                                            @lang('Order ID'):
                                            <span class="text-dark">{{__($order->order_no)}}</span>
                                            <br>
                                            @lang('Order Date'):
{{--                                            <span class="text-dark">{{__($order->created_at)}}</span>--}}
                                            <br>
                                            @lang('Order Total'):
{{--                                            <span class="text-dark">{{$general->cur_sym}} {{}}</span>--}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <!-- Table -->
                                <table class="table mb-0 text-nowrap table-centered">
                                    <!-- Table Head -->
                                    <thead class="bg-light">
                                    <tr>
                                        <th>@lang('Products')</th>
                                        <th>@lang('Price')</th>
                                        <th>@lang('Quantity')</th>
                                        <th>@lang('Total')</th>
                                    </tr>
                                    </thead>
                                    <!-- tbody -->
                                    <tbody>
                                    @php $totalAmount = 0; @endphp
                                    @forelse(@$order->orderItems as $orderItem)
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0)" class="text-inherit">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <img src="{{getImage(getFilePath('product').'/'.$orderItem->products->path.'/'.$orderItem->products->image)}}" alt="Ecommerce" class="icon-shape icon-lg">
                                                        </div>
                                                        <div class="ms-lg-4 mt-2 mt-lg-0">
                                                            <h5 class="mb-0 h6">{{__(@$orderItem->products->name)}}</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><span class="text-body">{{$general->cur_sym}}{{showAmount($orderItem->price)}}</span></td>
                                            <td>{{__($orderItem->quantity)}}</td>
                                            <td>{{$general->cur_sym}} {{showAmount($orderItem->price * $orderItem->quantity)}}</td>

                                            @php $totalAmount += $orderItem->price * $orderItem->quantity; @endphp
                                        </tr>
                                    @empty
                                    @endforelse

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td colspan="1" class="fw-semibold text-dark">
                                            <!-- text -->
                                            @lang('Grand Total')
                                        </td>
                                        <td class="fw-semibold text-dark">
                                            <!-- text -->
                                            {{$general->cur_sym}}{{showAmount($totalAmount)}}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-6">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <h6>Payment Info</h6>
                                <span>Cash on Delivery</span>
                            </div>
                            <div class="col-md-6">
                                <h5>Notes</h5>
                                <textarea class="form-control mb-3" rows="3" placeholder="Write note for order"></textarea>
                                <a href="#" class="btn btn-primary">Save Notes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('#download').on('click', function () {
            var content = $('#invoice-content').html();
            var printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write('<html>');
            printWindow.document.write('<body>');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
            // window.print();
        });
    </script>
@endpush
