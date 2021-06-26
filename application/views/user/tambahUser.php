<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Tambah User</h4>
                <form method="post" action="<?= base_url('admin/tambahUser');?>">

                <input type="hidden" class="form-control" name="id" id="id" placeholder="ID" value="<?= set_value('id'); ?>">

                <div class="form-group">
                    <label for="us">Username</label>
                    <input type="text" class="form-control" name="username" id="us" value="<?= set_value('username'); ?>" />
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                <label>Level</label>
                <select class="form-control" style="width:100%" name="level">                
                    <?php foreach($level as $l) : ?>
                    <option value="<?= $l['id'] ?>"><?= $l['level'];?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url('admin/manageUser'); ?>" class="btn btn-light">Batal</a>
                
                </form>
                
            </div>
        </div>
        </div>
    </div>
    </div>
<!-- content-wrapper ends -->