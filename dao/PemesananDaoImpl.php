<?php 

class PemesananDaoImpl 
{
   public function fetchAllPemesanan()
   {
      $link = PDOUtil::createConnection();

      $query = 'SELECT p.*, u.* FROM pemesanan as p INNER JOIN users as u ON p.user_id = u.id';
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Pemesanan');
      $stmt->execute();
      $link = null;

      return $stmt->fetchAll();
   }


   public function fetchPemesanan($id)
   {
      $link = PDOUtil::createConnection();

      $query = 'SELECT * FROM pemesanan WHERE id = ?';
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $id);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
      $link = null;

      return $stmt->fetchObject('Pemesanan');
   }


   public function addPemesanan(Pemesanan $pemesanan) 
   {
      $result = 0;
      $link = PDOUtil::createConnection();

      $query = 'INSERT INTO pemesanan(tanggal, keterangan, user_id) VALUES(?,?,?)';
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $pemesanan->getTanggal());
      $stmt->bindValue(2, $pemesanan->getKeterangan());
      $stmt->bindValue(3, $pemesanan->getUser()->getId());
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