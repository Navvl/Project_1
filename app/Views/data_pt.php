<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Data PT</h4>
				<a href="<?= base_url ('home/t_datapt')?> ">
		<button class="btn btn-success"><i class="now-ui-icons ui-1_simple-add"></i></button>
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
					<th scope="col">Id Perusahaan</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Alamat Perusahaan</th>
                    <th scope="col">Deskripsi Perusahaan</th>
                    <th scope="col">Bidang Perusahaan</th>
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
			<td><?= $abcd->id_perusahaan?></td>
			<td><?= $abcd->nama_perusahaan?></td>
            <td><?= $abcd->alamat_perusahaan?></td>
			<td><?= $abcd->deskripsi_perusahaan?></td>
            <td><?= $abcd->bidang_perusahaan?></td>
			<td>
			<a href="<?= base_url('home/e_datapt/' .$abcd->id_perusahaan) ?>">
      <button class="btn btn-info">
      <i class="now-ui-icons design-2_ruler-pencil"></i> Edit
      </button>
					
				</a>
				<a href="<?= base_url('home/hapus_datapt/' .$abcd->id_perusahaan) ?>">
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

