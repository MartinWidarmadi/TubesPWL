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

   public function fetchLastKost()
   {
      $link = PDOUtil::createConnection();

      $query = 'SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = "kos" AND TABLE_NAME = "kost"';
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
      $link = null;

      return $stmt->fetchObject('Kost');
   }

   public function addKost(Kost $kost)
   {
      $result = 0;
      $link = PDOUtil::createConnection();

      $query = 'INSERT INTO kost(nama, alamat, kecamatan, harga, keterangan, gambar) VALUES (?, ?, ?, ?, ?, ?)';
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $kost->getNama());
      $stmt->bindValue(2, $kost->getAlamat());
      $stmt->bindValue(3, $kost->getKecamatan());
      $stmt->bindValue(4, $kost->getHarga());
      $stmt->bindValue(5, $kost->getKeterangan());
      $stmt->bindValue(6, $kost->getGambar());
      $link->beginTransaction();
      if ($stmt->execute()) {
         $link->commit();
         $result = 1;
      } else {
         $link->rollBack();
         $result = 0;
      }

      return $result;
   }

   public function updateKost(Kost $kost)
   {
      $result = 0;
      $link = PDOUtil::createConnection();

      $query = 'UPDATE kost SET nama = ?, alamat = ?, kecamatan = ?, harga = ?, keterangan = ?, gambar = ? WHERE id = ?';
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $kost->getNama());
      $stmt->bindValue(2, $kost->getAlamat());
      $stmt->bindValue(3, $kost->getKecamatan());
      $stmt->bindValue(4, $kost->getHarga());
      $stmt->bindValue(5, $kost->getKeterangan());
      $stmt->bindValue(6, $kost->getGambar());
      $stmt->bindValue(7, $kost->getId());
      $link->beginTransaction();
      if ($stmt->execute()) {
         $link->commit();
         $result = 1;
      } else {
         $link->rollBack();
         $result = 0;
      }

      return $result;
   }

   public function deleteKost($id)
   {
      $result = 0;
      $link = PDOUtil::createConnection();

      $query = 'DELETE FROM kost WHERE id = ?';
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
