<?php 

class UserDaoImpl
{
   function userLogin($email, $password)
   {
      $link = PDOUtil::createConnection();
      $query = 'SELECT * FROM users WHERE email = ? AND password = ?';

      $stmt = $link->prepare($query);

      $stmt->bindParam(1, $email);
      $stmt->bindParam(2, $password);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
      $link = null;

      return $stmt->fetchObject('User');
   }

   public function insertNewUser(User $user)
   {
      $result = 0;
      $link = PDOUtil::createConnection();

      $query = 'INSERT INTO user(name, email, password, gender, role) VALUES(?, ?, ?, ?, ?)';
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $user->getNama());
      $stmt->bindValue(2, $user->getEmail());
      $stmt->bindValue(3, $user->getPassword());
      $stmt->bindValue(4, $user->getGender());
      $stmt->bindValue(5, $user->getRole());
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
