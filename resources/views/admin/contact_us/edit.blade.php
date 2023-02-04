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
                    <a href="{{ route('faqs.index') }}" title="All FAQs" class="btn btn-primary btn-sm">View All</a>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->

            <!--begin::Content-->
            <div id="" class="collapse show">
                <!--begin::Form-->
                <form action="{{ route('faqs.update', $edit->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf
                    @method('PUT')
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Question</label>

                            <div class="col-lg-8 fv-row">
                                <textarea name="question" class="form-control" id="" cols="30" rows="5" placeholder="Enter Question here.">{{ $edit->question }}</textarea>
                                <span style="color: red">{{ $errors->first('question') }}</span>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Answer</label>

                            <div class="col-lg-8 fv-row">
                                <textarea name="answer" class="form-control" id="" cols="30" rows="5" placeholder="Enter answer here.">{{ $edit->answer }}</textarea>
                                <span style="color: red">{{ $errors->first('answer') }}</span>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">Status</label>

                            <div class="col-lg-8 fv-row">
                                <select name="status" id="" class="form-control">
                                    <option value="" selected>Select Status</option>
                                    <option value="1" {{ $edit->status==1?'selected':'' }}>Active</option>
                                    <option value="0" {{ $edit->status==0?'selected':'' }}>In-Active</option>
                                </select>
                                <span style="color: red">{{ $errors->first('answer') }}</span>
                            </div>
                        </div>
                    </div>

                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-white btn-active-light-primary me-2">Discard</button>

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
