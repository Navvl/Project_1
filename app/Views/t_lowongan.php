      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Data</h5>
              </div>
              <div class="card-body">
                <form  action="<?=base_url('home/aksi_tlowongan')?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Id - Nama Perusahaan</label>
                        <select name="id_perusahaan" id="id_perusahaan" class="form-control">
                            <option value="Pilih" data-bidang="" data-deskripsi="" data-alamat="" data-nama="">Pilih Id - Nama Perusahaan</option>
                            <?php foreach($elvan as $key): ?>
                                <option value="<?= $key->id_perusahaan ?>" data-bidang="<?= $key->bidang_perusahaan ?>" data-deskripsi="<?= $key->deskripsi_perusahaan ?>" data-alamat="<?= $key->alamat_perusahaan ?>" data-nama="<?= $key->nama_perusahaan ?>">Id :<?= $key->id_perusahaan ?> - Nama :<?= $key->nama_perusahaan ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Perusahaan</label>
                        <input type="text" disabled="" class="form-control" id="nama_perusahaan" placeholder="Nama PT" name="nama_perusahaan">
                      </div>
                    </div>
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Bidang Perusahaan</label>
                        <input type="text" disabled="" class="form-control" id="bidang_perusahaan" placeholder="Bidang" name="bidang_perusahaan">
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Deskripsi Perusahaan</label>
                        <input type="text" disabled="" class="form-control" id="deskripsi_perusahaan" placeholder="Deskripsi PT" name="deskripsi_perusahaan">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Perusahaan</label>
                        <input type="text" disabled="" class="form-control" id="alamat_perusahaan" placeholder="Alamat PT" name="alamat_perusahaan">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Deskripsi Lowongan</label>
                        <input type="text" class="form-control" placeholder="Deskripsi Lowongan"  name="deskripsi_lowongan">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Fasilitas</label>
                        <input type="text" class="form-control"  placeholder="Fasilitas PT" name="fasilitas">
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Tugas</label>
                        <input type="text" class="form-control"  placeholder="Tugas" name="tugas">
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Kuota</label>
                        <input type="text" class="form-control"  placeholder="Kuota Tersedia" name="kuota">
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk_lowongan" id="jk_lowongan" class="form-control">
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
                        <label>Note</label>
                        <p  placeholder="Here can be your description" value="Mike">Masukkan Data Perusahaan Dengan Benar</p>
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
    
  