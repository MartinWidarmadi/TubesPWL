<!-- Masthead-->
<header class="masthead">
  <div class="container px-4 px-lg-5 h-100 bg-primary d-flex justify-content-around">
    <div class="card mb-5" style="width: 18rem;">
      <img class="card-img-top" src="<?= $kost->getGambar(); ?>" alt="Card image cap">
      <div class="card-body">
          <h5 class="card-title"><?= $kost->getNama(); ?></h5>
          <p class="card-text"><?= $kost->getAlamat(); ?></p>
          <p class="card-text">Rp. <?= $kost->getHarga(); ?></p>
      </div>
    </div>
    <div class="container d-flex flex-row flex-row justify-content-around">
      <?php 
      foreach ($fasilitasKost as $fasilitas):
      ?>
      <p><?= $fasilitas->getFasilitas()->getNama(); ?></p>
      <?php endforeach; ?>
    </div>
    <!-- <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
      <div class="col-lg-8 align-self-end">
        <h1 class="text-white font-weight-bold">Tempat favorite anda untuk mencari kost</h1>
        <hr class="divider" />
      </div>
      <div class="col-lg-8 align-self-baseline">
        <p class="text-white-75 mb-5">Ayo, cari kost kesayangan anda!</p>
        <a class="btn btn-primary btn-xl" href="#about">Info lebih lanjut</a>
      </div> -->
  </div>
</header>