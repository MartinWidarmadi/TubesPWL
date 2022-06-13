<?php
class FasilitasController
{
  public function __construct()
  {
    $this->fasilitasDao = new FasilitasDaoImpl();
  }

  public function index()
  {
    $btnSubmit = filter_input(INPUT_POST, 'btnSubmit');
    if (isset($btnSubmit)) {
      $nama = filter_input(INPUT_POST, 'txtNama');
      $keterangan = filter_input(INPUT_POST, 'txtKeterangan');
      $trimNama = trim($nama);
      $trimKeterangan = trim($keterangan);


      if (empty($trimNama) || empty($trimKeterangan)) {
        echo "<div class='bg-danger py-2'> Please fill all the inputs!</div>";
      } else {
        $fasilitasObj = new Fasilitas();
        $fasilitasObj->setNama($trimNama);
        $fasilitasObj->setKeterangan($trimKeterangan);

        $result = $this->fasilitasDao->addFasilitas($fasilitasObj);
      }
    }

    $fasilitas = $this->fasilitasDao->fetchAllFasilitas();

    include_once 'view/fasilitas-view.php';
  }
}
