 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="home/index" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="">
    <span class="d-none d-lg-block">Pencari PKL</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->
    
<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
<img src="img/profile-image.img" alt="Profile" class="rounded-circle">
<span class="d-none d-md-block dropdown-toggle ps-2">HALO</span>
</a><!-- End Profile Iamge Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
<li class="dropdown-header">
<span>Web Designer</span>
</li>
<li>
<hr class="dropdown-divider">
</li>

<li>
<a class="dropdown-item d-flex align-items-center" href="profile">
  <i class="bi bi-person"></i>
  <span>My Profile</span>
     </a>
</li>
<li>
<hr class="dropdown-divider">
</li>

<li>
<a class="dropdown-item d-flex align-items-center" href="<?=base_url('home/logout')?>">
  <i class="bi bi-box-arrow-right"></i>
  <span>Sign Out</span>
</a>
</li>

</ul><!-- End Profile Dropdown Items -->
</li><!-- End Profile Nav -->

</ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?=base_url('home/dashboard')?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <?php
      if (session()->get('level') == 3){
      ?>

  <li class="nav-item">
    <a class="nav-link collapsed"  href="<?=base_url('home/data_pt')?>">
      <i class="bi bi-journal-text"></i><span>Data PT</span>
    </a>
   
  </li><!-- End Components Nav -->

  <?php 
      } else {

      }
      ?>

  <li class="nav-item">
    <a class="nav-link collapsed"  href="<?=base_url('home/sekolah')?>">
      <i class="bi bi-journal-text"></i><span>Sekolah</span>
    </a>
   
  </li><!-- End Components Nav -->



  <li class="nav-item">
    <a class="nav-link collapsed"  href="<?=base_url('home/lowongan')?>">
      <i class="bi bi-journal-text"></i><span>Lowongan</span>
    </a>
   
  </li><!-- End Components Nav -->

  <?php
      if (session()->get('level') == 2 || session()->get('level') == 3){
      ?>

  <li class="nav-item">
    <a class="nav-link collapsed"  href="<?=base_url('home/perusahaan')?>">
      <i class="bi bi-journal-text"></i><span>Perusahaan</span>
    </a>

  </li><!-- End Components Nav -->

  <?php 
      } else {

      }
      ?>

<?php
      if (session()->get('level') == 2){
      ?>

  <li class="nav-item">
    <a class="nav-link collapsed"  href="<?=base_url('home/pelamar')?>">
      <i class="bi bi-journal-text"></i><span>Pelamar</span>
    </a>
   
  </li><!-- End Components Nav -->

  <?php 
      } else {

      }
      ?>

<?php
      if (session()->get('level') == 3){
      ?>

  <li class="nav-item">
    <a class="nav-link collapsed"  href="<?=base_url('home/penerimaan')?>">
      <i class="bi bi-journal-text"></i><span>Penerimaan</span>
    </a>
   
  </li><!-- End Components Nav -->

  
  <?php 
      } else {

      }
      ?>

<?php
      if (session()->get('level') == 1 || session()->get('level') == 2){
      ?>

  <li class="nav-item">
    <a class="nav-link collapsed"  href="<?=base_url('home/kajur')?>">
      <i class="bi bi-journal-text"></i><span>Kajur</span>
    </a>
   
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed"  href="<?=base_url('home/siswa')?>">
      <i class="bi bi-journal-text"></i><span>Siswa</span>
    </a>
   
  </li><!-- End Components Nav -->

  <?php 
      } else {

      }
      ?>

  <li class="nav-item">
    <a class="nav-link collapsed"  href="'home/profile'">
      <i class="bx bx-meh"></i><span>Profile</span>
    </a>
   
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
      
      <i class="bi bi-layout-text-window-reverse"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="'home/b_msk'">
          <i class="bi bi-circle"></i><span>Barang Masuk</span>
        </a>
      </li>
      <li>
        <a href="charts-apexcharts.html">
          <i class="bi bi-circle"></i><span>Barang Keluar</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Charts Nav -->
  

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
      <i class="bx bxs-user"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="'home/karyawan'">
          <i class="bi bi-circle"></i><span>Karyawan</span>
        </a>
      </li>
      <li>
        <a href="icons-bootstrap.html">
          <i class="bi bi-circle"></i><span>Data</span>
        </a>
      </li>
      <li>
        <a href="'home/reset'">
          <i class="bi bi-circle"></i><span>Reset Password</span>
        </a>
      </li>
    </ul>
  </li><!-- End Icons Nav -->
 
</aside><!-- End Sidebar-->