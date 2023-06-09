<?php
$baseurl = "http://localhost/abdimas/admin/";
$baseurlLogo = "http://localhost/abdimas/assets-selawi/logoKabupatenGarutBRU.PNG";
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$active = $uriSegments[3];
// print_r($uriSegments);
// exit;

?>
<nav class="col-md-2 col-lg-2 bg-dark">
    <div class="sidebar-sticky">
        <center>
            <img class="logo mb-4" src="<?=$baseurlLogo;?>" alt="Logo">
        </center>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php if ($active == "index.php") echo "active"?>" href="<?=$baseurl;?>index.php">
                    <i class="bi bi-house-door"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($active == "kelompok_tani") echo "active"?>" href="<?=$baseurl;?>kelompok_tani/index.php">
                    <i class="bi bi-people"></i> Lihat Kelompok Tani
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($active == "desa") echo "active"?>" href="<?=$baseurl;?>desa/index.php">
                    <i class="bi bi-geo-alt"></i> Lihat Desa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($active == "informasi") echo "active"?>" href="<?=$baseurl;?>informasi/index.php">
                    <i class="bi bi-box-arrow-right"></i> Informasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($active == "program") echo "active"?>" href="<?=$baseurl;?>program/index.php">
                    <i class="bi bi-box-arrow-right"></i> Program
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($active == "album") echo "active"?>" href="<?=$baseurl;?>album/index.php">
                    <i class="bi bi-box-arrow-right"></i> Album
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=$baseurl;?>login/logout.php">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</nav>