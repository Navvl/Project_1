  <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Sekolah</h4>
				<a href="<?= base_url ('home/t_sekolah')?> ">
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
				<table class="table" style="font-size: 12px;">
     <thead>
                  <tr style="font-size: 10px;">
                    <th scope="col">No</th>
                    <th scope="col">Nama Sekolah</th>
                    <th scope="col">Alamat Sekolah</th>
                    <th scope="col">Jurusan Sekolah</th>
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
			<td><?= $abcd->nama_sekolah?></td>
            <td><?= $abcd->alamat_sekolah?></td>
			<td><?= $abcd->jurusan_sekolah?></td>		
      <td>
			<a href="<?= base_url('home/e_sekolah/' .$abcd->id_sekolah) ?>">
      <button class="btn btn-info">
      <i class="now-ui-icons design-2_ruler-pencil"></i> Edit
      </button>
					
				</a>
				<a href="<?= base_url('home/hapus_sekolah/' .$abcd->id_sekolah) ?>">
        <button class="btn btn-danger">
        <i class="now-ui-icons ui-1_simple-remove"></i> Hapus
        </button>
					
				</a>
				
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
