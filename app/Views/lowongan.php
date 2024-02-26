<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Lowongan</h4>
		<a href="<?=base_url('home/t_lowongan')?>">
		<button type="submit" class="btn btn-primary btn-block">Buat Lowongan <i class="now-ui-icons business_briefcase-24"></i> </button>
		</a>
	<a href=" <?= base_url('home/print/')?>">
		<button class="btn btn-dark">
			<i class="now-ui-icons files_paper"></i>
		</button>
	</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
		  <!-- Table with stripped rows -->
		  <table class="table datatable" style="font-size: 12px;">
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
					<th scope="col">Aksi</th>                         
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
            
			<td>
			<a href="<?= base_url('home/e_lowongan/' .$abcd->id_lowongan) ?>">
      <button class="btn btn-info">
      <i class="now-ui-icons design-2_ruler-pencil"></i> Edit
      </button>
					
				</a>
				<a href="<?= base_url('home/hapus_lowongan/' .$abcd->id_lowongan) ?>">
        <button class="btn btn-danger">
        <i class="now-ui-icons ui-1_simple-remove"></i> Hapus
        </button>
					
				</a>
				
			</td>		
     
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

