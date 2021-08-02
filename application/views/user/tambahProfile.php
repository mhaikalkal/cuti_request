<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-md-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Tambah <?= $pickeduser['username']; ?>'s Profile</h4>
                
                <form method="post" action="<?= base_url('admin/ubahProfile/'.$pickeduser['id']); ?>">
                <input type="hidden" class="form-control" name="id" placeholder="ID" value="<?= $pickeduser['id']; ?>">

                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" name="nip" placeholder="NIP" value="<?= set_value('nip') ?>">
                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" style="width:100%" name="kelamin">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <?= form_error('kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label>Divisi</label>
                        <select class="form-control" name="divisi" id="divisi" style="width:100%">
                        <?php foreach ($divisi as $div) : ?>
                            <option value="<?= $div['id']; ?>"><?= $div['divisi']; ?></option>
                        <?php endforeach; ?>   
                        </select>
                        <?= form_error('divisi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="col">
                        <label>Jabatan</label>
                        <select class="form-control" name="jabatan" id="jabatan" style="width:100%"></select>
                        <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col">
                        <label for="telp">No. Telp</label>
                        <input type="text" class="form-control" name="telp" id="telp" placeholder="No. Telp" value="<?= set_value('telp'); ?>">
                        <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </DIV>
                </div>

                <div class="form-group">
                    <label for="tgl_masuk">Tanggal Masuk</label>
                    <input type="text" class="form-control" name="tgl_masuk" id="tgl_masuk" placeholder="Tanggal Awal Masuk" value="<?= set_value('tgl_masuk'); ?>">
                    <?= form_error('tgl_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <button type="submit" class="btn btn-primary">Ubah</button>
                
                <?php if($profileKeisi != NULL ) { ?>
                    <a href="<?= base_url('profile/detailUser/'.$this->session->userdata('id')); ?>" class="btn btn-light">Batal</a>
                <?php } ?>

                </form>
                
            </div>
        </div>
        </div>
    </div>
    </div>
<!-- content-wrapper ends -->