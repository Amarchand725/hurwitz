@extends('admin.layouts.app')
@section('title', $page_title)
@section('content')
    <div id="kt_app_content" class="app-content" style="margin-top:5px">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container ">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
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
                    <form id="" class="form" method="POST" href="{{ route('admin.email-config') }}" enctype="multipart/form-data">
                        @csrf

                        @if(!empty(emailConfig()))
                            <input type="hidden" name="id" value="{{ emailConfig()->id }}">
                        @endif
                        <div class="card-body border-top p-9">

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('Mail Mailer') }} <span style="color: red">*</span></label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="mail_mailer" value="{{ old('mail_mailer', !empty(emailConfig()->mail_mailer)?emailConfig()->mail_mailer:'') }}" class="form-control form-control-lg form-control-solid" placeholder="e.g smtp"/>
                                    <span class="text-danger">{{ $errors->first('mail_mailer') }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">{{ __('Mail host') }} </span>
                                </label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="mail_host" value="{{ old('mail_host', !empty(emailConfig()->mail_host)?emailConfig()->mail_host:'') }}" class="form-control form-control-lg form-control-solid" placeholder="e.g smtp.gmail.com"/>
                                    <span class="text-danger">{{ $errors->first('mail_host') }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">{{ __('Mail Port') }} </span>
                                </label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="mail_port" value="{{ old('mail_port', !empty(emailConfig()->mail_port)?emailConfig()->mail_port:'') }}" class="form-control form-control-lg form-control-solid" placeholder="e.g 465"/>
                                    <span class="text-danger">{{ $errors->first('mail_port') }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('Mail User Name') }} <span style="color: red">*</span></label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="mail_username" value="{{ old('mail_username', !empty(emailConfig()->mail_username)?emailConfig()->mail_username:'') }}" class="form-control form-control-lg form-control-solid" placeholder="e.g mygoogle@gmail.com"/>
                                    <span class="text-danger">{{ $errors->first('mail_username') }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">{{ __('Mail Password') }} </span>
                                </label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="mail_password" value="{{ old('mail_password', !empty(emailConfig()->mail_password)?emailConfig()->mail_password:'') }}" class="form-control form-control-lg form-control-solid" placeholder="e.g rrnnucvnqlbsl"/>
                                    <span class="text-danger">{{ $errors->first('mail_password') }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('Mail Encryption') }}</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="mail_encryption" value="{{ old('mail_encryption', !empty(emailConfig()->mail_encryption)?emailConfig()->mail_encryption:'') }}" class="form-control form-control-lg form-control-solid" placeholder="e.g tls"/>
                                    <span class="text-danger">{{ $errors->first('mail_encryption') }}</span>
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('Mail From Address') }}</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="mail_from_address" value="{{ old('mail_from_address', !empty(emailConfig()->mail_from_address)?emailConfig()->mail_from_address:'') }}" class="form-control form-control-lg form-control-solid" placeholder="e.g mygoogle@gmail.com"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label  fw-bold fs-6">{{ __('Mail From Name') }}</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="mail_from_name" value="{{ old('mail_from_name', !empty(emailConfig()->mail_from_name)?emailConfig()->mail_from_name:'') }}" class="form-control form-control-lg form-control-solid" placeholder="Mail from name"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card body-->

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
