<?php
session_start();

include_once 'controller/UserController.php';
include_once 'controller/KostController.php';
include_once 'controller/FasilitasController.php';
include_once 'controller/PemesananController.php';
include_once 'dao/UserDaoImpl.php';
include_once 'dao/DetailPemesananDaoImpl.php';
include_once 'dao/FasilitasDaoImpl.php';
include_once 'dao/FasilitasKostDaoImpl.php';
include_once 'dao/KostDaoImpl.php';
include_once 'dao/PemesananDaoImpl.php';
include_once 'entity/DetailPemesanan.php';
include_once 'entity/Fasilitas.php';
include_once 'entity/FasilitasKost.php';
include_once 'entity/Kost.php';
include_once 'entity/Pemesanan.php';
include_once 'entity/User.php';
include_once 'util/PDOUtil.php';


if (!isset($_SESSION['is_logged'])) {
    $_SESSION['is_logged'] = false;
    $_SESSION['role'] = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>cariKost</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- <link href="css/login.scss" rel="stylesheet" /> -->
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">cariKost</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="?menu=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="?menu=kost">Kost</a></li>
                    <?php
                    if ($_SESSION['role'] == 'admin') :
                    ?>
                        <li class="nav-item"><a class="nav-link" href="?menu=fasilitas">Fasilitas</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link" href="?menu=pemesanan">Pemesanan</a></li>
                    <?php
                    if ($_SESSION['is_logged']) :
                    ?>
                        <li class="nav-item"><a class="nav-link" href="?menu=logout">Logout</a></li>
                    <?php
                    else :
                    ?>
                        <li class="nav-item"><a class="nav-link" href="?menu=login">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    $menu = filter_input(INPUT_GET, 'menu');

    switch ($menu) {
        case 'home':
            include_once 'view/home-view.php';
            break;
        case 'kost':
            $kostController = new KostController();
            $kostController->index();
            break;
        case 'kostdetail':
            $kostController = new KostController();
            $kostController->detailIndex();
            break;
        case 'addkost':
            $kostController = new KostController();
            $kostController->addIndex();
            break;
        case 'fasilitas':
            $fasilitasController = new FasilitasController();
            $fasilitasController->index();
            break;
        case 'pemesanan':
            $pemesananController = new PemesananController();
            $pemesananController->index();
            break;
        case 'logout':
            $userController = new UserController();
            $userController->logout();
            break;
        case 'login':
            $userController = new UserController();
            $userController->index();
            break;
        case 'signup':
            $userController = new UserController();
            $userController->signUp();
            break;
        case 'addkost':
            $kostController = new KostController();
            $kostController->addIndex();
            break;
        case 'editkost':
            $kostController = new KostController();
            $kostController->updateIndex();
            break;
        default:
            include_once 'view/home-view.php';
            break;
    }
    ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>