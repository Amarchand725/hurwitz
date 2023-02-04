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
                    <a href="{{ route('states.index') }}" title="All States" class="btn btn-primary btn-sm">View All</a>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->

            <!--begin::Content-->
            <div id="" class="collapse show">
                <form action="{{ route('states.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf

                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Country</label>

                            <div class="col-lg-8 fv-row">
                                <select name="country_id" class="form-control" data-live-search="true">
                                    <option value="">Please Select</option>
                                    @foreach($countries as $index=>$value)
                                        <option value="{{$value->id}}" {{ old('country_id')==$value->id?'selected':'' }} >{{$value->name}}</option>
                                    @endforeach
                                </select>
                                <span style="color: red">{{ $errors->first('country_id') }}</span>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">State</label>

                            <div class="col-lg-8 fv-row">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                <span style="color: red">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">Shipping Charges</label>

                            <div class="col-lg-8 fv-row">
                                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                                <span style="color: red">{{ $errors->first('price') }}</span>
                            </div>
                        </div>
                    </div>

                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <a href="{{ route('states.index') }}" type="reset" class="btn btn-white btn-active-light-primary me-2">Discard</a>

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
