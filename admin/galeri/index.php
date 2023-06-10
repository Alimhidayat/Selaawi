<?php
// Mengambil data dari tb_album
$id_album = $_GET['id_album'];

require "function/functions.php";

// var_dump($awalData);
// 
$galeri = query("SELECT * FROM tb_galeri WHERE id_album = $id_album ORDER BY id_gam DESC ");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Galeri Gambar</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .card-img-top {
      height: 200px;
      /* Sesuaikan tinggi gambar */
      object-fit: cover;
    }

    .card-text {
      text-align: center;
    }
  </style>
</head>

<body>

  <div class="container my-5">
    <h3 class="mt-4 mb-4 text-center">Galeri Gambar</h3>
    <div class="row">
      <?php foreach ($galeri as $row): ?>
        <div class="col-md-3">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="assets/img/<?= $row['gambar'] ?>" alt="<?= $row['judul_gam'] ?>">
            <div class="card-body text-center">
              <p class="card-text"><b>
                  <?= $row['judul_gam'] ?>
                </b></p>
              <button class="btn btn-danger btn-sm">
                <a href="crud/hapus.php?id_gam=<?= $row['id_gam'] ?>&id_album=<?= $id_album ?>"
                  style="color: white;">Hapus</a>
              </button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="row">
      <div class="col text-center">
        <button class="btn btn-primary"><a href="crud/tambah.php?id_album=<?= $id_album ?>" style="color: white;">Tambah
            Gambar</a></button>
        <button class="btn btn-secondary"><a href="../album/index.php" style="color: white;">Kembali</a></button>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/js/bootstrap.min.js"></script>
</body>

</html>