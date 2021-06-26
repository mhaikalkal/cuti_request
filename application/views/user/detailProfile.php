<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-md-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">
                    Edit Profile
                </h4>
                <table class="table table-hover">
                    <tbody>
                    <?php if($anyprofile != NULL ) { ?>
                        <?php foreach($profile as $profile) : ?>
                            <tr>
                                <td><b>NIP</b></td>
                                <td><?= $profile['nip']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Nama Lengkap</b></td>
                                <td><?= $profile['nama']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Jenis Kelamin</b></td>
                                <td><?= $profile['kelamin']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Divisi</b></td>
                                <td><?= $profile['divisi']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Jabatan</b></td>
                                <td><?= $profile['jabatan']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td><?= $profile['email']; ?></td>
                            </tr>
                            <tr>
                                <td><b>No. Telp</b></td>
                                <td><?= $profile['telp']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Awal Bekerja</b></td>
                                <td><?= $profile['tgl_masuk']; ?></td>
                            </tr>
                        <?php endforeach; ?> 
                    <?php } else { ?>
                        <div class="alert alert-danger" role="alert">Data Kosong</div>
                    <?php } ?>
                    <tr>
                        <?php if ($anyprofile != NULL ) { ?>
                            <td colspan="2">
                                <a href="<?= base_url('admin/ubahProfile/'.$profile['id']); ?>" class="btn btn-primary mr-2">Edit</a>
                                <a href="<?= base_url('admin/manageUser'); ?>" class="btn btn-light">Kembali</a>
                            </td>
                        <?php } else { ?>
                            <td colspan="2">
                                <a href="<?= base_url('admin/ubahProfile/'.$self); ?>" class="btn btn-primary mr-2">Edit</a>
                                <a href="<?= base_url('admin/manageUser'); ?>" class="btn btn-light">Kembali</a>
                            </td>
                        <?php } ?>
                    </tr>
                </table>                        
            </div>
        </div>
        </div>
    </div>
    </div>
<!-- content-wrapper ends -->