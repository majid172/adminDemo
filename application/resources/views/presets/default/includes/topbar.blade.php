<header>
    <div class="container">
        <div class="row align-items-center pt-2">
            <div class="col-xl-3 col-lg-8 col-7 d-flex">
                <div class="dropdown selectBox">
                    <a class="dropdown-toggle selectValue text-reset" href="javascript:void(0)" data-bs-toggle="dropdown" aria-expanded="false">USD $</a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:void(0)">USD $</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0)">EUR €</a></li>
                    </ul>
                </div>
                <div class="ms-6">
                    <div class="dropdown selectBox">
                        <a class="dropdown-toggle selectValue text-reset" href="javascript:void(0)" data-bs-toggle="dropdown" aria-expanded="false">English</a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:void(0)">English</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)">Espa&ntilde;ol</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)">Fran&ccedil;ais</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-4 col-5 d-md-flex align-items-center justify-content-end">
                <a href="#" class="text-reset">@lang('Support')</a>
                <a href="#" class="mx-md-8 ms-4 text-reset">@lang('Delivery')</a>
                <a href="#" class="text-reset d-none d-md-block">@lang('Warranty')</a>
                <!-- Button -->
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between mb-2 align-items-center pt-6 pb-4 mt-4 mt-lg-0">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ getImage('assets/images/general/logo.png') }}"alt="logo">
                </a>
            </div>
            <div>
                <form action="#">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search for products" aria-label="Recipient's username" aria-describedby="button-addon2" />
                        <button class="btn btn-primary" type="button" id="button-addon2">@lang('Search')</button>
                    </div>
                </form>
            </div>
            <div class="d-flex align-items-center justify-content-between ms-4">
                <div class="text-center">
                    <div class="dropdown">
                        <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="lh-1">
                                <div class="position-relative d-inline-block mb-2">
                                    <i class="bi bi-bell fs-4"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                       1
                                       <span class="visually-hidden">@lang('unread messages')</span>
                                    </span>
                                </div>
                                <p class="mb-0 d-none d-xl-block small">@lang('Notification')</p>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-lg p-0">
                            <div>
                                <h6 class="px-4 border-bottom py-3 mb-0">Notification</h6>
                                <p class="mb-0 px-4 py-3">
                                    <a href="#">Sign in</a>
                                    or
                                    <a href="#">register</a>
                                    in or so you don t have to enter your details every time
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @guest
                <div class="ms-6 text-center">
                    <a href="#" class="text-reset" data-bs-toggle="modal" data-bs-target="#userModalSignIn">
                        <div class="lh-1">
                            <div class="mb-2">
                                <i class="bi bi-person-circle fs-4"></i>
                            </div>
                            <p class="mb-0 d-none d-xl-block small">@lang('Sign In')</p>
                        </div>
                    </a>
                </div>
                @endguest
                @auth
                <div class="ms-6 text-center">
                    <a href="{{route('user.orders.list')}}" class="text-reset">
                        <div class="lh-1">
                            <div class="mb-2">
                                <i class="bi bi-archive fs-4"></i>
                            </div>
                            <p class="mb-0 d-none d-xl-block small">@lang('My Orders')</p>
                        </div>
                    </a>
                </div>
                <div class="text-center ms-6">
                    <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" href="#offcanvasExample" role="button" aria-controls="offcanvasRight" class="text-reset">
                        <div class="text-center">
                            <div>
                                <i class="bi bi-cart2 fs-4"></i>
                            </div>
                            <p class="mb-0 d-none d-xl-block small">@lang('Shopping Cart')</p>
                        </div>

                    </a>
                </div>

                    <div class="ms-6 text-center">
                        <a href="#" class="text-reset" data-bs-toggle="modal" data-bs-target="#userModal">
                            <div class="lh-1">
                                <div class="mb-2">
                                    <i class="bi bi-person-circle fs-4"></i>
                                </div>
                                <p class="mb-0 d-none d-xl-block small">@lang('Sign Out')</p>
                            </div>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <div class="modal fade" id="userModalSignIn" tabindex="-1" aria-labelledby="userModalSignInLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-3 fw-bold" id="userModalSignInLabel">@lang('Sign In')</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user.login') }}" class="verify-gcaptcha">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">@lang('Username')</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="@lang('Enter Username')" required />
                        </div>

                        <div class="mb-5">
                            <label for="password" class="form-label">@lang('Password')</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="@lang('Enter Password')" required="" />
                            <small class="form-text">
                               @lang('Don’t have an account?')
                                <a href="{{route('user.register')}}">@lang('Sign Up')</a>
                            </small>
                        </div>

                        <button type="submit" class="btn btn-primary">@lang('Sign In')</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">@lang('Sign Out')</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.logout') }}" >
                        <div class="mb-3">
                            <p>@lang('Are you want to Sign Out?')</p>
                        </div>

                        <button type="submit" class="btn btn-primary">@lang('Sign Out')</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</header>

