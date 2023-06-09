<?php
require "admin/informasi/function/functions.php";
$informasi = query("SELECT * FROM tb_informasi ORDER BY id_inf DESC LIMIT 3");
$program = query("SELECT * FROM tb_program ORDER BY id_prog DESC LIMIT 2")

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama BPP Selaawi</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets-selawi/LogoKabupatenGarut.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="assets-selawi/LogoKabupatenGarut.jpg">
    <link rel="manifest" href="assets/images/favicons/site.webmanifest">
    <meta name="description" content="Halaman Utama BPP Selaawi">

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
        .service-one__box img{
            height: 300px;
            object-fit: cover;
        }
        .blog-card__content{
            min-height: 300px;
        }
        .blog-card__image img{
            height: 200px;
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
                    <?php require_once "header.php"?>
                </div><!-- /.container -->
            </nav>
            <!-- /.main-menu -->
        </header><!-- /.main-header -->

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <section class="main-slider">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{
        "slidesPerView": 1,
        "loop": true,
        "effect": "fade",
        "autoplay": {
            "delay": 5000
        },
        "navigation": {
            "nextEl": "#main-slider__swiper-button-next",
            "prevEl": "#main-slider__swiper-button-prev"
        }
    }'>

    <!-- AKHIR NAVBAR - REVISI - (sudah revisi)-->
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url(assets/images/main-slider/main-slider-1-1.jpg);">
                        </div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-7" style="margin-top: -20px;">
                                    <span class="tagline">Balai Penyuluhan Pertanian (BPP)</span>
                                    <h2><span>Selaawi - </span> <br>
                                        Kabupaten Garut -</h2>
                                    <p>Laman resmi BPP Selaawi, Kabupaten Garut, Jawa Barat.</p>
                                    <a href="#" class=" thm-btn">Lebih Lanjut</a>
                                    <!-- /.thm-btn dynamic-radius -->
                                </div><!-- /.col-lg-7 text-right -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url(assets/images/main-slider/main-slider-1-2.jpg);">
                        </div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-7">
                                    <span class="tagline">Balai Penyuluhan Pertanian (BPP)</span>
                                    <h2><span>Selaawi - </span><br>
                                        Kabupaten Garut -</h2>
                                    <p>Laman resmi BPP Selaawi, Kabupaten Garut, Jawa Barat.</p>
                                    <a href="#" class=" thm-btn">Lebih Lanjut</a>
                                    <!-- /.thm-btn dynamic-radius -->
                                </div><!-- /.col-lg-7 text-right -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.swiper-slide -->
                </div><!-- /.swiper-wrapper -->

                <!-- If we need navigation buttons -->
                <div class="main-slider__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next"><i class="agrikon-icon-left-arrow"></i>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev"><i class="agrikon-icon-right-arrow"></i></div>
                </div><!-- /.main-slider__nav -->

            </div><!-- /.swiper-container thm-swiper__slider -->
        </section><!-- /.main-slider -->

        <section class="service-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-4 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="service-one__box">
                            <img src="assets/images/services/service-1-1.jpg" alt="">
                            <div class="service-one__box-content">
                                <h3><a href="dimana.php">Dimanakah Selaawi?</a></h3>
                            </div><!-- /.service-one__box-content -->
                        </div><!-- /.service-one__box -->
                    </div><!-- /.col-md-12 col-lg-4 -->
                    <?php foreach ($program as $row): ?>
                    <div class="col-md-12 col-lg-4 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="service-one__box">
                            <img src="admin/program/assets/img/<?=$row['gmbr_prog']?>" alt="">
                            <div class="service-one__box-content">
                                <h3><a href="informasi/program_detail.php?id_prog=<?=$row['id_prog']?>"><?=$row['jud_prog']?></a></h3>
                            </div><!-- /.service-one__box-content -->
                        </div><!-- /.service-one__box -->
                    </div><!-- /.col-md-12 col-lg-4 -->
                    <?php endforeach; ?>
                    
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.service-one -->

        <section class="about-one">
            <img src="assets/images/icons/about-bg-icon-1-1.png" class="about-one__bg-shape-1" alt="">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="about-one__content mt-0 pt-0">
                            <div class="block-title text-left">
                                <h3 style="font-size: 46px;">Tujuan BPP Selaawi</h3>
                            </div><!-- /.block-title -->
                            <div class="about-one__tagline">
                                <p>Dalam rangka mewujudkan upaya percepatan peningkatan kapasitas dan kualitas masyarakat tani</p>
                            </div><!-- /.about-one__tagline -->
                            <div class="about-one__summery">
                                <ol>
                                    <li>
                                        <p>Meningkatnya layanan dan mutu serta profesional tenaga penyuluh yang ditunjang dengan sarana memadai, agar dapat melaksanakan tupoksinya dalam membangun pertanian yang berkelanjutan.</p>
                                    </li>
                                    <li>
                                        <p>Pelaksanaan jalinan kemitraan dalam rangka pengembangan pertanian pada kelompok tani se Kecamatan Selaawi Kabupaten Garut.</p>
                                    </li>
                                    <li>
                                        <p>Terpenuhinya perangkat penyuluh pertanin.</p>
                                    </li>
                                    <li>
                                        <p>Peningkatan dan pengembangan program penyuluhan yang sesuai dengan standar yang telah ditetapkan.</p>
                                    </li>
                                    <li>
                                        <p>Terlaksananya manajemen penyuluhan melalui koordinasi dan konsultasi dengan pihak-pihak terkait dalam membentuk, dan membina jaringan kerjasama dalam meningkatkan layanan dan mutu kelompok tani.</p>
                                    </li>
                                    <li>
                                        <p>Dapat memanfaatkan seoptimal mungkin dan terawatnya fasilitas sarana prasarana pertanian, yang efesien dan efektif dalam menunjang proses kegiatan pembangunan pertanian berkelanjutan.</p>
                                    </li>
                                </ol>
                                
                            </div><!-- /.about-one__summery -->
                        </div><!-- /.about-one__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.about-one -->

        
        <section class="testimonials-one">
            
        </section><!-- /.testimonials-one -->

        <section class="gray-boxed-wrapper home-one__boxed">
            <div class="image" style="text-align: center; padding-top: 2rem;">
                <img src="assets/images/icons/home-1-blog-bg.png" alt="" class="home-one__boxed-bg" style="position: relative; width: 50%;">
            </div>
           
            <section class="blog-home-two blog-home-one" style="padding-top: 20px; ">
                <div class="container">
                    <div class="block-title text-center" style="max-width: none; margin-bottom: 2rem;">
                        <h3>Tulisan Terbaru</h3>
                    </div><!-- /.block-title -->
                    <div class="row">
                        <?php foreach ($informasi as $row): ?>
                        <div class="col-md-12 col-lg-4">
                            <div class="blog-card">
                                <div class="blog-card__image">
                                    <img src="admin/informasi/assets/img/<?=$row['gambar']?>">
                                    <a href="informasi/informasi_detail.php?id_inf=<?=$row['id_inf']?>"></a>
                                </div><!-- /.blog-card__image -->
                                <div class="blog-card__content">
                                    <div class="blog-card__date"><?=date('d F ', strtotime($row['tanggal_inf']))?></div><!-- /.blog-card__date -->
                                    <div class="blog-card__meta">
                                        <a href="informasi/informasi_detail.php?id_inf=<?=$row['id_inf']?>"><i class="far fa-user-circle"></i> Content Web BPP Selaawi</a>
                                        <!-- <a href="blog-details.html"><i class="far fa-comments"></i> 2 Comments</a> -->
                                    </div><!-- /.blog-card__meta -->
                                    <h3><a href="informasi/informasi_detail.php?id_inf=<?=$row['id_inf']?>"><?=$row['judul_inf']?></a></h3>
                                    <a href="informasi/informasi_detail.php?id_inf=<?=$row['id_inf']?>" class="thm-btn">Baca Selengkapnya</a><!-- /.thm-btn -->
                                </div><!-- /.blog-card__content -->
                            </div><!-- /.blog-card -->
                        </div><!-- /.col-md-12 col-lg-4 -->
                        <?php endforeach; ?>
                    <hr />
                </div><!-- /.container -->
            </section><!-- /.blog-home-two -->
            
        </section><!-- /.gray-boxed-wrapper -->
        
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
                                <a href="bp3kselaawi.garut@gmail.com">bp3kselaawi.garut@gmail.com</a>
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
                    <p class="">© Copyright 2023 </p>
                <!-- <div class="bottom-footer__links">
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Sitemap</a>
                </div>/.bottom-footer__links -->
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