<style>
    .mt-10 {
        margin-top: 5rem;
    }
</style>

<div class="container mt-10">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idKost" value="<?= $kost->getId(); ?>">
        <div class="row mb-3">
            <div class="col">
                <label for="kostNameId" class="form-label">Nama Kost</label>
                <input type="text" name="txtKostName" id="kostNameId" class="form-control" value="<?= $kost->getNama(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="alamatId" class="form-label">Alamat Kost</label>
                <input type="text" name="txtAlamat" id="alamatId" class="form-control" value="<?= $kost->getAlamat(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="kecamatanId" class="form-label">Kecamatan</label>
                <input type="text" name="txtKecamatan" id="kecamatanId" class="form-control" value="<?= $kost->getKecamatan(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="hargaId" class="form-label">Harga</label>
                <input type="number" name="txtHarga" id="hargaId" class="form-control" value="<?= $kost->getHarga(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="keteranganId" class="form-label">Keterangan</label>
                <textarea name="txtKeterangan" id="keteranganId" class="form-control"><?= $kost->getKeterangan(); ?></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="form-label">Fasilitas</label>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <?php
                foreach ($fasilitas as $item) :
                ?>
                    <input type="checkbox" id="<?= $item->getNama() ?>" class="btn-check" autocomplete="off" value="<?= $item->getId(); ?>" name="fasilitas[]">
                    <label for="<?= $item->getNama() ?>" class="btn btn-outline-primary"><?= $item->getNama() ?></label>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="gambarId" class="form-label">Gambar</label>
                <input type="file" class="form-control" name="fileGambar" id="gambarId" accept="image/png, image/jpeg">
            </div>
        </div>
        <a class="btn btn-danger mb-4" href="?menu=kostdetail&did=<?= $kost->getId(); ?>">&larr;</a>
        <input type="submit" value="Submit Data" name="btnSubmit" class="btn btn-primary me-2 mb-4">
    </form>
</div>