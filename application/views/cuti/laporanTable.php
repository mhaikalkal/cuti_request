<table class="table table-striped" id="table" width="100%">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> NIP </th>
                    <th> Nama Pemohon </th>
                    <th> Jenis Cuti </th>
                    <!-- <th> Jabatan </th> -->
                    <th> Awal Cuti </th>
                    <th> Akhir Cuti </th>
                    <th> Status </th>
                </tr>
            </thead>

            <tbody>
            <?php if(!empty($cuti)) : ?>
            <?php $no = 1; ?>
            <?php foreach($cuti as $cuti) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $cuti['id_nip']; ?></td>
                    <td><?= $cuti['nama']; ?></td>
                    <td><?= $cuti['jenis_cuti']; ?></td>
                    <!-- <td><?= $cuti['jabatan']; ?></td> -->
                    <td>
                        <?php 
                            $convertAwal = strtotime($cuti['tgl_awal']);
                            $newAwal = date("d-m-Y", $convertAwal);
                            echo $newAwal;
                        ?>
                    </td>
                    <td>
                        <?php 
                            $convertAkhir = strtotime($cuti['tgl_akhir']);
                            $newAkhir = date("d-m-Y", $convertAkhir);
                            echo $newAkhir;
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
                </tr>
            <?php endforeach; ?>
            <?php else : ?>
                <td class="alert alert-danger" role="alert" colspan="7">
                    Data tidak Ditemukan.
                </td>
            <?php endif; ?>
            
            </tbody>
        </table>