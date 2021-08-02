<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/morris/morris.css') }}">

    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('admin/assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- Sweet Alert -->
    <link href="{{ asset('admin/assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

    <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
</head>


<body class="fixed-left">


<!-- Begin page -->
@yield('contents')
<!-- END wrapper -->



</body>
</html>

