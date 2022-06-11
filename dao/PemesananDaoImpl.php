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
}