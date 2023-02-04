
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8"/>
        <title>@yield('title')</title>
        <meta name="description" content="Admin Login Panel"/>
        <meta name="keywords" content="Admin Login Panel"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
        @php
            $favicon = asset('public/company/logos/default.png');
        @endphp
        @if(!empty(companyProfile()) && companyProfile()->favicon)
            @php
                $favicon = asset('public/company/favicons').'/'.companyProfile()->favicon;
            @endphp
        @endif
        
        <!--<link rel="shortcut icon" href="{{ asset('public/admin/media/logos/favicon.ico') }}"/>-->
        <link rel="shortcut icon" href="{{ $favicon }}"/>
        <meta name="csrf-token" id="token" content="{{ csrf_token() }}" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
        <link rel="preload" href="{{ asset('public/admin/plugins/global/plugins.bundle.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'" type="text/css">
        <noscript>
            <link rel="stylesheet" href="{{ asset('public/admin/plugins/global/plugins.bundle.css') }}">
        </noscript>
        <link rel="preload" href="{{ asset('public/admin/plugins/global/plugins-custom.bundle.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'" type="text/css">
        <noscript>
            <link rel="stylesheet" href="{{ asset('public/admin/plugins/global/plugins-custom.bundle.css') }}">
        </noscript>
        <link href="{{ asset('public/admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>

        @stack('css')
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

        @yield('content')
        <script src="https://code.jquery.com/jquery-3.6.1.js" crossorigin="anonymous"></script>
        <script src="{{ asset('public/admin/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('public/admin/js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('public/admin/js/custom/widgets.js') }}"></script>

        <script src="{{ asset('public/admin/js/custom/authentication/sign-in/general.js') }}"></script>
        @stack('js')
    </body>
</html>
