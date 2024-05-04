@extends('admin.layouts.app')

@section('panel')
<div class="row justify-content-center">
    @if(request()->routeIs('admin.withdraw.log') || request()->routeIs('admin.withdraw.method') ||
    request()->routeIs('admin.users.withdrawals') || request()->routeIs('admin.users.withdrawals.method'))
    <div class="col-lg-12 mt-3">
        <div class="row gy-4 pb-4">
            <div class="col-xl-4 col-sm-6">
                <a href="{{ route('admin.withdraw.approved') }}">
                    <div class="card prod-p-card background-pattern-white bg--primary">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5 text-white">@lang('Approved Payouts')</h6>
                                    <h3 class="m-b-0 text-white">{{ __($general->cur_sym) }}{{ showAmount($successful)
                                        }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-sm-6">
                <a href="{{ route('admin.withdraw.pending') }}">
                    <div class="card prod-p-card background-pattern-white bg--white">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5">@lang('Pending Payouts')</h6>
                                    <h3 class="m-b-0 ">{{ __($general->cur_sym) }}{{ showAmount($pending) }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-sm-6">
                <a href="{{ route('admin.withdraw.rejected') }}">
                    <div class="card prod-p-card background-pattern-white bg--primary">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5 text-white">@lang('Rejected Payouts')</h6>
                                    <h3 class="m-b-0 text-white">{{ __($general->cur_sym) }}{{ showAmount($rejected) }}
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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text--primary">@lang('List')</h6>
                   
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-items-center table-borderless">
                            <thead class="thead-light">
                                <tr>
                                    <th>@lang('Sl.')</th>
                                    <th>@lang('User')</th>
                                    <th>@lang('Amount')</th>
                                    <th>@lang('Conversion')</th>
                                    <th>@lang('Method')</th>
                                    <th>@lang('Payouts at')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @forelse($withdrawals as $key=>$withdraw)
                                @php
                                $details = ($withdraw->withdraw_information != null) ?
                                json_encode($withdraw->withdraw_information) : null;
                                @endphp
                            <tr>
                                <td data-label="SL">
                                    {{++$key}}
                                </td>
                                <td data-label="@lang('Name')"> <span class="fw-bold">{{ optional($withdraw->user)->fullanme }}</span></td>
                                
                                <td data-label="@lang('Balance')">
                                    <strong title="@lang('Amount after charge')">
                                        {{ showAmount($withdraw->amount-$withdraw->charge) }} {{ __($general->cur_text)
                                        }}
                                    </strong>
                                </td>
                                <td data-label="@lang('Conversion')">
                                    <strong>{{ showAmount($withdraw->final_amount) }} {{ __($withdraw->currency)
                                    }}</strong>
                                </td>
                                <td data-label="@lang('Method')">
                                    <span class="fw-bold"><a href="{{ appendQuery('method',@$withdraw->method->id) }}">
                                        {{ __(@$withdraw->method->name) }}</a></span>
                                </td>
                                <td data-label="@lang('Payouts at')">{{ showDateTime($withdraw->created_at) }}</td>
                               
                                
                                <td data-label="@lang('Status')"> {!! $withdraw->statusBadge !!}</td>
    
                                <td data-label="@lang('Action')">
                                    <a title="@lang('Details')"
                                        href="{{ route('admin.withdraw.details', $withdraw->id) }}"
                                        class="btn btn-sm btn--primary ms-1">
                                        <i class="la la-eye"></i>
                                    </a>
                                </td>
    
                            </tr>
                            
                            @empty
                                <tr>
                                    <th colspan="100%" class="text-center">{{ __($emptyMessage) }}</th>
                                    
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">{{ $withdrawals->links() }}</div>
                </div>
            </div>
        </div>
  
</div>

@endsection




@push('breadcrumb-plugins')
<form action="" method="GET">
    <div class="form-inline float-sm-end ms-0 ms-xl-2 ms-lg-0">
        <div class="input-group">
            <input type="text" name="search" class="form-control bg--white" placeholder="@lang('Trx number/Username')"
                value="{{ request()->search }}">
            <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
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