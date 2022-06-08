<?php

class DetailPemesanan
{
   private $kost;
   private $pemesanan;
   private $jumlah_kamar;
   private $harga;

   public function getKost()
   {
      if (!isset($this->kost)) {
         $this->kost = new Kost();
      }
      return $this->kost;
   }
   public function setKost($kost)
   {
      $this->kost = $kost;
   }

   public function getPemesanan()
   {
      if (!isset($this->pemesanan)) {
         $this->pemesanan = new Pemesanan();
      }
      return $this->pemesanan;
   }
   public function setPemesanan($pemesanan)
   {
      $this->pemesanan = $pemesanan;
   }

   public function getJumlahKamar()
   {
      return $this->jumlah_kamar;
   }
   public function setJumlahKamar($jumlah_kamar)
   {
      $this->jumlah_kamar = $jumlah_kamar;
   }

   public function getHarga()
   {
      return $this->harga;
   }
   public function setHarga($harga)
   {
      $this->harga = $harga;
   }
}
