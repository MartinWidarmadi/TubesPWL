<?php

class User
{
   private $id;
   private $nama;
   private $email;
   private $password;
   private $gender;
   private $role;

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

   public function getEmail()
   {
      return $this->email;
   }
   public function setEmail($email)
   {
      $this->email = $email;
   }

   public function getPassword()
   {
      return $this->password;
   }
   public function setPassword($password)
   {
      $this->password = $password;
   }

   public function getGender()
   {
      return $this->gender;
   }
   public function setGender($gender)
   {
      $this->gender = $gender;
   }

   public function getRole()
   {
      return $this->role;
   }
   public function setRole($role)
   {
      $this->role = $role;
   }
}
