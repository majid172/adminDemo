@extends('admin.layouts.app')

@section('panel')
<div class="row justify-content-center gy-4">
    @if(request()->routeIs('admin.deposit.list') || request()->routeIs('admin.deposit.method') ||
    request()->routeIs('admin.users.deposits') || request()->routeIs('admin.users.deposits.method'))
    <div class="col-lg-12 mt-5">
        <div class="row gy-4">
            <div class="col-xxl-3 col-sm-6">
                <a href="{{ route('admin.deposit.successful') }}">
                    <div class="card prod-p-card background-pattern-white bg--primary">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5 text-white">@lang('Successful Deposit')</h6>
                                    <h3 class="m-b-0 text-white">{{ __($general->cur_sym) }}{{ showAmount($successful)}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <a href="{{ route('admin.deposit.pending') }}">
                    <div class="card prod-p-card background-pattern-white bg--white">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5">@lang('Pending Deposit')</h6>
                                    <h3 class="m-b-0">{{ __($general->cur_sym) }}{{ showAmount($pending) }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <a href="{{ route('admin.deposit.rejected') }}">
                    <div class="card prod-p-card background-pattern-white bg--primary">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5 text-white">@lang('Rejected Deposit')</h6>
                                    <h3 class="m-b-0 text-white">{{ __($general->cur_sym) }}{{ showAmount($rejected) }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <a href="{{ route('admin.deposit.initiated') }}">
                    <div class="card prod-p-card background-pattern-white">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5">@lang('Initiated Deposit')</h6>
                                    <h3 class="m-b-0">{{ __($general->cur_sym) }}{{ showAmount($initiated) }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @endif

    <div class="col-lg-12">
        <div class="card mb-4 card-primary shadow">
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-items-center table-borderless">
                        <thead class="thead-light">
                        <tr>
                            <th>@lang('User')</th>
                            <th>@lang('Method')</th>
                            <th>@lang('Trx. No.')</th>
                            <th>@lang('Amount')</th>
                            <th>@lang('Conversion')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Trx. At')</th>
                            <th>@lang('Action')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($deposits as $deposit)
                            @php
                            $details = $deposit->detail ? json_encode($deposit->detail) : null;
                            @endphp
                            <tr>
                                <td>
                                    <a class="text-muted" href="{{ appendQuery('search',@$deposit->user->username) }}">{{
                                        @$deposit->user->fullname }}</a>
                                </td>
                                <td>
                                    <span class="fw-bold"> 
                                        <a href="{{ appendQuery('method',@$deposit->gateway->alias) }}">{{__(@$deposit->gateway->name) }}</a> </span>
                                </td>

                                <td>{{ $deposit->trx }}</td>
                                
                                <td>
                                    <strong title="@lang('Amount with charge')">
                                        {{ showAmount($deposit->amount+$deposit->charge) }} {{ __($general->cur_text) }}
                                    </strong>
                                </td>
                                <td>
                                    <strong>{{ showAmount($deposit->final_amo) }}
                                        {{__($deposit->method_currency)}}</strong>
                                </td>
                                
                                <td>{!! $deposit->statusBadge !!}</td>
                                <td>
                                    {{ showDateTime($deposit->created_at) }}
                                </td>
                                <td>
                                    <a title="@lang('Details')"
                                        href="{{ route('admin.deposit.details', $deposit->id) }}"
                                        class="btn btn-sm btn--primary ms-1">
                                        <i class="la la-eye"></i>
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
                <div class="card-footer">{{ $deposits->links() }}</div>
            </div>
        </div>
    </div>

</div>


@endsection


@push('breadcrumb-plugins')
@if(!request()->routeIs('admin.users.deposits') && !request()->routeIs('admin.users.deposits.method'))
<form action="" method="GET">
    <div class="form-inline float-sm-end ms-0 ms-xl-2 ms-lg-0">
        <div class="input-group">
            <input type="text" name="search" class="form-control bg--white"
                placeholder="@lang('Search by Username or Trx')" value="{{ request()->search ?? '' }}">
            <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
@endif
@endpush

@push('style')
<style>
    .nav-tabs {
        border: 0;
    }

    .nav-tabs li a {
        border-radius: 4px !important;
    }
</style>
@endpush