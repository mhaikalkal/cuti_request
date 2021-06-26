<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-md-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"><?= $profile['username']; ?>'s Data</h4>
                
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td><b>Username</b></td>
                            <td><?= $profile['username']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Password</b></td>
                            <td><?= $profile['password']; ?></td>
                        </tr>
                        <tr>
                            <td><b>level</b></td>
                            <td><?= $profile['level']; ?></td>
                        </tr>
                    
                    </tbody>

                </table>
                <br>
                
                <a href="<?= base_url('admin/ubahPassword/'.$profile['id']); ?>" class="btn btn-primary">Ubah Password</a>
                <a href="<?= base_url('admin/ubahLevel/'.$profile['id']); ?>" class="btn btn-info">Ubah Level</a>
                <a href="<?= base_url('admin/manageUser'); ?>" class="btn btn-light">Kembali</a>
                
            </div>
        </div>
        </div>
    </div>
    </div>
<!-- content-wrapper ends -->