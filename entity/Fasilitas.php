<?php

class Fasilitas
{
   private $id;
   private $nama;
   private $keterangan;

   public function getId()
   {
      return $this->id;
   }
   public function setId($id)
   {
      $this->id = $id;
   }

   public function getNama()
   {
      return $this->nama;
   }
   public function setNama($nama)
   {
      $this->nama = $nama;
   }

   public function getKeterangan()
   {
      return $this->keterangan;
   }
   public function setKeterangan($keterangan)
   {
      $this->keterangan = $keterangan;
   }
}
