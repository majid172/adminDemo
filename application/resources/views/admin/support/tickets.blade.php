@extends('admin.layouts.app')
@section('panel')

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 card-primary shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text--primary">@lang('Ticket List')</h6>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-items-center table-borderless">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('Subject')</th>
                                <th>@lang('Majority')</th>
                                <th>@lang('Started By')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @forelse($items as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.ticket.view', $item->id) }}" class="fw-bold text--muted">
                                        @lang('Ticket')#{{ $item->ticket }} - {{ strLimit($item->subject,30) }} </a>
                                </td>
                                <td>
                                    @if($item->priority == 1)
                                    <span class="badge badge--dark">@lang('Low')</span>
                                    @elseif($item->priority == 2)
                                    <span class="badge  badge--warning">@lang('Medium')</span>
                                    @elseif($item->priority == 3)
                                    <span class="badge badge--danger">@lang('High')</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->user_id)
                                    <a href="{{ route('admin.users.detail', $item->user_id) }}">
                                        {{@$item->user->fullname}}</a>
                                    @else
                                    <p class="fw-bold"> {{$item->name}}</p>
                                    @endif
                                </td>
                                
                                <td> {!! $item->statusBadge !!} </td>
                                <td>
                                    <a title="@lang('Details')" href="{{ route('admin.ticket.view', $item->id) }}"
                                        class="btn btn-sm btn--primary ms-1">
                                        <i class="las la-eye text--shadow"></i>
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
                <div class="card-footer">{{ $items->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection