<main id="main" class="mt-4">

  <!-- ======= What We Do Section ======= -->
  <section id="what-we-do" class="what-we-do" style="margin-top: 100px;">
    <div class="container">

      <div class="section-title">
        <h2>Paket 1 Hari Tetap</h2>

        <?php if($this->session->flashdata('success')): ?>
          <div id="alert-success" class="alert alert-success text-center">
              <?= $this->session->flashdata('success'); ?>
          </div>

          <script>
            // Pesan sukses hilang otomatis setelah 3 detik
            setTimeout(function() {
              var alert = document.getElementById('alert-success');
              if (alert) {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = "0";
                setTimeout(() => alert.remove(), 500);
              }
            }, 3000);
          </script>
        <?php endif; ?>
      </div>

      <div class="row">
        <?php foreach ($pesan as $key): ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?= base_url('assets/img/waru/') . $key['gambar'] ?>" alt="Card image cap">
              <div class="card-body">
                <h4><?= $key['jenis_kategori'] ?></h4>
                <h4>Rp. <?= $key['harga'] ?></h4>
                <small class="text-center text-danger">kapasitas untuk <?= $key['kapasitas'] ?>/orang</small>
                <p class="card-text"><?= $key['fasilitas'] ?></p>
              </div>
              <div class="card-footer">
                <a href="<?= base_url('home/pesanan/') . $key['id_detail_kategori']; ?>" class="btn btn-primary">Pesan</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section><!-- End What We Do Section -->


  <!-- ======= What We Do Section ======= -->
  <section id="what-we-do" class="what-we-do">
    <div class="container">

      <div class="section-title">
        <h2>Paket Bermalam</h2>
      </div>

      <div class="row">
        <?php foreach ($pesan2 as $key): ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?= base_url('assets/img/waru/') . $key['gambar'] ?>" alt="Card image cap">
              <div class="card-body">
                <h4><?= $key['jenis_kategori'] ?></h4>
                <h4>Rp. <?= $key['harga'] ?></h4>
                <small class="text-center text-danger">kapasitas untuk <?= $key['kapasitas'] ?>/orang</small>
                <p class="card-text"><?= $key['fasilitas'] ?></p>
              </div>
              <div class="card-footer">
                <a href="<?= base_url('home/pesanan/') . $key['id_detail_kategori']; ?>" class="btn btn-primary">Pesan</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section><!-- End What We Do Section -->


  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
      </div>

      <div class="row mt-5 justify-content-center">
        <div class="col-lg-10">
          <div class="info-wrap">
            <div class="row">
              <div class="col-lg-4 info">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Bantarwangi, Cinangka<br>Serang - Banten, 42167</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>waruwangi@gmail.com</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>085886197284<br>081389921722</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
