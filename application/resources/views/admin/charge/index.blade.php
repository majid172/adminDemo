@extends('admin.layouts.app')
@section('panel')
<div class="row mb-none-30">
    <div class="col-lg-12 col-md-12 mb-30">
        <div class="card">
            <div class="card-header">
                @lang('Charge Per Order')
            </div>
            <div class="card-body px-4">
                <form action="{{route('admin.service-fee.update')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label class="required">@lang('Fixed Charge')</label>
                            <div class="input-group mb-3">

                                <input type="text" name="fixed_charge" value="{{getAmount($charge->fixed)}}"
                                       class="form-control" placeholder="@lang('Fixed charge per course')" aria-label="@lang('Fixed charge per course')" aria-describedby="basic-addon2">
                                <span class="input-group-text bg--primary" id="basic-addon2">@lang($general->cur_text)</span>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <label class="required">@lang('Percentage Charge')</label>
                            <div class="input-group mb-3">
                                <input type="text" name="percentage_charge" value="{{getAmount($charge->percent)}}"
                                       class="form-control" placeholder="@lang('Percentage charge per course')" aria-label="@lang('Percentage charge per course')" aria-describedby="basic-addon2">
                                <span class="input-group-text bg--primary" id="basic-addon2">%</span>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('Active Fixed Charge')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="is_fixed" {{ $charge->is_fixed ? 'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('Active Percent Charge')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="is_percent" {{ $charge->is_percent ?'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col">
                                <button type="submit" class="btn btn--primary btn-global w-100">@lang('Change Now')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
