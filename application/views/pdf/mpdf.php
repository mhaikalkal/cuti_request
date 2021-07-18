<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bukti Permohonan Cuti</title>
</head>

<body>
    <h2 style="text-align: center;">SURAT PERMOHONAN CUTI</h2>
    <p style="text-align: right;">Sukabumi, <?= date('d F Y'); ?></p>

    <br><br>
    <p>Berikut Data Staff yang telah mengajukan cuti :  </p>
    <br>
    <table>
        <tbody>
            <tr>
                <td style="width: 190px;">NIP</td>
                <td> : </td>
                <td><?= $cuti['id_nip']; ?></>
            </tr>
            <tr>
                <td style="width: 190px;">Nama Lengkap</td>
                <td> : </td>
                <td><?= $cuti['nama']; ?></>
            </tr>
            <tr>
                <td style="width: 190px;">Divisi</td>
                <td> : </td>
                <td><?= $cuti['divisi']; ?></>
            </tr>
            <tr>
                <td style="width: 190px;">Jabatan</td>
                <td> : </td>
                <td><?= $cuti['jabatan']; ?></>
            </tr>
            <tr>
                <td style="width: 190px;">Jenis Cuti</td>
                <td> : </td>
                <td><?= $cuti['jenis_cuti']; ?></>
            </tr>
            <tr>
                <td style="width: 190px;">Tanggal Pengajuan</td>
                <td> : </td>
                <td>
                    <?php 
                        $dateORI = substr($cuti['tgl_pengajuan'], 0, 10);
                        $convert = strtotime($dateORI);
                        $dateNEW = date("d F Y", $convert);

                        echo $dateNEW;
                    ?>
                </td>
            </tr>
            <tr>
                <td style="width: 190px;">Keterangan</td>
                <td> : </td>
                <td><?= $cuti['keterangan']; ?></td>
            </tr>
            <tr>
                <td style="width: 190px;">Tanggal Cuti</td>
                <td> : </td>
                <td>
                    <?php 
                        $convertAwal = strtotime($cuti['tgl_awal']);
                        $convertAkhir = strtotime($cuti['tgl_akhir']);

                        $newAwal = date("d F Y", $convertAwal);
                        $newAkhir = date("d F Y", $convertAkhir);

                        echo $newAwal . " s/d " . $newAkhir;       
                    ?>
                </td>
            </tr>

        </tbody>
    </table>

    <br>

    <p>Surat ini merupakan bukti bahwa permohonan cuti oleh saudara/i <?= $cuti['nama']; ?> telah di-<?=$cuti['status']; ?>.</p>
    <br>
    
    <p style="text-align: right;">Tertanda, 
    <br><br><br><br><br><br>
    <u><?= $petugas['nama']; ?></u>
    </p>

</body>

</html>