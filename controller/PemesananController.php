<?php 
class PemesananController
{
  public function __construct()
  {
    $this->pemesananDao = new PemesananDaoImpl();
    $this->detailPemesananDao = new DetailPemesananDaoImpl();
  }

  public function index()
  {
    $detailPemesanan = $this->detailPemesananDao->fetchAllDetailPemesanan($_SESSION['id']);
    // var_dump($detailPemesanan);
    include_once 'view/pemesanan-view.php';
  }
}
?>