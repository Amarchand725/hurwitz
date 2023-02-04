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
                    <a href="{{ route('book.index') }}" title="All Roles" class="btn btn-primary btn-sm">View All</a>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->

            <!--begin::Content-->
            <div id="" class="collapse show">
                <form action="{{ route('book.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf

                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Title</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control form-control-lg form-control-solid" placeholder="Enter title"/>
                                <span style="color: red">{{ $errors->first('title') }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">E-Book</label>

                            <div class="col-lg-4">
                                <label class="col-lg-6 col-form-label fw-bold fs-6">UPLOAD PDF</label>

                                <div class="col-lg-12 fv-row">
                                    <input type="file" class="form-control" name="ebook">
                                    <span style="color: red">{{ $errors->first('ebook') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="col-lg-2 col-form-label fw-bold fs-6">PRICE</label>

                                <div class="col-lg-12 fv-row">
                                    <input type="number" class="form-control" value="{{ old('ebook_price') }}" name="ebook_price" placeholder="Enter price">
                                    <span style="color: red">{{ $errors->first('ebook_price') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">AUDIO BOOK</label>

                            <div class="col-lg-4">
                                <label class="col-lg-6 col-form-label fw-bold fs-6">UPLOAD AUDIO</label>

                                <div class="col-lg-12 fv-row">
                                    <input type="file" class="form-control" accept="audio/*" name="audios[]" multiple>
                                    <span style="color: red">{{ $errors->first('ebook') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="col-lg-6 col-form-label fw-bold fs-6">PRICE</label>

                                <div class="col-lg-12 fv-row">
                                    <input type="number" class="form-control" value="{{ old('audio_book_price') }}" name="audio_book_price" placeholder="Enter price">
                                    <span style="color: red">{{ $errors->first('audio_book_price') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">AUDIO SAMPLE</label>

                            <div class="col-lg-8">
                                <div class="col-lg-12 fv-row">
                                    <input type="file" class="form-control" name="sample_audio" accept="audio/*">
                                    <span style="color: red">{{ $errors->first('ebook') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">FRONT IMAGE</label>

                            <div class="col-lg-8">
                                <div class="col-lg-12 fv-row">
                                    <input type="file" class="form-control" name="front_image">
                                    <span style="color: red">{{ $errors->first('front_image') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">BACK IMAGE</label>

                            <div class="col-lg-8">
                                <div class="col-lg-12 fv-row">
                                    <input type="file" class="form-control" name="back_image">
                                    <span style="color: red">{{ $errors->first('back_image') }}</span>
                                </div>
                            </div>
                        </div>
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label fw-bold fs-6">Short Description</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <textarea name="short_description" class="form-control" id="" cols="30" rows="5" placeholder="Enter short description">{{ old('short_description') }}</textarea>
                                <span style="color: red">{{ $errors->first('short_description') }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label fw-bold fs-6">Full Description</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <textarea name="long_description" class="form-control long_description" id="" cols="30" rows="5" placeholder="Enter full description">{{ old('long_description') }}</textarea>
                                <span style="color: red">{{ $errors->first('long_description') }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <div class="row mb-6">
                            <label id="basicSelect" class="col-lg-2 col-form-label fw-bold fs-6">STATUS</label>

                            <div class="col-lg-4">
                                <label id="basicSelect" class="col-lg-2 col-form-label fw-bold fs-6">STATUS</label>
                                <select name="status" id="basicSelect" class="form-control">
                                    <option value="" selected>Select Status</option>
                                    <option value="1" {{ old('status')==1?'selected':'' }}>Active</option>
                                    <option value="0" {{ old('status')==0?'selected':'' }}>In-Active</option>
                                </select>
                                <span style="color: red">{{ $errors->first('status') }}</span>
                            </div>

                            <div class="col-lg-4">
                                <label id="basicSelect" class="col-lg-6 col-form-label fw-bold fs-6">PAPER BACK PRICE</label>
                                <div class="col-lg-12 fv-row">
                                    <input type="number" class="form-control" name="paper_back_price" value="{{ old('paper_back_price') }}" id="paper_back_price" placeholder="Enter Paper Back Price">
                                    <span style="color: red">{{ $errors->first('paper_back_price') }}</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <div class="row parent">
                            <div class="row mb-6">
                                <label id="insert-url" class="col-lg-2 col-form-label fw-bold fs-6">INSERT URL</label>

                                <div class="col-lg-4">
                                    <label for="statuses" class="col-lg-6 col-form-label fw-bold fs-6">ORDER TYPE</label>
                                    <select name="statuses[]" id="statuses" class="form-control order_type_ids order_type_option" value="{{ old('statuses') }}" data-count="0">
                                        <option value="" selected>PLEASE SELECT</option>
                                        @forelse ($order_types as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->title }}</option>
                                        @empty
                                            <option> Type Not Found </option>
                                        @endforelse
                                    </select>
                                    <div class="d-md-none mb-2"></div>
                                </div>

                                <div class="col-lg-3">
                                    <label id="url" class="col-lg-6 col-form-label fw-bold fs-6">URL</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="url" class="form-control order_type_url" id="url" name="urls[0]" placeholder="Enter URL" data-count="0">
                                        <span style="color: red">{{ $errors->first('urls') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label id="add-more" class="col-lg-6 col-form-label fw-bold fs-6">ADD MORE</label>
                                    <div class="col-lg-12 fv-row">
                                        <button type="button" class="btn btn-success btn-sm add-more-book-url-btn"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <a href="{{ route('book.index') }}" class="btn btn-white btn-active-light-primary me-2">Discard</a>

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

    $(document).on('click', '.add-more-book-url-btn', function(){
        var order_type_id = $(this).parents('.parent').find('#statuses').val();
        if(order_type_id==""){
            alert('You have no any order type available');
            return false;
        }

        var inputs = $(".order_type_option");
        var order_types_ids = [];
        for(var i = 0; i < inputs.length; i++){
            if($(inputs[i]).val() !== ''){
                order_types_ids.push($(inputs[i]).val());
            }
        }

        var res_html = $(this).parents('.parent');
        $.ajax({
            type:'GET',
            url:'{{ route("get-order-types") }}',
            data:{order_type_id:order_type_id, order_types_ids:order_types_ids},
            success:function(response){
                res_html.append(response);
            }
        });
    });

    $(document).on('click', '.remove-more-book-url-btn', function(){
        $(this).parents('#remove-parent').remove();
    });
</script>
@endpush
