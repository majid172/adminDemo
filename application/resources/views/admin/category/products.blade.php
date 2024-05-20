@php
    $categories = \App\Models\Category::get();
@endphp
@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 card-primary shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text--primary">@lang('All Product List')</h6>
                <button type="button" class="btn btn-sm btn-outline--primary" data-bs-toggle="modal" data-bs-target="#addModal"><i class="las la-plus"></i>@lang('Add')</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-items-center table-borderless">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('Sl.')</th>
                                <th>@lang('Product')</th>
                                <th>@lang('Category')</th>
                                <th>@lang('Quantity')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Created_at')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $list)
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{ucwords($list->name)}}</td>
                                <td>
                                    <span class="badge  badge--warning">{{ucwords(optional($list->category)->cat_name)
                                    }}</span>
                                </td>
                                <td><span class="badge bg--danger">{{__($list->quantity)}}</span></td>
                                <td>
                                    <span class="text--success">{{$general->cur_sym}}{{showAmount($list->price)}}
                                    </span>
                                </td>
                                <td>
                                    {{ showDateTime($list->created_at) }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-outline--primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="las la-ellipsis-v"></i> @lang('View')
                                        </button>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item text--green edit" href="javascript:void(0)"
                                                   data-bs-toggle="modal" data-bs-target="#edit" data-product="{{$list}}"><i
                                                        class="las la-edit"></i> @lang('Edit')
                                                </a></li>
                                            <li><a class="dropdown-item text--green" href="javascript:void(0)"
                                                   data-bs-toggle="modal" data-bs-target="#edit"><i class="las
                                                   la-edit"></i> @lang('Remove')
                                                </a></li>
                                        </ul>
                                    </div>
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
                <div class="card-footer">{{ $products->links() }}</div>
            </div>
        </div>
    </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">@lang('Add New Product')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">@lang('Product Name') </label>
                                    <input type="text" name="product_name" class="form-control" id="name"
                                           placeholder="@lang('Enter product name')" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="description">@lang('Category') </label>
                                    <select name="cat_id" id="category" class="form-control" required>
                                        <option value="">@lang('Choose category')</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price">@lang('Price') </label>
                                    <input type="text" name="price" id="price" class="form-control"
                                           placeholder="@lang('Enter product price')"  required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="quantity">@lang('Quantity')</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control"
                                               placeholder="Enter product quantity" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">@lang('Description') <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control"
                                      placeholder="@lang('Write product description ...')"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="img">@lang('Product Image')</label>
                            <input type="file" name="image" id="img" class="form-control dropify" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Create')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    edit --}}
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">@lang('Update Product')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.product.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" >
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">@lang('Product Name') </label>
                                <input type="text" name="product_name" class="form-control" id="name"
                                       placeholder="@lang('Enter product name')" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="description">@lang('Category') </label>
                                <select name="cat_id" id="category" class="form-control" required>
                                    <option value="">@lang('Choose category')</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="price">@lang('Price') </label>
                                <input type="text" name="price" id="price" class="form-control"
                                       placeholder="@lang('Enter product price')"  required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="quantity">@lang('Quantity')</label>
                                    <input type="number" name="quantity" id="quantity" class="form-control"
                                           placeholder="Enter product quantity" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">@lang('Description') <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control"
                                  placeholder="@lang('Write product description ...')"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">@lang('Product Image')</label>
                        <input type="file" name="image" id="img" class="form-control dropify" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--primary">@lang('Update')</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{--  remove course  --}}
    <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title text-danger"  id="removeModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">@lang('Product Name') </label>
                                    <input type="text" name="product_name" class="form-control" id="name"
                                           placeholder="@lang('Enter product name')" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="description">@lang('Category') </label>
                                    <select name="cat_id" id="category" class="form-control" required>
                                        <option value="">@lang('Choose category')</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price">@lang('Price') </label>
                                    <input type="text" name="price" id="price" class="form-control"
                                           placeholder="@lang('Enter product price')"  required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="quantity">@lang('Quantity')</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control"
                                               placeholder="Enter product quantity" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">@lang('Description') <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control"
                                      placeholder="@lang('Write product description ...')"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="img">@lang('Product Image')</label>
                            <input type="file" name="image" id="img" class="form-control dropify" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <div class="d-flex flex-wrap justify-content-end">
        <form action="" method="GET" class="form-inline">
            <div class="input-group justify-content-end">
                <input type="text" name="search" class="form-control bg--white" placeholder="@lang('Search by Username')"
                       value="{{ request()->search }}">
                <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
@endpush
    @push('style')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
@push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('.dropify').dropify();
        </script>
    <script>
        $('.edit').on('click',function(){
            var product = $(this).data('product');

            $('#edit').find('input[name="id"]').val(product.id);
            $('#edit').find('input[name="product_name"]').val(product.name);
            $('#edit').find('input[name="cat_id"]').val(product.cat_id);
            $('#edit').find('input[name="price"]').val(product.price);
            $('#edit').find('input[name="quantity"]').val(product.quantity);
            $('#edit').find('textarea[name="description"]').val(product.description);
        })
        $('.remove').on('click',function (){
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('.title').text(name);
            $('#removeModal').find('input[name="id"]').val(id);
        })
    </script>
@endpush