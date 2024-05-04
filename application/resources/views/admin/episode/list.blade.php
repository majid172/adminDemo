@extends('admin.layouts.app')
@section('panel')

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4 card-primary shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text--primary">@lang('Episodes')</h6>
                   
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-items-center table-borderless">
                            <thead class="thead-light">
                                <tr>
                                    <th>@lang('Sl.')</th>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Category')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Descripton')</th>
                                    <th>@lang('Created_at')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($episodes as $item)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{ucwords($item->title)}}</td>
                                    <td>{{ucwords($item->course->title)}}</td>
                                    <td>
                                        @if ($item->status==1)
                                            <span class="badge bg-success">@lang('Active')</span>
                                            @else
                                            <span class="badge bg-danger">@lang('Inactive')</span>
                                        @endif
                                    </td>
                                    <td title="{{$item->description}}">{{Str::limit($item->description,40)}}</td>
                                    <td>
                                        {{ showDateTime($item->created_at) }}
                                    </td>
                                    <td title="@lang('Active/Deactive')">
                                        <div class="form-check form-switch text-primary">
                                           
                                           <label class="switch m-0">
                                                <input type="checkbox" class="toggle-switch checkStatus"  data-id="{{$item->id}}"{{($item->status == 1)?'checked':''}}>
                                                <span class="slider round"></span>
                                            </label>
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
                    <div class="card-footer">{{ $episodes->links() }}</div>
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
@push('script')
    <script>
        $(document).ready(function(){
            $('.checkStatus').on('click', function(){
                var status = $(this).prop('checked') ? 1 : 0;
                var episode_id = $(this).data('id');
                
                $.ajax({
                    url: '{{ route("admin.episode.status") }}',
                    method: 'GET',
                    data: {
                        status: status,
                        episode_id:episode_id
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error: ' + textStatus, errorThrown);
                    }
                });
            });
});

    </script>
@endpush

