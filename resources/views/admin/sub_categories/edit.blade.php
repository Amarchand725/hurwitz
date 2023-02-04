@extends('layouts.admin_scaffold')
@section('title', isset($title) ? $title : 'studies')
@section('content')

<section class="app-user-list">
    <div class="card">
        <div class="card-datatable pt-0">
            <div class="row" style="padding:2%">
                <div class="col-md-10 ">
                    <h2>{{$title}}</h2>
                </div>
                <div class="col-md-2">
                    <a href="{{ $back_route }}" class="btn btn-danger mr-1">Back</a>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{route('admin.sub-categories.update', $edit->id)}}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label for="bookFormName">Category</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <select name="category_id" class="form-control" required>
                                                                <option value="">Select</option>
                                                                @if(!empty($categories) && $categories->count()>0)
                                                                @foreach($categories as $index=>$value)
                                                                <option value="{{$value->id}}" @if($value->id == $edit->category_id) selected @endif @if(isset($category) && !empty($category) && $category == $value->id) selected @endif>{{ucfirst($value->title)}}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                            @error('title') <span class="text-danger">{{$message}}</span> @enderror
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                        </div>
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label for="bookFormName">Title</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="title" value="{{isset($edit->title) && !empty($edit->title) ? $edit->title : 'N/A' }}" required />
                                                            @error('title') <span class="text-danger">{{$message}}</span> @enderror
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                        </div>
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label for="bookFormSummary">Description</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <textarea name="description" id="" cols="30" rows="10" class="form-control" required>{{isset($edit->description) && !empty($edit->description) ? $edit->description : "N/A"}}</textarea>
                                                            @error('description') <span class="text-danger">{{$message}}</span> @enderror
                                                            <div class="form-control-position">
                                                                <i class="feather icon-edit-2"></i>
                                                            </div>
                                                        </div>
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label for="bookFormName">Image</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="file" id="main_image" name="image" multiple placeholder="Event Title" class="form-control " />
                                                        </div>
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2">

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            @if(!empty($edit->image))
                                                            <img id="prev_main_image" src="{{asset(config('upload_path.sub_category') . $edit->image )}}" style="max-width:500px;">
                                                            @else
                                                            <img id="prev_main_image" src="" style="max-width:500px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset" class="btn btn-outline-warning mr-1">Reset</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection