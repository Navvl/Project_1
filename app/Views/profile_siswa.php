<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Profile</h5>
              </div>
              <div class="card-body">
              <form  action="<?=base_url('home/aksi_esiswa')?>" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                      <label>NIS</label>
                        <input type="text" class="form-control" name="nis" disabled="" placeholder="Company" value="<?=$satu->nis?>">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                      <label>Nama Murid</label>
                        <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Murid" value="<?=$satu->nama_siswa?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                      <label>Kelas</label>
                        <input type="text" class="form-control" name="kelas" placeholder="Kelas" value="<?=$satu->kelas?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                      <label>NoHp Murid</label>
                        <input type="text" class="form-control" name="nohp_siswa" placeholder="NoHp Murid" value="<?=$satu->nohp_siswa?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                      <label>Jenis Kelamin</label>
                        <select name="jk_siswa" id="jk_siswa" class="form-control">
                          
                                <option selected><?=$satu->jk_siswa?></option>
                                <!-- <?php foreach($elvan as $key): ?>
                                  <option value="<?= $key->jk_siswa ?>"><?= $key->jk_siswa ?></option>
                                <?php endforeach; ?> -->
                                <option value="L">L</option>
                                <option value="P">P</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                      <label>Alamat Murid</label>
                        <input type="text" class="form-control" name="alamat_siswa" placeholder="Alamat Murid" value="<?=$satu->alamat_siswa?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                      <label>Nama Sekolah</label>
                        <input type="text" class="form-control" name="nama_sekolah" disabled="" placeholder="Nama Sekolah" value="<?=$dua->nama_sekolah?>">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                      <label>Alamat Sekolah</label>
                        <input type="text" class="form-control" disabled="" name="alamat_sekolah" placeholder="Alamat Sekolah" value="<?=$dua->alamat_sekolah?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
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
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="<?=base_url('img/bg5.jpg')?>" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="<?= base_url('img/'.$satu->img)?>" alt="...">
                    <h5 class="title"><?=$satu->nama_siswa?></h5>
                  </a>
                  <p class="description">
                  <?=$satu->nama_siswa?>
                  </p>
                </div>
                <p class="description text-center">
                  "Lamborghini Mercy <br>
                  Your chick she so thirsty <br>
                  I'm in that two seat Lambo"
                </p>
              </div>
              <hr>
              <div class="button-container">
                <a href="<?= base_url('home/e_foto_siswa/'.$satu->id_user)?>" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="now-ui-icons arrows-1_cloud-upload-94"></i></a>
                <a href="<?= base_url('home/hapusfoto_siswa/'.$satu->id_user)?>" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="now-ui-icons ui-1_simple-remove"></i></a>
              </div>
            </div>
          </div>
        </div>
     </div>