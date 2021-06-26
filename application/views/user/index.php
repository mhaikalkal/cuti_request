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
                        <td><?= $no++; ?></td>
                        <td><?= $user['username'];?></td>
                        <td><?= $user['level']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/detailProfile/'.$user['id']); ?>" class="badge bg-success icon-folder-alt" style="color:white;"> </a>
                            <a href="<?= base_url('admin/userIndex/'.$user['id']); ?>" class="badge bg-primary icon-note" style="color:white;"> </a>
                            <a href="<?= base_url('admin/ubahProfile/'.$user['id']); ?>" class="badge bg-info icon-note" style="color:white;"> </a>
                            <a href="<?= base_url('admin/hapusUser/'.$user['id']); ?>" class="badge bg-danger icon-trash tombol-hapus" style="color:white;"> </a>
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