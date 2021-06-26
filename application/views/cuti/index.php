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
                    <h3> Pengajuan Cuti </h3>
                    <a href="<?= base_url('cuti/pengajuan'); ?>" class="btn btn-success btn-sm">Ajukan Cuti</a>
                </div>
               
            </div>

            <table class="table table-striped" id="table" width="100%">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Jenis Cuti </th>
                    <th> Keterangan </th>
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
                        <td><?= $cuti['jenis_cuti']; ?></td>
                        <td><?= $cuti['keterangan']; ?></td>
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
                            <?php if($cuti['status'] == "Menunggu Approval")
                            {
                                echo '<i class="icon-hourglass text-primary"></i> ' . $cuti['status'];

                            } else if($cuti['status'] == "Approved")
                            {
                                echo '<i class="icon-check text-success fs-3"></i> ' . $cuti['status'];

                            } else
                            {
                                echo '<i class="bi bi-x-circle text-danger fs-3"></i> ' . $cuti['status'];

                            }
                            ?>
                        </td>
                        <td>
                            <?php if($cuti['status'] == "Menunggu Approval")
                            {
                            ?>
                                <a href="<?= base_url('cuti/detailCuti/'.$cuti['id']); ?>" class="badge bg-success icon-folder-alt" style="color:white;"> </a>
                                <a href="<?= base_url('cuti/ubahCuti/'.$cuti['id']); ?>" class="badge bg-primary icon-note" style="color:white;"> </a>
                                <a href="<?= base_url('cuti/hapusCuti/'.$cuti['id']); ?>" class="badge bg-danger icon-trash tombol-hapus" style="color:white;"> </a>
                            <?php
                            } else if($cuti['status'] == "Approved")
                            {
                            ?>
                                <a href="<?= base_url('export/mpdf/'.$cuti['id']); ?>" class="badge bg-dark icon-printer" style="color:white;"> </a>
                                <a href="<?= base_url('cuti/detailCuti/'.$cuti['id']); ?>" class="badge bg-success icon-folder-alt" style="color:white;"> </a>
                            <?php
                            } else
                            {
                            ?>
                                <a href="<?= base_url('cuti/detailCuti/'.$cuti['id']); ?>" class="badge bg-success icon-folder-alt" style="color:white;"> </a>
                            <?php
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