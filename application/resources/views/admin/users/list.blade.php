@extends('admin.layouts.app')
@section('panel')
{{-- @include('admin.components.tabs.user') --}}
<div class="row ">
    <div class="col-lg-12">
        <div class="card mb-4 card-primary shadow-sm">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text--primary">@lang('Search')</h6>
            </div>
            <div class="card-body">
                <form action="http://localhost/influencer/admin/user-search" method="get">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <input placeholder="Name" name="name" value="" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input placeholder="Phone" name="phone" value="" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input placeholder="E-mail" name="email" value="" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input placeholder="Join Date" name="created_at" id="created_at" value="" type="date" class="form-control form-control-sm" autocomplete="off">
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="form-group search-currency-dropdown">
                                <select name="status" class="form-control form-control-sm">
                                    <option value="">@lang('All Status')</option>
                                    <option value="active">@lang('Active')</option>
                                    <option value="inactive">@lang('Inactive')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn--primary btn-sm btn-block"><i class="fas fa-search"></i> @lang('Search')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 card-primary shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text--primary">@lang('User List')</h6>
                <a href="{{route('admin.users.notification.all')}}" class="btn btn-sm btn-outline--primary"><i
                            class="fas fa-envelope"></i> @lang('Send Mail to All')</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-items-center table-borderless">
                        <thead class="thead-light">
                        <tr>
                            <th>@lang('SL')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Email')</th>
                            <th>@lang('Balance')</th>
                            <th>@lang('User Type')</th>
                            <th>@lang('Login At')</th>
                        
                            <th>@lang('Action')</th>
                        </tr>
                        </thead>
                        <tbody>
                           
                        @forelse($users as $key => $value)
                       
                        <tr>
                            <td data-label="SL">
                                {{++$key}}
                            </td>
                            <td data-label="@lang('Name')">
                                <a href="{{ route('admin.users.detail', $value->id) }}" target="_blank">
                                    <div class=" d-block align-items-center ">
                                        <div class="rounded-circle mr-2 w-40px" data-original-title="{{$value->fullname}}">
                                            {{$value->fullname}}
                                            <br>
                                            <span class="text-muted font-14">{{ '@'.$value->username}}</span>
                                        </div> 
                                    </div>
                                </a>
                            </td>
                            <td data-label="@lang('Email')">{{ __($value->email) }}</td>
                            
                            <td data-label="@lang('Balance')">
                                {{ $general->cur_sym }}{{ showAmount($value->balance) }}
                            </td>
                            <td>
                                @if ($value->user_type == 1)
                                <span class="badge bg-success">@lang('Instructor')
                                </span>
                                @else
                                <span class="badge bg-warning">@lang('User')
                                </span>
                                @endif
                            </td>
                            <td data-label="@lang('logged in at')">
                                {{ showDateTime($value->created_at) }}
                            </td>

                            <td data-label="@lang('Action')">
                                
                                <div class="dropdown">
                                    <a class="btn btn--primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                      @lang('More Action')
                                    </a>
                                  
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                      <li><a class="dropdown-item" href="{{ route('admin.users.detail', $value->id) }}"><i class="far fa-edit text--primary mr-1"></i>@lang('Details')</a></li>
                                      <li><a class="dropdown-item" href="{{route('admin.users.login',$value->id)}}"><i class="fa fa-sign-in-alt text--info mr-1"></i> @lang('Login As User')</a></li>
                                      <li><a class="dropdown-item" href="{{route('admin.users.notification.single', $value->id)}}"><i class="las la-paper-plane text--warning mr-1"></i> @lang('Send Mail')</a></li>
                                    </ul>
                                  </div>
                            </td>

                        </tr>
                        
                        @empty
                            <tr>
                                <th colspan="100%" class="text-center">@lang('No data found')</th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">{{ $users->links() }}</div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('breadcrumb-plugins')
<div class="d-flex flex-wrap justify-content-end">
    <form action="" method="GET" class="form-inline">
        <div class="input-group justify-content-end">
            <input type="text" name="search" class="form-control bg--white" placeholder="@lang('Search by Username')"
                value="{{ request()->search }}">
            <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>
@endpush
