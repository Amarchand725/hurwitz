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
            <div class="card-header border-0 cursor-pointer" role="button" >
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">{{ $page_title }}</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->

            <!--begin::Content-->
            <div id="" class="collapse show">
                <!--begin::Form-->
                <form action="{{ route('abouts.update', $edit->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf
                    @method('PUT')
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Title</label>

                            <div class="col-lg-8 fv-row">
                                <input type="text" class="form-control" value="{{ $edit->title }}" name="title" placeholder="Enter title">
                                <span style="color: red">{{ $errors->first('title') }}</span>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Short Description</label>

                            <div class="col-lg-8 fv-row">
                                <textarea name="short_description" class="form-control" id="" cols="30" rows="5" placeholder="Enter short_description here.">{!! $edit->short_description !!}</textarea>
                                <span style="color: red">{{ $errors->first('short_description') }}</span>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Qoute</label>

                            <div class="col-lg-8 fv-row">
                                <textarea name="qoute" class="form-control" id="" cols="30" rows="5" placeholder="Enter qoute here.">{!! $edit->qoute !!}</textarea>
                                <span style="color: red">{{ $errors->first('qoute') }}</span>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Description</label>

                            <div class="col-lg-8 fv-row">
                                <textarea name="description" class="form-control long_description" id="" cols="30" rows="5" placeholder="Enter description here.">{!! $edit->description !!}</textarea>
                                <span style="color: red">{{ $errors->first('description') }}</span>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Image</label>

                            <div class="col-lg-8 fv-row">
                                <input type="file" class="form-control" name="image" accept="image/*">
                                <span style="color: red">{{ $errors->first('image') }}</span>
                            </div>
                        </div>
                        @if($edit->image)
                            <div class="row mb-6">
                                <label class="col-lg-2 col-form-label fw-bold fs-6">Image Exist</label>

                                <div class="col-lg-8 fv-row">
                                    <img src="{{ asset('public/images/about_us') }}/{{ $edit->image }}" alt="" width="80" height="80">
                                </div>
                            </div>
                        @endif
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Video</label>

                            <div class="col-lg-8 fv-row">
                                <input type="file" class="form-control" name="video" accept="video/*">
                                <span style="color: red">{{ $errors->first('video') }}</span>
                            </div>
                        </div>
                        @if($edit->video)
                            <div class="row mb-6">
                                <label class="col-lg-2 col-form-label fw-bold fs-6">Exist Vido</label>

                                <div class="col-lg-8 fv-row">
                                    <video src="{{ asset('public/images/about_us/' . $edit->video) }}" style="width:200px;height:auto " alt="" controls><video>
                                </div>
                            </div>
                        @endif
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Image 2</label>

                            <div class="col-lg-8 fv-row">
                                <input type="file" class="form-control" name="image_2" accept="image/*">
                                <span style="color: red">{{ $errors->first('image_2') }}</span>
                            </div>
                        </div>
                        @if($edit->image_2)
                            <div class="row mb-6">
                                <label class="col-lg-2 col-form-label fw-bold fs-6">Image Exist</label>

                                <div class="col-lg-8 fv-row">
                                    <img src="{{ asset('public/images/about_us') }}/{{ $edit->image_2 }}" alt="" width="80" height="80">
                                </div>
                            </div>
                        @endif
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Image 3</label>

                            <div class="col-lg-8 fv-row">
                                <input type="file" class="form-control" name="image_3" accept="image/*">
                                <span style="color: red">{{ $errors->first('image_3') }}</span>
                            </div>
                        </div>
                        @if($edit->image_3)
                            <div class="row mb-6">
                                <label class="col-lg-2 col-form-label fw-bold fs-6">Image Exist</label>

                                <div class="col-lg-8 fv-row">
                                    <img src="{{ asset('public/images/about_us') }}/{{ $edit->image_3 }}" alt="" width="80" height="80">
                                </div>
                            </div>
                        @endif

                        <div class="row parent">
                            <div class="row mb-6">
                                <label id="insert-url" class="col-lg-2 col-form-label fw-bold fs-6">Insert Accordion</label>

                                <div class="col-lg-3">
                                    <label id="url" class="col-lg-6 col-form-label fw-bold fs-6">Title</label>
                                    <div class="col-lg-12 fv-row">
                                        <textarea name="accordion_title[]" class="form-control" id="" placeholder="Enter Accordion Title"></textarea>
                                        <span style="color: red">{{ $errors->first('accordion_title') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label id="url" class="col-lg-6 col-form-label fw-bold fs-6">Description</label>
                                    <div class="col-lg-12 fv-row">
                                        <textarea name="accordion_details[]" class="form-control" id="" placeholder="Enter Accordion Description"></textarea>
                                        <span style="color: red">{{ $errors->first('urls') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label id="add-more" class="col-lg-6 col-form-label fw-bold fs-6">ADD MORE</label>
                                    <div class="col-lg-12 fv-row">
                                        <button type="button" class="btn btn-success btn-sm add-more-accordion-btn"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(!empty($edit->aboutAccordions))
                            @foreach ($edit->aboutAccordions as $accordion)
                                <div class="row" id="remove-parent">
                                    <div class="row mb-6">
                                        <label id="insert-url" class="col-lg-2 col-form-label fw-bold fs-6"></label>

                                        <div class="col-lg-3">
                                            <div class="col-lg-12 fv-row">
                                                <textarea name="accordion_title[]" class="form-control" id="" placeholder="Enter Accordion Title">{{ $accordion->title }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="col-lg-12 fv-row">
                                                <textarea name="accordion_details[]" class="form-control" id="" placeholder="Enter Accordion Description">{{ $accordion->details }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="col-lg-12 fv-row">
                                                <button type="button" class="btn btn-danger btn-sm remove-more-accordion-btn"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
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
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $('select').selectpicker();

    $(document).on('click', '.add-more-accordion-btn', function(){
        var html = '';
        html = '<div class="row" id="remove-parent">'+
                    '<div class="row mb-6">'+
                        '<label id="insert-url" class="col-lg-2 col-form-label fw-bold fs-6"></label>'+

                        '<div class="col-lg-3">'+
                            '<div class="col-lg-12 fv-row">'+
                                '<textarea name="accordion_title[]" class="form-control" id="" placeholder="Enter Accordion Title"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-lg-4">'+
                            '<div class="col-lg-12 fv-row">'+
                                '<textarea name="accordion_details[]" class="form-control" id="" placeholder="Enter Accordion Description"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-lg-2">'+
                            '<div class="col-lg-12 fv-row">'+
                                '<button type="button" class="btn btn-danger btn-sm remove-more-accordion-btn"><i class="fa fa-times"></i></button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
        $(this).parents('.parent').append(html);
    });

    $(document).on('click', '.remove-more-accordion-btn', function(){
        $(this).parents('#remove-parent').remove();
    });
</script>
@endpush
