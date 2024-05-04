@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 card-primary shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text--primary">@lang('Method List')</h6>
                <a class="btn btn-sm btn-outline--primary" href="{{ route('admin.withdraw.method.create') }}"><i class="las la-plus"></i>@lang('Add New')</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-items-center table-borderless">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('Method')</th>
                                <th>@lang('Currency')</th>
                                <th>@lang('Charge')</th>
                                <th>@lang('Payout Limit')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($methods as $method)
                            <tr>
                                <td data-label="@lang('Method')">{{__($method->name)}}</td>

                                <td data-label="@lang('Currency')" class="fw-bold">{{ __($method->currency) }}</td>
                                <td data-label="@lang('Charge')" class="fw-bold">{{ showAmount($method->fixed_charge)}} {{__($general->cur_text) }}
                                    {{ (0 < $method->percent_charge) ? ' + '. showAmount($method->percent_charge) .' %'
                                        : '' }} </td>
                                <td data-label="@lang('Payout Limit')" class="fw-bold">{{ $method->min_limit + 0 }}
                                    - {{ $method->max_limit + 0 }} {{__($general->cur_text) }}</td>
                                <td data-label="@lang('Status')">
                                    @if($method->status == 1)
                                    <span
                                        class="text--small badge font-weight-normal badge--success">@lang('Active')</span>
                                    @else
                                    <span
                                        class="text--small badge font-weight-normal badge--warning">@lang('Disabled')</span>
                                    @endif
                                </td>
                                <td data-label="@lang('Action')">
                                    <div class="button--group">
                                        <a title="@lang('Edit')"
                                            href="{{ route('admin.withdraw.method.edit', $method->id)}}"
                                            class="btn btn-sm btn--primary ms-1"><i class="las la-edit"></i>
                                        </a>
                                        @if($method->status == 1)
                                        <button title="@lang('Disable')"
                                            class="btn btn-sm btn--danger ms-1 confirmationBtn"
                                            data-question="@lang('Are you sure to disable this method?')"
                                            data-action="{{ route('admin.withdraw.method.deactivate',$method->id) }}">
                                            <i class="la la-eye-slash"></i>
                                        </button>
                                        @else
                                        <button title="@lang('Enable')"
                                            class="btn btn-sm btn--success ms-1 confirmationBtn"
                                            data-question="@lang('Are you sure to enable this method?')"
                                            data-action="{{ route('admin.withdraw.method.activate',$method->id) }}">
                                            <i class="la la-check-circle"></i>
                                        </button>
                                        @endif
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
                
            </div>
        </div>
    </div>
</div>
<x-confirmation-modal></x-confirmation-modal>
@endsection



@push('breadcrumb-plugins')

<div class="d-flex flex-wrap justify-content-end">
    
    <div class="d-inline">
        <div class="input-group justify-content-end">
            <input type="text" name="search_table" class="form-control bg--white" placeholder="@lang('Search')...">
            <button class="btn btn--primary input-group-text"><i class="fa fa-search"></i></button>
        </div>
    </div>
</div>
@endpush