<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:../login/login.php");
    exit;
}
require "function/functions.php";

$album = query("SELECT * FROM tb_album");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets-selawi/logo-selawi.jpeg">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets-selawi/logo-selawi.jpeg">

    <title>Album</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        nav li a {
            color: white;
            text-decoration: none;
        }

        nav li a:hover {
            color: white;
            text-decoration: none;
        }


        <?php
        require_once "../sidebar/sidebar.css";
        ?>

        .logo {
            margin-top: 20px;
            height: 100px;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button a:hover {
            color: white;
            text-decoration: none;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require_once "../sidebar/sidebar.php" ?>

            <div class="col-md-10 col-lg-10 mt-4">
                <h3 class="text-center mb-3">Daftar Album</h3>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Hapus</th>
                            <th>Nama Album</th>
                            <th class="text-center">Galeri</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($album as $row): ?>
                            <tr>
                                <td class="text-center">
                                    <?= $i ?>
                                </td>
                                <td class="text-center"><button type="button" class="btn btn-danger"><a
                                            href="crud/hapus.php?id_album=<?= $row['id_album'] ?>">Hapus</a></button>
                                    <button type="button" class="btn btn-primary"><a
                                            href="crud/ubah.php?id_album=<?= $row['id_album'] ?>">Ubah</a></button>
                                </td>
                                <td>
                                    <?= $row['album'] ?>
                                </td>
                                <td class="text-center"><a href="../galeri/index.php?id_album=<?= $row['id_album'] ?>">Lihat Galeri</a></td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col text-center">
                        <button type="button" class="btn btn-primary">
                            <a href="crud/tambah.php">Tambah Album</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; Copyright 2023 BPP Selaawi Kabupaten Garut</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>