@extends($activeTemplate.'layouts.frontend')
@section('content')
    @include($activeTemplate.'includes.topbar')
    @include($activeTemplate.'includes.navbar')


@if($sections->secs != null)
@foreach(json_decode($sections->secs) as $sec)
@include($activeTemplate.'sections.'.$sec)
@endforeach
@endif
@endsection

@push('style')
<style>
    p {
        margin-bottom: 0;
        color: #444
    }

    .document-wrapper {
        background-color: #fff;
        box-shadow: 0 3px 35px rgba(0, 0, 0, .1);
        border-radius: 7px;
        overflow: hidden;

    }

    div[class*='col']:nth-child(odd) .document-item {
        border-right: 1px solid rgba(0, 0, 0, .1)
    }

    div[class*='col-lg-12']:nth-child(odd) .document-item {
        border-right: 0;
    }

    div[class*='col']:nth-child(1) .document-item {
        border-top: 0;
    }

    div[class*='col']:nth-child(2) .document-item {
        border-top: 0;
    }

    .dark-mode {
        background-color: #1A202C;
    }

    .dark-mode p,
    .dark-mode .share-links li a {
        color: rgba(255, 255, 255, 0.8);
    }

    .dark-mode .document-wrapper {
        box-shadow: 0 3px 25px rgba(255, 255, 255, 0.03);
    }

    .dark-mode .document-item {
        background-color: #2D3748;
        color: rgba(255, 255, 255, 0.8);
        border-color: rgba(255, 255, 255, 0.1) !important;
    }

    .dark-mode .document-item__icon,
    .dark-mode .document-item__content .title a {
        color: #fff;
    }

    .document-item {
        background-color: #fff;
        padding: 45px 35px;
        border-top: 1px solid rgba(0, 0, 0, .1);
        height: 100%;
    }

    .document-item__icon {
        font-size: 32px;
        width: 35px;
        line-height: 1px;
    }

    .document-item__content {
        width: calc(100% - 35px);
        padding-left: 15px;
    }

    .document-item__content .title {
        margin-bottom: 13px;
    }

    .document-item__content .title a {
        color: #111;
        display: inline-block;
    }

    .document-footer ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .share-links li a {
        color: #444
    }

    .share-links li:not(:last-child) {
        padding-right: 25px;
    }

</style>
@endpush
