      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Admin</h5>
              </div>
              <div class="card-body">
                <form  action="<?=base_url('home/aksi_tadmin')?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Nama Admin</label>
                        <input type="text" class="form-control" id="nama_admin" placeholder="Nama Admin " name="nama_admin">
                      </div>
                    </div>
                  <div class="col-md-6 pr-1">
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