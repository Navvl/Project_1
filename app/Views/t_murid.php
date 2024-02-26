<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Murid</h5>
              </div>
              <div class="card-body">
                <form  action="<?=base_url('home/aksi_tmurid')?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Id - Nama Sekolah</label>
                        <select name="id_sekolah" id="id_sekolah" class="form-control">
                            <option value="Pilih" data-nama="">Pilih Id - Nama sekolah</option>
                            <?php foreach($elvan as $key): ?>
                                <option value="<?= $key->id_sekolah ?>" data-nama="<?= $key->nama_sekolah ?>">Id :<?= $key->id_sekolah ?> - Nama :<?= $key->nama_sekolah ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Nama Murid</label>
                        <input type="text" class="form-control" id="nama_siswa" placeholder="Nama Murid" name="nama_siswa">
                      </div>
                    </div>
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" class="form-control" id="kelas" placeholder="kelas" name="kelas">
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" id="nohp_siswa" placeholder="Nomor Telepon" name="nohp_siswa">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk_siswa" id="jk_siswa" class="form-control">
                            <option value="Pilih">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                                <option value="L/P">Laki-Laki & Perempuan</option>
                        </select>
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Murid</label>
                        <input type="text" class="form-control" placeholder="Alamat Murid"  name="alamat_siswa">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control"  placeholder="password" name="password">
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Note</label>
                        <p  placeholder="Here can be your description" value="Mike">Masukkan Data Murid Dengan Benar</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-block">Save <i class="now-ui-icons ui-1_check"></i> </button>
                    </div>
                </form>
              </div>
            </div>
          </div>
      </div>
</section>
  