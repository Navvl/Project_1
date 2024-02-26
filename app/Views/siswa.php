<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Siswa</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
		  <!-- Table with stripped rows -->
		  <table class="table datatable" style="font-size: 12px;">
     <thead>
                  <tr style="font-size: 10px;">
                    <th scope="col">No</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">NoHp Siswa</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat Siswa</th>
                    <th scope="col">Sekolah</th>
                    <th scope="col">Alamat Sekolah</th>
					               
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
            <td><?= $abcd->kelas?></td>
			<td><?= $abcd->nohp_siswa?></td>
            <td><?= $abcd->jk_siswa?></td>
            <td><?= $abcd->alamat_siswa?></td>			
            <td><?= $abcd->nama_sekolah?></td>
            <td><?= $abcd->alamat_sekolah?></td>	
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

