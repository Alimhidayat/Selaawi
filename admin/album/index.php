<?php
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
        .row {
            text-align: center;
        }

        .sidebar-sticky {
            margin-top: 20px;
        }

        .nav-link.active {
            background-color: rgba(0, 0, 0, 0.15) !important;
        }
        .nav-item a{
            color: white;
        }

        .nav-link {
            padding: 10px 16px;
            text-align: left;
        }

        .logo {
            margin-top: 20px;
            height: 100px;
        }
        button a{
            color: white;
            text-decoration: none;
        }
        button a:hover{
            color: white;
            text-decoration: none;
        }

        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php require_once "../sidebar/sidebar.php"?>

            <div class="col-md-10 col-lg-10">
                <h2>Daftar Album</h2>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Hapus</th>
                            <th>Nama Album</th>
                            <th>Galeri</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($album as $row) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><button type="button" class="btn btn-danger"><a href="crud/hapus.php?id_album=<?= $row['id_album'] ?>">Hapus</a></button>
                                    <button type="button" class="btn btn-primary"><a href="crud/ubah.php?id_album=<?= $row['id_album'] ?>">Ubah</a></button></td>
                                <td><?= $row['album'] ?></td>
                                <td><a href="../galeri/index.php?id_album=<?= $row['id_album'] ?>">Lihat Galeri</a></td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <br>
                <button type="button" class="btn btn-primary"><a href="crud/tambah.php">Tambah Album</a></button>
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
