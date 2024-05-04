@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card b-radius--10">
            <div class="card-body p-0">
                <video width="100%" controls autoplay>
                    <source src="{{getImage(getFilePath('episode').'/' . @$details->file_path .'/'. @$details->file)}}" type="video/mp4">
                </video>
                <p class="p-3">{{__($details->description)}}</p>
            </div>
        </div>
    </div>
</div>

@endsection