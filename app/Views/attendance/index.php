<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Attendance System Integration APP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Rekon & Scan e-Faktur Application" name="description" />
    <meta content="KOPNECI" name="author" />
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">
    <script src="<?= base_url() ?>assets/js/layout.js"></script>
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/fontawesome/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/dataTables/DataTables-1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="<?= base_url(); ?>" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= base_url('assets/images/logo_kopnec.png') ?>" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('assets/images/logo_kopnec.png') ?>" alt="" height="45">
                                </span>
                            </a>

                            <a href="<?= base_url(); ?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= base_url('assets/images/logo_kopnec.png') ?>" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('assets/images/logo_kopnec.png') ?>" alt="" height="45">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </div>
                    <div class="d-flex">
                        <span class="logo-txt text-center fw-bold fs-20 text-muted text-uppercase">Attendance System Integration</span>
                    </div>
                    <div class="d-flex align-items-center">

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode shadow-none">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Super User</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="javascript:void(0)" onclick="location.href = '<?= base_url('logout'); ?>'"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="<?= base_url(); ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/images/NEC_logo.svg') ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/images/NEC_logo.svg') ?>" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="<?= base_url(); ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/images/NEC_logo.svg') ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/images/NEC_logo.svg') ?>" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link me-n3 menu-link <?= $title == 'Home' ? 'active' : ''; ?>" href="<?= base_url(); ?>" role="button" aria-expanded="false">
                                <i class="nav-icon fas fa-solid fa-house-user"></i> <span>Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-n3 menu-link <?= $title == 'Report' ? 'active' : ''; ?>" href="<?= base_url(); ?>" role="button" aria-expanded="false">
                                <i class="nav-icon fas fa-solid fa-file-invoice"></i> <span>Report</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">Log Attendance Face Recognition</h5>
                        </div>
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible shadow fade show mt-3 mb-3" role="alert">
                                <strong> Yey! Everything worked! </strong> <?= session()->getFlashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="table-responsive table-card mb-3">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-start align-middle" style="width: 3%;">No</th>
                                            <th class="text-start align-middle">File Name</th>
                                            <th class="text-center align-middle" style="width: 5%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <?php
                                        $countlogfile = 0;
                                        foreach ($logfile as $listlogfile) :
                                            $countlogfile++;
                                        ?>
                                            <tr>
                                                <td class="text-start align-middle"><?= $countlogfile; ?></td>
                                                <td class="text-start align-middle"><?= $listlogfile; ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" onclick="location.href = '<?= base_url('home/sync/' . $listlogfile); ?>'" class="btn btn-soft-info btn-sm shadow-none">
                                                        <i class="fa-solid fa-rotate"></i> Sync
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= date('Y'); ?> © REKON APP | PT NEC Indonesia | Finance & Accounting.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Develop by KOPNECI
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= base_url() ?>assets/js/app.js"></script>
    <script src="<?= base_url() ?>assets/libs/dataTables/jQuery-1.12.4/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/dataTables/DataTables-1.13.6/js/jquery.dataTables.min.js"></script>

</body>

</html>