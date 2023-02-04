@extends('admin.layouts.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('book.index') }}">
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
                <!--begin::Toolbar-->
                <div id="kt_app_toolbar" class="app-toolbar mt-5 py-3 py-lg-6">
                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                            <!--begin::Title-->
                            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{ $page_title }}</h1>
                            <!--end::Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">
                                    <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Home</a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">Dashboards</li>
                                <!--end::Item-->
                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page title-->

                        <!--begin::Actions-->
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <!--begin::Primary button-->
                            <a href="{{ route('orders.index') }}" title="All Orders" class="btn btn-sm fw-bold btn-primary">View All</a>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Content-->
                <div id="kt_app_content" class="app-content" >
                    <!--begin::Content container-->
                    <div id="kt_app_content_container" class="app-container ">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div class="card-body pt-6">
                                <div class="row">
                                    <div class="col-md-11 text-left">
                                        <h2>
                                            @if (!empty($title))
                                                {{ $title }}
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12 mb-1">
                                        <h4> <b>User:</b> {{isset($show->user) && !empty($show->user)  ? $show->user->name : "-" }}
                                        </h4>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <h4> <b>Order ID:</b>
                                            {{ isset($show->order_id) && !empty($show->order_id) ? $show->order_id : '-' }}
                                        </h4>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <h4> <b>Book:</b>
                                            @if(isset($show->book) && !empty($show->book))
                                            <a href="{{route('book.show' ,$show->book_id)}}" target="_blank">{{$show->book->title}}</a>
                                            @else
                                            -
                                            @endif
                                        </h4>
                                    </div>

                                    <div class="col-md-6 mb-1">
                                        <h4> <b>Sub Total:</b>
                                            {{ isset($show->sub_total) && !empty($show->sub_total) ? number_format($show->sub_total , 2) :  '0' }}
                                        </h4>
                                    </div>

                                    <div class="col-md-6 mb-1">
                                        <h4> <b>Shipping Charges:</b>
                                            {{ isset($show->shipping_charges) && !empty($show->shipping_charges) ? number_format($show->shipping_charges , 2) :  '0' }}
                                        </h4>
                                    </div>

                                    <div class="col-md-12 mb-1">
                                        <h4> <b>Grand Total:</b>
                                            {{ isset($show->grand_total) && !empty($show->grand_total) ? number_format($show->grand_total , 2) :  '-' }}
                                        </h4>
                                    </div>

                                    <div class="col-md-12 mb-1">
                                        <h4> <b>Country:</b>
                                            {{ isset($show->country->name) && !empty($show->country->name) ? $show->country->name : '-' }}
                                        </h4>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <h4> <b>State:</b>
                                            {{ isset($show->state->name) && !empty($show->state->name) ? $show->state->name : '-' }}
                                        </h4>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <h4> <b>City:</b>
                                            {{ isset($show->city->name) && !empty($show->city->name) ? $show->city->name : '-' }}
                                        </h4>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <h4> <b>Address:</b>
                                            {{ isset($show->address) && !empty($show->address) ? $show->address : '-' }}
                                        </h4>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <h4> <b>Zip Code:</b>
                                            {{ isset($show->zip_code) && !empty($show->zip_code) ? $show->zip_code : '-' }}
                                        </h4>
                                    </div>

                                    <div class="col-md-12 mb-1">
                                        <h4> <b>Type:</b>
                                            {{ isset($show->order_type) && !empty($show->order_type) ? $show->order_type->name : '-' }}
                                        </h4>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <h4> <b>Status:</b> </h4>
                                        <div class="col-md-3">

                                            @if(isset($show->order_status->name) && !empty($show->order_status->name))
                                            <button class="btn btn-sm  btn-{{getStatusColor($show->order_status_id)}}">{{$show->order_status->name}}</button>
                                            @endif

                                        </div>
                                        <div class="col-md-6">
                                            @if(isset($order_statuses) && $order_statuses->count()>0)
                                                @if($show->order_status_id != 4)
                                                    <select name="change_status" id="change_status" class="form-control" data-order-id="{{$show->id}}">
                                                        <option value="">Please Select</option>
                                                        @foreach($order_statuses as $i=>$v)
                                                        <option value="{{$v->id}}" @if($show->order_status_id == $v->id) selected @endif>{{$v->name}}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <p class="text-danger">Order Status can not be changed</p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
@endpush
