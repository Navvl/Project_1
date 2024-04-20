<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Pelamar</h4>
	<a href=" <?= base_url('home/laporan_admin/')?>">
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
                    <th scope="col">NIS</th>
                    <th scope="col">Nama Murid</th>
                    <th scope="col">Alamat Murid</th>
                    <th scope="col">NoHp Murid</th>
                    <th scope="col">Nama Sekolah</th>
                    <th scope="col">Alamat Sekolah</th>
                    <th scope="col">Durasi PKL</th>
                    <th scope="col">Bidang PKL</th>
                    <th scope="col">Surat</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Status</th> 
                    <th scope="col">Nama Perusahaan</th> 
                    <th scope="col">Alamat Perusahaan</th>                       
                    <th scope="col">Deskripsi Perusahaan</th> 
                    <th scope="col">Tanggal Mulai</th> 
                    <th scope="col">Tanggal Selesai</th>  
                    <th scope="col">Aksi</th> 
                  </tr>
                </thead>
                <tbody>
				<?php
			
			$no=1;
			foreach($elvan as $abcd){
        if ($surat = $abcd->surat === 'Ada Surat') :
			?>

			<tr>
      <tr valign="middle">
			<td><?= $no++ ?></td>
			<td><?= $abcd->nis?></td>
            <td><?= $abcd->nama_siswa?></td>
			<td><?= $abcd->alamat_siswa?></td>
            <td><?= $abcd->nohp_siswa?></td>
            <td><?= $abcd->nama_sekolah?></td>			
            <td><?= $abcd->alamat_sekolah?></td>
            <td><?= $abcd->durasi_pkl?></td>	
            <td><?= $abcd->bidang_pkl?></td>		
            <td><?= $surat = $abcd->surat?></td>
            <td><?= $abcd->jumlah?></td>
            <td><?= $abcd->status?></td>
            <td><?= $abcd->nama_perusahaan?></td>
            <td><?= $abcd->alamat_perusahaan?></td>
			<td><?= $abcd->deskripsi_perusahaan?></td>
      <td><?= $abcd->tgl_mulai?></td>
            <td><?= $abcd->tgl_selesai?></td>
            <td>
			<a href="<?= base_url('home/terima/' .$abcd->id_pelamaran) ?>">
      <button class="btn btn-info">
      <i class="now-ui-icons ui-1_check"></i> Edit
      </button>
      </a>
			</td>	

      <td>
			<a href="<?= base_url('home/surat/' .$abcd->id_pelamaran) ?>">
      <button class="btn btn-info">
      <i class="now-ui-icons files_paper"></i> Lihat Surat
      </button>
      </a>
			</td>	
      <td>
			<a href="<?= base_url('home/hapus_pelamar/' .$abcd->id_pelamaran) ?>">
      <button class="btn btn-danger">
      <i class="now-ui-icons files_box"></i> Hapus Data
      </button>
      </a>
			</td>	
     
			</tr>
			<?php endif; }  ?>
                </tbody>
     </table>
		  <!-- End Table with stripped rows -->

		</div>
	  </div>

	</div>
  </div>
</section>

</main><!-- End #main -->

