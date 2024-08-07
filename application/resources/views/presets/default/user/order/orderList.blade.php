@extends($activeTemplate.'layouts.master')

@section('content')
    @include($activeTemplate.'includes.breadcumb')
    <section>
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center d-md-none py-4">
                        <!-- heading -->
                        <h3 class="fs-5 mb-0">Account Setting</h3>
                        <!-- button -->
                        <button
                            class="btn btn-outline-gray-400 text-muted d-md-none btn-icon btn-sm ms-3"
                            type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasAccount"
                            aria-controls="offcanvasAccount">
                            <i class="bi bi-text-indent-left fs-3"></i>
                        </button>
                    </div>
                </div>

                @include($activeTemplate.'user.order.sidebar')
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="py-6 p-md-6 p-lg-10">
                        <!-- heading -->
                        <h2 class="mb-6">{{$pageTitle}}</h2>

                        <div class="table-responsive-xxl border-0">
                            <!-- Table -->
                            <table class="table mb-0 text-nowrap table-centered">
                                <!-- Table Head -->
                                <thead class="bg-light">
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>@lang('Product')</th>
                                    <th>@lang('Order')</th>
                                    <th>@lang('Date')</th>
                                    <th>@lang('Items')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Amount')</th>
                                    <th>@lang('Action')</th>

                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $order)
                                    @foreach(@$order->orderItems as $product)

                                        <tr>
                                            <td class="align-middle border-top-0 w-0">
                                                <a href="#"><img src="{{getImage(getFilePath('product').'/'
                                                .$product->products->path
                                                .'/'.$product->products->image)}}"
                                                                 alt="Ecommerce" class="icon-shape icon-xl" /></a>
                                            </td>
                                            <td class="align-middle border-top-0">
                                                <a href="#" class="fw-semibold text-inherit">
                                                    <h6 class="mb-0">{{$product->products->name}}</h6>
                                                </a>
                                            </td>
                                            <td class="align-middle border-top-0">
                                                <a href="#" class="text-inherit">{{$order->order_no}}</a>
                                            </td>
                                            <td class="align-middle border-top-0">{{$product->created_at}}</td>
                                            <td class="align-middle border-top-0">{{$product->quantity}}</td>
                                            <td class="align-middle border-top-0">

                                                @if($order->status == 1)
                                                    <span class="badge bg-warning">@lang('Processing')</span>
                                                @elseif($order->status == 2)
                                                    <span class="badge bg-primary">@lang('Approved')</span>
                                                @else
                                                    <span class="badge bg-success">@lang('Shipped')</span>
                                                @endif

                                            </td>
                                            <td class="align-middle border-top-0">{{$general->cur_sym}}{{showAmount
                                            ($product->price)}}</td>
                                            <td class="text-muted align-middle border-top-0">
                                                <a href="{{route('user.single.order',$order->id)}}" class="text-inherit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View"><i class="feather-icon icon-eye"></i></a>
                                            </td>
                                        </tr>

                                    @endforeach

                                @empty
                                    <tr>
                                        <td class="align-middle border-top-0 w-0">
                                            <a href="#"><img src="../assets/images/products/product-img-6.jpg" alt="Ecommerce" class="icon-shape icon-xl" /></a>
                                        </td>
                                        <td class="align-middle border-top-0">
                                            <a href="#" class="fw-semibold text-inherit">
                                                <h6 class="mb-0">Blueberry Greek Yogurt</h6>
                                            </a>
                                            <span><small class="text-muted">500 g</small></span>
                                        </td>
                                        <td class="align-middle border-top-0">
                                            <a href="#" class="text-inherit">#12094</a>
                                        </td>
                                        <td class="align-middle border-top-0">Oct 03, 2023</td>
                                        <td class="align-middle border-top-0">4</td>
                                        <td class="align-middle border-top-0">
                                            <span class="badge bg-success">Completed</span>
                                        </td>
                                        <td class="align-middle border-top-0">$18.00</td>
                                        <td class="text-muted align-middle border-top-0">
                                            <a href="#" class="text-inherit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View"><i class="feather-icon icon-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
