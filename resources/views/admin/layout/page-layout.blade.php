<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>{{ isset($pageTitle) ? $pageTitle : 'Page Title' }}</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="back/vendors/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="back/vendors/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="back/vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="back/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="back/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="back/src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="back/src/plugins/datatables/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="back/vendors/styles/style.css" />
    @yield('stylesheets')
</head>

<body>
    @include('admin.layout.inc.header')
    @include('admin.layout.inc.right-sidebar')
    @include('admin.layout.inc.left-sidebar')
    <div class="main-container">
        @yield('content')
    </div>
    <!-- js -->
    <script src="back/vendors/scripts/core.js"></script>
    <script src="back/vendors/scripts/script.min.js"></script>
    <script src="back/vendors/scripts/process.js"></script>
    <script src="back/vendors/scripts/layout-settings.js"></script>
    <script src="back/src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="back/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="back/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="back/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="back/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="back/vendors/scripts/dashboard3.js"></script>
    @yield('scripts')
</body>

</html>
