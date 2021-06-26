<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-md-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Ganti Password</h4>
                
                <form method="post" action="<?= base_url('profile/ubahUser/'.$user['id']);?>">

                <input type="hidden" class="form-control" name="id" id="id" placeholder="ID" value="<?= $user['id']; ?>">
                <input type="hidden" class="form-control" name="username" id="username" placeholder="Username" value="<?= $this->session->userdata('username'); ?>">

                <div class="form-group">
                    <label for="us">Username</label>
                    <input type="text" class="form-control" id="us" value="<?= $this->session->userdata('username'); ?>" disabled/>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label for="password1">Password Lama</label>
                        <input type="password" class="form-control" name="password1" id="password1" placeholder="Password Lama" />
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col">
                        <label for="password2">Konfirmasi Password Lama</label>
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Password Lama" />
                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>


                <div class="form-group">
                    <label for="new_password">Password Baru</label>
                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Password Baru" />
                    <?= form_error('new_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <button type="submit" class="btn btn-primary">Ubah</button>
                <?php if($this->session->userdata('level') === '1') :  ?>
                    <a href="<?= base_url('admin'); ?>" class="btn btn-light">Batal</a>
                <?php elseif($this->session->userdata('level') === '2') :  ?>
                    <a href="<?= base_url('humanRes'); ?>" class="btn btn-light">Batal</a>
                <?php elseif($this->session->userdata('level') === '3') :  ?>
                    <a href="<?= base_url('staff'); ?>" class="btn btn-light">Batal</a>
                <?php else : ?>
                    <a href="<?= base_url('auth'); ?>" class="btn btn-light">Batal</a>
                <?php endif; ?>
                    

                    
                </form>
                
            </div>
        </div>
        </div>
    </div>
    </div>
<!-- content-wrapper ends -->