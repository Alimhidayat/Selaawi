<?php
// Mengambil data dari tb_album
$id_album = $_GET['id_album'];

require "function/functions.php";
$galeri = query("SELECT * FROM tb_galeri WHERE id_album = $id_album ORDER BY id_gam DESC ");




?>

<!DOCTYPE html>
<html>
<head>
  <title>Galeri Gambar</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .card-img-top {
      height: 200px; /* Sesuaikan tinggi gambar */
      object-fit: cover;
    }
    .card-text{
        text-align: center;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Galeri Gambar</h2>
    <div class="row">
    <?php foreach ($galeri as $row) :?>
      <div class="col-md-3">
        <div class="card mb-4">
          <img class="card-img-top" src="assets/img/<?=$row['gambar']?>" alt="<?=$row['judul_gam']?>">
          <div class="card-body">
            <p class="card-text"><?=$row['judul_gam']?></p>
            <button class="btn btn-danger btn-sm" onclick=""><a href="crud/hapus.php?id_gam=<?=$row['id_gam']?>&id_album=<?=$id_album?>">Hapus</a></button>
          </div>
        </div>
      </div>
    <?php endforeach;?>
    </div>

    <div class="row">
        <div class="col">
            <button name="tambah"><a href="crud/tambah.php?id_album=<?=$id_album?>">Tambah Gambar</a></button>
            <button><a href="../album/index.php">Kembali</a></button>
        </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
