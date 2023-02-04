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
                            <a href="{{ route('book.index') }}" title="All Books" class="btn btn-sm fw-bold btn-primary">View All</a>
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
                                        <h4> <b>Title:</b> {{ isset($show->title) && !empty($show->title) ? $show->title : null }}
                                        </h4>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <h4> <b>Short Description:</b>
                                            {{ isset($show->short_description) && !empty($show->short_description) ? $show->short_description : null }}
                                        </h4>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <h4> <b>Long Description:</b> {!! isset($show->long_description) && !empty($show->long_description) ? $show->long_description : null !!} </h4>
                                    </div>

                                    @foreach ($show->urls as $key => $value)
                                        <div class="col-md-12 mb-1">
                                            <h4> <b>{{  getOrderType($value->orderType) }}:</b> <a
                                                    href="{{ isset($value->url) && !empty($value->url) ? $value->url : null }}"
                                                    target="_blank">{{ $value->url }}</a> </h4>
                                        </div>
                                    @endforeach

                                    <div class="col-md-6 mb-1">
                                        <h4> <b>Paper back price:</b>
                                            {{ isset($show->paper_back_price) && !empty($show->paper_back_price) ? $show->paper_back_price : null }}
                                        </h4>
                                    </div>

                                    <div class="col-md-6 mb-1">
                                        <h4> <b>Ebook price:</b>
                                            {{ isset($show->ebook_price) && !empty($show->ebook_price) ? $show->ebook_price : null }}
                                        </h4>
                                    </div>

                                    <div class="col-md-12 mb-1">
                                        <h4> <b>Audio book price:</b>
                                            {{ isset($show->audio_book_price) && !empty($show->audio_book_price) ? $show->audio_book_price : null }}
                                        </h4>
                                    </div>
                                     <div class="col-md-6 mb-1">
                                        <h4><b>Sample Audio:</b></h4>
                                        @if (!empty($show->sample_audio))
                                            <audio style="width:700px" controls>
                                                <source
                                                    src="{{ asset('public/images/books/' . $show->sample_audio) }} "
                                                    type="audio/ogg">
                                                <source
                                                    src=" {{ asset('public/images/books/' . $show->sample_audio) }} "
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        @else
                                            <span class="text-danger"> Audio Not Found </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <h4> <b>Status:</b>
                                            @if ($show->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @elseif ($show->status == 0)
                                                <span class="badge bg-danger">In-Active</span>
                                            @else
                                                N/A
                                            @endif
                                        </h4>
                                    </div>

                                    <div class="col-md-6 mb-1">
                                        <h4><b>Front Image:</b></h4>
                                        @if (!empty($show->front_image))
                                            <img class="m-5" src="{{ asset('public/images/books/' . $show->front_image) }}"
                                                alt="{{ $show->title }}" width="150" style="text-center">
                                        @else
                                            <span class="text-danger"> Image Not Found </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <h4><b>Back Image:</b></h4>
                                        @if (!empty($show->back_image))
                                            <img class="m-5" src="{{ asset('public/images/books/' . $show->back_image) }}"
                                                alt="{{ $show->title }}" width="150" style="text-center">
                                        @else
                                            <span class="text-danger"> Image Not Found </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-12 mt-1 mb-1">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#inlineForm">
                                            Upload Audio
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade text-start" id="inlineForm" tabindex="-1"
                                            aria-labelledby="myModalLabel33" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel33">Upload audio file</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('books.storeAudio') }}" method="POST"
                                                        enctype="multipart/form-data" class="form form-horizontal" novalidate>
                                                        @csrf
                                                        <input type="hidden" name="book_id" value="{{ $show->id }}">
                                                        <div class="modal-body">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-12">
                                                                                <label for="bookFormName">Upload Audio</label>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="position-relative has-icon-left">
                                                                                    <input type="file"
                                                                                        class="form-control"name="audios[]" multiple
                                                                                        accept="audio/*" />

                                                                                    <div class="form-control-position">
                                                                                        <i class="feather icon-user"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="help-block"></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary"
                                                                data-bs-dismiss="modal">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <table class="user-list-table table">
                                        <thead>
                                            <th>#</th>
                                            <th>Audio File </th>
                                            <th>Date </th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($show->audios as $key => $value)
                                                <tr>
                                                    <td> {{ ++$key }}</td>
                                                    <td>
                                                        <audio style="width:700px" controls>
                                                            <source
                                                                src="{{ asset('public/images/books/audios/' . $value->audio) }}"
                                                                type="audio/ogg">
                                                            <source
                                                                src="{{ asset('public/images/books/audios/' . $value->audio) }}"
                                                                type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                    </td>
                                                    <td> {{ formatted_date($value->created_at) }}</td>
                                                    <td>
                                                        <a href="javascript:;" class="btn btn-danger btn-sm"
                                                            onclick="event.preventDefault();document.getElementById('destroyForm_{{ $value->id }}').submit();"
                                                            data-toggle="tooltip" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <form id="destroyForm_{{ $value->id }}"
                                                            action="{{ route('books.destroyAudio', $value->id) }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>#</th>
                                            <th>Audio File </th>
                                            <th>Date </th>
                                            <th>Action </th>
                                        </tfoot>
                                    </table>

                                </div>
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
