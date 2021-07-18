<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Cuti</title>

    <style>
        *{
            padding: 0px;
            margin: 0px;
        }

        body
        {
            font-family: sans-serif;
        }
        
        .header{
            text-align: center;
            margin-bottom:0px;
            padding-bottom: 0px;
        }

        .periode{
            text-align: center;
            margin-top:0px;
            padding-top: 0px;
        }

        .line{
            border-top: 2px solid #8c8b8b;
            margin-top:0px;
            padding-top: 0px;
            margin-bottom:0px;
            padding-bottom: 0px;
        }

        table{
            width: 100%;
            text-align: center;
        }

        tr th 
        {
            background-color: #04AA6D;
            color: #fff;
        }

        tr:nth-child(odd)
        {
            background-color: #f2f2f2;
        }



    </style>

</head>

<body>
    <h1 class="header">LAPORAN CUTI</h1>

    <?php
        $convA = strtotime($awal);
        $na = date("d F Y", $convA);

        $convZ = strtotime($akhir);
        $nz = date("d F Y", $convZ);
    ?>
    <p class="periode"> <b>Periode : </b><?= $na . " s/d " . $nz; ?></p>

    <hr class="line">

    <p style="text-align: right;">Dicetak Pada, <?= date('d F Y'); ?></p>
    <p> Total Cuti : <?= $total; ?></p>

    <table>
        <thead>
            <tr>
                <th> No. </th>
                <th> NIP </th>
                <th> Nama Pemohon </th>
                <th> Jenis Cuti </th>
                <!-- <th> Jabatan </th> -->
                <th> Awal Cuti </th>
                <th> Akhir Cuti </th>
            </tr>
        </thead>

        <tbody>
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
                </tr>
            <?php endforeach; ?>
            
            </tbody>
    </table>

    <br>
    


</body>

</html>