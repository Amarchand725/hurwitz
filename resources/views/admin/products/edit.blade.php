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
                    <a href="{{route('admin.products.index')}}" class="btn btn-danger mr-1">Back</a>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{route('admin.products.update', $edit->id)}}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-body">
                                        <div class="row">

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
                                                        <label for="bookFormSummary">Short Description</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <textarea name="short_description" id="" cols="15" rows="5" class="form-control" required>{{isset($edit->short_description) && !empty($edit->short_description) ? $edit->short_description : "N/A"}}</textarea>
                                                            @error('short_description') <span class="text-danger">{{$message}}</span> @enderror
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
                                                        <label for="bookFormSummary">Long Description</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <textarea name="long_description" id="" cols="30" rows="10" class="form-control long_description">{{isset($edit->long_description) && !empty($edit->long_description) ? $edit->long_description : "N/A"}} </textarea>
                                                            @error('long_description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                            <div class="form-control-position">
                                                                <i class="feather icon-edit-2"></i>
                                                            </div>
                                                        </div>
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-12 mt-2">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label for="bookFormName">Bidding Price</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative has-icon-left">
                                                            <label for="">Initial Price</label>

                                                            <input type="text" step="any" value="{{ $edit->initial_price }}" name="initial_price" placeholder="Initial Price" class="form-control" />
                                                            @error('initial_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <p class="help-block"></p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative has-icon-left">
                                                            <label for="">Final Price</label>
                                                            <input type="text" step="any" value="{{ $edit->final_price }}" name="final_price" placeholder="Final Price" class="form-control" />
                                                            @error('final_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label for="bookFormName">Main Image</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="file" id="main_image" name="main_image" multiple placeholder="main_image" class="form-control " />
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
                                                        <div class="position-relative has-icon-left mb-1">
                                                            @if(!empty($edit->main_image))
                                                            <img id="prev_main_image" src="{{asset(config('upload_path.products') . $edit->main_image )}}" style="max-width:250px;">
                                                            @else
                                                            <img id="prev_main_image" src="" style="max-width:500px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label for="bookFormName">Featured Image</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="file" id="featured_image" name="featured_image" multiple placeholder="Featured Image" class="form-control " />
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
                                                            @if(!empty($edit->featured_image))
                                                            <img id="prev_main_image" src="{{asset(config('upload_path.products') . $edit->featured_image )}}" style="max-width:250px;">
                                                            @else
                                                            <img id="prev_main_image" src="" style="max-width:500px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-1">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <label class="form-label" for="basicSelect">Open For Auction</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select name="open_for_auction" class="form-select" id="basicSelect">
                                                                <option value="">PLEASE SELECT</option>
                                                                <option value="1" @if(isset($edit->open_for_auction) && !empty($edit->open_for_auction) && $edit->open_for_auction == 1) selected @endif>Yes</option>
                                                                <option value="0" @if(isset($edit->open_for_auction) &&   $edit->open_for_auction == 0) selected @endif>No</option>
                                                            </select>
                                                            <p class="help-block"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="form-label" for="basicSelect">Status</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select name="status" class="form-select" required id="basicSelect">
                                                            <option> PLEASE SELECT</option>
                                                            @foreach (status() as $key=>$value)
                                                            <option value="{{ $key }}" @if ($edit->status == $key) selected @endif> {{ $value }}</option>
                                                            @endforeach

                                                        </select>
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset" class="btn btn-outline-warning me-1">Reset</button>
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