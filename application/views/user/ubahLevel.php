<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-md-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Ubah Level</h4>
                <?php foreach($auser as $u) : ?>
                <form method="post" action="<?= base_url('admin/ubahLevel/'.$u['id']);?>">

                <input type="hidden" class="form-control" name="id" placeholder="ID" value="<?= $u['id']; ?>">
                <input type="hidden" class="form-control" name="username" id="username" placeholder="Username" value="<?= $u['username']; ?>">

                <div class="form-group">
                    <label for="us">Username</label>
                    <input type="text" class="form-control" name="us" value="<?= $u['username']; ?>" disabled/>
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