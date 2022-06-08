<?php

/**
 * 2072011 Alvon Jovanus Chandra
 */


class PDOUtil
{
   public static function createConnection()
   {
      $link = new PDO('mysql:host=localhost;dbname=kos', 'root', '');
      $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
      $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $link;
   }
}
