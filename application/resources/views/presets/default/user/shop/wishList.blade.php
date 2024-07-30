@extends($activeTemplate.'layouts.master')

@section('content')
    @include($activeTemplate.'includes.breadcumb')
    <section class="mt-8 mb-14">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-8">
                        <h1 class="mb-1">{{$pageTitle}}</h1>
                        <p>@lang('There are '.$count. ' products in this wishlist.')</p>
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
                                @forelse($wishlists as $wishlist)
                                    <tr>
                                        <td class="align-middle">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="chechboxTwo" />
                                                <label class="form-check-label" for="chechboxTwo"></label>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{route('user.shop.single',$wishlist->product_id)}}"><img src="{{getImage(getFilePath('product').'/'
                                            .$wishlist->products->path.'/'.$wishlist->products->image)}}"
                                                             class="icon-shape icon-xxl" alt="img" /></a>
                                        </td>
                                        <td class="align-middle">
                                            <div>
                                                <h5 class="fs-6 mb-0">
                                                    <a href="{{route('user.shop.single',$wishlist->product_id)}}" class="text-inherit">{{optional($wishlist->products)->name}}</a></h5>
                                            </div>
                                        </td>
                                        <td class="align-middle">{{$general->cur_sym}}{{showAmount(optional
                                        ($wishlist->products)->price)}}</td>
                                        <td class="align-middle">
                                            @if(@$wishlist->products->quantity > 0)
                                                <span class="badge bg-success">@lang('In Stock')</span>
                                            @else
                                                <span class="badge bg-danger">@lang('Out of Stock')</span>
                                            @endif

                                        </td>
                                        <td class="align-middle">
{{--                                            <div class="btn btn-primary btn-sm" >@lang('Add to Cart')</div>--}}
                                            <button type="button" class="btn btn-primary btn-sm addCart"
                                                    data-bs-toggle="modal" data-bs-target="#addCartModal"
                                                    data-product = "{{@$wishlist->products}}"
                                                    data-cur_sym="{{$general->cur_sym}}">
                                                @lang('Add to Cart')
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <a href="javascript:void(0)" class="text-muted remove"
                                               data-bs-toggle="modal" data-wishlist="{{$wishlist}}"
                                               data-bs-target="#removeModal"
                                               data-bs-placement="top" title="Delete">
                                                <i class="feather-icon icon-trash-2"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
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

{{--    add to cart--}}
    <div class="modal fade" id="addCartModal" tabindex="-1" aria-labelledby="addCartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title" id="addCartModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('user.shop.add-cart')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                    <input type="hidden" value="" name="product_id">
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">@lang('Price')</div>
                                </div>
                                <span class="badge bg-primary rounded-pill price"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-5">
                                    <div class="fw-bold">@lang('Quantity')</div>
                                </div>
                                <span class="input-group input-spinner ms-auto text-end">
                                    <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity">
                                    <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" id="quantity">
                                    <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity">
                                </span>
                            </li>

                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">@lang('Add Cart')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{--    remove modal --}}
    <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title" id="removeModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('user.shop.wishlist.remove')}}" method="GET">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id">
                        <p>@lang('Are you confirm to remove product from wishlist?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-danger btn-sm ">@lang('Remove')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('.addCart').on('click',function (){
            let product = $(this).data('product');
            console.log(product)
            let cur_sym = $(this).data('cur_sym');
            $('.title').text(product.name);
            $('.price').text(cur_sym + parseFloat(product.price).toFixed(2));
            $('#addCartModal').find("input[name='product_id']").val(product.id);

        });

        $('.remove').on('click',function (){
           let wishlist = $(this).data('wishlist');
           $('.title').text(wishlist.products.name);
           $('#removeModal').find('[name="id"]').val(wishlist.id)
        });
    </script>
@endpush

