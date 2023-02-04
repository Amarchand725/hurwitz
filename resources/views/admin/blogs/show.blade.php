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
                            <a href="{{ route('blogs.index') }}" title="All Blogs" class="btn btn-sm fw-bold btn-primary">View All</a>
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
                                <table class="table">
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $show->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Short Description</th>
                                        <td>{{ $show->short_description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Full Description</th>
                                        <td>{!! $show->long_description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td>
                                            @if (!empty($show->main_image))
                                                <img class="m-5" src="{{ asset('public/images/blogs/' . $show->main_image) }}"
                                                    alt="{{ $show->title }}" width="70" height="80" style="text-center">
                                            @else
                                                <span class="text-danger"> Image Not Found </span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Featured Image</th>
                                        <td>
                                            @if (!empty($show->featured_image))
                                                <img class="m-5" src="{{ asset('public/images/blogs/' . $show->featured_image) }}"
                                                    alt="{{ $show->title }}" width="70" height="80" style="text-center">
                                            @else
                                                <span class="text-danger"> Image Not Found </span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
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
