<?php


class Kost
{
   private $id;
   private $nama;
   private $alamat;
   private $kecamatan;
   private $harga;
   private $keterangan;
   private $gambar;


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

   public function getAlamat()
   {
      return $this->alamat;
   }
   public function setAlamat($alamat)
   {
      $this->alamat = $alamat;
   }

   public function getKecamatan()
   {
      return $this->kecamatan;
   }
   public function setKecamatan($kecamatan)
   {
      $this->kecamatan = $kecamatan;
   }

   public function getHarga()
   {
      return $this->harga;
   }
   public function setHarga($harga)
   {
      $this->harga = $harga;
   }

   public function getKeterangan()
   {
      return $this->keterangan;
   }
   public function setKeterangan($keterangan)
   {
      $this->keterangan = $keterangan;
   }

   public function getGambar()
   {
      return $this->gambar;
   }
   public function setGambar($gambar)
   {
      $this->gambar = $gambar;
   }



   public function __set($name, $value)
   {
      switch ($name) {
         case 'AUTO_INCREMENT':
            $this->setId($value);
            break;
      }
   }
}
