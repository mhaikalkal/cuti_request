<?php foreach($auser as $u) : ?>
            <form method="post" action="<?= base_url('admin/ubahUser/'.$u['id']);?>">

            <input type="hidden" class="form-control" name="id" id="id" placeholder="ID" value="<?= $u['id']; ?>">

            <div class="form-group">
                <label for="us">Username</label>
                <input type="text" class="form-control" id="us" value="<?= $u['username']; ?>" readonly/>
            </div>

            <div class="form-group">
            <label>Level</label>
            <select class="form-control" style="width:100%" name="level" id="level">                
                <?php foreach($level as $l) : ?>
                <option value="<?= $l['id'] ?>"><?= $l['level'];?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            
            <button type="submit" class="btn btn-primary" name="level_btn">Ubah</button>
            <a href="<?= base_url('admin/manageUser'); ?>" class="btn btn-light">Batal</a>

        <?php endforeach; ?>
            
            </form>