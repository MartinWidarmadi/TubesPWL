<!-- Masthead-->
<header class="masthead">
  <div class="container h-100 w-100 bg-primary d-flex flex-column justify-content-center align-items-center">
    <div class="card d-flex flex-column text-center">
      <?php if ($kost->getGambar()) : ?>
        <img class="card-img-top" src="uploads/<?= $kost->getGambar(); ?>" alt="Card image cap" style="width: 400px;">
      <?php else : ?>
        <img class=" card-img-top" src="uploads/default.jpg" alt="Card image cap" style="width: 400px;">
      <?php endif; ?>
      <div class="card-body">
        <h5 class="card-title"><?= $kost->getNama(); ?></h5>
        <p class="card-text">Rp. <?= $kost->getHarga(); ?></p>
        <p class="card-text"><?= $kost->getAlamat(); ?>, <?= $kost->getKecamatan(); ?></p>
        <hr class="divider">
        <?php
        foreach ($fasilitasKost as $fasilitas) :
        ?>
          <p><?= $fasilitas->getFasilitas()->getNama(); ?></p>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="d-flex flex-row justify-content-between align-items-center mt-3" style="width:15rem;">
      <a class="btn btn-danger" href="?menu=kost#catalog">&larr;</a>
      <a class="btn btn-danger" onclick="editDetail('<?= $kost->getId(); ?>')">Edit</a>
      <a class="btn btn-danger" onclick="deleteDetail('<?= $kost->getId(); ?>')">Delete</a>
    </div>
  </div>
</header>

<!-- Footer-->
<footer class="bg-light py-5">
  <div class="container px-4 px-lg-5">
    <div class="small text-center text-muted">Copyright &copy; 2022 - Company Name</div>
  </div>
</footer>

<script>
  function editDetail(id) {
    window.location = `index.php?menu=editkost&did=${id}`;
  }

  function deleteDetail(id) {
    const confirmation = confirm("Apakah kamu yakin untuk menghapus kost ini?");
    if (confirmation) {
      window.location = `index.php?menu=kostdetail&delcom=1&did=${id}`;
    }
  }
</script>