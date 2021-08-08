<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-body">

            <div class="row justify-content-end mb-3">
                <div class="col-md">
                    <h3> Manage Data Cuti </h3>
                    <!-- <a href="<?= base_url('admin/pengajuan'); ?>" class="btn btn-success btn-sm">Ajukan Cuti</a> -->                    
                </div>
               
            </div>

            <table class="table table-striped" id="table" width="100%">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Tanggal Pengajuan </th>
                    <th> Nama Pemohon </th>
                    <th> Jenis Cuti </th>
                    <th> Tanggal Pelaksanaan </th>
                    <th> Status </th>
                    <th> Action </th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach($daftar_cuti as $cuti) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <?php 
                                $dateORI = substr($cuti['tgl_pengajuan'], 0, 10);
                                $convert = strtotime($dateORI);
                                $dateNEW = date("d-m-Y", $convert);

                                echo $dateNEW;
                            ?>
                        </td>
                        <td><?= $cuti['nama']; ?></td>
                        <td><?= $cuti['jenis_cuti']; ?></td>
                        <td>
                            <?php 
                                $convertAwal = strtotime($cuti['tgl_awal']);
                                $convertAkhir = strtotime($cuti['tgl_akhir']);

                                $newAwal = date("d-m-Y", $convertAwal);
                                $newAkhir = date("d-m-Y", $convertAkhir);

                                echo $newAwal . " s/d " . $newAkhir;
                                
                            ?>
                        </td>



                        <td>
                            <?php if($cuti['status'] == "Pending")
                            {
                                echo '<i class="icon-hourglass text-primary"></i> ' . $cuti['status'];

                            } else if($cuti['status'] == "Approved")
                            {
                                echo '<i class="icon-check text-success"></i> ' . $cuti['status'];

                            } else
                            {
                                echo '<i class="bi bi-x-circle text-danger"></i> ' . $cuti['status'];

                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            if($this->session->userdata('level') === '1')
                            {
                                if($cuti['status'] == "Pending")
                                {
                                ?>
                                    <a href="<?= base_url('admin/detailCuti/'.$cuti['id']); ?>" class="badge bg-success icon-folder-alt" style="color:white;"> </a>
                                    <a href="<?= base_url('admin/ubahCuti/'.$cuti['id']); ?>" class="badge bg-primary icon-note" style="color:white;"> </a>
                                    <a href="<?= base_url('admin/hapusCuti/'.$cuti['id']); ?>" class="badge bg-danger icon-trash tombol-hapus" style="color:white;"> </a>
                                <?php
                                } else if($cuti['status'] == "Approved")
                                {
                                ?>
                                    <a href="<?= base_url('admin/detailCuti/'.$cuti['id']); ?>" class="badge bg-success icon-folder-alt" style="color:white;"> </a>
                                    <a href="<?= base_url('admin/hapusCuti/'.$cuti['id']); ?>" class="badge bg-danger icon-trash tombol-hapus" style="color:white;"> </a>
                                <?php
                                } else
                                {
                                ?>
                                    <a href="<?= base_url('admin/detailCuti/'.$cuti['id']); ?>" class="badge bg-success icon-folder-alt" style="color:white;"> </a>
                                <?php
                                }
                            } else if($this->session->userdata('level') === '2')
                            {
                                // var_dump($cuti['urutan']);
                                if($cuti['status'] == "Pending")
                                {
                                ?>
                                    <?php if($cuti['urutan'] === '1') : ?>
                                        <a href="<?= base_url('manager/detailCuti/'.$cuti['id']); ?>" class="badge bg-success icon-folder-alt" style="color:white;"> </a>
                                        <a href="<?= base_url('manager/ubahCuti/'.$cuti['id']); ?>" class="badge bg-primary icon-note" style="color:white;"> </a>
                                        <a href="<?= base_url('manager/hapusCuti/'.$cuti['id']); ?>" class="badge bg-danger icon-trash tombol-hapus" style="color:white;"> </a>
                                    <?php else : ?>
                                        <a href="<?= base_url('manager/detailCuti/'.$cuti['id']); ?>" class="badge bg-success icon-folder-alt" style="color:white;"> </a>
                                        <a href="<?= base_url('manager/hapusCuti/'.$cuti['id']); ?>" class="badge bg-danger icon-trash tombol-hapus" style="color:white;"> </a>
                                    <?php endif; ?>

                                <?php
                                } else if($cuti['status'] == "Approved")
                                {
                                ?>
                                    <a href="<?= base_url('manager/detailCuti/'.$cuti['id']); ?>" class="badge bg-success icon-folder-alt" style="color:white;"> </a>
                                <?php
                                } else
                                {
                                ?>
                                    <a href="<?= base_url('manager/detailCuti/'.$cuti['id']); ?>" class="badge bg-success icon-folder-alt" style="color:white;"> </a>
                                <?php
                                }
                            }
                            ?>
                        </td>                        
                    </tr>
                <?php endforeach; ?>

            </tbody>
            </table>
 
            <!-- MODAL -->
            
            <!-- END MODAL -->
                
            </div>
        </div>
        </div>
    </div>
    </div>
    
<!-- content-wrapper ends -->