<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('img/apple-icon.png')?>">
  <link rel="icon" type="image/png" href="<?=base_url('img/jepang.png')?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    PKL FINDER
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="<?=base_url('css/bootstrap.min.css')?>" rel="stylesheet" />
  <link href="<?=base_url('css/now-ui-dashboard.css?v=1.5.0')?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?=base_url('demo/demo.css')?>" rel="stylesheet" />

  <style>
    .kata-atas {
      margin-left: 30px;
    }
    .table td,
    .table th {
        padding: 5px; /* Mengatur padding */
        height: 30px; /* Mengatur tinggi kolom */
    }
  </style>
<!-- Untuk t_lowongan -->
  <script>
    // Mendengarkan perubahan pada elemen select
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('id_perusahaan').addEventListener('change', function() {
        var selectedOption = this.value; // Mendapatkan nilai yang dipilih dari select

        // Mengambil teks dari opsi yang dipilih
        var selectedText = this.options[this.selectedIndex].text;

        // Memuat data yang sesuai ke dalam input
        document.getElementById('nama_perusahaan').value = this.options[this.selectedIndex].getAttribute('data-nama'); // Mengambil data nama dari atribut data-nama;
        document.getElementById('bidang_perusahaan').value = this.options[this.selectedIndex].getAttribute('data-bidang'); // Mengambil data bidang dari atribut data-bidang
        document.getElementById('deskripsi_perusahaan').value = this.options[this.selectedIndex].getAttribute('data-deskripsi'); // Mengambil data deskripsi dari atribut data-deskripsi
        document.getElementById('alamat_perusahaan').value = this.options[this.selectedIndex].getAttribute('data-alamat'); // Mengambil data alamat dari atribut data-alamat
    });
  });
</script>

<!-- Untuk melamar siswa -->
<script>
   // Mendengarkan perubahan pada elemen select nis
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById('nis').addEventListener('change', function() {
    var selectedOption = this.value; // Mendapatkan nilai yang dipilih dari select

    // Mengambil teks dari opsi yang dipilih
    var selectedText = this.options[this.selectedIndex].text;

    // Memuat data yang sesuai ke dalam input
    document.getElementById('nama_siswa').value = this.options[this.selectedIndex].getAttribute('data-nama'); // Mengambil data nama dari atribut data-nama;
    document.getElementById('alamat_siswa').value = this.options[this.selectedIndex].getAttribute('data-alamat'); // Mengambil data alamat dari atribut data-alamat
    document.getElementById('nohp_siswa').value = this.options[this.selectedIndex].getAttribute('data-no'); // Mengambil data no dari atribut data-no
  });
});


  
</script>

<!-- Untuk Melamar Sekolah -->
<script>
    // Mendengarkan perubahan pada elemen select
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('id_sekolah').addEventListener('change', function() {
        var selectedOption = this.value; // Mendapatkan nilai yang dipilih dari select

        // Mengambil teks dari opsi yang dipilih
        var selectedText = this.options[this.selectedIndex].text;

        // Memuat data yang sesuai ke dalam input
        document.getElementById('nama_sekolah').value = this.options[this.selectedIndex].getAttribute('data-nama_sekolah'); // Mengambil data nama dari atribut data-nama;
        document.getElementById('alamat_sekolah').value = this.options[this.selectedIndex].getAttribute('data-alamat_sekolahj'); // Mengambil data alamat dari atribut data-bidang
    });
  });
</script>


</head>