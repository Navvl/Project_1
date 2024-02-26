<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                  <span class="d-none d-lg-block">PKL FINDER</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Pilih Akun</h5>
                    <p class="text-center small">Klik pada Akun</p>
                  </div>
                    <div class="col-12">
                        <a href="<?=base_url('home/t_murid')?>"><button class="btn btn-primary w-100" type="submit">Murid</button></a>
                    </div>
                    <div class="col-12">
                        <a href="<?=base_url('home/t_kajur')?>"> <button class="btn btn-primary w-100" type="submit">Kajur</button></a>                    
                    </div>
                    <div class="col-12">
                        <a href="<?=base_url('home/t_admin')?>"><button class="btn btn-primary w-100" type="submit">Admin</button></a>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('vendor/apexcharts/apexcharts.min.js')?>"></script>
  <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?= base_url('vendor/chart.js/chart.umd.js')?>"></script>
  <script src="<?= base_url('vendor/echarts/echarts.min.js')?>"></script>
  <script src="<?= base_url('vendor/quill/quill.min.js')?>"></script>
  <script src="<?= base_url('vendor/simple-datatables/simple-datatables.js')?>"></script>
  <script src="<?= base_url('vendor/tinymce/tinymce.min.js')?>"></script>
  <script src="<?= base_url('vendor/php-email-form/validate.js')?>"></script> 

  <!-- Template Main JS File -->
  <script src="<?= base_url('js/main.js')?>"></script>

</body>

</html>