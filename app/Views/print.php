<?php

$imagePath = FCPATH. 'img/kop.jpeg';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: Arial, sans-serif;
            color: #232323;
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
           
            padding: 8px 20px;
            text-align: center;
           
        }
        .th1, .td1 {
            border-bottom: 1px solid #ddd;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 65%;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }
        hr{
            height: 1px;
            background-color: black;
        }
        .atas {
            margin-top: 5px;
            }
        .tgl {
            margin-left: 80%;
        }
   </style>
</head>
<body>
<img src="<?=$imagePath;?>"  alt="" style="margin-top: -5px;">


    <br><br><br><br><br><br>
    <h6 class="atas" style="display: flex; justify-content: space-between;">
    <div>
        <p>NAMA PERUSAHAAN : Pt. Inspirasi Meta Jaya</p>
        <p>ALAMAT PERUSAHAAN : JL. METASARI 170 B, SIDAKARYA</p>
        <p>NOMOR PERUSAHAAN : 0361-308-6044</p>
    </div>
    <div>
        <p class="tgl">Batam, <?php echo date("D-d-M-Y"); ?></p>
    </div>
</h6>
<table style="font-size: 10px; margin-top: -60px;">
        <thead>
            <tr style="background-color: #039dfc">
                <th scope="col" style="text-align: left; color: #03f0fc">Kode</th>
                <th scope="col" style="text-align: left; color: #03f0fc">Nama</th>
                <th scope="col" style="text-align: left; color: #03f0fc">Tanggal</th>
                <th scope="col" style="text-align: left; color: #03f0fc">Total</th>
                <th scope="col" style="text-align: left; color: #03f0fc">Cry</th>                   
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($elvan2 as $abcd) {
            ?>
            <tr>
                <td style="text-align: left;"><?= $abcd->kode ?></td>
                <td style="text-align: left;"><?= $abcd->nama ?></td>
                <td style="text-align: left;"><?= $abcd->tanggal ?></td>
                <td style="text-align: left;"><?= $abcd->total ?></td>
                <td style="text-align: left;"><?= $abcd->cry ?></td>			
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <table class="datatable" style="font-size: 10px; margin-top: -10px;">
        <thead>
            <tr style="background-color: #f2f2f2">
                <th scope="col" class="th1">No</th>
                <th scope="col" class="th1">Nama Barang</th>
                <th scope="col" class="th1">Nama Pembeli</th>
                <th scope="col" class="th1">Tanggal</th>
                <th scope="col" class="th1">Deskripsi</th>                   
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($elvan as $abcd) {
            ?>
            <tr>
                <td class="td1"><?= $no++ ?></td>
                <td class="td1"><?= $abcd->nama_barang ?></td>
                <td class="td1"><?= $abcd->nama_pembeli ?></td>
                <td class="td1"><?= $abcd->tgl ?></td>
                <td class="td1"><?= $abcd->deskripsi ?></td>			
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>