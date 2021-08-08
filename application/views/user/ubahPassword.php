<?php foreach($auser as $u) : ?>
    <form method="post" action="<?= base_url('admin/ubahUser/'.$u['id']);?>">

        <input type="hidden" class="form-control" name="id" id="id" placeholder="ID" value="<?= $u['id']; ?>">

        <div class="form-group">
            <label for="us">Username</label>
            <input type="text" class="form-control" id="us" value="<?= $u['username']; ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="new_password">Password Baru</label>
            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Password"/>
            <?= form_error('new_password', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        
        <div class="form-group">
            <label for="re_password">Ulangi Password Baru</label>
            <input type="password" class="form-control" name="re_password" id="re_password" placeholder="Ulangi Password Baru"/>
            <?= form_error('re_password', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <button type="submit" class="btn btn-primary" name="password_btn">Ubah</button>
        <a href="<?= base_url('admin/manageUser'); ?>" class="btn btn-light">Batal</a>

    <?php endforeach; ?>
        
    </form>