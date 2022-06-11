<?php 

class DetailPemesananDaoImpl 
{
   public function fetchAllDetailPemesanan()
   {
      $link = PDOUtil::createConnection();

      $query = 'SELECT d.*, k.nama, k.alamat, p.tanggal, p.keterangan FROM detail_pemesanan AS d INNER JOIN kost as k ON d.kost_id = k.id INNER JOIN pemesanan as p ON d.pemesanan_id = p.id';
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'DetailPemesanan');
      $stmt->execute();
      $link = null;

      return $stmt->fetchAll();
   }
}
