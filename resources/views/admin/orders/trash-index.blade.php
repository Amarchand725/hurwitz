@extends('admin.layouts.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('admin.orders.trash.records') }}">
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
                            <a href="{{ route('orders.index') }}" title="All Orders" class="btn btn-primary btn-sm">View All</a>
                            <!--end::Primary button-->
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
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted" style=" width: 100%; ">
                                            <input type="text" id="search" class="form-control" placeholder="Search...">
                                            <input type="hidden" id="status" value="All">
                                        </li>
                                        <!--end::Item-->
                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--begin::Table-->

                                <table  class="table align-middle table-row-dashed fs-6 gy-5" id="audit-log-table">
                                    <thead>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Order Type</th>
                                        <th>User</th>
                                        <th>Book</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody id="body">
                                        @foreach ($models as $key=>$model)
                                            <tr id="id-{{ $model->id }}">
                                                <td>{{  $models->firstItem()+$key }}.</td>
                                                <th>{{isset($model->order_id) && !empty($model->order_id)  ? $model->order_id : "-"  }}</th>
                                                <th>{{isset($model->order_type) && !empty($model->order_type)  ? $model->order_type->title : "-"  }}</th>
                                                <th>{{isset($model->user) && !empty($model->user)  ? $model->user->name : "-" }}</th>
                                                <th>
                                                    @if(isset($model->book) && !empty($model->book))
                                                        <a href="{{route('book.show' ,$model->book_id)}}" target="_blank">
                                                            {{$model->book->title}}
                                                        </a>
                                                    @else
                                                    -
                                                    @endif
                                                </th>
                                                <th>
                                                    @if(isset($model->order_status->name) && !empty($model->order_status->name))
                                                        <button class="btn btn-sm  btn-{{getStatusColor($model->order_status_id)}}">{{$model->order_status->name}}</button>
                                                    @endif
                                                </th>
                                                <td>
                                                    <a href="{{route('admin.orders.restore', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Restore Order" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> Restore</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="6">
                                                Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
                                                <div class="d-flex justify-content-center">
                                                    {!! $models->links('pagination::bootstrap-4') !!}
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content container-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Content wrapper-->
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush
