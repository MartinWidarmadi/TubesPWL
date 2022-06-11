<?php 

class KostController 
{
   private $kostDao;
   private $fasilitasKostDao;

   public function __construct()
   {
      $this->kostDao = new KostDaoImpl();
      $this->fasilitasKostDao = new FasilitasKostDaoImpl();
   }

   public function index() {  
      $kosts = $this->kostDao->fetchAllKost();

      include_once 'view/kost-view.php';
   }

   public function detailIndex() {
      // Fetch One Detail
      $kostId = filter_input(INPUT_GET, 'did');
      if (isset($kostId) && $kostId != '') {
         $fasilitasKost = $this->fasilitasKostDao->fetchFasilitasKost($kostId);
         $kost = $this->kostDao->fetchKost($kostId);
      }
      var_dump($fasilitasKost[0]);
      // foreach($fasilitasKost as $fasilitas) {
      //    var_dump($fasilitas->getFasilitas()->getNama());
      // }
      // $kosts = $this->kostDao->fetchAllKost();
      
      include_once 'view/kost-detail-view.php';
   }
}