@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4 card-primary shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text--primary">@lang('Category List')</h6>
                    <button type="button" class="btn btn-sm btn-outline--primary" data-bs-toggle="modal" data-bs-target="#addModal"><i class="las la-plus"></i>@lang('Add')</button>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-items-center table-borderless">
                            <thead class="thead-light">
                                <tr>
                                    <th>@lang('Sl.')</th>
                                    <th>@lang('Categories Name')</th>
                                    <th>@lang('No. of Course')</th>
                                    <th>@lang('Description')</th>
                                    <th>@lang('Created_at')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lists as $list)
                                    <tr>
                                        <td>{{++$loop->index}}</td>
                                        <td>{{ucwords($list->name)}}</td>
                                        <td>{{optional($list->course)->count()}}</td>
                                        <td title="{{$list->description}}">{{Str::limit($list->description,40)}}</td>
                                        <td>
                                            {{ showDateTime($list->created_at) }}
                                        </td>
    
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline--primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="las la-ellipsis-v"></i> @lang('More')
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$list->id}}" data-name="{{__($list->name)}}" data-description="{{__($list->description)}}" href="javascript:void(0)"><i class="las la-edit text-info"></i> @lang('Edit')</a></li>
    
                                                    <li><a class="dropdown-item" href="{{route('admin.category.course.list',$list->id)}}"><i class="las la-book-open text-warning"></i> @lang('Course Lists')</a></li>
    
                                                    <li><a class="dropdown-item remove" href="javascript:void(0)" data-bs-toggle="modal" data-name="{{__($list->name)}}" data-id="{{$list->id}}" data-bs-target="#removeModal"><i class="las la-trash text-danger" ></i> @lang('Remove')</a></li>
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
                    <div class="card-footer">{{ $lists->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">@lang('Add Category')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">@lang('Category Name')</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="description">@lang('Description')</label>
                            <textarea name="description" class="form-control" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="img">@lang('Category Image')</label>
                            <input type="file" name="image" id="img" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Create')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    edit --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">@lang('Edit Category')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.category.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">@lang('Category Name')</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="description">@lang('Description')</label>
                            <textarea name="description" class="form-control" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="img">@lang('Category Image')</label>
                            <input type="file" name="image" id="img" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Create')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--  remove course  --}}
    <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title text-danger"  id="removeModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.course.remove')}}" method="get" class="removeAction">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id"></input>
                        @lang('Are you want to remove this course?')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data data-bs-dismiss="modal">@lang('No')</button>
                        <button type="submit" class="btn btn-outline-primary" >@lang('Yes')</button>
                    </div>
                </form>
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
        $('.edit').on('click',function(){
            $('#editModal').find('input[name="id"]').val($(this).data('id'));
            $('#editModal').find('input[name="name"]').val($(this).data('name'));
            $('#editModal').find('textarea[name="description"]').val($(this).data('description'));
        })
        $('.remove').on('click',function (){
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('.title').text(name);
            $('#removeModal').find('input[name="id"]').val(id);
        })
    </script>
@endpush
