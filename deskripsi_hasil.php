<?php
require "admin/function/functions_indel.php";

// echo $id;

$jenis_komoditi = $_GET['komoditi'];
$id_kom = $_GET['id'];

// Pagination
$jumlahDataPerHalaman = 5; 
$jumlahData = count(query("SELECT tb_hasiltani.*, IFNULL(SUM(tb_detil_hasiltani.jml_tani), 0) AS jumlah
                            FROM tb_hasiltani
                            LEFT JOIN tb_detil_hasiltani ON tb_hasiltani.id_hsl = tb_detil_hasiltani.id_hsl
                            WHERE tb_hasiltani.id_kom = $id_kom
                            GROUP BY tb_hasiltani.id_hsl"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


// $hasil_tani = query("SELECT * FROM tb_hasiltani WHERE id_kom=$id_kom");
$hasil_tani = query("SELECT tb_hasiltani.*, IFNULL(SUM(tb_detil_hasiltani.jml_tani), 0) AS jumlah
                        FROM tb_hasiltani
                        LEFT JOIN tb_detil_hasiltani ON tb_hasiltani.id_hsl = tb_detil_hasiltani.id_hsl
                        WHERE tb_hasiltani.id_kom = $id_kom
                        GROUP BY tb_hasiltani.id_hsl 
                        ORDER BY tb_hasiltani.tanggal DESC
                        LIMIT $awalData, $jumlahDataPerHalaman");


// konten 2
// $kel_tani = query("SELECT * FROM tb_keltani WHERE id_kom = $id_kom");
// var_dump($kel_tani);
// exit;

// SELECT k.id_kom, h.id_hsl, k.jenis_kom, k.des_kom, k.gambar, h.jumlah, h.satuan, h.tanggal FROM tb_komoditas AS k INNER JOIN tb_hasiltani AS h ON h.id_kom = k.id_kom;
// $komoditas = query("SELECT * FROM tb_komoditas");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Tani BPP Selaawi</title>
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

    <!-- jquery -->


    <!-- end jquery -->
    <link rel="stylesheet" href="assets/css/style.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.6.2/flatly/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/js/jquery-template/src/s8CyrcleInfoBox.css" media="screen" charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="assets/js/jquery-template/src/s8CyrcleInfoBox.js" type="text/javascript"></script>
    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/main.css">

    <style>
        .site-footer::before{
            z-index: 0;
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
                <ul class="main-menu__list">
                    <li>
                        <a href="index.html">Beranda</a>
                    </li>
                    <li>
                        <a href="about.html">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="projects.html">Program</a>
                    </li>
                    <li>
                        <a href="blog.html">Informasi</a>
                    </li>
                    <li>
                        <a href="gallery.html">Galeri</a>
                    </li>

                    <li>
                        <a href="hasil_tani.php">Hasil Tani</a>
                    </li>

                    <li>
                        <a href="contact.html">Hubungi Kami</a>
                    </li>
                </ul>
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
                <li><span>Hasil Tani</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
            <h2>Hasil Tani</h2>
        </div><!-- /.container -->
    </section><!-- /.page-header -->
        <!-- judul -->
        <h3 class="text-center mt-5">Hasil Tani Komoditas <?=$jenis_komoditi?></h3>
        <!-- judul -->

        <!-- Konten 1 -->
        <!-- Jumlah, Satuan, Tanggal -->
        <div class="container my-5">
    <div class="table-responsive">
        <table class="table table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Tanggal Panen</th>
                    <th scope="col" class="text-center">Jumlah Hasil Tani</th>
                    <th scope="col" class="text-center">Satuan</th>
                </tr>
            </thead>
            <tbody>
                <input type="hidden" id="komoditi" value="<?=$jenis_komoditi?>">
                <input type="hidden" id="id_kom" value="<?=$id_kom?>">
                <?php $i=1?>
                <?php foreach ($hasil_tani as $row) :?>
                <tr class="id_hsl" style="cursor: pointer;">
                    <input type="hidden" class="id_hasil" value=<?=$row['id_hsl']?>>
                    <input type="hidden" class="satuan" value=<?=$row['satuan']?>>
                    <th scope="row" class="text-center"><?=$i?></th>
                    <td><?=date('d F Y', strtotime($row['tanggal']))?></td>
                    <td class="text-center"><?=$row['jumlah']?></td>
                    <td class="text-center"><?=$row['satuan']?></td>
                </tr>    
                <?php $i++?>
                <?php endforeach;?>
            </tbody>
        </table>
        <!-- Awal Pagination -->
        <?php if ($jumlahHalaman > 1) : ?>
            <div class="d-flex justify-content-between">
                <div class="pagination">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <?php if ($halamanAktif > 1) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>&komoditi=<?= $jenis_komoditi ?>&id=<?= $id_kom ?>">&laquo;</a>
                                </li>
                            <?php endif; ?>
                            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                <?php if ($i == $halamanAktif) : ?>
                                    <li class="page-item active">
                                        <a class="page-link" style="z-index:1;" href="?halaman=<?= $i ?>&komoditi=<?= $jenis_komoditi ?>&id=<?= $id_kom ?>"><?= $i ?></a>
                                    </li>
                                <?php else : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?halaman=<?= $i ?>&komoditi=<?= $jenis_komoditi ?>&id=<?= $id_kom ?>"><?= $i ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <?php if ($halamanAktif < $jumlahHalaman) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>&komoditi=<?= $jenis_komoditi ?>&id=<?= $id_kom ?>">&raquo;</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <div class="caption text-center">
                    <caption>Tabel Hasil Tani</caption>
                </div>
            </div>
            <br>
        <?php endif; ?>
        <!-- Akhir Pagination -->
    </div>
</div>

        

        <!-- End Konten 1 -->

        <!-- Konten 2 -->
        <!-- untuk tabel 2 -->
        <div class="container mb-5" id="konten2">
            
        </div>
        <!-- Nama Kelompok, Nomor wa kelom -->

        <!-- Konten -->
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

    <!-- jquery-template -->
    <script>
        $(".circle2").s8CircleInfoBox({
            autoSlide: false,
            action: "click"
        })
    </script>
    <!-- jquery-template -->

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

    <!-- ajax konten2 -->
    <script src="assets/js/script.js"></script>
</body>

</html>