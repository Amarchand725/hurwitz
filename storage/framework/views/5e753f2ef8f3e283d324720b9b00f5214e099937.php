<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
    <div id="kt_app_content" class="app-content" style="margin-top:5px">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container ">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0"><?php echo e($page_title); ?></h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->

                <!--begin::Content-->
                <div id="" class="collapse show">
                    <!--begin::Form-->
                    <form id="" class="form" method="POST" href="<?php echo e(route('admin.system.setting')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php if(!empty(systemSetting())): ?>
                            <input type="hidden" name="id" value="<?php echo e(systemSetting()->id); ?>">
                        <?php endif; ?>

                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Record Show Per Page</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <?php if(!empty(systemSetting())): ?>
                                    <?php $per_page_records = systemSetting()->per_page_record??10 ?>
                                    <?php endif; ?>
                                    <input type="number" name="per_page_record" value="<?php echo e($per_page_records); ?>" class="form-control form-control-lg form-control-solid" placeholder="No of records"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Language</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="language" value="<?php if(!empty(systemSetting())): ?> <?php echo e(systemSetting()->language); ?> <?php endif; ?>" class="form-control form-control-lg form-control-solid" placeholder="language"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Time Zone</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="timezone" value="<?php if(!empty(systemSetting())): ?> <?php echo e(systemSetting()->timezone); ?> <?php endif; ?>" class="form-control form-control-lg form-control-solid" placeholder="timezone"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label  fw-bold fs-6">Currency</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="currency" value="<?php if(!empty(systemSetting())): ?> <?php echo e(systemSetting()->currency); ?> <?php endif; ?>" class="form-control form-control-lg form-control-solid" placeholder="currency e.g USD"/>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\newhurwitz\resources\views/admin/system/setting.blade.php ENDPATH**/ ?>