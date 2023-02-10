
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta name="description" content="Admin Login Panel"/>
        <meta name="keywords" content="Admin Login Panel"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
        <?php
            $favicon = asset('public/company/logos/default.png');
        ?>
        <?php if(!empty(companyProfile()) && companyProfile()->favicon): ?>
            <?php
                $favicon = asset('public/company/favicons').'/'.companyProfile()->favicon;
            ?>
        <?php endif; ?>
        
        <!--<link rel="shortcut icon" href="<?php echo e(asset('public/admin/media/logos/favicon.ico')); ?>"/>-->
        <link rel="shortcut icon" href="<?php echo e($favicon); ?>"/>
        <meta name="csrf-token" id="token" content="<?php echo e(csrf_token()); ?>" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
        <link rel="preload" href="<?php echo e(asset('public/admin/plugins/global/plugins.bundle.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" type="text/css">
        <noscript>
            <link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/global/plugins.bundle.css')); ?>">
        </noscript>
        <link rel="preload" href="<?php echo e(asset('public/admin/plugins/global/plugins-custom.bundle.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" type="text/css">
        <noscript>
            <link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/global/plugins-custom.bundle.css')); ?>">
        </noscript>
        <link href="<?php echo e(asset('public/admin/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css"/>

        <?php echo $__env->yieldPushContent('css'); ?>
    </head>

    <body  id="kt_body"   class="bg-body"   data-kt-name="metronic">
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

        <?php echo $__env->yieldContent('content'); ?>
        <script src="https://code.jquery.com/jquery-3.6.1.js" crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('public/admin/plugins/global/plugins.bundle.js')); ?>"></script>
        <script src="<?php echo e(asset('public/admin/js/scripts.bundle.js')); ?>"></script>
        <script src="<?php echo e(asset('public/admin/js/custom/widgets.js')); ?>"></script>

        <script src="<?php echo e(asset('public/admin/js/custom/authentication/sign-in/general.js')); ?>"></script>
        <?php echo $__env->yieldPushContent('js'); ?>
    </body>
</html>
<?php /**PATH C:\wamp\www\newhurwitz\resources\views/admin/auth/layouts/app.blade.php ENDPATH**/ ?>