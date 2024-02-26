  <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Sekolah</h4>
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
			</tr>
			<?php } ?>
                </tbody>
     </table>
                </div>
              </div>
            </div>
          </div>
			</div>
