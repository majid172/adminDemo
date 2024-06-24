@extends($activeTemplate.'layouts.master')
@section('content')
    <section class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center d-md-none py-4">
                        <h3 class="fs-5 mb-0">@lang('Account Setting')</h3>
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
                <!-- col -->
                @include($activeTemplate.'user.order.sidebar')
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="py-6 p-md-6 p-lg-10">
                        <div class="mb-6">
                            <!-- heading -->
                            <h2 class="mb-0">@lang('Account Setting')</h2>
                        </div>
                        <form class="register" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <h5 class="mb-4">@lang('Account details')</h5>
                                <div class="row row-cols-1 row-cols-lg-2">
                                    <div class="mb-3 col">
                                        <label class="form-label">@lang('First Name')</label>
                                        <input type="text" class="form-control" name="firstname"
                                               value="{{$user->firstname}}" placeholder="@lang('Enter your name')
                                                   " />
                                    </div>
                                    <!-- input -->
                                    <div class="mb-3 col">
                                        <label class="form-label">@lang('Last Name')</label>
                                        <input type="text" class="form-control" name="lastname"
                                               value="{{$user->lastname}}" placeholder="@lang('Enter your last name')" />
                                    </div>

                                    <div class="mb-3 col">
                                        <label class="form-label">@lang('Email')</label>
                                        <input type="email" class="form-control" value="{{$user->email}}" readonly placeholder="@lang('example@gmail.com')" />
                                    </div>
                                    <!-- input -->
                                    <div class="mb-3 col">
                                        <label class="form-label">@lang('Phone')</label>
                                        <input type="text" class="form-control" placeholder="@lang('Phone number')" value="{{$user->mobile}}" readonly/>
                                    </div>

                                </div>
                            </div>

                            <hr class="my-10" />
                            <div class="pe-lg-14">
                                <!-- heading -->
                                <h5 class="mb-4">@lang('Address')</h5>
                                <div class="row row-cols-1 row-cols-lg-2">
                                    <div class="mb-3 col">
                                        <label class="form-label">@lang('Address')</label>
                                        <input type="text" class="form-control" name="address"
                                               value="{{@$user->address->address}}" placeholder="@lang('Enter your address')
                                               " />
                                    </div>
                                    <!-- input -->
                                    <div class="mb-3 col">
                                        <label class="form-label">@lang('State')</label>
                                        <input type="text" class="form-control" name="state"
                                               value="{{@$user->address->state}}" placeholder="@lang('Enter State')" />
                                    </div>

                                    <div class="mb-3 col">
                                        <label class="form-label">@lang('Zip Code')</label>
                                        <input type="text" class="form-control" name="zip"
                                               value="{{@$user->address->zip}}"  placeholder="@lang('Enter zip code')" />
                                    </div>
                                    <!-- input -->
                                    <div class="mb-3 col">
                                        <label class="form-label">@lang('City')</label>
                                        <input type="text" class="form-control" name="city"
                                               value="{{@$user->address->city}}" placeholder="@lang('Enter city')" />
                                    </div>
                                    <div class="mb-3 col">
                                        <label class="form-label">@lang('Country')</label>
                                        <input type="text" class="form-control" value="{{@$user->address->country}}" disabled />
                                    </div>
                                </div>
                            </div>
                            <hr class="my-5" />
                            <div class="mb-3">
                                <button class="btn btn-primary">@lang('Save Details')</button>
                            </div>
                        </form>

                        <hr class="my-10" />
                        <div>
                            <!-- heading -->
                            <h5 class="mb-4">@lang('Delete Account')</h5>
                            <p class="mb-2">@lang('Would you like to delete your account?')</p>
                            <p class="mb-5">@lang('This account contain orders, Deleting your account will remove all the order details associated with it.')</p>
                            <!-- btn -->
                            <a href="javascript:void(0)" class="btn btn-outline-danger" data-bs-toggle="modal"
                               data-bs-target="#deleteModal">@lang('I want to delete my
                            account')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-secondary" id="deleteModalLabel">@lang('Delete Account')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('user.remove.account')}}" method="GET">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                        <p class="text-muted">@lang('Are you want to delete your account?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-danger">@lang('Delete Account')</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
