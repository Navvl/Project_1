<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Kajur</h5>
              </div>
              <div class="card-body">
                <form  action="<?=base_url('home/aksi_tkajur')?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                <!-- <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Id - Nama Sekolah</label>
                        <select name="id_sekolah" id="id_sekolah" class="form-control">
                            <option value="Pilih" data-nama="">Pilih Id - Nama sekolah</option>
                            <?php foreach($elvan as $key): ?>
                                <option value="<?= $key->id_sekolah ?>" data-nama="<?= $key->nama_sekolah ?>">Id :<?= $key->id_sekolah ?> - Nama :<?= $key->nama_sekolah ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div> -->
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Nama Kajur</label>
                        <input type="text" class="form-control" id="nama_kajur" placeholder="Nama Kajur " name="nama_kajur">
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" id="nohp_kajur" placeholder="Nomor Telepon" name="nohp_kajur">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Bidang Kajur</label>
                        <input type="text" class="form-control" placeholder="Bidang Kajur"  name="bidang_kajur">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control"  placeholder="Password" name="password">
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Note</label>
                        <p  placeholder="Here can be your description" value="Mike">Masukkan Data Kajur Dengan Benar</p>
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
  