@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 card-primary shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text--primary">@lang('Page List')</h6>
                
                <button type="button" class="btn btn-sm btn-outline--primary addBtn"><i class="las la-plus"></i>@lang('Add New')</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-items-center table-borderless">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Slug')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                           
                            @forelse($pdata as $k => $data)
                            <tr>
                                <td>{{ __($data->name) }}</td>
                                <td>{{ __($data->slug) }}</td>
                                <td>
                                    <div class="button--group">
                                        <a title="@lang('Edit')"
                                            href="{{ route('admin.frontend.manage.section', $data->id) }}"
                                            class="btn btn-sm btn--primary"><i class="las la-edit"></i>
                                        </a>
                                        @if($data->is_default == 0)
                                        <button title="@lang('Delete')" class="btn btn-sm btn--danger confirmationBtn"
                                            data-action="{{ route('admin.frontend.manage.pages.delete',$data->id) }}"
                                            data-question="@lang('Are you sure to remove this page?')">
                                            <i class="las la-trash"></i>
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
{{-- Add METHOD MODAL --}}
<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text--primary"> @lang('Add New Page')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form action="{{ route('admin.frontend.manage.pages.save')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label> @lang('Page Name')</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                    </div>
                    <div class="form-group">
                        <label> @lang('Slug')</label>
                        <input type="text" class="form-control" name="slug" value="{{old('slug')}}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary btn-global w-100">@lang('Save')</button>
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

        $('.addBtn').on('click', function () {
            var modal = $('#addModal');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });

    })(jQuery);

</script>

@endpush