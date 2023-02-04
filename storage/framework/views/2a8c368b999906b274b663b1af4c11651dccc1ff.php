<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('admin.user.trash.records')); ?>">
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
                            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?php echo e($page_title); ?></h1>
                            <!--end::Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">
                                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-muted text-hover-primary">Home</a>
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
                            <a href="<?php echo e(route('user.index')); ?>" title="All Users" class="btn btn-primary btn-sm">View All</a>
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
                                        <tr>
                                            <th  title="Log ID">SNo#</th>
                                            <th  title="Location">Avatar</th>
                                            <th  title="Location">Name</th>
                                            <th  title="Location">User Name</th>
                                            <th  title="Location">Phone</th>
                                            <th  title="Location">Email</th>
                                            <th  title="Location">Status</th>
                                            <th  title="Created At">Created At</th>
                                            <th  title="Action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body">
                                        <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="id-<?php echo e($model->id); ?>">
                                                <td><?php echo e($models->firstItem()+$key); ?>.</td>
                                                <td>
                                                    <?php if($model->avatar): ?>
                                                        <img src="<?php echo e(asset('public/avatar')); ?>/<?php echo e($model->avatar); ?>" class="rounded" width="50px" alt="">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('public/avatar/default.png')); ?>" width="50px" alt="">
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php echo e($model->name); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($model->user_name); ?>

                                                </td>
                                                <td>
                                                    <?php echo e(isset($model->hasProfile)?$model->phone:'N/A'); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($model->email); ?>

                                                </td>
                                                <td>
                                                    <?php if($model->status): ?>
                                                        <span class="badge badge-success">Active</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">In-Active</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(date('d, M-Y', strtotime($model->created_at))); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.user.restore', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit user" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td colspan="6">
                                                Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
                                                <div class="d-flex justify-content-center">
                                                    <?php echo $models->links('pagination::bootstrap-4'); ?>

                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\peter-paulsen\resources\views/admin/user/trash-index.blade.php ENDPATH**/ ?>