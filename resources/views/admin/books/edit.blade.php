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
                <div class="content-header-right mt-3">
                    <a href="{{ route('book.index') }}" title="All Books" class="btn btn-primary btn-sm">View All</a>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->

            <!--begin::Content-->
            <div id="" class="collapse show">
                <!--begin::Form-->
                <form action="{{ route('book.update', $edit->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf
                    @method('PUT')
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Title</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="title" value="{{ isset($edit->title) && !empty($edit->title) ? $edit->title : '' }}" class="form-control form-control-lg form-control-solid" placeholder="Enter title"/>
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
                                @if (isset($edit->ebook) && !empty($edit->ebook))
                                    <a href="{{ asset(config('upload_path.books') . $edit->ebook) }}" target="_blank"> VIEW PDF BOOK</a>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label class="col-lg-2 col-form-label fw-bold fs-6">PRICE</label>

                                <div class="col-lg-12 fv-row">
                                    <input type="number" value="{{ isset($edit->ebook_price) && !empty($edit->ebook_price) ? $edit->ebook_price : 0 }}" class="form-control" name="ebook_price" placeholder="Enter price">
                                    <span style="color: red">{{ $errors->first('ebook_price') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">Audio Book</label>

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
                                    <input type="number" value="{{ isset($edit->audio_book_price) && !empty($edit->audio_book_price) ? $edit->audio_book_price : '' }}" class="form-control" name="audio_book_price" placeholder="Enter price">
                                    <span style="color: red">{{ $errors->first('ebook_price') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label fw-bold fs-6">Audio Files</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <div class="position-relative has-icon-left">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Audio</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @include('admin.books.audiolist',['audios'=> $edit->audios])
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <!--end::Col-->
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">Audio SAMPLE </label>

                            <div class="col-lg-8">
                                <div class="col-lg-12 fv-row">
                                    <input type="file" class="form-control" name="sample_audio" accept="audio/*">
                                    <span style="color: red">{{ $errors->first('ebook') }}</span>
                                </div>
                            </div>
                        </div>
                        @if(!empty($edit->sample_audio))
                            <div class="row mb-6">
                                <label class="col-lg-2 col-form-label fw-bold fs-6">Audio SAMPLE EXIST</label>
                                <div class="col-lg-8">
                                    <div class="col-lg-12 fv-row">
                                        <audio controls>
                                            <source src="{{ asset('public/images/books/' . $edit->sample_audio) }}" type="audio/ogg">
                                            <source src="{{ asset('public/images/books/' . $edit->sample_audio) }}" type="audio/mpeg">
                                            Your browser does not support
                                            the audio element.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        @endif
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
                            <label class="col-lg-2 col-form-label fw-bold fs-6">FRONT IMAGE VIEW</label>

                            <div class="col-lg-8">
                                <div class="col-lg-12 fv-row">
                                    @if (!empty($edit->front_image))
                                        <img id="prev_main_image" src="{{ asset('public/images/books/' . $edit->front_image) }}" style="width:60px; max-width:250px;">
                                    @else
                                        <img id="prev_main_image" src="" style="max-width:500px;">
                                    @endif
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
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">BACK IMAGE VIEW</label>

                            <div class="col-lg-8">
                                <div class="col-lg-12 fv-row">
                                    @if (!empty($edit->back_image))
                                        <img id="prev_main_image" src="{{ asset('public/images/books/' . $edit->back_image) }}" style="width:60px; max-width:250px;">
                                    @else
                                        <img id="prev_main_image" src="" style="max-width:500px;">
                                    @endif
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
                                <textarea name="short_description" class="form-control" id="" cols="30" rows="5" placeholder="Enter short description">{{ isset($edit->short_description) && !empty($edit->short_description) ? $edit->short_description : '' }}</textarea>
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
                                <textarea name="long_description" class="form-control long_description" id="" cols="30" rows="5" placeholder="Enter full description">{{ isset($edit->long_description) && !empty($edit->long_description) ? $edit->long_description : '' }}</textarea>
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
                                    <option value="1" @if ($edit->status ==1 ) selected @endif>Active</option>
                                    <option value="0" @if ($edit->status ==0 ) selected @endif>In Active</option>
                                </select>
                                <span style="color: red">{{ $errors->first('status') }}</span>
                            </div>

                            <div class="col-lg-4">
                                <label id="basicSelect" class="col-lg-6 col-form-label fw-bold fs-6">PAPER BACK PRICE</label>
                                <div class="col-lg-12 fv-row">
                                    <input type="number" name="paper_back_price" value="{{ isset($edit->paper_back_price) && !empty($edit->paper_back_price) ? $edit->paper_back_price : '' }}" class="form-control" id="paper_back_price" placeholder="Enter Paper Back Price">
                                    <span style="color: red">{{ $errors->first('status') }}</span>
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
                        <div class="append_book_url"></div>
                        @if(!empty($edit->urls))
                            @foreach ($edit->urls as $key => $value)
                                <div class="row" id="remove-parent">
                                    <div class="row mb-6">
                                        <label id="insert-url" class="col-lg-2 col-form-label fw-bold fs-6"></label>

                                        <div class="col-lg-4">
                                            <select name="statuses[0]" id="statuses" class="form-control order_type_ids order_type_option" value="{{ old('statuses') }}" data-count="0">
                                                <option value="" selected>PLEASE SELECT</option>
                                                @forelse ($order_types as $key => $order_type)
                                                    <option value="{{$order_type->id}}" {{  $value->getOrderType->id == $order_type->id ? 'selected':''}}>{{$order_type->title }}</option>
                                                @empty
                                                    <option> Type Not Found </option>
                                                @endforelse
                                            </select>
                                            <div class="d-md-none mb-2"></div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="col-lg-12 fv-row">
                                                <input type="url" class="form-control order_type_url" id="url" value="{{ $value->url }}" name="urls[0]" placeholder="Enter URL" data-count="0">
                                                <span style="color: red">{{ $errors->first('urls') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="col-lg-12 fv-row">
                                                <button type="button" class="btn btn-danger btn-sm remove-more-book-url-btn"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
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

    $(document).on('click', '.deleteRecord', function(){
        var audio_id = $(this).attr('data-id');
        var url = $(this).attr('data-delete-url');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : url,
                    type : 'DELETE',
                    success : function(response){
                        if(response.status){
                            $('#tr-'+audio_id).hide();
                            Swal.fire(
                                'Deleted!',
                                'Your audio file has been deleted.',
                                'success'
                            )
                        }else{
                            Swal.fire(
                                'Not Deleted!',
                                'Sorry! Something went wrong.',
                                'danger'
                            )
                        }
                    }
                });
            }
        })
    });

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
