<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/backend/images/logo.png">
    <title><?= $title; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>assets/backend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="<?= base_url() ?>assets/backend/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/backend/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/dropify/dist/css/dropify.min.css">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url() ?>assets/backend/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?= base_url(); ?>">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url() ?>assets/backend/images/logo.png" height="33px" ; alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?= base_url() ?>assets/backend/images/logo.png" height="33px" ; alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                        </span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">

                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a class="has-arrow" href="<?= base_url('admin'); ?>"><i class="mdi mdi-gauge"></i>Dasbor Admin </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="<?= base_url('admin/kategori'); ?>"><i class="mdi mdi-file-tree"></i>Kategori </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="<?= base_url('admin/produk'); ?>"><i class="mdi mdi-cart"></i>Produk </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="<?= base_url('order/index'); ?>"><i class="mdi mdi-cart"></i>Order </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="<?= base_url('login/alurlogout'); ?>"><i class="mdi mdi-arrow-left"></i>Logout </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->