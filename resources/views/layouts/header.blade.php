<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin Panel Booth App</title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #fff !important;
            border: none;
            /* border: 1px solid rgba(0, 0, 0, 0.3); */
            background-color: #696cff;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(230, 230, 230, 0.1)), color-stop(100%, rgba(0, 0, 0, 0.1)));
            background: -webkit-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
            background: -moz-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
            background: -ms-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
            background: -o-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
            background: linear-gradient(to bottom, rgb(105 108 255 / 100%) 0%, rgb(105 108 255 / 100%) 100%);
        }
      </style>

    <style>
        @media print {
            .hidden-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('layouts.navbar')

                @yield('content')

                @include('layouts.footer')
