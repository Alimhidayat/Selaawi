<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:../login/login.php");
    exit;
}
require 'function/functions.php';

// var_dump($id);
$kel_tani = query("SELECT * FROM tb_keltani ORDER BY nama_kel ASC");

if (isset($_POST['cari'])) {
    $kel_tani = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets-selawi/logo-selawi.jpeg">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets-selawi/logo-selawi.jpeg">

    <!-- bootstrap -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

    <style>
        a {
            text-decoration: none;
            color: white;
        }

        a:hover {
            text-decoration: none;
            color: white;
        }

        <?php
        require_once "../sidebar/sidebar.css";
        ?>

        .logo {
            margin-top: 20px;
            height: 100px;
        }

        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }
    </style>

    <title>Kelompok Tani</title>
</head>

<body>
    <div class="container-fluid mb-5">
        <div class="row">
            <?php require_once "../sidebar/sidebar.php"; ?>
            <div class="col-md-10 col-lg-10">
                <div class="container">
                    <h2 class="text-center mt-5 mb-5">Kelompok Tani Komoditi Kecamatan Selaawi</h2>
                    <form action="" method="post" class="form-inline mb-3">
                        <input class="form-control mr-sm-2" type="search" name="keyword" size="25" autofocus
                            placeholder="Cari Kelompok Tani" autocomplete="off">
                        <button type="submit" name="cari" class="btn btn-secondary">Cari</button>
                    </form>

                    <div class="table-responsive-lg">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Edit</td>
                                    <th scope="col">Nama Kelompok</th>
                                    <th scope="col" class="text-center">No Whatsapp</th>
                                    <th scope="col" class="text-center">Link Chat</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kel_tani as $row): ?>
                                    <tr>
                                        <th scope="row" class="text-center">
                                            <?= $i ?>
                                        </th>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger">
                                                <a href="crud/hapus.php?id_kel=<?= $row['id_kel'] ?>&nama_kel=<?= $row['nama_kel'] ?>"
                                                    onclick="return confirm('Yakin akan hapus?')">Hapus</a>
                                            </button>
                                            <button type="button" class="btn btn-primary">
                                                <a href="crud/ubah.php?id_kel=<?= $row['id_kel'] ?>"
                                                    onclick="return confirm('Yakin akan mengubah?')">Ubah</a>
                                            </button>
                                        </td>
                                        <td>
                                            <?= $row['nama_kel'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['no_wa'] ?>
                                        </td>
                                        <td class="text-center"><button type="button" class="btn btn-success"><a
                                                    href="https://wa.me/+<?= $row['no_wa'] ?>">Chat</a></button></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary"><a href="crud/tambah.php">Tambah Kelompok</a>
                        </button>
                    </div>
                    <!-- <button type="button" class="btn btn-secondary"><a href="../index.php">Kembali</a></button> -->
                </div>

            </div>

        </div>

    </div>
    <footer>
        <p>&copy; Copyright 2023 BPP Selaawi Kabupaten Garut</p>
    </footer>

    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>