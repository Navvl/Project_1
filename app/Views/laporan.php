<section class="section">
  <div class="row">
  <div class="col-lg-3"> <!-- Kolom pertama, setengah lebar -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Print PDF</h5>
            <!-- Form PDF -->
            <form action="<?= base_url('home/aksi_laporan_pdf') ?>" method="get" enctype="multipart/form-data">
                <!-- Input Tanggal Mulai -->
                <div class="row mb-3">
                    <label for="mulai" class="col-sm-4 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="mulai" name="mulai">
                    </div>
                </div>
                <!-- Input Tanggal Selesai -->
                <div class="row mb-3">
                    <label for="selesai" class="col-sm-4 col-form-label">Tanggal Selesai</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="selesai" name="selesai">
                    </div>
                </div>
                <!-- Tombol Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-secondary">PDF</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <div class="col-lg-3"> <!-- Kolom kedua, setengah lebar -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Print Excel</h5>
          <!-- Form Excel -->
          <form action="<?= base_url('home/aksi_laporan_excel') ?>" method="POST" enctype="multipart/form-data">
            <!-- Input Tanggal Mulai -->
            <div class="row mb-3">
              <label for="mulai" class="col-sm-4 col-form-label">Tanggal Mulai</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" id="mulai2" name="mulai2">
              </div>
            </div>
            <!-- Input Tanggal Selesai -->
            <div class="row mb-3">
              <label for="selesai" class="col-sm-4 col-form-label">Tanggal Selesai</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" id="selesai2" name="selesai2">
              </div>
            </div>
            <!-- Tombol Submit -->
            <div class="text-center">
              <button type="submit" class="btn btn-danger"><i class="ri-file-pdf-fill">Excel</i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
  <div class="col-lg-3"> <!-- Kolom pertama, setengah lebar -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Print Windows PDF</h5>
            <!-- Form PDF -->
            <form action="<?= base_url('home/windows_print_kajur') ?>" method="POST" enctype="multipart/form-data">
                <!-- Input Tanggal Mulai -->
                <div class="row mb-3">
                    <label for="mulai" class="col-sm-4 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="mulai" name="mulai">
                    </div>
                </div>
                <!-- Input Tanggal Selesai -->
                <div class="row mb-3">
                    <label for="selesai" class="col-sm-4 col-form-label">Tanggal Selesai</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="selesai" name="selesai">
                    </div>
                </div>
                <!-- Tombol Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Windows PDF</button>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
