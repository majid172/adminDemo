@extends('admin.layouts.master')
@section('content')
    <div style="background-image: url('{{ asset('assets/admin/images/login.png') }}')" class="login_area">
        <div class="login">
            <div class="login__header">
                <h2 class="text-center">{{$pageTitle}}</h2>
                <p class="text-center">@lang('We will sent an email to recover your account')</p>
            </div>
            <div class="login__body">
                <!-- <h4>user login</h4> -->
                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <div class="field">
                        <input type="text" name="username" placeholder="@lang('Username')" value="{{ old('username') }}"
                               required>
                        <span class="show-pass"><i class="fas fa-user"></i></span>
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="@lang('Password')" value="{{ old
                        ('password') }}"
                               required>
                        <span class="show-pass"><i class="fas fa-key"></i></span>
                    </div>
                    <div class="field">
                        <button type="submit" class="sign-in bg--primary">@lang('Sign in')</button>
                    </div>
                    <div class="login__footer d-flex justify-content-center">
                        <a class="float-end text--primary" href="{{ route('admin.password.reset') }}">@lang('Forgot
                        Password')
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('assets/admin/css/auth.css')}}">
@endpush
