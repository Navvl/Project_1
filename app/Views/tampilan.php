<body>

<section id="team" class="team">
      <div class="container" data-aos="fade-up">
       
        <div class="section-title">
          <h2>List</h2>
          <p>PRINT</p>
      </div>
     

      <br>    
      <div class="section-title">
    	<a href="<?= base_url('home/print/') ?>">
      <button class="btn btn-info">
        PRINT
      </button>
      </a>
      </div>
  <br>

    <div class="bg-dark rounded h-100 p-4">
    <table class="table datatable">
     <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Deskripsi</th>                   
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
			<td><?= $abcd->nama_barang?></td>
            <td><?= $abcd->nama_pembeli?></td>
			<td><?= $abcd->tgl?></td>
			<td><?= $abcd->deskripsi?></td>			
			</td>
     
			</tr>
			<?php } ?>
                </tbody>
     </table>
    </div>
    </div>
    </section>
    <!-- End Team Section -->