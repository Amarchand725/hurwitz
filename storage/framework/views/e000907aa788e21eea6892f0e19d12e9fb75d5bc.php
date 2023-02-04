<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div id="kt_app_content" class="app-content " style="margin-top:2%">
        <div id="kt_app_content_container" class="app-container ">
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <!--Orders-->
                <div class="col-xxl-6">
                    <div class="card card-flush h-xl-100">
                        <div class="card-body py-9">
                            <div class="row gx-9 h-100">
                                <div class="col-sm-12">
                                    <div class="d-flex flex-column h-100">
                                        <div class="mb-7">
                                            <div class="d-flex flex-stack mb-6">
                                                <div class="flex-shrink-0 me-5">
                                                    <span class="text-gray-800 fs-1 fw-bold">
                                                        ORDERS <?php echo e($data['total_orders']); ?>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="d-flex">
                                                <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                                    <span class="fs-6 text-gray-700 fw-bold">DELIVERED</span>
                                                    <div class="fw-semibold text-gray-400">
                                                        <span class="badge badge-success"><?php echo e($data['delivered_orders']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                    <span class="fs-6 text-gray-700 fw-bold">ON THE WAY</span>
                                                    <div class="fw-semibold text-gray-400">
                                                        <span class="badge badge-info"><?php echo e($data['on_the_way_orders']); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                                    <span class="fs-6 text-gray-700 fw-bold">PENDING</span>
                                                    <div class="fw-semibold text-gray-400">
                                                        <span class="badge badge-warning"><?php echo e($data['pending_orders']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                    <span class="fs-6 text-gray-700 fw-bold">CANCELLED</span>
                                                    <div class="fw-semibold text-gray-400">
                                                        <span class="badge badge-danger"><?php echo e($data['cancelled_orders']); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-stack mt-auto bd-highlight">
                                            <div class="symbol-group symbol-hover flex-nowrap">
                                                <?php $__currentLoopData = $data['new_orders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="symbol symbol-35px symbol-circle" title="<?php echo e(isset($order->user)?$order->user->name:'N/A'); ?>" data-bs-toggle="tooltip" aria-label="<?php echo e(isset($order->user)?$order->user->name:'N/A'); ?>" data-kt-initialized="1">
                                                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">
                                                            <?php if(!empty($order->user)): ?>
                                                                <?php echo e(Str::upper(mb_substr($order->user->name, 0, 1))); ?>

                                                            <?php else: ?>
                                                                <?php echo e(Str::upper(mb_substr('n', 0, 1))); ?>

                                                            <?php endif; ?>
                                                        </span>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <a href="<?php echo e(route('orders.index')); ?>" class="text-primary opacity-75-hover fs-6 fw-semibold">View All Orders
                                                <span class="svg-icon svg-icon-4 svg-icon-gray-800 ms-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M4.7 17.3V7.7C4.7 6.59543 5.59543 5.7 6.7 5.7H9.8C10.2694 5.7 10.65 5.31944 10.65 4.85C10.65 4.38056 10.2694 4 9.8 4H5C3.89543 4 3 4.89543 3 6V19C3 20.1046 3.89543 21 5 21H18C19.1046 21 20 20.1046 20 19V14.2C20 13.7306 19.6194 13.35 19.15 13.35C18.6806 13.35 18.3 13.7306 18.3 14.2V17.3C18.3 18.4046 17.4046 19.3 16.3 19.3H6.7C5.59543 19.3 4.7 18.4046 4.7 17.3Z" fill="currentColor"></path>
                                                        <rect x="21.9497" y="3.46448" width="13" height="2" rx="1" transform="rotate(135 21.9497 3.46448)" fill="currentColor"></rect>
                                                        <path d="M19.8284 4.97161L19.8284 9.93937C19.8284 10.5252 20.3033 11 20.8891 11C21.4749 11 21.9497 10.5252 21.9497 9.93937L21.9497 3.05029C21.9497 2.498 21.502 2.05028 20.9497 2.05028L14.0607 2.05027C13.4749 2.05027 13 2.52514 13 3.11094C13 3.69673 13.4749 4.17161 14.0607 4.17161L19.0284 4.17161C19.4702 4.17161 19.8284 4.52978 19.8284 4.97161Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Books-->
                <div class="col-xxl-6">
                    <div class="card card-flush h-xl-100">
                        <div class="card-body py-9">
                            <div class="row gx-9 h-100">
                                <div class="col-sm-12">
                                    <div class="d-flex flex-column h-100">
                                        <div class="mb-7">
                                            <div class="d-flex flex-stack mb-6">
                                                <div class="flex-shrink-0 me-5">
                                                    <span class="text-gray-800 fs-1 fw-bold">
                                                        BOOKS <?php echo e($data['total_books']); ?>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="d-flex">
                                                <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                                    <span class="fs-6 text-gray-700 fw-bold">ACTIVE</span>
                                                    <div class="fw-semibold text-gray-400">
                                                        <span class="badge badge-success"><?php echo e(count($data['active_books'])); ?></span>
                                                    </div>
                                                </div>
                                                <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                    <span class="fs-6 text-gray-700 fw-bold">IN-ACTIVE</span>
                                                    <div class="fw-semibold text-gray-400">
                                                        <span class="badge badge-danger"><?php echo e(count($data['in_active_books'])); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-stack mt-auto bd-highlight">
                                            <div class="symbol-group symbol-hover flex-nowrap">
                                                <?php $__currentLoopData = $data['new_books']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="symbol symbol-35px symbol-circle" title="<?php echo e($book->title); ?>" data-bs-toggle="tooltip" aria-label="<?php echo e($book->name); ?>" data-kt-initialized="1">
                                                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">
                                                            <?php echo e(Str::upper(mb_substr($book->title, 0, 1))); ?>

                                                        </span>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <a href="<?php echo e(route('book.index')); ?>" class="text-primary opacity-75-hover fs-6 fw-semibold">View All Books
                                                <span class="svg-icon svg-icon-4 svg-icon-gray-800 ms-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M4.7 17.3V7.7C4.7 6.59543 5.59543 5.7 6.7 5.7H9.8C10.2694 5.7 10.65 5.31944 10.65 4.85C10.65 4.38056 10.2694 4 9.8 4H5C3.89543 4 3 4.89543 3 6V19C3 20.1046 3.89543 21 5 21H18C19.1046 21 20 20.1046 20 19V14.2C20 13.7306 19.6194 13.35 19.15 13.35C18.6806 13.35 18.3 13.7306 18.3 14.2V17.3C18.3 18.4046 17.4046 19.3 16.3 19.3H6.7C5.59543 19.3 4.7 18.4046 4.7 17.3Z" fill="currentColor"></path>
                                                        <rect x="21.9497" y="3.46448" width="13" height="2" rx="1" transform="rotate(135 21.9497 3.46448)" fill="currentColor"></rect>
                                                        <path d="M19.8284 4.97161L19.8284 9.93937C19.8284 10.5252 20.3033 11 20.8891 11C21.4749 11 21.9497 10.5252 21.9497 9.93937L21.9497 3.05029C21.9497 2.498 21.502 2.05028 20.9497 2.05028L14.0607 2.05027C13.4749 2.05027 13 2.52514 13 3.11094C13 3.69673 13.4749 4.17161 14.0607 4.17161L19.0284 4.17161C19.4702 4.17161 19.8284 4.52978 19.8284 4.97161Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Users-->
                <div class="col-xxl-6">
                    <div class="card card-flush h-xl-100">
                        <div class="card-body py-9">
                            <div class="row gx-9 h-100">
                                <div class="col-sm-12">
                                    <div class="d-flex flex-column h-100">
                                        <div class="mb-7">
                                            <div class="d-flex flex-stack mb-6">
                                                <div class="flex-shrink-0 me-5">
                                                    <span class="text-gray-800 fs-1 fw-bold">
                                                        USERS <?php echo e($data['total_users']); ?>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="d-flex">
                                                <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                                    <span class="fs-6 text-gray-700 fw-bold">ACTIVE</span>
                                                    <div class="fw-semibold text-gray-400">
                                                        <span class="badge badge-success"><?php echo e(count($data['active_users'])); ?></span>
                                                    </div>
                                                </div>
                                                <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                    <span class="fs-6 text-gray-700 fw-bold">IN-ACTIVE</span>
                                                    <div class="fw-semibold text-gray-400">
                                                        <span class="badge badge-danger"><?php echo e(count($data['in_active_users'])); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-stack mt-auto bd-highlight">
                                            <div class="symbol-group symbol-hover flex-nowrap">
                                                <?php $__currentLoopData = $data['new_users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $avatar = ''; ?>
                                                    <?php if(!empty($user->avatar)): ?>
                                                        <?php
                                                            $avatar = asset('public/avatar').'/'.$user->avatar;
                                                        ?>
                                                    <?php endif; ?>
                                                    <div class="symbol symbol-35px symbol-circle" title="<?php echo e($user->name); ?>" data-bs-toggle="tooltip" aria-label="<?php echo e($user->name); ?>" data-kt-initialized="1">
                                                        <?php if($avatar): ?>
                                                            <img alt="Pic" src="<?php echo e($avatar); ?>">
                                                        <?php else: ?>
                                                            <span class="symbol-label bg-primary text-inverse-primary fw-bold">
                                                                <?php echo e(Str::upper(mb_substr($user->name, 0, 1))); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <a href="<?php echo e(route('user.index')); ?>" class="text-primary opacity-75-hover fs-6 fw-semibold">View All Users
                                                <span class="svg-icon svg-icon-4 svg-icon-gray-800 ms-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M4.7 17.3V7.7C4.7 6.59543 5.59543 5.7 6.7 5.7H9.8C10.2694 5.7 10.65 5.31944 10.65 4.85C10.65 4.38056 10.2694 4 9.8 4H5C3.89543 4 3 4.89543 3 6V19C3 20.1046 3.89543 21 5 21H18C19.1046 21 20 20.1046 20 19V14.2C20 13.7306 19.6194 13.35 19.15 13.35C18.6806 13.35 18.3 13.7306 18.3 14.2V17.3C18.3 18.4046 17.4046 19.3 16.3 19.3H6.7C5.59543 19.3 4.7 18.4046 4.7 17.3Z" fill="currentColor"></path>
                                                        <rect x="21.9497" y="3.46448" width="13" height="2" rx="1" transform="rotate(135 21.9497 3.46448)" fill="currentColor"></rect>
                                                        <path d="M19.8284 4.97161L19.8284 9.93937C19.8284 10.5252 20.3033 11 20.8891 11C21.4749 11 21.9497 10.5252 21.9497 9.93937L21.9497 3.05029C21.9497 2.498 21.502 2.05028 20.9497 2.05028L14.0607 2.05027C13.4749 2.05027 13 2.52514 13 3.11094C13 3.69673 13.4749 4.17161 14.0607 4.17161L19.0284 4.17161C19.4702 4.17161 19.8284 4.52978 19.8284 4.97161Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Blogs-->
                <div class="col-xxl-6">
                    <div class="card card-flush h-xl-100">
                        <div class="card-body py-9">
                            <div class="row gx-9 h-100">
                                <div class="col-sm-12">
                                    <div class="d-flex flex-column h-100">
                                        <div class="mb-7">
                                            <div class="d-flex flex-stack mb-6">
                                                <div class="flex-shrink-0 me-5">
                                                    <span class="text-gray-800 fs-1 fw-bold">
                                                        BLOGS <?php echo e($data['total_blogs']); ?>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="d-flex">
                                                <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                                    <span class="fs-6 text-gray-700 fw-bold">ACTIVE </span>
                                                    <div class="fw-semibold text-gray-400">
                                                        <span class="badge badge-success"><?php echo e(count($data['active_blogs'])); ?></span>
                                                    </div>
                                                </div>
                                                <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                    <span class="fs-6 text-gray-700 fw-bold">IN-ACTIVE</span>
                                                    <div class="fw-semibold text-gray-400">
                                                        <span class="badge badge-danger"><?php echo e(count($data['in_active_blogs'])); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--begin::Footer-->
                                        <div class="d-flex flex-stack mt-auto bd-highlight">
                                            <div class="symbol-group symbol-hover flex-nowrap">
                                                <?php $__currentLoopData = $data['new_blogs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="symbol symbol-35px symbol-circle" title="<?php echo e($blog->title); ?>" data-bs-toggle="tooltip" aria-label="<?php echo e($blog->name); ?>" data-kt-initialized="1">
                                                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">
                                                            <?php echo e(Str::upper(mb_substr($blog->title, 0, 1))); ?>

                                                        </span>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <a href="<?php echo e(route('blogs.index')); ?>" class="text-primary opacity-75-hover fs-6 fw-semibold">View All Blogs
                                                <span class="svg-icon svg-icon-4 svg-icon-gray-800 ms-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M4.7 17.3V7.7C4.7 6.59543 5.59543 5.7 6.7 5.7H9.8C10.2694 5.7 10.65 5.31944 10.65 4.85C10.65 4.38056 10.2694 4 9.8 4H5C3.89543 4 3 4.89543 3 6V19C3 20.1046 3.89543 21 5 21H18C19.1046 21 20 20.1046 20 19V14.2C20 13.7306 19.6194 13.35 19.15 13.35C18.6806 13.35 18.3 13.7306 18.3 14.2V17.3C18.3 18.4046 17.4046 19.3 16.3 19.3H6.7C5.59543 19.3 4.7 18.4046 4.7 17.3Z" fill="currentColor"></path>
                                                        <rect x="21.9497" y="3.46448" width="13" height="2" rx="1" transform="rotate(135 21.9497 3.46448)" fill="currentColor"></rect>
                                                        <path d="M19.8284 4.97161L19.8284 9.93937C19.8284 10.5252 20.3033 11 20.8891 11C21.4749 11 21.9497 10.5252 21.9497 9.93937L21.9497 3.05029C21.9497 2.498 21.502 2.05028 20.9497 2.05028L14.0607 2.05027C13.4749 2.05027 13 2.52514 13 3.11094C13 3.69673 13.4749 4.17161 14.0607 4.17161L19.0284 4.17161C19.4702 4.17161 19.8284 4.52978 19.8284 4.97161Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\hurwitz\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>