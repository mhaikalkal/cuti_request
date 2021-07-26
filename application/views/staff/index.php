<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        
    <!-- Sambut -->
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
                        <?php if($profile > NULL ) { ?>
                        <?= 'Selamat Datang <b>';?><?=$user['nama']; ?><?='</b>, Semoga Harimu menyenangkan~'; ?>
                        <?php } else { ?>
                        <?= 'Selamat Datang <b>';?><?=$this->session->userdata('username'); ?><?='</b>, Semoga Harimu menyenangkan~ </br>Silahkan lengkapi profilemu.'; ?>
                        <?php }?>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Sambut -->

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
                                <span class="report-title">Anda telah Mengajukan</span>
                                <h6> Total : </h6>
                                <span class="report-count"> <?= $allcuti; ?> Permohonan Cuti</span>
                            </div>
                            <div class="inner-card-icon bg-primary">
                                <i class="icon-plane"></i>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Cuti Pending</span>
                                <h6> Total : </h6>
                                <span class="report-count"> <?= $pending; ?> Menunggu Diproses</span>
                            </div>
                            <div class="inner-card-icon bg-warning">
                                <i class="icon-clock"></i>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Cuti Approved</span>
                                <h6> Total : </h6>
                                <span class="report-count"> <?= $acc; ?> Permohonan Cuti Approved</span>
                            </div>
                            <div class="inner-card-icon bg-success">
                                <i class="icon-like"></i>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Cuti Declined</span>
                                <h6> Total : </h6>
                                <span class="report-count"> <?= $dec; ?> Permohonan Cuti Declined</span>
                            </div>
                            <div class="inner-card-icon bg-danger">
                                <i class="icon-dislike"></i>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Penutup -->
    </div>
    <!-- content-wrapper ends -->