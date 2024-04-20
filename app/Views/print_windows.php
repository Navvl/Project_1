<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p{
            font-family: 'Times New Roman', Times, serif;
            font-size: 15px;
            text-align: center;
        }
        table {
            font-family: 'Times New Roman', Times, serif;
            width: 100%;
        
        }
        table, th, td {
           
            padding: 5px 5px;
            text-align: center;
           
        }
        @media print {
            #print-button {
                display: none;
            }
        }
      
       
   </style>
   
</head>
<body>
<!-- <script type="text/javascript">
                window.print();
            </script> -->
            <button id="print-button" onclick="printPdf()">Print PDF</button>
<p>Laporan Daftar Siswa Yang Melakukan PRAKERIND</p> <br>
            <table class="table-container" style="font-size: 10px;" border="1px">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">L/P</th>
                <th scope="col">PROGRAM KEAHLIAN</th> 
                <th scope="col">Nama PT</th>
                <th scope="col">Durasi PKL</th>
                <th scope="col">Tanggal Mulai</th>
                <th scope="col">Tanggal Selesai</th>              
            </tr>
            </thead>
            <?php
            $no = 1;
            foreach($satu as $abcd){
            ?>
            <tbody>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $abcd->nis?></td>
                <td><?= $abcd->nama_siswa ?></td>
                <td><?= $abcd->jk_siswa ?></td>
                <td><?= $abcd->bidang_pkl ?></td>
                <td><?= $abcd->nama_perusahaan ?></td>		
                <td><?= $abcd->durasi_pkl ?></td>			
                <td><?= $abcd->tgl_mulai ?></td>	
                <td><?= $abcd->tgl_selesai ?></td>	
            </tr>
            </tbody>
            <?php } ?>
    </table>
    <script>
function printPdf() {
    window.print();
}
</script>
</body>
</html>