<?php

class FasilitasKostDaoImpl
{
   public function fetchAllFasilitasKost()
   {
      $link = PDOUtil::createConnection();

      $query = 'SELECT fasilitas_kost.*, k.nama as knama, f.nama as fnama FROM fasilitas_kost INNER JOIN kost as k ON fasilitas_kost.kost_id = k.id INNER JOIN fasilitas as f ON fasilitas_kost.fasilitas_id = f.id';
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'FasilitasKost');
      $stmt->execute();
      $link = null;

      return $stmt->fetchAll();
   }

   public function fetchFasilitasKost($id)
   {
      $link = PDOUtil::createConnection();

      $query = 'SELECT fasilitas_kost.*, k.nama as knama, f.nama as fnama FROM fasilitas_kost INNER JOIN kost as k ON fasilitas_kost.kost_id = k.id INNER JOIN fasilitas as f ON fasilitas_kost.fasilitas_id = f.id WHERE fasilitas_kost.kost_id = ?';
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $id);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'FasilitasKost');
      $stmt->execute();
      $link = null;

      return $stmt->fetchAll();
   }


   public function addFasilitasKost(Kost $kost, Fasilitas $fasilitas)
   {
      $result = 0;
      $link = PDOUtil::createConnection();

      $query = 'INSERT INTO fasilitas_kost(kost_id, fasilitas_id) VALUES(?,?)';
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $kost->getId());
      $stmt->bindValue(2, $fasilitas->getId());

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

   public function deleteFasilitasKost($id)
   {
      $result = 0;
      $link = PDOUtil::createConnection();

      $query = 'DELETE FROM fasilitas_kost WHERE kost_id = ?';
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $id);
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
