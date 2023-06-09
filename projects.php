<?php
require "admin/program/function/functions.php";
$program = query("SELECT * FROM tb_program ORDER BY id_prog DESC");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program BPP Selaawi</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets-selawi/LogoKabupatenGarut.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="assets-selawi/LogoKabupatenGarut.jpg">
    <link rel="manifest" href="assets/images/favicons/site.webmanifest">
    <meta name="description" content="Agrikon HTML Template For Agriculture Farm & Farmers">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/odometer.min.css">
    <link rel="stylesheet" href="assets/css/jarallax.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/agrikon-icons.css">
    <link rel="stylesheet" href="assets/css/nouislider.min.css">
    <link rel="stylesheet" href="assets/css/nouislider.pips.css">

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/main.css">

    <style>
        .projects-one__single img{
            height: 300px; /* Sesuaikan tinggi gambar */
            object-fit: cover;
        }
    </style>
    


</head>

<body>
    <div class="preloader">
        <img class="preloader__image" width="55" src="assets-selawi/LogoBPPSelaawi.png" alt="">
    </div><!-- /.preloader -->
    <div class="page-wrapper">
    
    <!-- AWAL NAVBAR - REVISI - sudah revisi-->
        <header class="main-header">
            <div class="topbar">
                <div class="container">
                    <div class="topbar__left">
                        <div class="topbar__social">
                            <a href="#" class="fab fa-facebook-square"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-instagram"></a>
                        </div><!-- /.topbar__social -->
                        <p>Selamat Datang di Website BPP Selaawi</p>
                    </div><!-- /.topbar__left -->
                    <div class="topbar__right">
                        <a href="#"><i class="agrikon-icon-email"></i>bp3kselaawi.garut@gmail.com</a>
                        <a href="#"><i class="agrikon-icon-clock"></i>Senin - Jum'at 8:00 - 16:30, Sabtu-Minggu TUTUP</a>
                    </div><!-- /.topbar__right -->
                </div><!-- /.container -->
            </div><!-- /.topbar -->
            <nav class="main-menu">
                <div class="container">
                    <div class="logo-box">
                        <a href="index.html" aria-label="logo image"><img src="assets-selawi/LogoKabupatenGarut.jpg" width="100" alt=""></a>
                        <span class="fa fa-bars mobile-nav__toggler"></span>
                    </div><!-- /.logo-box -->
                    <?php
                    require_once "header.php";
                    ?>
                </div><!-- /.container -->
            </nav>
            <!-- /.main-menu -->
        </header><!-- /.main-header -->


        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Beranda</a></li>
                    <li>/</li>
                    <li><span>Program</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
                <h2>Program</h2>
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <div class="projects-one">
            <div class="container">
                <div class="row">
                    <?php foreach ($program as $row) :?>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="projects-one__single">
                                <img src="admin/program/assets/img/<?=$row['gmbr_prog']?>" alt="">
                                <div class="projects-one__content">
                                    <h3><?=$row['jud_prog']?></h3>
                                    <a href="project-details.php?id_prog=<?=$row['id_prog']?>" class="projects-one__button"><i class="agrikon-icon-right-arrow"></i></a><!-- /.projects-one__button -->
                                </div><!-- /.projects-one__content -->
                            </div><!-- /.projects-one__single -->
                        </div><!-- /.col-sm-12 -->
                    <?php endforeach;?>
                    <!-- /.col-sm-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.projects-one -->


        <footer class="site-footer">
            <img src="assets/images/icons/footer-bg-icon-1.png" class="site-footer__shape-1" alt="">
            <img src="assets/images/icons/footer-bg-icon-2.png" class="site-footer__shape-2" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="footer-widget">
                            <div class="logo-flutter" style="text-align: center;">
                                <a href="index.html" class="footer-widget__Logo" style="text-align: center;">
                                    <img src="assets-selawi/LogoBPPSelaawi.png" width="153" alt="">
                                </a>
                                <center>
                                    <p>Badan Penyuluhan Pertanian (BPP) Selaawi Kabupaten Garut</p>
                                </center>
                            </div>
                            <br>
                            <div class="footer__social">
                                <a href="#" class="fab fa-facebook-square"></a>
                                <a href="#" class="fab fa-twitter"></a>
                                <a href="#" class="fab fa-instagram"></a>
                                <a href="#" class="fab fa-youtube"></a>
                            </div><!-- /.topbar__social -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-sm-12 col-md-6 col-lg-4 -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="footer-widget">
                            <h3 class="footer-widget__title">Postingan Terakhir</h3><!-- /.footer-widget__title -->
                            <ul class="list-unstyled footer-widget__post">
                                <li>
                                    <!-- <img src="assets/images/resources/footer-post-1.png" alt=""> -->
                                    <div class="footer-widget__post-content">
                                        <span>Dec 4, 2022</span>
                                        <h4><a href="blog-details.html">Macam-Macam Teknik Menanam Padi</a></h4>
                                    </div><!-- /.footer-widget__post-content -->
                                </li>
                                <li>
                                    <img src="assets/images/resources/footer-post-2.png" alt="">
                                    <div class="footer-widget__post-content">
                                        <span>Nov 16, 2020</span>
                                        <h4><a href="blog-details.html">How to grow vagetables in the forms</a></h4>
                                    </div><!-- /.footer-widget__post-content -->
                                </li>
                            </ul><!-- /.list-unstyled footer-widget__post -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-sm-12 col-md-6 col-lg-3 -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <h3 class="footer-widget__title">Contact</h3><!-- /.footer-widget__title -->
                        <ul class="list-unstyled footer-widget__contact">
                            <li>
                                <i class="fab fa-whatsapp"></i>
                                <a href="tel:666-888-0000">62 8522 1421 812</a>
                            </li>
                            <li>
                                <i class="agrikon-icon-telephone"></i>
                                <a href="tel:666-888-0000">62 8522 1421 812</a>
                            </li>
                            <li>
                                <i class="agrikon-icon-email"></i>
                                <a href="mailto:needhelp@company.com">bp3kselaawi.garut@gmail.com</a>
                            </li>
                            <li>
                                <i class="agrikon-icon-pin"></i>
                                <a href="https://www.google.com/maps/place/7%C2%B000'42.4%22S+108%C2%B001'02.1%22E/@-7.0117872,108.0150562,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xb0b7975c6680d50b!8m2!3d-7.0117872!4d108.0172449?hl=en">Kamp. Citajun Ds.Putrajawa, Kec.Selaawi</a>
                            </li>
                        </ul><!-- /.list-unstyled -->
                    </div><!-- /.col-sm-12 col-md-6 col-lg-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </footer><!-- /.site-footer -->
        <div class="bottom-footer">
            <div class="container">
                <p>© Copyright 2023</p>
            </div><!-- /.container -->
        </div><!-- /.bottom-footer -->

    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper"> 
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="far fa-times"></i></span>

            <div class="logo-box">
                <center>
                    <a href="index.html" aria-label="logo image"><img src="assets-selawi/LogoKabupatenGarutBRU.png" width="90" alt="" /></a>
                </center>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="agrikon-icon-email"></i>
                    <a href="bp3kselaawi.garut@gmail.com">bp3kselaawi.garut@gmail.com</a>
                </li>
                <li>
                    <i class="agrikon-icon-telephone"></i>
                    <a href="https://wa.me/6285221421812?text=Halo">62 8522 1421 812</a>
                     
                </li>
            </ul><!-- /.mobile-nav__contact -->

        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/swiper.min.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/odometer.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    <script src="assets/js/jarallax.min.js"></script>
    <script src="assets/js/circle-progress.min.js"></script>
    <script src="assets/js/wNumb.min.js"></script>
    <script src="assets/js/nouislider.min.js"></script>

    <!-- template js -->
    <script src="assets/js/theme.js"></script>
</body>

</html>