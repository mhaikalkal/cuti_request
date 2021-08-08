<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        
    <div class="row quick-action-toolbar">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Dashboard</h5>
                    <span class="ml-auto mb-0" id="time"></span>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            Selamat Datang <b><?= $user['nama'] ?></b>, Semoga Harimu menyenangkan~
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-sm-flex align-items-baseline report-summary-header">
                                <h4 class="font-weight-semibold">Data</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row report-inner-cards-wrapper">
                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">User Accounts</span>
                                <h6> Total : </h6>
                                <span class="report-count"> <?= $jml_akun; ?> Accounts</span>
                            </div>
                            <div class="inner-card-icon bg-success">
                                <i class="icon-people"></i>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Admin Accounts</span>
                                <h6> Total : </h6>
                                <span class="report-count"> <?= $jml_admin; ?> Accounts</span>
                            </div>
                            <div class="inner-card-icon bg-danger">
                                <i class="icon-user-follow"></i>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Manager Accounts</span>
                                <h6> Total : </h6>
                                <span class="report-count"> <?= $jml_manager; ?> Accounts</span>
                            </div>
                            <div class="inner-card-icon bg-info">
                                <i class="icon-user-following"></i>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Cuti</span>
                                <h6> Total : </h6>
                                <span class="report-count"> <?= $jml_cuti; ?> Permohonan</span>
                            </div>
                            <div class="inner-card-icon bg-primary">
                                <i class="icon-plane"></i>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Content wrapper close div -->
    </div>  
    <!-- content-wrapper ends -->