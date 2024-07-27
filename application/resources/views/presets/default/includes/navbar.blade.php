@php
    $pages = \App\Models\Page::all();
    $categories = \App\Models\Category::with('products')->get();
@endphp
<nav class="navbar navbar-expand-lg navbar-light navbar-default p-0 p-sm-0 navbar-offcanvas-color" aria-label="Offcanvas navbar large">
    <div class="container">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="navbar-default" aria-labelledby="navbar-defaultLabel">
            <div class="offcanvas-header pb-1">
                <a href="index.html"><img src="../assets/images/logo/freshcart-logo.svg" alt="eCommerce HTML Template" /></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div>
                    <ul class="navbar-nav align-items-center">
                        <li class="dropdown me-6 d-none d-lg-block">
                            <a href="#" class="text-inherit" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-text-left me-2" viewBox="0 0 16 16">
                                    <path
                                        fill-rule="evenodd"
                                        d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>
                                </svg>
                                @lang('All Categories')
                            </a>

                            <ul class="dropdown-menu dropdown-menu-lg">
                                @foreach($categories as $category)
                                    <li class="dropdown-menu-list">
                                        <a href="javascript:void(0)" class="dropdown-item d-flex justify-content-between mb-1 py-1">
                                            <div>
                                                <svg width="24" height="24" viewBox="0 0 56 56" fill="#3d4f58" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.552 4.492c-.866.461-1.259.989-1.259 1.691 0 .528.117.739 1.345 2.441 1.38 1.914 2.031 2.908 2.619 4l.44.817-.441.443c-.57.571-1.258 1.618-1.562 2.377-.488 1.219-.553 1.833-.484 4.552.086 3.344.063 3.438-1.322 5.563-3.071 4.71-3.467 10.38-1.059 15.17 2.11 4.199 5.779 7.017 10.451 8.028 1.317.285 4.424.309 5.74.044 1.2-.242 2.463-.661 3.593-1.194l.98-.462.234.301c.71.915 3.156 2.749 4.598 3.449 1.351.656 2.078.68 5.062.167 1.944-.334 2.488-.327 4.337.057 2.919.605 3.775.501 5.844-.71 2.809-1.644 4.954-3.989 6.433-7.033 1.184-2.436 1.726-4.8 1.726-7.529 0-5.719-2.753-10.986-7.364-14.089-1.117-.752-2.25-1.345-2.748-1.438l-.344-.065.306-.339c1.465-1.622 2.695-4.262 3.013-6.47l.063-.437-.36-.03c-.345-.028-.361-.044-.389-.393l-.03-.364-.904.057a8.632 8.632 0 0 0-5.733 2.661c-.295.309-.537.534-.537.499-.001-.034-.064-.751-.141-1.592-.161-1.741-.302-2.174-.844-2.587-.311-.238-.446-.274-1.117-.303-.63-.026-.829.002-1.142.161-.777.396-.981.914-.864 2.186.044.472.103 1.142.13 1.487l.051.628-.683-.683c-1.416-1.416-3.251-2.255-5.362-2.451l-.666-.062-.738-1.41c-2.178-4.161-3.174-5.38-5.154-6.307-1.09-.51-1.935-.678-3.443-.686-1.828-.01-3.34.312-4.9 1.042a9.268 9.268 0 0 1-1.4.511c-.36.089-.962.307-1.34.485-.377.179-.723.302-.768.274-.045-.028-.469-.557-.943-1.174-.586-.767-.971-1.18-1.211-1.303-.481-.245-1.233-.236-1.713.02m2.094 2.643a50.969 50.969 0 0 1 1.627 2.227c.562.842 1.607 2.753 1.538 2.814-.085.076-.845.433-.865.407a49.22 49.22 0 0 1-.518-.916c-.589-1.054-1.261-2.071-2.63-3.975-.556-.774-1.011-1.457-1.011-1.518 0-.15.554-.477.708-.418.068.026.586.647 1.151 1.379m11.561-.924c.396.08 1.073.312 1.506.517.65.308.924.513 1.587 1.185.776.787 1.151 1.344 2.241 3.324l.303.551-.639-.065c-3.356-.339-6.537-1.796-8.756-4.013-.52-.519-.88-.946-.815-.968.16-.053 1.526.225 2.259.461 1.281.411 2.653 1.054 3.641 1.707.563.371 1.045.654 1.071.627.146-.145-.034-.347-.799-.894-.994-.711-2.754-1.615-4.006-2.058l-.887-.313.374-.062c.205-.034.436-.076.513-.092.407-.086 1.778-.033 2.407.093M13.66 7.966c1.401 1.737 3.681 3.322 6.046 4.201 1.675.623 3.918 1.084 5.287 1.088.803.002.954.064.954.391 0 .894.68 3.212 1.311 4.467.426.848 1.333 2.136 2.049 2.91.592.641.643.724.444.724-.498 0-1.203.309-2.085.915l-.928.638-.793-.551c-.435-.303-1.38-.848-2.098-1.212-1.102-.558-1.404-.76-1.925-1.286-.772-.781-1.097-1.434-1.528-3.067-.445-1.682-.816-2.371-1.818-3.374-1.393-1.395-2.794-1.961-4.97-2.012l-1.281-.03-.544-1.054c-.3-.58-.824-1.484-1.167-2.01l-.621-.957.207-.135c.386-.253 1.138-.552 1.793-.714l.654-.162.186.218c.103.119.475.575.827 1.012m1.273 5.433c1.492.35 2.805 1.337 3.47 2.608.188.359.452 1.087.586 1.616.437 1.726.743 2.384 1.555 3.351.598.712 1.395 1.288 2.556 1.848.565.272 1.356.71 1.758.973l.732.479-.638.674c-3.328 3.512-5.01 8.519-4.507 13.415.281 2.742 1.276 5.584 2.694 7.694l.479.713-.866.409c-1.863.881-3.618 1.215-5.994 1.14-2.274-.072-3.719-.439-5.695-1.447-3.677-1.875-6.298-5.395-7.104-9.539-.257-1.322-.234-3.725.049-5.034.428-1.982 1.088-3.53 2.284-5.359.82-1.254.906-1.417 1.185-2.253.211-.631.219-.763.225-3.734.005-2.719.025-3.14.175-3.593.432-1.304 1.033-2.154 2-2.833.859-.602 1.179-.773 1.976-1.051.745-.26 2.153-.295 3.08-.077m21.083.064c.081.219.109.498.336 3.311l.138 1.701-.268.679c-.146.374-.284.739-.306.812-.022.072-.149-.18-.283-.56-.222-.629-.249-.867-.302-2.606-.032-1.052-.094-2.249-.138-2.66-.044-.411-.061-.778-.038-.817.024-.038.209-.07.413-.07.298 0 .385.041.448.21m-7.036 1.346c.308.075.896.299 1.307.498 1.822.883 3.144 2.497 3.972 4.847.296.84.779 2.799.708 2.87-.01.01-.407-.166-.882-.392-2.548-1.21-4.469-3.093-5.616-5.505-.347-.728-.842-2.16-.842-2.433 0-.154.379-.122 1.353.115m15.111.008c-.127.551-.53 1.677-.836 2.339-1.045 2.262-3.088 4.279-5.504 5.432-1.073.512-1.086.509-.92-.211.414-1.805 1.18-3.749 1.84-4.671 1.147-1.604 2.636-2.606 4.459-3.002.937-.203 1.031-.192.961.113m-.7 8.239c.482.256 1.217.707 1.633 1.002 1.007.713 2.66 2.385 3.44 3.478 1.207 1.69 2.219 4.091 2.656 6.297.262 1.32.232 4.607-.052 5.927-.456 2.109-1.295 4.096-2.452 5.805-.801 1.182-2.749 3.126-3.894 3.886-.479.318-1.235.755-1.68.973-.765.373-.852.394-1.602.387-.519-.005-1.293-.115-2.24-.317-1.943-.415-3.19-.427-5.133-.046-.898.175-1.668.267-2.288.272-.927.007-.941.003-1.82-.425a14.925 14.925 0 0 1-1.726-1.026c-1.094-.776-2.73-2.419-3.521-3.536-4.301-6.077-3.704-14.517 1.4-19.8 1.469-1.52 2.983-2.612 3.789-2.733.629-.094 1.555.146 3.458.897 1.321.521 1.731.722 1.733.846.002.192.006.193.339.066.174-.066.395-.067.689-.004.913.195 2.076-.217 3.907-1.386 1.913-1.222 2.072-1.249 3.364-.563"
                                                        fill-rule="evenodd"></path>
                                                </svg>
                                                <span class="ms-1">{{$category->cat_name}}</span>
                                            </div>
                                            <div>
                                                <i class="feather-icon icon-chevron-right"></i>
                                            </div>
                                        </a>

                                        <div class="dropdown-menu-list-submenu">
                                            <div>
                                                <ul class="list-unstyled">
                                                    @forelse(@$category->products as $product)
                                                        @if($product->count() < 7)
                                                        <li>
                                                            <a href="javascript:void(0)"
                                                               class="dropdown-item">{{$product->name}}</a>
                                                        </li>
                                                        @endif
                                                    @empty
                                                        <li>
                                                            <a href="javascript:void(0)"
                                                               class="dropdown-item">@lang('Empty Products')</a>
                                                        </li>
                                                    @endforelse

                                                </ul>
                                            </div>

                                            <div>
                                                <ul class="list-unstyled">
                                                    @foreach(@$category->products as $product)
                                                        @if($product->count() >= 7)
                                                            <li>
                                                                <a href="javascript:void(0)" class="dropdown-item">{{$product->name}}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{route('home')}}">@lang('Home')</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">@lang('Shop')</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('user.shop.list')}}">@lang('Shop List')
                                    </a></li>

                                <li><a class="dropdown-item" href="{{route('user.shop.wishlist')}}">@lang('Shop Wishlist')</a></li>
                                <li><a class="dropdown-item" href="{{route('user.shop.cart')}}">@lang('Shop Cart')
                                    </a></li>
                                @auth
                                <li><a class="dropdown-item" href="{{route('user.shop.checkout',auth()->user()->id)}}">@lang('Shop Checkout')
                                    </a></li>
                                @endauth
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Stores</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="store-list.html">Store List</a></li>
                                <li><a class="dropdown-item" href="store-grid.html">Store Grid</a></li>
                                <li><a class="dropdown-item" href="store-single.html">Store Single</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown dropdown-fullwidth">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mega menu</a>
                            <div class="dropdown-menu pb-0">
                                <div class="row p-2 p-lg-4">
                                    <div class="col-lg-3 col-12 mb-4 mb-lg-0">
                                        <h6 class="text-primary ps-3">Dairy, Bread & Eggs</h6>
                                        <a class="dropdown-item" href="shop-grid.html">Butter</a>
                                        <a class="dropdown-item" href="shop-grid.html">Milk Drinks</a>
                                        <a class="dropdown-item" href="shop-grid.html">Curd & Yogurt</a>
                                        <a class="dropdown-item" href="shop-grid.html">Eggs</a>
                                        <a class="dropdown-item" href="shop-grid.html">Buns & Bakery</a>
                                        <a class="dropdown-item" href="shop-grid.html">Cheese</a>
                                        <a class="dropdown-item" href="shop-grid.html">Condensed Milk</a>
                                        <a class="dropdown-item" href="shop-grid.html">Dairy Products</a>
                                    </div>
                                    <div class="col-lg-3 col-12 mb-4 mb-lg-0">
                                        <h6 class="text-primary ps-3">Breakfast & Instant Food</h6>
                                        <a class="dropdown-item" href="shop-grid.html">Breakfast Cereal</a>
                                        <a class="dropdown-item" href="shop-grid.html">Noodles, Pasta & Soup</a>
                                        <a class="dropdown-item" href="shop-grid.html">Frozen Veg Snacks</a>
                                        <a class="dropdown-item" href="shop-grid.html">Frozen Non-Veg Snacks</a>
                                        <a class="dropdown-item" href="shop-grid.html">Vermicelli</a>
                                        <a class="dropdown-item" href="shop-grid.html">Instant Mixes</a>
                                        <a class="dropdown-item" href="shop-grid.html">Batter</a>
                                        <a class="dropdown-item" href="shop-grid.html">Fruit and Juices</a>
                                    </div>
                                    <div class="col-lg-3 col-12 mb-4 mb-lg-0">
                                        <h6 class="text-primary ps-3">Cold Drinks & Juices</h6>
                                        <a class="dropdown-item" href="shop-grid.html">Soft Drinks</a>
                                        <a class="dropdown-item" href="shop-grid.html">Fruit Juices</a>
                                        <a class="dropdown-item" href="shop-grid.html">Coldpress</a>
                                        <a class="dropdown-item" href="shop-grid.html">Water & Ice Cubes</a>
                                        <a class="dropdown-item" href="shop-grid.html">Soda & Mixers</a>
                                        <a class="dropdown-item" href="shop-grid.html">Health Drinks</a>
                                        <a class="dropdown-item" href="shop-grid.html">Herbal Drinks</a>
                                        <a class="dropdown-item" href="shop-grid.html">Milk Drinks</a>
                                    </div>
                                    <div class="col-lg-3 col-12 mb-4 mb-lg-0">
                                        <div class="card border-0">
                                            <img src="../assets/images/banner/menu-banner.jpg" alt="eCommerce HTML Template" class="img-fluid" />
                                            <div class="position-absolute ps-6 mt-8">
                                                <h5 class="mb-0">
                                                    Dont miss this
                                                    <br />
                                                    offer today.
                                                </h5>
                                                <a href="#" class="btn btn-primary btn-sm mt-3">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                               data-bs-toggle="dropdown"
                               aria-expanded="false">@lang('Pages')</a>
                            <ul class="dropdown-menu">
                                @foreach($pages as $page)
                                    @unless ($page->slug === '/')
                                        <li>
                                            <a class="dropdown-item" href="{{ url($page->slug) }}">{{ $page->name }}</a>
                                        </li>
                                    @endunless
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">@lang('Account')</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu dropend">
                                    <a class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                       href="javascript:void(0)">@lang('My Account')</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('user.orders.list')}}">@lang('Orders')</a></li>
                                        <li><a class="dropdown-item" href="{{route('user.profile.setting')}}">@lang('Settings')</a></li>

                                        <li><a class="dropdown-item" href="{{route('user.deposit')}}">@lang('Payment Method')</a></li>
                                        <li><a class="dropdown-item" href="account-notification.html">@lang('Notification')</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="{{route('user.password.request')}}">@lang('Forgot Password')</a></li>

                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
