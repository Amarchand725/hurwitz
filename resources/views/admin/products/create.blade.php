@extends('layouts.admin_scaffold')
@section('title', isset($title) ? $title : 'Laravel')
@section('content')

<section class="app-user-list">
    <div class="card">
        <div class="card-datatable pt-0">
            <div class="row" style="padding:2%">
                <div class="col-md-10 ">
                    <h2>{{ $title }}</h2>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-danger mr-1">Back</a>
                </div>
                @if (isset($errors) && !empty($errors) && count($errors) > 0)
                <ul>
                    @foreach ($errors as $index => $value)
                    <li class="text-red">{{ $value }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="form ">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label for="bookFormName">Title</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" class="form-control" value="{{ old('title') }}" name="title" placeholder="Enter Title" />
                                                            @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
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
                                                            <textarea value="" name="short_description" id="" cols="30" rows="4" class="form-control">{{ old('short_description') }}</textarea>
                                                            @error('short_description')
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
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label for="bookFormSummary">Long Description</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <textarea value="" name="long_description" id="" cols="30" rows="10" class="form-control long_description">{{ old('long_description') }}</textarea>
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
                                                            <input type="text" step="any" value="{{ old('initial_price') }}" name="initial_price" placeholder="00" class="form-control" />
                                                            @error('initial_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <p class="help-block"></p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative has-icon-left">
                                                            <label for="">Final Price</label>
                                                            <input type="text" step="any" value="{{ old('final_price') }}" name="final_price" placeholder="00" class="form-control" />
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
                                                            <input type="file" name="main_image" class="form-control " />
                                                            @error('main_image')
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
                                                        <label for="bookFormName">Featured Image</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="file" va name="featured_image" class="form-control " />
                                                            @error('featured_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <p class="help-block"></p>
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
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                            </select>
                                                            <p class="help-block"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-1">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <label class="form-label" for="basicSelect">Status</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select name="status" class="form-select" id="basicSelect">
                                                                <option value="">PLEASE SELECT</option>
                                                                @foreach (status() as $key=>$value)
                                                                <option value="{{ $key }}" @if( !empty(old('status')) && old('status')==$key)) selected @endif>{{ $value }}</option>
                                                                @endforeach

                                                            </select>
                                                            <p class="help-block"></p>
                                                        </div>
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