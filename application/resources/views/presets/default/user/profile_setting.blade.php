@extends($activeTemplate.'layouts.master')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center d-md-none py-4">
                        <h3 class="fs-5 mb-0">Account Setting</h3>
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
                            <h2 class="mb-0">Account Setting</h2>
                        </div>
                        <div>
                            <!-- heading -->
                            <h5 class="mb-4">Account details</h5>
                            <div class="row">
                                <div class="col-lg-5">
                                    <!-- form -->
                                    <form>
                                        <!-- input -->
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" placeholder="jitu chauhan" />
                                        </div>
                                        <!-- input -->
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="example@gmail.com" />
                                        </div>
                                        <!-- input -->
                                        <div class="mb-5">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" placeholder="Phone number" />
                                        </div>
                                        <!-- button -->
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Save Details</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr class="my-10" />
                        <div class="pe-lg-14">
                            <!-- heading -->
                            <h5 class="mb-4">Password</h5>
                            <form class="row row-cols-1 row-cols-lg-2">
                                <!-- input -->
                                <div class="mb-3 col">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" placeholder="**********" />
                                </div>
                                <!-- input -->
                                <div class="mb-3 col">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control" placeholder="**********" />
                                </div>
                                <!-- input -->
                                <div class="col-12">
                                    <p class="mb-4">
                                        Can’t remember your current password?
                                        <a href="#">Reset your password.</a>
                                    </p>
                                    <a href="#" class="btn btn-primary">Save Password</a>
                                </div>
                            </form>
                        </div>
                        <hr class="my-10" />
                        <div>
                            <!-- heading -->
                            <h5 class="mb-4">Delete Account</h5>
                            <p class="mb-2">Would you like to delete your account?</p>
                            <p class="mb-5">This account contain 12 orders, Deleting your account will remove all the order details associated with it.</p>
                            <!-- btn -->
                            <a href="#" class="btn btn-outline-danger">I want to delete my account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card custom--card">
                <div class="card-header">
                    <h5 class="card-title">@lang('Profile')</h5>
                </div>
                <div class="card-body">
                    <form class="register" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="form-label">@lang('First Name')</label>
                                <input type="text" class="form-control form--control" name="firstname"
                                    value="{{$user->firstname}}" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label">@lang('Last Name')</label>
                                <input type="text" class="form-control form--control" name="lastname"
                                    value="{{$user->lastname}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="form-label">@lang('E-mail Address')</label>
                                <input class="form-control form--control" value="{{$user->email}}" readonly>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label">@lang('Mobile Number')</label>
                                <input class="form-control form--control" value="{{$user->mobile}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="form-label">@lang('Address')</label>
                                <input type="text" class="form-control form--control" name="address"
                                    value="{{@$user->address->address}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label">@lang('State')</label>
                                <input type="text" class="form-control form--control" name="state"
                                    value="{{@$user->address->state}}">
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label class="form-label">@lang('Zip Code')</label>
                                <input type="text" class="form-control form--control" name="zip"
                                    value="{{@$user->address->zip}}">
                            </div>

                            <div class="form-group col-sm-4">
                                <label class="form-label">@lang('City')</label>
                                <input type="text" class="form-control form--control" name="city"
                                    value="{{@$user->address->city}}">
                            </div>

                            <div class="form-group col-sm-4">
                                <label class="form-label">@lang('Country')</label>
                                <input class="form-control form--control" value="{{@$user->address->country}}" disabled>
                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn--base w-100">@lang('Save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
