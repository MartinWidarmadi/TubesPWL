<?php 

class KostController 
{
   private $kostDao;
   private $fasilitasKostDao;
   private $fasilitasDao;

   public function __construct()
   {
      $this->kostDao = new KostDaoImpl();
      $this->fasilitasKostDao = new FasilitasKostDaoImpl();
      $this->fasilitasDao = new FasilitasDaoImpl();
   }

   public function index() {
      $kosts = $this->kostDao->fetchAllKost();

      include_once 'view/kost-view.php';
   }


   public function detailIndex() {
      $delKost = filter_input(INPUT_GET, 'delcom');
      if (isset($delKost) && $delKost == 1) {
         $kostId = filter_input(INPUT_GET, 'did');
         $result = $this->kostDao->deleteKost($kostId);

         // if ($result) {
         //    echo "<script>alert('Kost berhasil dihapus!');</script>";
         // } else {
         //    echo "<script>alert('Error saat menghapus kost!');</script>";
         // }
      }

      // Fetch One Detail
      $kostId = filter_input(INPUT_GET, 'did');
      if (isset($kostId) && $kostId != '') {
         $fasilitasKost = $this->fasilitasKostDao->fetchFasilitasKost($kostId);
         $kost = $this->kostDao->fetchKost($kostId);
      }
      
      include_once 'view/kost-detail-view.php';
   }
   
   public function addIndex() {

      $submitPressed = filter_input(INPUT_POST, 'btnSubmit');

      if (isset($submitPressed)) {
         $id = filter_input(INPUT_POST, 'idKost');
         $nama = filter_input(INPUT_POST, 'txtKostName');
         $trimNama = trim($nama);
         $alamat = filter_input(INPUT_POST, 'txtAlamat');
         $trimAlamat = trim($alamat);
         $kecamatan = filter_input(INPUT_POST, 'txtKecamatan');
         $trimKecamatan = trim($kecamatan);
         $harga = filter_input(INPUT_POST, 'txtHarga');
         $keterangan = filter_input(INPUT_POST, 'txtKeterangan');
         $trimKeterangan = trim($keterangan);

         if (empty($trimNama) || empty($trimAlamat) || empty($trimKecamatan) || empty($trimKeterangan)) {
            echo "<div class='bg-danger py-2'> Please fill all the inputs!</div>";
         } else {
            $kost = new Kost();
            $kost->setId($id);
            $kost->setNama($trimNama);
            $kost->setAlamat($trimAlamat);
            $kost->setKecamatan($trimKecamatan);
            $kost->setHarga($harga);
            $kost->setKeterangan($trimKecamatan);

            if (isset($_FILES['fileGambar']['name']) && $_FILES['fileGambar']['name'] != '') {
               $directory = 'uploads/';
               $fileExtension = pathinfo($_FILES['fileGambar']['name'], PATHINFO_EXTENSION);
               $newFileName = "$id.$fileExtension";
               $targetFile = "$directory/$newFileName";
               if ($_FILES['fileGambar']['size'] > 1024 * 2048) {
                  echo "<div class='bg-danger py-2'>Upload error. File size exceed 2MB</div>";
                  $result = $this->kostDao->addKost($kost);
               } else {
                  move_uploaded_file($_FILES['fileGambar']['tmp_name'], $targetFile);
                  $kost->setGambar($newFileName);
                  $result = $this->kostDao->addKost($kost);
               }
            } else {
               $result = $this->kostDao->addKost($kost);
            }

            if(isset($_POST['fasilitas'])) {
               foreach($_POST['fasilitas'] as $item) {
                  $fasilitasObj = new Fasilitas();
                  $fasilitasObj->setId($item);
                  $this->fasilitasKostDao->addFasilitasKost($kost, $fasilitasObj);
               };
            }


            if ($result) {
               echo "<div class='bg-success py-2'>Data successfully added</div>";
            } else {
               echo "<div class='bg-danger py-2'>Error on add data</div>";
            }
         }
      }

      $lastKost = $this->kostDao->fetchLastKost();
      $fasilitas = $this->fasilitasDao->fetchAllFasilitas();

      include_once 'view/kost-add-view.php';
   }

   public function updateIndex() {
      $kostId = filter_input(INPUT_GET, 'did');
      if (isset($kostId) && $kostId != '') {
         $fasilitasKost = $this->fasilitasKostDao->fetchFasilitasKost($kostId);
         $kost = $this->kostDao->fetchKost($kostId);
      }

      if (isset($submitPressed)) {
         $id = filter_input(INPUT_POST, 'idKost');
         $nama = filter_input(INPUT_POST, 'txtKostName');
         $trimNama = trim($nama);
         $alamat = filter_input(INPUT_POST, 'txtAlamat');
         $trimAlamat = trim($alamat);
         $kecamatan = filter_input(INPUT_POST, 'txtKecamatan');
         $trimKecamatan = trim($kecamatan);
         $harga = filter_input(INPUT_POST, 'txtHarga');
         $keterangan = filter_input(INPUT_POST, 'txtKeterangan');
         $trimKeterangan = trim($keterangan);

         if (empty($trimNama) || empty($trimAlamat) || empty($trimKecamatan) || empty($trimKeterangan)) {
            echo "<div class='bg-danger py-2'> Please fill all the inputs!</div>";
         } else {
            $kost2 = new Kost();
            $kost2->setId($id);
            $kost2->setNama($trimNama);
            $kost2->setAlamat($trimAlamat);
            $kost2->setKecamatan($trimKecamatan);
            $kost2->setHarga($harga);
            $kost2->setKeterangan($trimKecamatan);

            if (isset($_FILES['fileGambar']['name']) && $_FILES['fileGambar']['name'] != '') {
               $directory = 'uploads/';
               $fileExtension = pathinfo($_FILES['fileGambar']['name'], PATHINFO_EXTENSION);
               $newFileName = "$id.$fileExtension";
               $targetFile = "$directory/$newFileName";
               if ($_FILES['fileGambar']['size'] > 1024 * 2048) {
                  echo "<div class='bg-danger py-2'>Upload error. File size exceed 2MB</div>";
                  $kost2->setGambar($kost->getGambar());
                  $result = $this->kostDao->addKost($kost2);
               } else {
                  move_uploaded_file($_FILES['fileGambar']['tmp_name'], $targetFile);
                  $kost2->setGambar($newFileName);
                  $result = $this->kostDao->addKost($kost2);
               }
            } else {
               $result = $this->kostDao->addKost($kost2);
            }

            if(isset($_POST['fasilitas'])) {
               foreach($_POST['fasilitas'] as $item) {
                  $fasilitasObj = new Fasilitas();
                  $fasilitasObj->setId($item);
                  $this->fasilitasKostDao->addFasilitasKost($kost2, $fasilitasObj);
               };
            }


            if ($result) {
               echo "<div class='bg-success py-2'>Data successfully updated</div>";
            } else {
               echo "<div class='bg-danger py-2'>Error on update data</div>";
            }
         }
      }

      $lastKost = $this->kostDao->fetchLastKost();
      $fasilitas = $this->fasilitasDao->fetchAllFasilitas();

      include_once 'view/kost-add-view.php';
   }
}