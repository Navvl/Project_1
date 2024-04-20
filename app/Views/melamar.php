      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Melamar</h5>
              </div>
              <div class="card-body">
                <form  action="<?=base_url('home/aksi_melamar')?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <input type="hidden" class="form-control"  name="id_perusahaan" value="<?=$satu->id_perusahaan?>"> 
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <input type="hidden" class="form-control"  name="id_lowongan" value="<?=$satu->id_lowongan?>">
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <input type="hidden" class="form-control"  name="id_user" value="<?=$satu->id_user?>">
                      </div>
                    </div>
                <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>NIS - Nama Siswa</label>
                        <select name="nis" id="nis" class="form-control">
                            <option value="Pilih" data-nama="" data-alamat="" data-no="" >Pilih NIS - Nama Siswa</option>
                            <?php foreach($siswa as $key): ?>
                                <option value="<?= $key->nis ?>" data-nama="<?= $key->nama_siswa ?>" data-alamat="<?= $key->alamat_siswa ?>" data-no="<?= $key->nohp_siswa ?>">NIS :<?= $key->nis ?> - Nama :<?= $key->nama_siswa ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Nama Murid</label>
                        <input type="text" class="form-control" disabled="" id="nama_siswa" placeholder="Nama Murid" name="nama_siswa">
                      </div>
                    </div>
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Alamat Murid</label>
                        <input type="text" class="form-control" disabled="" id="alamat_siswa" placeholder="Alamat Murid" name="alamat_siswa">
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>NoHp Murid</label>
                        <input type="text" class="form-control" disabled="" id="nohp_siswa" placeholder="NoHp Murid" name="nohp_siswa">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>NIS - Nama Sekolah</label>
                        <select name="id_sekolah" id="id_sekolah" class="form-control">
                            <option value="Pilih" data-nama_sekolah="" data-alamat_sekolah="">Pilih Id - Nama Sekolah</option>
                            <?php foreach($sekolah as $key): ?>
                                <option value="<?= $key->id_sekolah ?>" data-nama_sekolah="<?= $key->nama_sekolah ?>" data-alamat_sekolah="<?= $key->alamat_sekolah ?>">Id :<?= $key->id_sekolah ?> - Nama :<?= $key->nama_sekolah ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Sekolah</label>
                        <input type="text" class="form-control" disabled="" id="nama_sekolah" placeholder="Nama Sekolah" name="nama_sekolah">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Sekolah</label>
                        <input type="text" class="form-control" disabled="" placeholder="Alamat Sekolah"  id="alamat_sekolah" name="alamat_sekolah">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Durasi PKL</label>
                        <select name="durasi_pkl" id="durasi_pkl" class="form-control">
                            <option value="Pilih">Pilih Durasi</option>
                           
                                <option value="1">1 Bulan</option>
                                <option value="2">2 Bulan</option>
                                <option value="3">3 Bulan</option>
                                <option value="4">4 Bulan</option>
                                <option value="5">5 Bulan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Bidang PKL</label>
                        <input type="text" class="form-control"  placeholder="Bidang PKL" name="bidang_pkl">
                      </div>
                    </div>

                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Tanggal Mulai PKL</label>
                        <input type="date" class="form-control"  placeholder="Tanggal Mulai" name="tgl_mulai">
                      </div>
                    </div>
                
                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Note</label>
                        <p  placeholder="Here can be your description" value="Mike">Masukkan Data Pelamaran Dengan Benar</p>
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
    
  