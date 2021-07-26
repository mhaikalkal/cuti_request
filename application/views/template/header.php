<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $judul; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/Stellar/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/Stellar/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/Stellar/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url(); ?>vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/Stellar/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url(); ?>vendor/Stellar/images/favicon.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
    
</head>
<body>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <img src="<?= base_url(); ?>vendor/Stellar/images/logo.svg" alt="logo" class="logo-light" />
            </a>
        </div>

        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
        <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Sistem Informasi Pengajuan CUTI</h5>
        
        <ul class="navbar-nav navbar-nav-right ml-auto">
            <!-- Notification -->
            <?php if($this->session->userdata('level') === '2') { ?>
            <?= '<li class="nav-item dropdown">
                <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="icon-bell"></i>';?>
                    <?php if($pending > 0) : ?>
                        <?= '<span class="count">'?> <?= $pending; ?> <?='</span>';?>
                    <?php endif; ?>
                <?= '</a>
                
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">';?>
                <?php if($pending > 0) { ?>
                <?= 
                '<a class="dropdown-item py-3" href="'?><?= base_url('humanRes/manageCuti'); ?><?='">
                    <p class="mb-0 font-weight-medium float-left">Anda memiliki'?> <?= $pending; ?> <?= 'permohonan cuti untuk diproses. </p>
                    <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>'?>
                <?php } else { ?>
                <?= '<a class="dropdown-item py-3" href="'?><?= base_url('humanRes/manageCuti'); ?><?='">
                    <p class="mb-0 font-weight-medium float-left">Anda memiliki'?> <?= $pending; ?> <?= 'permohonan cuti untuk diproses. </p>
                    <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>'; ?>

                <?php } ?>
                <?= '<div class="dropdown-divider"></div>
            </li>'; ?>
            <?php } ?>
            
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="<?= base_url(); ?>vendor/Stellar/images/faces/face8.jpg" alt="Profile image"> <span class="font-weight-normal"> <?= $user['nama']; ?> </span></a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                    <img class="img-md rounded-circle" src="<?= base_url(); ?>vendor/Stellar/images/faces/face8.jpg" alt="Profile image">
                    <p class="mb-1 mt-3"><?= $user['nama']; ?></p>
                    <p class="font-weight-light text-muted mb-0"><?= $user['jabatan']; ?></p>
                </div>
                <a class="dropdown-item" href="<?= base_url('profile/detailUser/') . $this->session->userdata('id');?>"><i class="dropdown-item-icon icon-user text-primary"></i> Profile Saya</a>
                <a class="dropdown-item" href="<?= base_url('profile/ubahUser/') . $this->session->userdata('id');?>"><i class="dropdown-item-icon icon-settings text-primary"></i> Ubah Password</a>
                <a class="dropdown-item" href="<?= base_url();?>auth/logout"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
            </div>
            </li>
        </ul>
        <!--  -->
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a class="nav-link" data-toggle="collapse" href="#menu-profile" aria-expanded="false" aria-controls="ui-basic">
                    <div class="text-wrapper">
                        <p class="profile-name"><?= $user['nama']; ?></p>
                        <p class="designation"><?= $user['jabatan']; ?></p>
                    </div>
                </a>

                <div class="collapse" id="menu-profile">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('profile/detailUser/') . $this->session->userdata('id');?>">Profile Saya</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url();?>auth/logout">Logout</a></li>
                    </ul>
                </div>

            </li>

            <li class="nav-item nav-category">
                <span class="nav-link">Dashboard</span>
            </li>

            <li class="nav-item">
                <?php if($this->session->userdata('level') === '1') { ?>
                <?= '<a class="nav-link" href="'?> <?= base_url('admin'); ?> <?='">
                    <span class="menu-title">Dashboard</span>
                    <i class="icon-screen-desktop menu-icon"></i>
                </a>'; ?>
                <?php } else if($this->session->userdata('level') === '2') { ?>
                <?= '<a class="nav-link" href="'?> <?= base_url('hr'); ?> <?='">
                    <span class="menu-title">Dashboard</span>
                    <i class="icon-screen-desktop menu-icon"></i>
                </a>'; ?>
                <?php } else if($this->session->userdata('level') === '3') { ?>
                <?= '<a class="nav-link" href="'?> <?= base_url('staff'); ?> <?='">
                    <span class="menu-title">Dashboard</span>
                    <i class="icon-screen-desktop menu-icon"></i>
                </a>'; ?>
                <?php } ?>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#menu-cuti" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-title">Menu Cuti</span>
                    <i class="icon-layers menu-icon"></i>
                </a>
                <div class="collapse" id="menu-cuti">
                    <ul class="nav flex-column sub-menu">
                    <?php if($this->session->userdata('level') === '1') { ?>
                        <?= '<li class="nav-item"> <a class="nav-link" href="'?> <?= base_url('admin/manageCuti'); ?> <?='">Manage Cuti</a></li>';?>
                        <?= '<li class="nav-item"> <a class="nav-link" href="'?> <?= base_url('cuti/indexLaporan'); ?> <?='">Laporan</a></li>';?>
                    <?php } else if($this->session->userdata('level') === '2') { ?>
                        <?= '<li class="nav-item"> <a class="nav-link" href="'?> <?= base_url('humanRes/manageCuti'); ?> <?='">Manage Cuti</a></li>';?>
                        <?= '<li class="nav-item"> <a class="nav-link" href="'?> <?= base_url('cuti/indexLaporan'); ?> <?='">Laporan</a></li>';?>
                    <?php } ?>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('cuti/index'); ?>">Pengajuan Cuti</a></li>
                    </ul>
                </div>
            </li>

            <?php if($this->session->userdata('level') === '1') { ?>
            <?= '<li class="nav-item">
                <a class="nav-link" href="';?><?= base_url('admin/manageUser'); ?><?='">
                    <span class="menu-title">Manage User</span>
                    <i class="icon-people menu-icon"></i>
                </a>
            </li>' ?>
            <?php } ?>

            <?php if($this->session->userdata('level') === '1') { ?>
            <?= '<li class="nav-item pro-upgrade">
              <span class="nav-link">
                <a class="btn btn-block px-0 btn-rounded btn-upgrade" href="'?> <?= base_url('admin/backupDB'); ?> <?='"> <i class="icon-cloud-download mx-2"></i> Backup Database </a>
              </span>
            </li>' ?>
            <?php } ?>
        </ul>
    </nav>
  