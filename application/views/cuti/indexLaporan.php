<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                    <div class="row justify-content-end mb-3">
                        <div class="col-md">
                            <h3> Laporan Cuti </h3>
                        </div>
                    
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control form-inline" name="awal" id="tgl_awal" placeholder="Tanggal Awal Cuti">
                        </div>

                        <div class="col">
                            <input type="text" class="form-control form-inline" name="akhir" id="tgl_akhir" placeholder="Tanggal Akhir Cuti">
                        </div>
                        
                        <div class="col">
                            <button type="button" id="btn-search" class="btn btn-primary">Cari</button>                        
                            <button type="button" id="btn-print" class="btn btn-danger" style="display:none;">Print</button>
                        </div>

                    </div>

                    <div id="dataCuti">
                        <?php $this->load->view('cuti/laporanTable', array('cuti' => $cuti)); ?>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!-- content-wrapper ends -->