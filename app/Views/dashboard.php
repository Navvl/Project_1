
<main id="main" class="main">
  <div class="row">
    <div class="col-lg-12">
        <div class="card-body">
          <h5 class="card-title">Selamat Datang <?=session()->get('nama')?> Kami senang Anda bergabung. Temukan kesempatan yang menarik bersama kami!</h5>
      </div>
    </div>
  </div>
</main><!-- End #main -->

<br>

<div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Daftar Perusahaan</h5>
                <h4 class="card-title">List PT</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table datatable">
     <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Perusahaan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Bidang</th>                   
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
			<td><?= $abcd->nama_perusahaan?></td>
            <td><?= $abcd->alamat_perusahaan?></td>
			<td><?= $abcd->deskripsi_perusahaan?></td>
            <td><?= $abcd->bidang_perusahaan?></td>
			</td>
     
			</tr>
			<?php } ?>
                </tbody>
     </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Daftar Siswa</h5>
                <h4 class="card-title">Status Siswa</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table datatable">
     <thead>
                  <tr>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama Murid</th>
                    <th scope="col">Sekolah</th> 
                    <th scope="col">Perusahaan</th> 
                    <th scope="col">Status</th>                       
                  </tr>
                </thead>
                <tbody>
				<?php
			
			$no=1;
			foreach($elvan2 as $abcd){
			?>

			<tr>
      <tr valign="middle">
			<td><?= $abcd->nis?></td>
            <td><?= $abcd->nama_siswa?></td>
            <td><?= $abcd->nama_sekolah?></td>	
            <td><?= $abcd->nama_perusahaan?></td>		
            <td><?= $abcd->status?></td>
			</td>
     
			</tr>
			<?php } ?>
                </tbody>
     </table>
                </div>
              </div>
            </div>
          </div>
        </div>

