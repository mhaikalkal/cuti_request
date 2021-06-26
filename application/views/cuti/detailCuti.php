<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-md-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title mb-4">Pengajuan Cuti</h4>

                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td><b>NIP</b></td>
                        <td><?= $detail['nip']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama Lengkap</b></td>
                        <td><?= $detail['nama']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Divisi</b></td>
                        <td><?= $detail['divisi']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jabatan</b></td>
                        <td><?= $detail['jabatan']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jenis Cuti</b></td>
                        <td><?= $detail['jenis_cuti']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Pengajuan</b></td>
                        <td>
                            <?php 
                                $dateORI = substr($detail['tgl_pengajuan'], 0, 10);
                                $convert = strtotime($dateORI);
                                $dateNEW = date("d-m-Y", $convert);

                                echo $dateNEW;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Keterangan</b></td>
                        <td><?= $detail['keterangan']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Cuti</b></td>
                        <td>
                            <?php 
                                $convertAwal = strtotime($detail['tgl_awal']);
                                $convertAkhir = strtotime($detail['tgl_akhir']);

                                $newAwal = date("d-m-Y", $convertAwal);
                                $newAkhir = date("d-m-Y", $convertAkhir);

                                echo $newAwal . " s/d " . $newAkhir;
                                    
                            ?>

                        </td>
                    </tr>
                    <tr>
                        <td><b>Status</b></td>
                        <td>
                        <?php if($detail['status'] == "Menunggu Approval")
                            {
                                echo '<i class="icon-hourglass text-primary"></i> ' . $detail['status'];

                            } else if($detail['status'] == "Approved")
                            {
                                echo '<i class="icon-check text-success fs-3"></i> ' . $detail['status'];

                            } else
                            {
                                echo '<i class="bi bi-x-circle text-danger fs-3"></i> ' . $detail['status'];

                            }
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Diproses Oleh</b></td>
                        <td><?= $detail['edited_by']; ?></td>
                    </tr>

                    <?php 
                    if($detail['status'] == "Menunggu Approval")
                    { 
                    ?>
                    <tr>
                        <td colspan="2">    
                            <a href="<?= base_url('cuti/ubahCuti/'.$detail['id']); ?>" class="btn btn-primary mr-2">Ubah</a>
                            <a href="<?= base_url('cuti/index'); ?>" class="btn btn-light mr-2">Kembali</a>
                        </td>
                    </tr>
                    <?php
                    } else if($detail['status'] == "Approved"){ ?>
                    <tr>
                        <td colspan="2">
                            <a href="<?= base_url('export/mpdf/'.$detail['id']); ?>" class="btn btn-danger mr-2">Export PDF</a>
                            <a href="<?= base_url('cuti/index'); ?>" class="btn btn-light mr-2">Kembali</a>
                        </td>
                    </tr>
                    <?php
                    } else { ?>
                    <tr>
                        <td colspan="2">
                            <a href="<?= base_url('cuti/index'); ?>" class="btn btn-light mr-2">Kembali</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                
            </div>
        </div>
        </div>
    </div>
    </div>
<!-- content-wrapper ends -->