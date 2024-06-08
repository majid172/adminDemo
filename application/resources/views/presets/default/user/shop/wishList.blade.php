@extends($activeTemplate.'layouts.master')
@include($activeTemplate.'includes.topbar')
@include($activeTemplate.'includes.navbar')
@include($activeTemplate.'includes.breadcumb')
@section('content')
    <section class="mt-8 mb-14">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-8">
                        <h1 class="mb-1">@lang('My Wishlist')</h1>
                        <p>@lang('There are 5 products in this wishlist.')</p>
                    </div>
                    <div>
                        <!-- table -->
                        <div class="table-responsive">
                            <table class="table text-nowrap table-with-checkbox">
                                <thead class="table-light">
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="checkAll" />
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th></th>
                                    <th>@lang('Product')</th>
                                    <th>@lang('Amount')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Actions')</th>
                                    <th>@lang('Remove')</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="align-middle">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="chechboxTwo" />
                                            <label class="form-check-label" for="chechboxTwo"></label>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#"><img src="../assets/images/products/product-img-18.jpg" class="icon-shape icon-xxl" alt="" /></a>
                                    </td>
                                    <td class="align-middle">
                                        <div>
                                            <h5 class="fs-6 mb-0"><a href="#" class="text-inherit">Organic Banana</a></h5>
                                            <small>$.98 / lb</small>
                                        </div>
                                    </td>
                                    <td class="align-middle">$35.00</td>
                                    <td class="align-middle"><span class="badge bg-success">In Stock</span></td>
                                    <td class="align-middle">
                                        <div class="btn btn-primary btn-sm">Add to Cart</div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#" class="text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="feather-icon icon-trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <!-- form check -->
                                        <div class="form-check">
                                            <!-- input -->
                                            <input class="form-check-input" type="checkbox" value="" id="chechboxThree" />
                                            <!-- label -->
                                            <label class="form-check-label" for="chechboxThree"></label>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#"><img src="../assets/images/products/product-img-17.jpg" class="icon-shape icon-xxl" alt="" /></a>
                                    </td>
                                    <td class="align-middle">
                                        <div>
                                            <h5 class="fs-6 mb-0"><a href="#" class="text-inherit">Fresh Kiwi</a></h5>
                                            <small>4 no</small>
                                        </div>
                                    </td>
                                    <td class="align-middle">$20.97</td>
                                    <td class="align-middle"><span class="badge bg-danger">Out of Stock</span></td>
                                    <td class="align-middle">
                                        <div class="btn btn-dark btn-sm">Contact us</div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#" class="text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="feather-icon icon-trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <!-- form check -->
                                        <div class="form-check">
                                            <!-- input -->
                                            <input class="form-check-input" type="checkbox" value="" id="chechboxFour" />
                                            <!-- label -->
                                            <label class="form-check-label" for="chechboxFour"></label>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#"><img src="../assets/images/products/product-img-16.jpg" class="icon-shape icon-xxl" alt="" /></a>
                                    </td>
                                    <td class="align-middle">
                                        <div>
                                            <h5 class="fs-6 mb-0"><a href="#" class="text-inherit">Golden Pineapple</a></h5>
                                            <small>2 no</small>
                                        </div>
                                    </td>
                                    <td class="align-middle">$35.00</td>
                                    <td class="align-middle"><span class="badge bg-success">In Stock</span></td>
                                    <td class="align-middle">
                                        <div class="btn btn-primary btn-sm">Add to Cart</div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#" class="text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="feather-icon icon-trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <!-- form check -->
                                        <div class="form-check">
                                            <!-- input -->
                                            <input class="form-check-input" type="checkbox" value="" id="chechboxFive" />
                                            <!-- label -->
                                            <label class="form-check-label" for="chechboxFive"></label>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#"><img src="../assets/images/products/product-img-19.jpg" class="icon-shape icon-xxl" alt="" /></a>
                                    </td>
                                    <td class="align-middle">
                                        <div>
                                            <h5 class="fs-6 mb-0"><a href="#" class="text-inherit">BeatRoot</a></h5>
                                            <small>1 kg</small>
                                        </div>
                                    </td>
                                    <td class="align-middle">$29.00</td>
                                    <td class="align-middle"><span class="badge bg-success">In Stock</span></td>
                                    <td class="align-middle">
                                        <div class="btn btn-primary btn-sm">Add to Cart</div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#" class="text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="feather-icon icon-trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <!-- form check -->
                                        <div class="form-check">
                                            <!-- input -->
                                            <input class="form-check-input" type="checkbox" value="" id="chechboxSix" />
                                            <!-- label -->
                                            <label class="form-check-label" for="chechboxSix"></label>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#"><img src="../assets/images/products/product-img-15.jpg" class="icon-shape icon-xxl" alt="" /></a>
                                    </td>
                                    <td class="align-middle">
                                        <div>
                                            <h5 class="fs-6 mb-0"><a href="#" class="text-inherit">Fresh Apple</a></h5>
                                            <small>2 kg</small>
                                        </div>
                                    </td>
                                    <td class="align-middle">$70.00</td>
                                    <td class="align-middle"><span class="badge bg-success">In Stock</span></td>
                                    <td class="align-middle">
                                        <div class="btn btn-primary btn-sm">Add to Cart</div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#" class="text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="feather-icon icon-trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
