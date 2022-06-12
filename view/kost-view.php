<!-- Masthead-->
<header class="masthead">
   <div class="container px-4 px-lg-5 h-100">
      <div class="row gx-4 gx-lg-1 h-100 align-items-center justify-content-center text-center">
         <div class="col-lg-8 align-self-end">
            <h1 class="text-white font-weight-bold">Cari Kost Anda</h1>
            <hr class="divider" />
         </div>
         <div class="col-lg-8 align-self-baseline">
            <p class="text-white-75 mb-5">Langsung aja cari dibawah guys.</p>
            <a class="btn btn-primary btn-l" href="#catalog">&darr;</a>
         </div>
      </div>
   </div>
</header>
<!-- Catalog -->
<section class="page-section bg-primary" id="catalog">
   <div class="container px-4 px-5">
      <div class="d-flex flex-row flex-wrap justify-content-around">
         <?php
         foreach ($kosts as $kost) :
         ?>
            <div class="card mb-5" style="width: 18rem;">
               <?php if ($kost->getGambar()) : ?>
                  <img class="card-img-top" src="uploads/<?= $kost->getGambar(); ?>" alt="Card image cap">
               <?php else : ?>
                  <img class=" card-img-top" src="uploads/default.jpg" alt="Card image cap">
               <?php endif; ?>
               <div class="card-body">
                  <h5 class="card-title"><?= $kost->getNama(); ?></h5>
                  <p class="card-text"><?= $kost->getAlamat(); ?></p>
                  <a class="btn btn-primary" onclick="cekDetail('<?= $kost->getId(); ?>')">Cek Detail</a>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</section>
<!-- Footer-->
<footer class="bg-light py-5">
   <div class="container px-4 px-lg-5">
      <div class="small text-center text-muted">Copyright &copy; 2022 - Company Name</div>
   </div>
</footer>

<script>
   function cekDetail(id) {
      window.location = `index.php?menu=kostdetail&did=${id}`;
   }
</script>