<?php 

class FasilitasDaoImpl 
{
   public function fetchAllFasilitas()
   {
      $link = PDOUtil::createConnection();

      $query = 'SELECT * FROM fasilitas';
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Fasilitas');
      $stmt->execute();
      $link = null;

      return $stmt->fetchAll();
   }


   public function fetchFasilitas($id)
   {
      $link = PDOUtil::createConnection();

      $query = 'SELECT * FROM fasilitas WHERE id = ?';
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $id);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
      $link = null;

      return $stmt->fetchObject('Fasilitas');
   }
}
