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
              <h2>@if(!empty($title)) {{$title}} @endif</h2>
            </div>
            <div class="col-md-1 text-right">
              <a href="{{route('admin.sub_categories.new')}}" class="btn btn-primary ">New</a>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <table class="user-list-table table">
                <thead>
                  <th>#</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  @if(!empty($records))
                  @foreach($records as $index=>$value)
                  <tr>
                    <td>{{++$index}}</td>
                    <td>@if(!empty($value->title))
                      <a href="{{route('admin.sub_categories.index', $value->id)}}" class="nav-link" target="_blank">{{ucfirst($value->title)}}  </a>
                      @else N/A @endif
                    </td>
                    <td>@if(!empty($value->description)){{$value->description}} @else N/A @endif</td>
                    <td>
                      @if(!empty($value->image))
                      <img src="{{asset(config('upload_path.category') . $value->image )}}" alt="{{$value->title}}" width="100" height="100">
                      @else
                      <span class="text-danger"> Image Not Found </span>
                      @endif
                    </td>
                    <td>
                      <a href="{{route('admin.sub_categories.edit', $value->id)}}">
                        <button class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit"><i data-feather='edit'></i></button>
                      </a>
                      <a href="javascript:;" class="btn btn-danger btn-sm" onclick="event.preventDefault();
                                        document.getElementById('destroyForm_{{$value->id}}').submit();" data-toggle="tooltip" title="Delete">
                        <i data-feather='trash-2'></i>
                      </a>
                      <form id="destroyForm_{{$value->id}}" action="{{ route('admin.sub_categories.destroy', $value->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('delete')
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
                <tfoot>
                  <th>#</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tfoot>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if($records->haspages())
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
  @endif

</section>

@endsection