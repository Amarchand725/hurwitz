
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta name="description" content="description"/>
        <meta name="keywords" content="keywords"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <?php
            $favicon = asset('public/company/logos/default.png');
            $logo = asset('public/company/logos/default.png');
        ?>
        <?php if(!empty(companyProfile()) && companyProfile()->favicon): ?>
            <?php
                $favicon = asset('public/company/favicons').'/'.companyProfile()->favicon;
            ?>
        <?php endif; ?>
        <?php if(!empty(companyProfile()) && companyProfile()->logo): ?>
            <?php
                $logo = asset('public/company/logos').'/'.companyProfile()->logo;
            ?>
        <?php endif; ?>
        <link rel="shortcut icon" href="<?php echo e($favicon); ?>"/>
        <meta name="csrf-token" id="token" content="<?php echo e(csrf_token()); ?>" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>

        <?php echo $__env->make('admin.layouts.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldPushContent('css'); ?>
    </head>

    <body  id="kt_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"   class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed app-default app-default"   style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px"  data-kt-name="metronic">
        <!--begin::Theme mode setup on page load-->
        <script>
            if (document.documentElement) {
                const defaultThemeMode = "system";
                const name = document.body.getAttribute("data-kt-name");
                let themeMode = localStorage.getItem("kt_" + (name !== null ? name + "_" : "") + "theme_mode_value");
                if (themeMode === null) {
                    if (defaultThemeMode === "system") {
                        themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                    } else {
                        themeMode = defaultThemeMode;
                    }
                }
                document.documentElement.setAttribute("data-theme", themeMode);
            }
        </script>
        <!--end::Theme mode setup on page load-->

        <!--begin::App-->
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <!--begin::Page-->
            <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                <!--begin::Header-->
                <div id="kt_app_header" class="app-header">
                    <!--begin::Header container-->
                    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::sidebar mobile toggle-->
                        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show sidebar menu">
                            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
                                        <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end::sidebar mobile toggle-->
                        <!--begin::Mobile logo-->
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                            <a href="<?php echo e(route('admin.login')); ?>" class="d-lg-none">
                                <img alt="Logo" src="<?php echo e($logo); ?>" class="h-30px" />
                            </a>
                        </div>
                        <!--end::Mobile logo-->
                        <!--begin::Header wrapper-->
                        <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!--end::Header wrapper-->
                    </div>
                    <!--end::Header container-->
                </div>
                <!--end::Header-->

                <!--begin::Wrapper-->
                <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    <!--begin::sidebar-->
                    <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                        <!--begin::Logo-->
                        <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                            <!--begin::Logo image-->
                            <a href="<?php echo e(route('admin.dashboard')); ?>">
                                <img alt="Logo" src="<?php echo e($logo); ?>" class="h-55px app-sidebar-logo-default" />
                                <img alt="Logo" src="<?php echo e($logo); ?>" class="h-20px app-sidebar-logo-minimize" />
                            </a>
                            <h2 style="color: #eeb307;">
                                <?php if(companyProfile()): ?>
                                    <?php echo e(companyProfile()->company); ?>

                                <?php endif; ?>
                            </h2>

                            <!--end::Logo image-->
                            <!--begin::Sidebar toggle-->
                            <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                                <span class="svg-icon svg-icon-2 rotate-180">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
                                        <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Sidebar toggle-->
                        </div>
                        <!--end::Logo-->

                        <!--begin::sidebar menu-->
                        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!--end::sidebar menu-->
                    </div>
                    <!--end::sidebar-->

                    <!--begin::Main-->
                    <?php echo $__env->yieldContent('content'); ?>
                    <!--end:::Main-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::App-->
        <!--begin::App layout builder-->
        <div
            id="kt_app_layout_builder"
            class="bg-body"

            data-kt-drawer="true"
            data-kt-drawer-name="app-settings"
            data-kt-drawer-activate="true"
            data-kt-drawer-overlay="true"
            data-kt-drawer-width="{default:'300px', 'lg': '380px'}"
            data-kt-drawer-direction="end"
            data-kt-drawer-toggle="#kt_app_layout_builder_toggle"
            data-kt-drawer-close="#kt_app_layout_builder_close">
            <!--begin::Card-->
            <div class="card border-0 shadow-none rounded-0 w-100">
                <!--begin::Card header-->
                <div class="card-header bgi-position-y-bottom bgi-position-x-end bgi-size-cover bgi-no-repeat rounded-0 border-0 py-4" id="kt_app_layout_builder_header"
                style="background-image:url('<?php echo e(asset('public/admin')); ?>/media/misc/layout/header-bg.jpg')">
                    <!--begin::Card title-->
                    <h3 class="card-title fs-3 fw-bold text-white flex-column m-0">
                        Metronic Builder
                        <small class="text-white opacity-50 fs-7 fw-semibold pt-1">Get your product deeply customized</small>
                    </h3>
                    <!--end::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-sm btn-icon bg-white bg-opacity-25 btn-color-white p-0 w-20px h-20px rounded-1" id="kt_app_layout_builder_close">
                            <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"/>
                            </svg></span>
                            <!--end::Svg Icon-->
                        </button>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body position-relative" id="kt_app_layout_builder_body">
                    <!--begin::Content-->
                    <div id="kt_app_settings_content"
                        class="position-relative scroll-y me-n5 pe-5"

                        data-kt-scroll="true"
                        data-kt-scroll-height="auto"
                        data-kt-scroll-wrappers="#kt_app_layout_builder_body"
                        data-kt-scroll-dependencies="#kt_app_layout_builder_header, #kt_app_layout_builder_footer"
                        data-kt-scroll-offset="5px">

                        <!--begin::Form-->
                        <form class="form" method="POST" id="kt_app_layout_builder_form" action="http://metro/documentation/layout-builder">
                            <input type="hidden" name="_token" value="KsLJyMTDbXlTvTnQg0mKHEC0DSPUrEnwjKDTzC6M">                    <input type="hidden" id="kt_app_layout_builder_action" name="layout-builder[action]"/>
                            <div class="card-body p-0">
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <!--begin::Heading-->
                                    <div class="mb-6">
                                        <h4 class="fw-bold text-dark">Theme Mode</h4>
                                        <div class="fw-semibold text-muted fs-7 d-block lh-1">Enjoy Dark &amp; Light modes.
                                            <a class="fw-semibold" href="http://metro/documentation/getting-started/dark-mode" target="_blank">See docs</a></div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Options-->
                                    <div class="row" data-kt-buttons="true" data-kt-buttons-target=".form-check-image,.form-check-input" data-kt-initialized="1">
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <!--begin::Option-->
                                            <label class="form-check-image form-check-success">
                                                <!--begin::Image-->
                                                <div class="form-check-wrapper">
                                                    <img src="<?php echo e(asset('public/admin')); ?>/media/misc/layout/light.png" class="mw-100" alt="">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Check-->
                                                <div class="form-check form-check-custom form-check-solid form-check-sm form-check-success">
                                                    <input class="form-check-input" type="radio" value="light" name="layout-builder[theme_mode]" id="kt_layout_builder_theme_mode_light">
                                                    <!--begin::Label-->
                                                    <div class="form-check-label text-gray-700">Light</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Check-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <!--begin::Option-->
                                            <label class="form-check-image form-check-success">
                                                <!--begin::Image-->
                                                <div class="form-check-wrapper">
                                                    <img src="<?php echo e(asset('public/admin')); ?>/media/misc/layout/dark.png" class="mw-100" alt="">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Check-->
                                                <div class="form-check form-check-custom form-check-solid form-check-sm form-check-success">
                                                    <input class="form-check-input" type="radio" value="dark" name="layout-builder[theme_mode]" id="kt_layout_builder_theme_mode_dark">
                                                    <!--begin::Label-->
                                                    <div class="form-check-label text-gray-700">Dark</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Check-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Options-->
                                </div>
                                <!--end::Form group-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-5"></div>
                                <!--end::Separator-->
                                <!--begin::Form group-->
                                <div class="form-group d-flex flex-stack">
                                    <!--begin::Heading-->
                                    <div class="d-flex flex-column">
                                        <h4 class="fw-bold text-dark">RTL Mode</h4>
                                        <div class="fs-7 fw-semibold text-muted">Change Language Direction.
                                            <a class="fw-semibold" href="http://metro/documentation/getting-started/rtl" target="_blank">See docs</a></div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Option-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Check-->
                                        <div class="form-check form-check-custom form-check-solid form-check-success form-switch">
                                            <input type="hidden" value="false" name="layout-builder[rtl]">
                                            <input class="form-check-input w-45px h-30px" type="checkbox" value="true" name="layout-builder[rtl]" id="kt_builder_rtl" >
                                            <!--begin::Label-->
                                            <label class="form-check-label" for="kt_builder_rtl"></label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Check-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                                <!--end::Form group-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-5"></div>
                                <!--end::Separator-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <!--begin::Heading-->
                                    <div class="mb-6">
                                        <h4 class="fw-bold text-dark">Layouts</h4>
                                        <span class="fw-semibold text-muted fs-7 lh-1">Available main layouts.</span>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Options-->
                                    <div class="row gy-3" data-kt-buttons="true" data-kt-buttons-target=".form-check-image:not(.disabled),.form-check-input:not([disabled])" data-kt-initialized="1">
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <!--begin::Option-->
                                            <label class="form-check-image form-check-success checked=&quot;checked&quot;">
                                                <!--begin::Image-->
                                                <div class="form-check-wrapper">
                                                    <img src="<?php echo e(asset('public/admin')); ?>/media/misc/layout/dark-sidebar.png" class="mw-100" alt="">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Check-->
                                                <div class="form-check form-check-custom form-check-success form-check-sm form-check-solid">
                                                    <input class="form-check-input" type="radio" checked="checked" value="dark-sidebar" name="layout-builder[layout]" checked=&quot;checked&quot;>
                                                    <!--begin::Label-->
                                                    <div class="form-check-label text-gray-700">Dark Sidebar</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Check-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <!--begin::Option-->
                                            <label class="form-check-image form-check-success" >
                                                <!--begin::Image-->
                                                <div class="form-check-wrapper">
                                                    <img src="<?php echo e(asset('public/admin')); ?>/media/misc/layout/light-sidebar.png" class="mw-100" alt="">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Check-->
                                                <div class="form-check form-check-custom form-check-success form-check-sm form-check-solid">
                                                    <input class="form-check-input" type="radio" value="light-sidebar" name="layout-builder[layout]" >
                                                    <!--begin::Label-->
                                                    <div class="form-check-label text-gray-700">Light Sidebar</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Check-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Options-->
                                </div>
                                <!--end::Form group-->
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Card body-->

                <!--begin::Card footer-->
                <div class="card-footer border-0 d-flex gap-3 pb-9 pt-0" id="kt_app_layout_builder_footer">
                    <button type="button" id="kt_app_layout_builder_preview" class="btn btn-primary flex-grow-1 fw-semibold">
                        <!--begin::Indicator-->
                        <span class="indicator-label">
                            Preview
                        </span>
                        <span class="indicator-progress">
                            Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        <!--end::Indicator-->
                    </button>

                    <button type="button" id="kt_app_layout_builder_reset"  class="btn btn-light flex-grow-1 fw-semibold">
                        <!--begin::Indicator-->
                        <span class="indicator-label">
                            Reset
                        </span>
                        <span class="indicator-progress">
                            Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        <!--end::Indicator-->
                    </button>
                </div>
                <!--end::Card footer-->

            </div>
            <!--end::Card-->
        </div>
        <!--end::App layout builder-->

        <?php echo $__env->make('admin.layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldPushContent('js'); ?>

        <script>
            $('select').selectpicker();

            <?php if(Session::has('message')): ?>
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                toastr.success("<?php echo e(session('message')); ?>");
            <?php endif; ?>

            <?php if(Session::has('error')): ?>
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                toastr.error("<?php echo e(session('error')); ?>");
            <?php endif; ?>

            <?php if(Session::has('info')): ?>
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                toastr.info("<?php echo e(session('info')); ?>");
            <?php endif; ?>

            <?php if(Session::has('warning')): ?>
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                toastr.warning("<?php echo e(session('warning')); ?>");
            <?php endif; ?>
        </script>
    </body>
</html>
<?php /**PATH C:\wamp\www\hurwitz\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>