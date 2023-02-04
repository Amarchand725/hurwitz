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
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form action=" {{route('admin.settings.update', $edit->id)}}" method="POST" enctype="multipart/form-data" class="form form-horizontal" novalidate>
                                    @csrf
                                    @method("PUT")
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label for="bookFormName">Website Title </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="web_title" value="{{isset($edit->web_title)  ? $edit->web_title : ''}}" placeholder="Enter Name" required />
                                                            @error('web_title') <span class="text-danger">{{$message}}</span> @enderror
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
                                                        <label for="bookFormName">Website link </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="web_link" value="{{isset($edit->web_link)  ? $edit->web_link : ''}}" placeholder="Enter Link" required />
                                                            @error('web_link') <span class="text-danger">{{$message}}</span> @enderror
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
                                                        <label for="bookFormName">Currency Symbol </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="currency_symbol" value="{{isset($edit->currency_symbol)  ? $edit->currency_symbol : ''}}" placeholder="Enter Currency" required />
                                                            @error('currency_symbol') <span class="text-danger">{{$message}}</span> @enderror
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
                                                        <label for="primary" class="form-label">Primary Color</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">

                                                            <input type="color" class="form-control" name="primary_color" id="primary" value="{{$edit->primary_color}}" currency_symbol="Choose your color" >

                                                            @error('primary_color') <span class="text-danger">{{$message}}</span> @enderror
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
                                                            <label for="primary" class="form-label">Secondary Color</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="position-relative has-icon-left">
    
                                                                <input type="color" class="form-control " name="secondary_color" id="primary" value="{{ isset($edit->secondary_color) && !empty($edit->secondary_color) ? $edit->secondary_color : "" }}" title="Choose your color" >
     
                                                                @error('secondary_color') <span class="text-danger">{{$message}}</span> @enderror
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
                                                        <label for="bookFormName">Website Logo </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="file" class="form-control" name="logo"  accept="image/*" required />
                                                            @error('logo') <span class="text-danger">{{$message}}</span> @enderror
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

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left mb-1">
                                                            @if(!empty($edit->logo))
                                                            <img id="prev_main_image" src="{{asset(config('upload_path.settings') . $edit->logo )}}" style="max-width:250px;">
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
                                                        <label for="bookFormName">Fav Icon</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="file" class="form-control" name="favicon" accept="image/*" required />
                                                            @error('favicon') <span class="text-danger">{{$message}}</span> @enderror
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

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative has-icon-left mb-1">
                                                            @if(!empty($edit->favicon))
                                                            <img id="prev_main_image" src="{{asset(config('upload_path.settings') . $edit->favicon )}}" style="max-width:250px;">
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
