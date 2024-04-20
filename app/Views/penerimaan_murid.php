<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Pelamar</h4>
	<a href=" <?= base_url('home/laporan/')?>">
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
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama Murid</th>
                    <th scope="col">Nama Sekolah</th>
                    <th scope="col">Alamat Sekolah</th>
                    <th scope="col">Bidang PKL</th>
                    <th scope="col">Status</th> 
                    <th scope="col">Nama Perusahaan</th> 
                    <th scope="col">Alamat Perusahaan</th>                       
                    <th scope="col">Deskripsi Perusahaan</th> 
                    <th scope="col">Tanggal Mulai</th> 
                    <th scope="col">Tanggal Selesai</th>  
              
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
			<td><?= $abcd->nis?></td>
            <td><?= $abcd->nama_siswa?></td>
            <td><?= $abcd->nama_sekolah?></td>			
            <td><?= $abcd->alamat_sekolah?></td>
            <td><?= $abcd->bidang_pkl?></td>		
            <td><?= $abcd->status?></td>
            <td><?= $abcd->nama_perusahaan?></td>
            <td><?= $abcd->alamat_perusahaan?></td>
			<td><?= $abcd->deskripsi_perusahaan?></td>
      <td><?= $abcd->tgl_mulai?></td>
            <td><?= $abcd->tgl_selesai?></td>
     
			</tr>
			<?php }  ?>
                </tbody>
     </table>
		  <!-- End Table with stripped rows -->

		</div>
	  </div>

	</div>
  </div>
</section>

</main><!-- End #main -->

