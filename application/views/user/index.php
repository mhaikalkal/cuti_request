<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-md-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-end mb-3">
                    <div class="col-md">
                        <h3> Manage Data User </h3>
                        <a href="<?= base_url('admin/tambahUser'); ?>" class="btn btn-success btn-sm">Tambah User</a>
                    </div>
                
                </div>

                
                <table class="table table-striped" id="table" width="100%">
                <thead>
                    <tr>
                        <th> No. </th>
                        <th> Username </th>
                        <th> Level </th>
                        <th> Action </th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($users as $user) : ?>
                    <tr>
                        <td style="width: 75px;"><?= $no++; ?></td>
                        <td><?= $user['username'];?></td>
                        <td><?= $user['level']; ?></td>
                        <td>
                            <div class="btn-group">
                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a href="<?= base_url('admin/detailProfile/'.$user['id']); ?>" class="dropdown-item"> <i class="badge bg-success icon-folder-alt "> </i> Detail Profile</a></li>
                                    <li><a href="<?= base_url('admin/userIndex/'.$user['id']); ?>" class="dropdown-item"> <i class="badge bg-primary icon-note"> </i> Ubah Informasi Akun </a></li>
                                    <li><a href="<?= base_url('admin/ubahProfile/'.$user['id']); ?>" class="dropdown-item"> <i class="badge bg-info icon-note"> </i> Ubah Profile</a></li>
                                    <li><a href="<?= base_url('admin/hapusUser/'.$user['id']); ?>" class=" dropdown-item tombol-hapus"> <i class="badge bg-danger icon-trash"> </i> Hapus Akun </a></li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
               
                
            </div>
        </div>
        </div>
    </div>
    </div>
<!-- content-wrapper ends -->