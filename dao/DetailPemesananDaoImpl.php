<?php

class DetailPemesananDaoImpl
{
   public function fetchAllDetailPemesanan($id)
   {
      $link = PDOUtil::createConnection();

      $query = 'SELECT d.*, k.nama, k.alamat, k.kecamatan, p.tanggal, p.keterangan FROM detail_pemesanan AS d INNER JOIN kost as k ON d.kost_id = k.id INNER JOIN pemesanan as p ON d.pemesanan_id = p.id WHERE p.user_id = ?';
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $id);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'DetailPemesanan');
      $stmt->execute();
      $link = null;

      return $stmt->fetchAll();
   }

   public function addDetailPemesanan(DetailPemesanan $detailPemesanan)
   {
      $result = 0;
      $link = PDOUtil::createConnection();

      $query = 'INSERT INTO detail_pemesanan(kost_id, pemesanan_id, jumlah_kamar, harga) VALUES(?, ?, ? ,?)';
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $detailPemesanan->getKost()->getId());
      $stmt->bindValue(2, $detailPemesanan->getPemesanan()->getId());
      $stmt->bindValue(3, $detailPemesanan->getJumlahKamar());
      $stmt->bindValue(4, $detailPemesanan->getHarga());
      $link->beginTransaction();

      if ($stmt->execute()) {
         $link->commit();
         $result = 1;
      } else {
         $link->rollBack();
      }

      $link = null;
      return $result;
   }
}
