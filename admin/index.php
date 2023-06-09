<!-- php -->
<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location:login/login.php");
	exit;
}

require 'function/functions_indel.php';
$komoditas = query('SELECT * FROM tb_komoditas ORDER BY id_kom DESC');


// LOGIC TOMBOL CARI
if (isset($_POST['cari'])) {
    $komoditas = cari($_POST['keyword']);
    // var_dump($_POST['keyword']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets-selawi/logo-selawi.jpeg">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets-selawi/logo-selawi.jpeg">

  <!-- bootstrap -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

  <title>Halaman Admin</title>

  <style>
    .table thead th {
      vertical-align: middle;
    }

    a {
      color: white;
      text-decoration: none;
    }

    a:hover {
      color: white;
      text-decoration: none;
    }

    button {
      min-width: 100px;
    }

    .sidebar-sticky {
      margin-top: 20px;
    }

    .nav-link.active {
      background-color: rgba(0, 0, 0, 0.15) !important;
    }

    .nav-link {
      padding: 10px 16px;
    }

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
</head>

<body>
  <div class="container-fluid mb-5">
    <div class="row">
      <?php require_once "sidebar/sidebar.php";?>
      <main role="main" class="col-md-10 col-lg-10 ml-sm-auto px-4">
        <p class="my-5 text-center h3">Hasil Tani dan Komoditas</p>

        <!-- Metode pencarian komoditas -->
        <form action="" method="post" class="form-inline mb-3">
          <input class="form-control mr-sm-2" type="search" name="keyword" size="25" autofocus
            placeholder="Cari Jenis Komoditas" autocomplete="off">
          <button type="submit" name="cari" class="btn btn-secondary">Cari</button>
        </form>

        <div class="table-responsive-lg">
          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Edit</th>
                <th scope="col">Gambar</th>
                <th scope="col">Jenis Komoditas</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Lihat hasil Tani</th>
              </tr>
            </thead>
            <!-- Mengambil data hasil tani dan komoditas -->
            <tbody>
              <?php $i=1?>
              <?php foreach ($komoditas as $row) :?>
              <tr>
                <th scope="row"><?=$i?></th>
                <td>
                  <button type="button" class="btn btn-primary mt-0 mb-3"><a
                      href="crud/ubah.php?id=<?=$row['id_kom']?>"
                      onclick="return confirm('Yakin akan mengubah?')">Ubah</a></button>
                  <button type="button" class="btn btn-danger"><a href="crud/hapus.php?id=<?=$row['id_kom']?>"
                      onclick="return confirm('Yakin akan menghapus?')">Hapus</a></button>
                </td>
                <td><img class="rounded" src="asset/img_komo/<?=$row['gambar']?>" alt="" style="width:100px"></td>
                <td>
                  <p><?=$row['jenis_kom']?></p>
                </td>
                <td>
                  <p class="text-justify"><?=$row['des_kom']?></p>
                </td>
                <td><button type="button" class="btn btn-primary"><a
                      href="hasil_tani/index.php?komoditi=<?=$row['jenis_kom']?>&id=<?=$row['id_kom']?>">lihat hasil
                      tani</a></button>
                </td>
              </tr>
              <?php $i++?>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>

        <div class="text-center mt-5">
          <button type="button" class="btn btn-primary"><a href="crud/tambah.php">Tambah Komoditas</a></button>
        </div>
      </main>
    </div>
  </div>

  <footer>
    <p>&copy; Copyright 2023 BPP Selaawi Kabupaten Garut</p>
  </footer>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
