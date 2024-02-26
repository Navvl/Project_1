
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          PKL |
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Finder
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="<?=base_url('home/dashboard')?>">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <?php
      if (session()->get('level') == 3){
      ?>

          <li>
            <a href="<?=base_url('home/data_pt')?>">
              <i class="now-ui-icons education_atom"></i>
              <p>Data PT</p>
            </a>
          </li>

          <?php 
      } else {

      }
      ?>

          <li>
            <a href="<?=base_url('home/sekolah')?>">
              <i class="now-ui-icons location_map-big"></i>
              <p>Daftar Sekolah</p>
            </a>
          </li>

          <?php
      if (session()->get('level') == 2){
      ?>

          <li>
            <a href="<?=base_url('home/sekolah_kajur')?>">
              <i class="now-ui-icons location_map-big"></i>
              <p>Sekolah</p>
            </a>
          </li>

          <?php 
      } else {

      }
      ?>

          <?php
      if (session()->get('level') == 1 || session()->get('level') == 2){
      ?>

          <li>
            <a href="<?=base_url('home/lowongan_murid')?>">
              <i class="now-ui-icons ui-1_zoom-bold"></i>
              <p>Lowongan</p>
            </a>
          </li>

          <?php 
      } else {

      }
      ?>

          <?php
      if (session()->get('level') == 3){
      ?>

          <li>
            <a href="<?=base_url('home/lowongan')?>">
              <i class="now-ui-icons ui-1_zoom-bold"></i>
              <p>Lowongan</p>
            </a>
          </li>

          <?php 
      } else {

      }
      ?>

          <?php
      if (session()->get('level') == 2 || session()->get('level') == 3){
      ?>

          <li>
            <a href="<?=base_url('home/perusahaan')?>">
              <i class="now-ui-icons business_bank"></i>
              <p>Perusahaan</p>
            </a>
          </li>

          <?php 
      } else {

      }
      ?>

<?php
      if (session()->get('level') == 2){
      ?>

          <li>
            <a href="<?=base_url('home/pelamar')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Pelamar</p>
            </a>
          </li>

          <?php 
      } else {

      }
      ?>
<?php
      if (session()->get('level') == 1){
      ?>

          <li>
            <a href="<?=base_url('home/penerimaan_murid')?>">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Penerimaan</p>
            </a>
          </li>

          <?php 
      } else {

      }
      ?>
<?php
      if (session()->get('level') == 3){
      ?>

          <li>
            <a href="<?=base_url('home/penerimaan')?>">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Penerimaan</p>
            </a>
          </li>

          <?php 
      } else {

      }
      ?>

<?php
      if (session()->get('level') == 1 || session()->get('level') == 2){
      ?>

          <li>
            <a href="<?=base_url('home/kajur')?>">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Kajur</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('home/siswa')?>">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Siswa</p>
            </a>
          </li>

          <?php 
      } else {

      }
      ?>

          <li class="active  active-pro " class="active-pro">
            <a href="<?=base_url('home/logout')?>">
              <i class="now-ui-icons business_badge"></i>
              <p>LOG OUT</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <table style="margin-top: 15px; margin-left: 80px">
              <tr>
                <td><p>Cari Tempat PKL Impian Anda Hanya di PKL FINDER</p></td>
              </tr>
              <tr>
              <td><p>"Teman Pencarimu Untuk Pengalaman Magang Tak Terlupakan"</p></td>
              </tr>
            </table>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
            <?php
      if (session()->get('level') == 1){
      ?>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('home/profile_siswa')?>">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
              <?php 
      } else {

      }
      ?>
       <?php
      if (session()->get('level') == 2){
      ?>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('home/profile_kajur')?>">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
              <?php 
      } else {

      }
      ?>
       <?php
      if (session()->get('level') == 3){
      ?>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('home/profile_admin')?>">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
              <?php 
      } else {

      }
      ?>
      
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
      
