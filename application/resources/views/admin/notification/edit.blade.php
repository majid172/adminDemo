@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="row mx-2 my-3">
                <div class="col-lg-6">
                    <div class="shadow-none p-3 mb-5 bg-light rounded">
                        <div class=" py-3 align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text--primary">@lang('Custom Short Code')</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-items-center table-borderless">
                                <thead class="thead-light">
                                    <tr>
                                        <th>@lang('Short Code')</th>
                                        <th>@lang('Description')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($template->shortcodes as $shortcode => $key)
                                    <tr>
                                        <th><span class="short-codes">@php echo "{{". $shortcode ."}}" @endphp</span></th>
                                        <td>{{ __($key) }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="100%" class="text-muted text-center">{{ __($emptyMessage) }}</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shadow-none p-3 mb-5 bg-light rounded">
                        <div class="py-3 align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text--primary">@lang('Basic Short Code')</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-items-center table-borderless">
                                <thead class="thead-light">
                                    <tr>
                                        <th>@lang('Short Code')</th>
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

            <form action="{{ route('admin.setting.notification.template.update',$template->id) }}" method="post">
                @csrf
                <div class="row mx-2">
                    <div class="col-md-6">
                        <div class="shadow-none p-3 mb-5 bg-light rounded">
                            <div class="py-3 align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text--primary">@lang('Email Template')</h6>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="fw-bold text-secondary">@lang('Status')</label>
                                        <label class="switch m-0">
                                            <input type="checkbox" class="toggle-switch" name="email_status" {{
                                                $template->email_status ?
                                            'checked' : null }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="fw-bold text-secondary">@lang('Subject')</label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="@lang('Email subject')" name="subject" value="{{ $template->subj }}"
                                            required />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="fw-bold text-secondary">@lang('Message') <span class="text-danger">*</span></label>
                                        <textarea name="email_body" rows="10" class="form-control trumEdit"
                                            placeholder="@lang('Your message using short-codes')">{{ $template->email_body }}</textarea>
                                    </div>
                                </div>
                            </div>
                                
                            
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="shadow-none p-3 mb-5 bg-light rounded">
                            <div class="py-3 align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text--primary">@lang('SMS Template')</h6>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="fw-bold text-secondary">@lang('Status')</label>
                                        <label class="switch m-0">
                                            <input type="checkbox" class="toggle-switch" name="sms_status" {{
                                                $template->sms_status ?
                                            'checked' : null }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="fw-bold text-secondary">@lang('Message')</label>
                                        <textarea name="sms_body" rows="10" class="form-control"
                                            placeholder="@lang('Your message using short-codes')"
                                            required>{{ $template->sms_body }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row mx-2">
                    <div class="col-12">
                        <div class="form-group text-end">
                            <button type="submit" class="btn btn--primary btn-global w-100">@lang('Save')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection


@push('breadcrumb-plugins')
<a href="{{ route('admin.setting.notification.templates') }}" class="btn btn-sm btn--primary"><i
        class="las la-undo"></i> @lang('Back') </a>
@endpush