{{--modal--}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <div class="text-start">
            <h5 id="offcanvasRightLabel" class="mb-0 fs-4">@lang('Shop Cart')</h5>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            @php
                $carts = \App\Models\Cart::where('user_id',auth()->user()->id)->with(['user','products'])
                ->orderBy('created_at','desc')->limit(7)->get();
            @endphp
            <ul class="list-group list-group-flush">
                @forelse($carts as $cart)
                    <li class="list-group-item py-3 ps-0 border-top">
                        <div class="row align-items-center">
                            <div class="col-6 col-md-6 col-lg-7">
                                <div class="d-flex">
                                    <img src="{{getImage(getFilePath('product').'/'.$cart->products->path.'/'.$cart->products->image)}}" alt="Ecommerce" class="icon-shape icon-xxl" />
                                    <div class="ms-3">
                                        <!-- title -->
                                        <a href="shop-single.html" class="text-inherit">
                                            <h6 class="mb-0">{{optional($cart->products)->name}}</h6>
                                        </a>
                                        <!-- text -->
                                        <div class="mt-2 small lh-1">
                                            <a href="#!" class="text-decoration-none text-inherit">
                                       <span class="me-1 align-text-bottom">
                                          <svg
                                              xmlns="http://www.w3.org/2000/svg"
                                              width="14"
                                              height="14"
                                              viewBox="0 0 24 24"
                                              fill="none"
                                              stroke="currentColor"
                                              stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              class="feather feather-trash-2 text-success">
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
                            <!-- input group -->
                            <div class="col-4 col-md-3 col-lg-3">
                                <div class="input-group input-spinner">
                                    <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                                    <input type="number" step="1" max="10" value="{{$cart->quantity}}" name="quantity"
                                           class="quantity-field form-control-sm form-input" />
                                    <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                                </div>
                            </div>
                            <!-- price -->
                            <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                                <span class="fw-bold">{{$general->cur_sym}}{{showAmount(optional($cart->products)
                                ->price)}}</span>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item py-3 ps-0">
                        <!-- row -->
                        <div class="row align-items-center">
                            <div class="col-6 col-md-6 col-lg-7">
                                <div class="d-flex">
                                    <img src="../assets/images/products/product-img-2.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
                                    <div class="ms-3">
                                        <a href="shop-single.html" class="text-inherit">
                                            <h6 class="mb-0">@lang('Empty Cart')</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- input group -->
                            <div class="col-4 col-md-3 col-lg-3">
                                <!-- input -->
                                <!-- input -->
                                <div class="input-group input-spinner">
                                    <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                                    <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                                    <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                                </div>
                            </div>
                            <!-- price -->
                            <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                                <span class="fw-bold text-danger">$20.00</span>
                                <div class="text-decoration-line-through text-muted small">$26.00</div>
                            </div>
                        </div>
                    </li>
                @endforelse

            </ul>
            <div class="border-top">
                <div class="d-flex justify-content-between mt-4 ">
                    <a href="#!" class="btn btn-primary">@lang('Continue Shopping')</a>
                    <a href="#!" class="btn btn-dark">@lang('Update Cart')</a>
                </div>
            </div>

        </div>
    </div>
</div>
