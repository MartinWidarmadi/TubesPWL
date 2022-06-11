<?php

class FasilitasKost
{
   private $kost;
   private $fasilitas;

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

   public function getFasilitas()
   {
      if (!isset($this->fasilitas)) {
         $this->fasilitas = new Fasilitas();
      }

      return $this->fasilitas;
   }
   public function setFasilitas($fasilitas)
   {
      $this->fasilitas = $fasilitas;
   }

   public function __set($name, $value)
   {
      if (!isset($this->kost)) {
         $this->kost = new Kost();
      }

      if (!isset($this->fasilitas)) {
         $this->fasilitas = new Fasilitas();
      }


      switch ($name) {
         case 'kost_id':
            $this->kost->setId($value);
            break;
         case 'fasilitas_id':
            $this->fasilitas->setId($value);
            break;
         case 'knama':
            $this->kost->setNama($value);
            break;
         case 'fnama':
            $this->fasilitas->setNama($value);
            break;
      }
   }
}
