<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-md-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Ganti Password</h4>
                <?php foreach($auser as $u) : ?>
                <form method="post" action="<?= base_url('admin/ubahPassword/'.$u['id']);?>">

                <input type="hidden" class="form-control" name="id" id="id" placeholder="ID" value="<?= $u['id']; ?>">
                <input type="hidden" class="form-control" name="username" id="username" placeholder="Username" value="<?= $u['username']; ?>">

                <div class="form-group">
                    <label for="us">Username</label>
                    <input type="text" class="form-control" id="us" value="<?= $u['username']; ?>" disabled/>
                </div>

                <div class="form-group">
                    <label for="new_password">Password Baru</label>
                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Password Baru" />
                    <?= form_error('new_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?= base_url('admin/userIndex/'.$u['id']); ?>" class="btn btn-light">Batal</a>

                <?php endforeach; ?>
                
                </form>
                
            </div>
        </div>
        </div>
    </div>
    </div>
<!-- content-wrapper ends -->