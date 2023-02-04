@extends('layouts.admin_scaffold')
@section('title', isset($title) ? $title : 'studies')
@section('content')


    <section class="users-list-wrapper">

        <div id="basic-examples">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-11 text-left">
                                <h2>
                                    @if (!empty($title))
                                        {{ $title }}
                                    @endif
                                </h2>
                            </div>
                            <div class="col-md-1 text-right">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-success ">Back </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12 mb-1">
                                <h4><b>#:</b> {{ isset($show->id) && !empty($show->id) ? $show->id : null }}</h4>
                            </div>
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
                            <div class="col-md-12 mb-1">
                                <h4><b>Bidding Price</b></h4>
                            </div>
                           
                            <div class="col-md-6 mb-1">
                               
                                <h4> <b>Initial price:</b>
                                    {{ isset($show->initial_price) && !empty($show->initial_price) ? $show->initial_price : null }}
                                </h4>
                            </div>

                            <div class="col-md-6 mb-1">
                                <h4> <b>Final price:</b>
                                    {{ isset($show->final_price) && !empty($show->final_price) ? $show->final_price : 0 }}
                                </h4>
                            </div>

                             
                            <div class="col-md-12 mb-1">
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
                                <h4><b>Main Image:</b></h4>
                                @if (!empty($show->main_image))
                                    <img src="{{ asset(config('upload_path.products') . $show->main_image) }}"
                                        alt="{{ $show->title }}" width="300" style="text-center">
                                @else
                                    <span class="text-danger"> Image Not Found </span>
                                @endif
                            </div>
                            <div class="col-md-6 mb-1">
                                <h4><b>Featured Image:</b></h4>
                                @if (!empty($show->featured_image))
                                    <img src="{{ asset(config('upload_path.products') . $show->featured_image) }}"
                                        alt="{{ $show->title }}" width="300" style="text-center">
                                @else
                                    <span class="text-danger"> Image Not Found </span>
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


    </section>

@endsection
