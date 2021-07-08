<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Form Ubah Pengajuan Cuti</h4>
                
                <form method="post" action="<?= base_url('admin/ubahCuti/'.$cuti['id']); ?>">
                    <input type="hidden" class="form-control" name="id" placeholder="ID" value="<?= $cuti['id']; ?>">
                    <input type="hidden" class="form-control" name="nip" placeholder="NIP" value="<?= $cuti['id_nip']; ?>">
                    
                    <div class="form-group">
                    <label>Jenis Cuti</label>
                    <select class="form-control" name="jenis_cuti" id="jenis_cuti" style="width:100%">
                    <?php foreach($jenis_cuti as $jenis) : ?>
                        <option value="<?= $jenis['id']; ?>"> <?= $jenis['jenis_cuti']; ?> </option>
                    <?php endforeach; ?>
                    </select>
                    <?= form_error('jenis_cuti', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan (Optional)" value="<?= $cuti['keterangan']; ?>">
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label for="tanggal_awal">Tanggal Cuti Awal</label>
                            <input type="text" class="form-control form-inline" name="tgl_awal" id="tgl_awal" placeholder="Tanggal Awal Cuti" value="<?= $cuti['tgl_awal']; ?>">
                            <?= form_error('tgl_awal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="col">
                            <label for="tanggal_akhir">Tanggal Akhir Cuti</label>
                            <input type="text" class="form-control form-inline" name="tgl_akhir" id="tgl_akhir" placeholder="Tanggal Akhir Cuti" value="<?= $cuti['tgl_akhir']; ?>">
                            <?= form_error('tgl_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <input type="hidden" class="form-control" name="status" id="status" placeholder="status" value="<?= $cuti['status']; ?>">
                    </div>

                    <input type="hidden" class="form-control" name="edited_by" placeholder="Edited By" value="<?= $this->session->userdata('username'); ?>">

                    <button type="submit" class="btn btn-primary">Ubah Pengajuan Cuti</button>
                    <a href="<?= base_url('cuti/hapusCuti/'.$cuti['id']); ?>" class="btn btn-danger tombol-hapus">Hapus</a>
                    <a href="<?= base_url('admin/manageCuti'); ?>" class="btn btn-light">Batal</a>
                    
                </form>
                
            </div>
        </div>
        </div>
    </div>
    </div>
<!-- content-wrapper ends -->