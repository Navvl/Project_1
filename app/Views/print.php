<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            .table{
                font-family: arial;
                color: #232323;
                border-collapse: collapse;
                width: 100%;
            }
            .table, th, td{
                border: 1px solid #999;
                padding: 8px 20 px;
            }
            .center {
                 display: block;
                 margin-left: auto;
                margin-right: auto;
                width: 65%;
            }
        </style>
</head>
<body>
<script type="text/javascript">
                window.print();
            </script>
        <h1 align="center">Contoh Laporan</h1>
     <table class="table datatable">
     <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Deskripsi</th>                   
                  </tr>
                </thead>
                <tbody>
				<?php
			
			$no=1;
			foreach($elvan as $abcd){
			?>

			<tr>
      <tr valign="middle">
			<td><?= $no++ ?></td>
			<td><?= $abcd->nama_barang?></td>
            <td><?= $abcd->nama_pembeli?></td>
			<td><?= $abcd->tgl?></td>
			<td><?= $abcd->deskripsi?></td>			
			</td>
     
			</tr>
			<?php } ?>
                </tbody>
     </table>
</body>
</html>