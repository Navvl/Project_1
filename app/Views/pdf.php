<?php


require_once  FCPATH. 'tcpdf/tcpdf.php';

ob_start();
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);;
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Surat PKL');
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(true, 10);
$pdf->AddPage();
$pdf->SetFont('times', '', 12); 
$imagePath = 'https://i.postimg.cc/bYTDFsYg/kop.jpg';

// Set the image dimensions
$imageWidth = 50;
$imageHeight = 50;

$model = new \App\Models\M_PKL();

$html = <<<HTML
<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Surat PKL</title>
</head>
<body>
<img src="$imagePath" alt="Image Description" width="500" height="150">

    <p style="text-align: center; ">
    Komp. Batu Batam Mas Blok D & E No. 1,2,3 Batam 29442<br>Telp: (0778) 431318 Fax: (0778) 431290</p>

    <hr style="margin-bottom: 1px;">
<hr style="margin-top: 2px;">


        <p style="text-align: right;"></p>
  
    <div>
        Nomor : <br>
        Perihal : Permohonan PRAKERIND
    </div>

    <div class='kepada'>
        Kepada Yth,<br>
        <br>
        <br>
        Di Tempat
    </div>

    <div>
        Dengan Hormat,
       
        
          
          <p style="text-align: justify; margin-bottom: 0px;">
  Dalam rangka pelaksanaan program akademik SMK Permata Harapan tahun ajaran 2023/2024 dimana kami mewajibkan kepada setiap siswa/siswi untuk melaksanakan kegiatan praktek kerja industri (PRAKERIND) sebagai salah satu syarat untuk menempuh ujian akhir di kelas XII. Kami bermaksud menyampaikan permohonan serta kesediaan Instansi/Perusahaan yang Bapak/Ibu pimpin untuk dapat menerima siswa/siswi kami dalam pelaksanaan kegiatan PRAKERIND tersebut di atas.
  <br>
  Adapun jadwal program tersebut akan berlangsung selama 4 (Empat) bulan, dimulai dari tanggal  . Siswa/siswi kami yang akan melaksanakan PRAKERIND adalah sebagai berikut:
</p>

        <table style="">
  <thead>
    <tr style="text-align:center; border-collapse: collapse; width: 100%; margin-bottom: 20px;">
      <th style="border: 1px solid black; padding: 2px; width: 40px; text-align:center;">NO</th>
      <th style="border: 1px solid black; padding: 2px; width: 100px; text-align:center;">NIS</th>
      <th style="border: 1px solid black; padding: 2px; text-align:center;">NAMA</th>
      <th style="border: 1px solid black; padding: 2px; width: 40px; text-align:center;">L/P</th>
      <th style="border: 1px solid black; padding: 2px; width: 180px; text-align:center;">PROGRAM KEAHLIAN</th>
    </tr>
  </thead>
  <tbody>
HTML;

foreach ($elvan2 as $abcd) {
    $html .= <<<HTML
              <tr>
                <td style="text-align: left;"><?= $abcd->kode?></td>
                <td style="text-align: left;"><?= $abcd->nama?></td>
                <td style="text-align: left;"><?= $abcd->tanggal ></td>
                <td style="text-align: left;"><?= $abcd->total?></td>
                <td style="text-align: left;"><?= $abcd->cry?></td>			
            </tr>
HTML;
}

$html .= <<<HTML
        </table>

<div style='margin-top: 10px; margin-bottom: 10px; text-align: justify;'>
  Demikian permohonan ini kami sampaikan dengan harapan bapak/ibu dapat mengabulkanya. Atas perhatian dan kerjasamanya, kami ucapkan terimakasih.
</div>
     <table style="width: 100%; margin-top:30;">
  <tr>
    <td style="text-align: left;">
      <p>Kepala Sekolah</p>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
      <p>Srima Deliana Damanik, S.Pd.</p>
    </td>
    
    <td style="text-align: right;">
      <p style="margin-bottom: 10px;">Kepala Program Studi</p>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
      <p style="height: 20px;">Miftahul Ilmi, S.Pd, M.Pd.T.</p>
    </td>
  </tr>
</table>
    </body>
  </html>
HTML;

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Contoh Print.pdf', 'I');

exit;
?>