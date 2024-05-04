@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 card-primary shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text--primary">@lang('Languages List')</h6>
               
                <a class="btn btn-sm btn--primary" data-bs-toggle="modal" data-bs-target="#createModal"><i
                    class="las la-plus"></i>@lang('Add Language')</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-items-center table-borderless">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Code')</th>
                                <th>@lang('Default')</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @forelse ($languages as $item)
                            <tr>
                                <td>{{__($item->name)}}</td>
                                <td><strong>{{ __($item->code) }}</strong></td>
                                <td>
                                    @if($item->is_default == 1)
                                    <span
                                        class="text--small badge font-weight-normal badge--success">@lang('Default')</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-outline--primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="las la-ellipsis-v"></i> @lang('More')
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                           
                                            <li><a class="dropdown-item text--warning" href="{{route('admin.language.key', $item->id)}}"><i class="la la-language"></i> @lang('Language')</a></li>

                                            <li><a class="dropdown-item editBtn text--info" title="@lang('Edit')" href="javascript:void(0)" data-url="{{ route('admin.language.manage.update', $item->id)}}" data-lang="{{ json_encode($item->only('name', 'text_align', 'is_default')) }}"><i class="la la-edit"></i> @lang('Edit')</a></li>

                                            @if($item->id != 1)
                                            <li><a class="dropdown-item confirmationBtn text--danger" href="javascript:void(0)" data-question="@lang('Are you sure to remove this language from this system?')" data-action="{{ route('admin.language.manage.delete', $item->id) }}"> <i class="la la-trash"></i> @lang('Remove')</a></li>
                                        
                                        @endif
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
                
            </div>
        </div>
    </div>
</div>

{{-- NEW MODAL --}}
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createModalLabel"> @lang('Add New Language')</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="las la-times"></i></button>
            </div>
            <form class="form-horizontal" method="post" action="{{ route('admin.language.manage.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="row form-group">
                        <label>@lang('Language Name')</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label>@lang('Language Code')</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{ old('code') }}" name="code" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label>@lang('Default Language')</label>
                        <div class="col-sm-12">
                            <select name="is_default" id="setDefault" class="form-control">
                                <option value="1">@lang('Default')</option>
                                <option value="0">@lang('Not Default')</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary btn-global w-100" id="btn-save"
                        value="add">@lang('Add Language')</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- EDIT MODAL --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editModalLabel">@lang('Edit Language')</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="las la-times"></i></button>
            </div>
            <form method="post">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>@lang('Language Name')</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>@lang('Default Language')</label>
                        <div class="col-sm-12">
                            <select name="is_default" id="setDefault" class="form-control">
                                <option value="1">Default</option>
                                <option value="0">Not Default</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary btn-global w-100" id="btn-save"
                        value="add">@lang('Update Language')</button>
                </div>
            </form>
        </div>
    </div>
</div>

<x-confirmation-modal></x-confirmation-modal>
@endsection


@push('breadcrumb-plugins')

@endpush

@push('script')
<script>
    (function ($) {
        "use strict";
        $('.editBtn').on('click', function () {
            var modal = $('#editModal');
            var url = $(this).data('url');
            var lang = $(this).data('lang');

            modal.find('form').attr('action', url);
            modal.find('input[name=name]').val(lang.name);
            modal.find('select[name=text_align]').val(lang.text_align);
            if (lang.is_default == 1) {
                console.log("default");
                modal.find('.modal-body #setDefault').val(1);
            } else {
                modal.find('.modal-body #setDefault').val(0);
            }
            modal.modal('show');
        });
    })(jQuery);
</script>
@endpush