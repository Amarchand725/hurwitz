@extends('admin.layouts.app')
@section('title', $page_title)
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@section('content')
<div id="kt_app_content" class="app-content" style="margin-top:5px">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container ">
        <!--begin::Navbar-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">{{ $page_title }}</h3>
                </div>
                <div class="content-header-right mt-3">
                    <a href="{{ route('blogs.index') }}" title="All Blogs" class="btn btn-primary btn-sm">View All</a>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->

            <!--begin::Content-->
            <div id="" class="collapse show">
                <form action="{{ route('blogs.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf

                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Title</label>

                            <div class="col-lg-8 fv-row">
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control form-control-lg form-control-solid" placeholder="Enter title"/>
                                <span style="color: red">{{ $errors->first('title') }}</span>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Short Description</label>

                            <div class="col-lg-8 fv-row">
                                <textarea name="short_description" id="" cols="30" rows="5" class="form-control">{{ old('short_description') }}</textarea>
                                <span style="color: red">{{ $errors->first('short_description') }}</span>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Full Description</label>

                            <div class="col-lg-8 fv-row">
                                <textarea name="long_description" id="" cols="30" rows="5" class="form-control long_description">{{ old('long_description') }}</textarea>
                                <span style="color: red">{{ $errors->first('long_description') }}</span>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Image</label>

                            <div class="col-lg-8 fv-row">
                                <input type="file" class="form-control" name="main_image" accept="image/*">
                                <span style="color: red">{{ $errors->first('main_image') }}</span>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Featured Image</label>

                            <div class="col-lg-8 fv-row">
                                <input type="file" class="form-control" name="featured_image" accept="image/*">
                                <span style="color: red">{{ $errors->first('featured_image') }}</span>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Status</label>

                            <div class="col-lg-8 fv-row">
                                <select name="status" id="" class="form-control">
                                    <option value="" selected>Select Status</option>
                                    <option value="1" {{ old('status')==1?'selected':'' }}>Active</option>
                                    <option value="0" {{ old('status')==0?'selected':'' }}>In-Active</option>
                                </select>
                                <span style="color: red">{{ $errors->first('featured_image') }}</span>
                            </div>
                        </div>
                    </div>

                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <a href="{{ route('blogs.index') }}" type="reset" class="btn btn-white btn-active-light-primary me-2">Discard</a>

                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
                            <!--begin::Indicator-->
                            <span class="indicator-label">
                                Save Changes
                            </span>
                            <span class="indicator-progress">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                            <!--end::Indicator-->
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $('select').selectpicker();
</script>
@endpush
