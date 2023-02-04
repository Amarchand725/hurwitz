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
                        <!--begin::Signin Form kt_sign_in_form-->
                        <input type="hidden" id="admin-dashboard-route" value="<?php echo e(route('admin.dashboard')); ?>">
                        <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" id="sign_in_form" data-action="<?php echo e(route('admin.login')); ?>">
                            <?php echo csrf_field(); ?>
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                                <!--end::Title-->
                            </div>
                            <!--begin::Separator-->
                            <div class="separator separator-content my-14">
                                <span class="w-325px text-gray-500 fw-semibold fs-7">Login with your credentials</span>
                            </div>
                            <!--end::Separator-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                <!--begin::Email-->
                                <input type="email" placeholder="Email" id="email" name="email" autocomplete="off" class="form-control bg-transparent" value="<?php echo e(old('email')); ?>" required autofocus>
                                <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                <?php if(Session::has('error')): ?>
                                    <span class="text-danger"><?php echo e(Session::get('error')); ?></span>
                                <?php endif; ?>
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-3 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                <!--begin::Password-->
                                <input type="password" placeholder="Password" id="password" name="password" autocomplete="off" class="form-control bg-transparent" required value="" >
                                <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <!--begin::Link-->
                                <!--<a href="<?php echo e(route('password.request')); ?>" class="link-primary">Forgot Password ?</a>-->
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="sign_in_submit" class="btn btn-primary">
                                    <!--begin::Indicator-->
                                    <span class="indicator-label">
                                        Continue
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                            <div></div>
                        </form>
                    </div>
                </div>
            </div>
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
                    <a href="<?php echo e(route('admin.login')); ?>" class="mb-12">
                        <img alt="Logo" src="<?php echo e($logo); ?>" class="h-75px">
                    </a>
                    <!--end::Logo-->
                    <!--begin::Image-->
                    <img class="mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="<?php echo e(asset('public/admin/media/misc/auth-screens.png')); ?>" alt="">
                    <!--end::Image-->
                </div>
                <!--end::Content-->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $('#sign_in_submit').on('click', function(e){
            e.preventDefault();
            var redirect_to = $('#admin-dashboard-route').val();
            var url = $('#sign_in_form').attr('data-action');
            var email = $('#email').val();
            var password = $('#password').val();

            $('.indicator-label').addClass('d-none');
            $('.indicator-progress').addClass('d-inline-block');

            $.ajax({
                type:'POST',
                url:url,
                data:{_token: "<?php echo e(csrf_token()); ?>", email:email, password:password},
                success: function(response) {
                    $('.indicator-label').removeClass('d-none');
                    $('.indicator-progress').addClass('d-none');
                    if(response.status=='success'){
                        Swal.fire({
                            title: "Login Successfully!",
                            text: "You have successfully logged in!",
                            type: "success",
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                        }).then(okay => {
                            if (okay) {
                                window.location.href = redirect_to;
                            }
                        });
                    }else if(response.status=='failed'){
                        Swal.fire(
                            'Oops...',
                            'Failed to login try again.!',
                            'error'
                        )
                    }else if(response.status=='failed-inactive'){
                        Swal.fire(
                            'Oops...',
                            'Your account is not active verify your email we have sent you verification link.!',
                            'error'
                        )
                    }else if(response.status=='failed-credential'){
                        Swal.fire(
                            'Oops...',
                            'Credentials not matched try again!',
                            'error'
                        )
                    }
                },
                error: function (request, status, error) {
                    $('.indicator-label').removeClass('d-none');
                    $('.indicator-progress').addClass('d-none');

                    if(request.responseJSON.errors.email){
                        $('[name="email"]').next('span').html(request.responseJSON.errors.email);
                    }else{
                        $('[name="email"]').next('span').html('');
                    }
                    if(request.responseJSON.errors.password){
                        $('[name="password"]').next('span').html(request.responseJSON.errors.password);
                    }else{
                        $('[name="password"]').next('span').html('');
                    }
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.auth.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\hurwitz\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>