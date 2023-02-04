@extends('layouts.admin_scaffold')
@section('title', isset($title) ? $title : 'studies')
@section('content')


<section class="users-list-wrapper">

    <div id="basic-examples">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-11 text-left">
                            <h2>
                                @if (!empty($title))
                                {{ $title }}
                                @endif
                            </h2>
                        </div>
                        <div class="col-md-1 text-right">
                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary ">New </a>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <table class="user-list-table table">
                                <thead>
                                    <th>#</th>
                                    <th>Main Image</th>
                                    <th>Featured Image</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Initial Price</th>
                                    <th>Final Price</th>
                                    <th>Open For Auction</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @if (!empty($records))
                                    @foreach ($records as $index => $value)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td> @if (!empty($value->main_image)) <img src="{{ asset(config('upload_path.products') . $value->main_image) }}" alt="{{ $value->title }}" width="100" height="100"> @else <span class="text-danger"> Image Not Found </span> @endif </td>
                                        <td>
                                            @if (!empty($value->featured_image))
                                            <img src="{{ asset(config('upload_path.products') . $value->featured_image) }}" alt="{{ $value->title }}" width="100" height="100">
                                            @else
                                            <span class="text-danger"> Image Not Found </span>
                                            @endif
                                        </td>
                                        <td> @if (!empty($value->title)) {{ $value->title }} @else N/A @endif </td>
                                        <td> @if (!empty($value->short_description)) {{ $value->short_description }} @else N/A @endif </td>
                                        <td> @if (!empty($value->initial_price)) {{ $value->initial_price }} @else N/A @endif </td>
                                        <td> @if (!empty($value->final_price)) {{ $value->final_price }} @else 0 @endif </td>
                                        <td> @if (!empty($value->open_for_auction)) Yes  @else No @endif </td>

                                        <td>
                                            @foreach (status() as $key=>$v )
                                            @if ($key == $value->status)
                                            {{ $v }}
                                            @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                    <a class="dropdown-item" href="{{ route('admin.products.show', $value->id) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye me-50">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                        <span>View</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('admin.products.edit', $value->id) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 me-50">
                                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                        </svg>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a class="dropdown-item" href="javascript:;" onclick="event.preventDefault();document.getElementById('destroyForm_{{ $value->id }}').submit();">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-50">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        </svg>
                                                        <span>Delete</span>
                                                    </a>
                                                    <form id="destroyForm_{{ $value->id }}" action="{{ route('admin.products.destroy', $value->id) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <th>#</th>
                                    <th>Main Image</th>
                                    <th>Featured Image</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Initial Price</th>
                                    <th>Final Price</th>
                                    <th>Open For Auction</th>
                                    <th>Product Status</th>
                                    <th>Actions</th>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @if ($records->haspages())
  <div id="basic-examples">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div class="row p-2">
            <div class="col-md-4"></div>
            <div class="col-md-4"> {{$records->links()}}</div>
    <div class="col-md-4"></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endif --}}

</section>

@endsection