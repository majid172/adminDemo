@extends('admin.layouts.app')

@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 card-primary shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text--primary">@lang('User Login')</h6>
               
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-items-center table-borderless">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('User')</th>
                                <th>@lang('Browser and OS')</th>
                                <th>@lang('IP')</th>
                                <th>@lang('Login at')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($loginLogs as $log)
                            <tr>

                                <td>
                                    <a href="{{ route('admin.users.detail', $log->user_id) }}">{{@$log->user->fullname }}</a>
                                </td>

                                <td>
                                    {{ __($log->browser) }}, {{ __($log->os) }}
                                </td>
                               
                                <td>
                                    <span class="fw-bold">
                                        <a href="{{route('admin.report.login.ipHistory',[$log->user_ip])}}">{{
                                            $log->user_ip }}</a>
                                    </span>
                                </td>
                                <td>
                                    {{showDateTime($log->created_at) }}
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
                <div class="card-footer">{{ $loginLogs->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection



@push('breadcrumb-plugins')
@if(request()->routeIs('admin.report.login.history'))
<form action="{{ route('admin.report.login.history') }}" method="GET" class="form-inline float-sm-end">
    <div class="input-group">
        <input type="text" name="search" class="form-control bg--white" placeholder="@lang('Search Username')"
            value="{{ request()->search }}">
        <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
    </div>
</form>
@endif
@endpush
@if(request()->routeIs('admin.report.login.ipHistory'))
@push('breadcrumb-plugins')
<a href="https://www.ip2location.com/{{ $ip }}" target="_blank" class="btn btn--primary">@lang('Lookup IP') {{ $ip
    }}</a>
@endpush
@endif