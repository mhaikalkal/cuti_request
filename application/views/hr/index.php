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
                            Selamat Datang <b><?= $user['nama'] ?></b>, Semoga Harimu menyenangkan~
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
                                <span class="report-title">Cuti Keseluruhan</span>
                                <h6> Total : </h6>
                                <span class="report-count"> <?= $allcuti; ?> Data Cuti</span>
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

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Penutup  -->
    </div>
    <!-- content-wrapper ends -->