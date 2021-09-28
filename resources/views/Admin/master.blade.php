<!DOCTYPE html>
<html dir="ltr" lang="fa-IR" class="no-js">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Admin panel
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="/admin/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="/admin/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/admin/demo/demo.css?v=3" rel="stylesheet" />
    <link href="/admin/css/sweetalert.css?v=3" rel="stylesheet" />
    <link href="/admin/css/new.css?v=3" rel="stylesheet" />
</head>

<body>
<div id="app" class="wrapper ">
    @include("Admin.shares.aside")


    <div class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="ef41b5f9-0546-4eac-ccb9-386a71f3b22d">
        <!-- Navbar -->
        @include("Admin.shares.header")

        @yield('content')

        @include("Admin.shares.footer")

    </div>
</div>


@include('Admin.shares.script')

@yield('script')

</body>

</html>
