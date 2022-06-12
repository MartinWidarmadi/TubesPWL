<!-- Masthead-->
<header class="masthead">
   <div class="container px-4 px-lg-5 h-100 bg-primary text-center">
    <table class="table table-borderless">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>Nama Kost</th>
          <th>Alamat Kost</th>
          <th>Harga</th>
          <th>Jumlah Kamar</th>
        </tr>
      </thead>

      <tbody>
        <?php 
        foreach ($detailPemesanan as $detail):
        ?>
        <tr>
          <td><?= $detail->getPemesanan()->getTanggal(); ?></td>
          <td><?= $detail->getKost()->getNama(); ?></td>
          <td><?= $detail->getKost()->getAlamat(); ?>, <?= $detail->getKost()->getKecamatan(); ?></td>
          <td><?= $detail->getHarga(); ?></td>
          <td><?= $detail->getJumlahKamar(); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</header>
  <!-- Footer-->
<footer class="bg-light py-5">
   <div class="container px-4 px-lg-5">
      <div class="small text-center text-muted">Copyright &copy; 2022 - Company Name</div>
   </div>
</footer>