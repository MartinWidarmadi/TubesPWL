<?php 
class FasilitasController
{
  public function __construct()
  {
    $this->fasilitasDao = new FasilitasDaoImpl();
  }

  public function index() {
   $btnSubmit = filter_input(INPUT_POST, 'btnSubmit');
   if (isset($btnSubmit)) {
    $nama = filter_input(INPUT_POST, 'txtNama');
    $keterangan = filter_input(INPUT_POST, 'txtKeterangan');
    $trimNama = trim($nama);
    $trimKeterangan = trim($keterangan);
   }
   
   $fasilitas = $this->fasilitasDao->fetchAllFasilitas();

   include_once 'view/fasilitas-view.php';
  }
}
?>