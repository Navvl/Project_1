      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Data</h5>
              </div>
              <div class="card-body">
                <form  action="<?=base_url('home/aksi_elowongan')?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Perusahaan</label>
                        <input type="text" class="form-control" disabled="" id="nama_perusahaan" placeholder="Nama PT" name="nama_perusahaan" value="<?=$satu->nama_perusahaan?>">
                      </div>
                    </div>
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Bidang Perusahaan</label>
                        <input type="text" class="form-control" disabled="" id="bidang_perusahaan" placeholder="Bidang" name="bidang_perusahaan" value="<?=$satu->bidang_perusahaan?>">
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Deskripsi Perusahaan</label>
                        <input type="text" class="form-control" disabled="" id="deskripsi_perusahaan" placeholder="Deskripsi PT" name="deskripsi_perusahaan" value="<?=$satu->deskripsi_perusahaan?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Perusahaan</label>
                        <input type="text" class="form-control" disabled="" id="alamat_perusahaan" placeholder="Alamat PT" name="alamat_perusahaan" value="<?=$satu->alamat_perusahaan?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Deskripsi Lowongan</label>
                        <input type="text" class="form-control" placeholder="Deskripsi Lowongan"  name="deskripsi_lowongan" value="<?=$satu->deskripsi_lowongan?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Fasilitas</label>
                        <input type="text" class="form-control"  placeholder="Fasilitas PT" name="fasilitas" value="<?=$satu->fasilitas?>">
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Tugas</label>
                        <input type="text" class="form-control"  placeholder="Tugas" name="tugas" value="<?=$satu->tugas?>">
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Kuota</label>
                        <input type="text" class="form-control"  placeholder="Kuota Tersedia" name="kuota" value="<?=$satu->kuota?>">
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="<?=$satu->jk_lowongan?>" id="jk_lowongan" class="form-control">
                          
                                <option selected><?=$satu->jk_lowongan?></option>
                                <!-- <?php foreach($elvan as $key): ?>
                                  <option value="<?= $key->jk_lowongan ?>"><?= $key->jk_lowongan ?></option>
                                <?php endforeach; ?> -->
                                <option value="L">L</option>
                                <option value="P">P</option>
                                <option value="L/P">L/P</option>
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

                  <input type="hidden" name="id" value="<?= $satu->id_lowongan?>">

                  <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-block">Save <i class="now-ui-icons ui-1_check"></i> </button>
                    </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    
    <!-- <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Sekolah</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" value="michael23">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Company" value="Mike">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" value="Andrew">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" value="Mike">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" value="Andrew">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" placeholder="ZIP Code">
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
                </form>
              </div>
            </div>
          </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div> -->