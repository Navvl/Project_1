<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Perusahaan</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
		  <!-- Table with stripped rows -->
		  <table class="table datatable" style="font-size: 12px;" style="font-size: 12px;">
     <thead>
                  <tr style="font-size: 10px;">
                    <th scope="col">No</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Alamat Perusahaan</th>
                    <th scope="col">Deskripsi Perusahaan</th>
                    <th scope="col">Bidang Perusahaan</th>
                    <th scope="col">Deskripsi Lowongan</th>
                    <th scope="col">Fasilitas</th>
                    <th scope="col">Tugas</th>
                    <th scope="col">Kuota</th>
                    <th scope="col">Jenis Kelamin</th>
					<th scope="col">Status</th>
          <?php
      if (session()->get('level') == 2){
      ?>
					<th scope="col">Aksi</th> 
          <?php 
      } else {

      }
      ?>
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
            <td><?= $abcd->deskripsi_lowongan?></td>			
            <td><?= $abcd->fasilitas?></td>
            <td><?= $abcd->tugas?></td>	
            <td><?= $abcd->kuota?></td>		
            <td><?= $abcd->jk_lowongan?></td>
			<td><?= $abcd->status?></td>	
      
       <?php
      if (session()->get('level') == 2){
      ?>
			<td>
			<a href="<?= base_url('home/pilih/' .$abcd->id_lowongan) ?>">
      <button class="btn btn-info">
      <i class="now-ui-icons design-2_ruler-pencil"></i> Pilih
      </button>
				</a>
			</td>	
      <?php 
      } else {

      }
      ?>

			</tr>
			<?php } ?>
                </tbody>
     </table>
		  <!-- End Table with stripped rows -->

		</div>
	  </div>

	</div>
  </div>
</section>

</main><!-- End #main -->

