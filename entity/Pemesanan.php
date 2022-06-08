<?php
class Pemesanan
{
   private $id;
   private $tanggal;
   private $keterangan;

   /**@var $user User */
   private $user;


   public function getId()
   {
      return $this->id;
   }
   public function setId($id)
   {
      $this->id = $id;
   }

   public function getTanggal()
   {
      return $this->tanggal;
   }
   public function setTanggal($tanggal)
   {
      $this->tanggal = $tanggal;
   }

   public function getKeterangan()
   {
      return $this->keterangan;
   }
   public function setKeterangan($keterangan)
   {
      $this->keterangan = $keterangan;
   }

   public function getUser()
   {
      if (!isset($this->user)) {
         $this->user = new User();
      }

      return $this->user;
   }
   public function setUser($user)
   {
      $this->user = $user;
   }


   public function __set($name, $value)
   {
      if (!isset($this->user)) {
         $this->user = new User();
      }

      switch ($name) {
         case 'user_id':
            $this->user->setId($value);
            break;
      }
   }
}
