<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Form Ubah Pengajuan Cuti</h4>
                
                <form method="post" action="<?= base_url('humanRes/ubahCuti/'.$cuti['id']); ?>">
                    <input type="hidden" class="form-control" name="id" placeholder="ID" value="<?= $cuti['id']; ?>">
                    <input type="hidden" class="form-control" name="nip" placeholder="NIP" value="<?= $cuti['id_nip']; ?>">

                    <div class="form-group">
                    <label for="jenis_cuti">Jenis Cuti</label>
                    <input type="text" class="form-control" name="jenis_cutiSHOW" id="jenis_cuti" placeholder="Jenis Cuti" value="<?= $cuti['jenis_cuti']; ?>" disabled>
                    <input type="hidden" class="form-control" name="jenis_cuti" id="jenis_cuti" placeholder="Jenis Cuti" value="<?= $cuti['id_jenis_cuti']; ?>">
                    <?= form_error('jenis_cuti', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keteranganSHOW" id="keterangan" placeholder="Keterangan (Optional)" value="<?= $cuti['keterangan']; ?>" disabled>
                        <input type="hidden" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan (Optional)" value="<?= $cuti['keterangan']; ?>">
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label for="tanggal_awal">Tanggal Cuti Awal</label>
                            <input type="text" class="form-control form-inline" name="tgl_awalSHOW" id="tgl_awal" placeholder="Tanggal Awal Cuti" value="<?= $cuti['tgl_awal']; ?>" disabled>
                            <input type="hidden" class="form-control form-inline" name="tgl_awal" id="tgl_awal" placeholder="Tanggal Awal Cuti" value="<?= $cuti['tgl_awal']; ?>">
                            <?= form_error('tgl_awal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="col">
                            <label for="tanggal_akhir">Tanggal Akhir Cuti</label>
                            <input type="text" class="form-control form-inline" name="tgl_akhirSHOW" id="tgl_akhir" placeholder="Tanggal Akhir Cuti" value="<?= $cuti['tgl_akhir']; ?>" disabled>
                            <input type="hidden" class="form-control form-inline" name="tgl_akhir" id="tgl_akhir" placeholder="Tanggal Akhir Cuti" value="<?= $cuti['tgl_akhir']; ?>">
                            <?= form_error('tgl_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <?php if($this->session->userdata('level') === "1" || $this->session->userdata('level') === "2")
                    {
                    ?>
                    <div class="form-group">
                    <label>Status Cuti</label>
                    <select class="form-control" name="status" id="status" style="width:100%">
                        <option value="Menunggu Approval" selected>Menunggu Approval</option>
                        <option value="Approved">Approved</option>
                        <option value="Declined">Declined</option>
                    </select>
                    <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <?php
                    }
                    ?>

                    <input type="hidden" class="form-control" name="edited_by" placeholder="Edited By" value="<?= $this->session->userdata('username'); ?>">

                    <button type="submit" class="btn btn-primary">Ubah Pengajuan Cuti</button>
                    <a href="<?= base_url('humanRes/manageCuti'); ?>" class="btn btn-light">Batal</a>
                    
                </form>
                
            </div>
        </div>
        </div>
    </div>
    </div>
<!-- content-wrapper ends -->