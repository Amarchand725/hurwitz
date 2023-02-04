<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10">
                    <!--begin::Forgot Password Form-->
                    <form class="form w-100 " novalidate="novalidate" id="kt_password_reset_form" action="<?php echo e(route('password.email')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8 fv-plugins-icon-container">
                            <!--begin::Email-->
                            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent">
                            <!--end::Email-->
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                            <button type="submit" id="" class="btn btn-primary me-4">
                                <!--begin::Indicator-->
                                <span class="indicator-label">
                                Submit
                                </span>
                                <span class="indicator-progress">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                <!--end::Indicator-->
                            </button>
                            <a href="<?php echo e(route('admin.login')); ?>" class="btn btn-light">Cancel</a>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Forgot Password Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
        </div>
        <!--end::Body-->
        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url(http://metro/demo1/media/misc/auth-bg.png)">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center py-15 px-5 px-md-15 w-100">
                <!--begin::Logo-->
                <?php
                    $logo = asset('public/company/logos/default.png');
                ?>
                <?php if(companyProfile()->logo): ?>
                    <?php
                        $logo = asset('public/company/logos').'/'.companyProfile()->logo;
                    ?>
                <?php endif; ?>
                <a href="<?php echo e(route('home')); ?>" class="mb-12">
                    <img alt="Logo" src="<?php echo e($logo); ?>" class="h-75px">
                </a>
                <!--end::Logo-->
                <!--begin::Image-->
                <img class="mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="http://metro/demo1/media/misc/auth-screens.png" alt="">
                <!--end::Image-->
                <!--begin::Title-->
                <h1 class="text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and Productive</h1>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="text-white fs-base text-center">In this kind of post,
                    <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>introduces a person they’ve interviewed
                    <br>and provides some background information about
                    <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>and their
                    <br>work following this is a transcript of the interview.</div>
                <!--end::Text-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.auth.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\peter-paulsen\resources\views/admin/auth/forgot-password.blade.php ENDPATH**/ ?>