<div class="container">
   <h1 class="text-dark mb-4">Genre Management</h1>

   <form action="" method="POST" class="mb-2">
        <div class="row mb-3">
            <label for="namaId" class="form-label">Nama</label>
            <input type="text" class="form-control" name="txtNama" placeholder="Genre Name" id="namaId" autocomplete="off">
        </div>
        <div class="row mb-3">
            <label for="keteranganId" class="form-label">Keterangan</label>
            <textarea class="form-control" name="txtKeterangan" placeholder="Genre Name" id="keteranganId" autocomplete="off"></textarea>
        </div>
        <input type="submit" value="Submit Data" name="btnSubmit" class="btn btn-primary me-2">
    </form>

   <table class="table table-info table-striped table-bordered" id="table_id">
      <thead>
         <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Keterangan</th>
         </tr>
      </thead>
      <tbody>
         <?php

         foreach ($fasilitas as $item) :
         ?>
            <tr>
               <td scope="row"><?= $item->getId(); ?></td>
               <td><?= $item->getNama(); ?></td>
               <td><?= $item->getKeterangan(); ?></td>
            </tr>
         <?php endforeach; ?>

      </tbody>
   </table>
</div>
