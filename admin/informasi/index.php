<?php
require "function/functions.php";

$informasi = query("SELECT * FROM tb_informasi ORDER BY id_inf DESC");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="32x32" href="../../assets-selawi/logo-selawi.jpeg">
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets-selawi/logo-selawi.jpeg">
  <title>Bootstrap demo</title>
  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .row {
      /* margin-top: 40px; */
      text-align: center;
    }

    a {
      color: white;
      text-decoration: none;
    }
    a:hover{
      color: white;
      text-decoration: none;
    }

    .sidebar-sticky {
      margin-top: 20px;
    }

    .nav-link.active {
      background-color: rgba(0, 0, 0, 0.15) !important;
    }

    .nav-link {
      padding: 10px 16px;
      text-align: left;
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
  <div class="container-fluid">
    <div class="row">
      <?php require_once "../sidebar/sidebar.php";?>

      <div class="col-md-10 col-lg-10 ml-sm-auto px-4">
        <h1 class="text-center my-5">Halaman Informasi</h1>

        <div class="row">
          <div class="col-lg-10 offset-lg-1">
            <button type="button" class="btn btn-primary btn-lg"><a href="crud/tambah.php">Tambah Informasi</a></button>
          </div>
        </div>
        <center>
          <?php foreach ($informasi as $row): ?>
          <div class="row mt-5">
            <div class="col-lg-10 offset-lg-1">
              <div class="card" style="width: 900px;">
                <div class="card-header">
                  <h5 class="card-title"><?= $row['judul_inf'] ?></h5>
                </div>
                <div class="card-body">
                  <img src="assets/img/<?= $row['gambar'] ?>" alt="" style="width: 300px">
                  <div class="card-text mt-5" style="text-align: justify;">
                    <?= substr($row['konten_inf'], 0,600);  ?>
                  </div>
                  <br>
                  <a href="crud/ubah.php?id_inf=<?= $row['id_inf'] ?>" class="btn btn-primary">Ubah Artikel</a>
                  <a href="crud/hapus.php?id_inf=<?= $row['id_inf'] ?>" class="btn btn-danger">Hapus Artikel</a>
                </div>
                <div class="card-footer text-muted text-center">
                  <?= $row['tanggal_inf'] ?>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        </center>

        
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
