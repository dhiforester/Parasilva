<?php
    //Koneksi
    include "_Config/Connection.php";
    include "_Config/Session.php";
    include "_Config/setting_info.php";
    //menangkap Halaman
    if(empty($_GET['page'])){
        $Page="";
    }else{
        $Page=$_GET['page'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title><?php echo "$JudulWeb"; ?></title>
    <meta name="keywords" content="<?php echo "$KeywordWeb"; ?>">
    <meta name="description" content="<?php echo "$DeskripsiWeb"; ?>">
    <meta name="author" content="<?php echo "$PendiriWeb"; ?>">
    <link rel="stylesheet" href="Assets/css/custom.css">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="Assets/images/<?php echo "$FaviconWeb"; ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="Assets/images/<?php echo "$FaviconWeb"; ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="Assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="Assets/css/responsive.css">
    <!-- Custom CSS -->
    
    <link rel="stylesheet" href="Assets/fonts/font-awesome/css/font-awesome.css">
</head>

<body>

    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        
                    </div>
                    <div class="our-link">
                        <ul>
                            <!--- <li><a href="#">Login/Logout</a></li> --->
                            <li><a href="index.php">Beranda</a></li>
                            <li><a href="index.php?page=tentang">Tentang</a></li>
                            <li><a href="index.php?page=lokasi">Kontak & Lokasi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><img src="Assets/images/<?php echo "$HeaderLogoWeb"; ?>" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item <?php if(empty($Page)||$Page=="Beranda"){echo "active";} ?>"><a class="nav-link" href="index.php">Beranda</a></li>
                        <li class="nav-item <?php if($Page=="tentang"){echo "active";} ?>"><a class="nav-link" href="index.php?page=tentang">Tentang Kami</a></li>
                        <li class="nav-item <?php if($Page=="lokasi"){echo "active";} ?>"><a class="nav-link" href="index.php?page=lokasi">Kontak & Lokasi</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- 
                <div class="attr-nav">
                    <ul>
                        <li class="side-menu">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                 -->
            </div>
            <!-- Start Side Menu -->

            <!--
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="index.php">Beranda</a>
                        </li>
                        <li>
                            <a href="#">Produk</a>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">Login</a>
                            <a href="#" class="btn btn-default hvr-hover btn-cart">Daftar</a>
                        </li>
                        <li class="total">
                            
                        </li>
                    </ul>
                </li>
            </div>
            -->
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <?php
        include "_Partial/RoutingPage.php";
    ?>
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <?php
                            //Panggil data medsos
                            $query = mysqli_query($Conn, "SELECT*FROM setting_medsos ORDER BY id_setting_medsos DESC");
                            while ($data = mysqli_fetch_array($query)) {
                                $id_setting_medsos= $data['id_setting_medsos'];
                                $nama_medsos= $data['nama_medsos'];
                                $url_medsos= $data['url_medsos'];
                                $icon_medsos= $data['icon_medsos'];
                                echo '<a href="'.$url_medsos.'" alt="'.$nama_medsos.'">';
                                echo '  <img src="Assets/images/'.$icon_medsos.'" width="60px">';
                                echo '</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2020 <a href="index.php">Parasilva Technology</a> Design By :
            <a href="index.php">Solihul Hadi</a></p>
    </div>
    <!-- End copyright  -->

    <!-- <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a> -->

    <!-- ALL JS FILES -->
    <script src="Assets/js/jquery-3.2.1.min.js"></script>
    <script src="Assets/js/popper.min.js"></script>
    <script src="Assets/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="Assets/js/jquery.superslides.min.js"></script>
    <script src="Assets/js/bootstrap-select.js"></script>
    <script src="Assets/js/inewsticker.js"></script>
    <script src="Assets/js/bootsnav.js."></script>
    <script src="Assets/js/images-loded.min.js"></script>
    <script src="Assets/js/isotope.min.js"></script>
    <script src="Assets/js/owl.carousel.min.js"></script>
    <script src="Assets/js/custom.js"></script>
</body>

</html>