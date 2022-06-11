<?php 

class KostDaoImpl 
{
   public function fetchAllKost()
   {
      $link = PDOUtil::createConnection();

      $query = 'SELECT * FROM kost';
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Kost');
      $stmt->execute();
      $link = null;

      return $stmt->fetchAll();
   }


   public function fetchKost($id)
   {
      $link = PDOUtil::createConnection();

      $query = 'SELECT * FROM kost WHERE id = ?';
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $id);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
      $link = null;

      return $stmt->fetchObject('Kost');
   }

   public function addKost()
   {

   }
}