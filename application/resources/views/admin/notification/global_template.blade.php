@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4 card-primary shadow">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="mt-4 mb-2">@lang('Short Codes')</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-items-center table-borderless">
                                <thead class="thead-light">
                                    <tr>
                                        <th>@lang('Short Code') </th>
                                        <th>@lang('Description')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="short-codes">@{{fullname}}</span></td>
                                        <td>@lang('Full Name of User')</td>
                                    </tr>
                                    <tr>
                                        <td><span class="short-codes">@{{username}}</span></td>
                                        <td>@lang('Username of User')</td>
                                    </tr>
                                    <tr>
                                        <td><span class="short-codes">@{{message}}</span></td>
                                        <td>@lang('Message')</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
       
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4 card-primary shadow">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="mt-4 mb-2">@lang('Global Short Codes')</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-items-center table-borderless">
                                <thead class="thead-light">
                                    <tr>
                                        <th>@lang('Short Code') </th>
                                        <th>@lang('Description')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($general->global_shortcodes as $shortCode => $codeDetails)
                                    <tr>
                                        <td><span class="short-codes">@{{@php echo $shortCode @endphp}}</span></td>
                                        <td>{{ __($codeDetails) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-body">
                <form action="{{ route('admin.setting.notification.global.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="shadow-none p-3 mb-2 bg-light rounded">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="fw-bold text-secondary">@lang('Email Sent From') </label>
                                            <input type="text" class="form-control " placeholder="@lang('Email address')"
                                                name="email_from" value="{{ $general->email_from }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="fw-bold text-secondary">@lang('Email Body') </label>
                                            <textarea name="email_template" rows="10" class="form-control  trumEdit"
                                                placeholder="@lang('Your email template')">{{ $general->email_template }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="shadow-none p-3 mb-5 bg-light rounded">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="fw-bold text-secondary">@lang('SMS Sent From') </label>
                                            <input class="form-control" placeholder="@lang('SMS Sent From')" name="sms_from"
                                                value="{{ $general->sms_from }}" required>
                                        </div>
                                    </div>
            
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="fw-bold text-secondary">@lang('SMS Body') </label>
                                            <textarea class="form-control" rows="4" placeholder="@lang('SMS Body')" name="sms_body"
                                                required>{{ $general->sms_body }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn--primary btn-global w-100">@lang('Save')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- card end -->
    </div>
</div>
@endsection