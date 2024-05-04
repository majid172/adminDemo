@extends('admin.layouts.app')
@section('panel')
<div class="row mb-none-30 justify-content-center">
    <div class="col-xl-12 col-md-6 mb-30">
        <div class="card b-radius--10 overflow-hidden box--shadow1">
            <div class="card-body">
                <h5 class="card-title mb-50 border-bottom pb-2">@lang('New Episode')</h5>
                
                <form action="{{route('admin.episode.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="title">@lang('Title')</label>
                            <input type="text" class="form-control" name="title" placeholder="@lang('Episode title')" value="{{old('title')}}">
                        </div>
                        <div class="col-lg-6">
                            <label for="category">@lang('Category')</label>
                            <input type="hidden" name="category_id" value="{{$category_id}}">
                            <input type="text" class="form-control" value="{{ucwords($category->name)}}" placeholder="@lang('Category')" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="title">@lang('Episode Link ')</label>
                            <input type="text" class="form-control" name="file_link" placeholder="@lang('Episode link')" value="{{old('file_link')}}">
                        </div>
                        <div class="col-lg-6">
                            <label for="title">@lang('Upload Episode')</label>
                            <input type="file" class="form-control" name="file" value="{{old('file')}}" placeholder="@lang('File')">
                        </div>
                    </div>

                    <label for="description">@lang('Description')</label>
                    <textarea name="description" value="{{old('description')}}" id="description" class="form-control" cols="30" rows="5"></textarea>

                    <button type="submit" class="btn btn-primary mt-3">@lang('Create')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection