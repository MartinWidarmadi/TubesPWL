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

   public function addFasilitas(Fasilitas $fasilitas) {
      $result = 0;
      $link = PDOUtil::createConnection();

      $query = 'INSERT INTO fasilitas(nama, keterangan) VALUES(?,?)';
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $fasilitas->getNama());
      $stmt->bindValue(2, $fasilitas->getKeterangan());

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
