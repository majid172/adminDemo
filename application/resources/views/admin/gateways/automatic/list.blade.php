@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 card-primary shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-items-center table-borderless">
                        <thead>
                            <tr>
                                <th>@lang('Gateway')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($gateways->sortBy('alias') as $k=>$gateway)
                            <tr>
                                <td>{{__($gateway->name)}}</td>

                                <td>
                                    @if($gateway->status == 1)
                                    <span
                                        class="text--small badge font-weight-normal badge--success">@lang('Enabled')</span>
                                    @else
                                    <span
                                        class="text--small badge font-weight-normal badge--warning">@lang('Disabled')</span>
                                    @endif

                                </td>
                                <td>
                                    <div class="button--group">
                                        <a title="@lang('Edit')"
                                            href="{{ route('admin.gateway.automatic.edit', $gateway->alias) }}"
                                            class="btn btn-sm btn--primary editGatewayBtn">
                                            <i class="las la-edit"></i>
                                        </a>


                                        @if($gateway->status == 0)
                                        <button title="@lang('Enable')"
                                            class="btn btn-sm btn--success ms-1 confirmationBtn"
                                            data-question="@lang('Are you sure to enable this gateway?')"
                                            data-action="{{ route('admin.gateway.automatic.activate',$gateway->code) }}">
                                            <i class="la la-check-circle"></i>
                                        </button>
                                        @else
                                        <button title="@lang('Disable')"
                                            class="btn btn-sm btn--danger ms-1 confirmationBtn"
                                            data-question="@lang('Are you sure to disable this gateway?')"
                                            data-action="{{ route('admin.gateway.automatic.deactivate',$gateway->code) }}">
                                            <i class="la la-eye-slash"></i>
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