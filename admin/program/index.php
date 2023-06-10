<?php
require 'function/functions.php';

$jumlahDataPerHalaman = 6;
$jumlahData = count(query("SELECT * FROM tb_program ORDER BY id_prog DESC"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$program = query("SELECT * FROM tb_program ORDER BY id_prog DESC
                  LIMIT $awalData, $jumlahDataPerHalaman");

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="32x32" href="../../assets-selawi/logo-selawi.jpeg">
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets-selawi/logo-selawi.jpeg">
  <title>Halaman Program</title>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    .card {
      min-height: 350px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    a {
      color: white;
      text-decoration: none;
    }

    a:hover {
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
      <?php require_once "../sidebar/sidebar.php"; ?>

      <div class="col-md-10 col-lg-10 ml-sm-auto px-4">
        <h3 class="text-center my-5">Halaman Program</h3>

        <?php
        $i = 0;
        echo "<div class='row'>";
        foreach ($program as $row):
          if ($i % 3 === 0 && $i > 0) {
            echo '</div><div class="row">';
          }
          ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <img src="assets/img/<?= $row['gmbr_prog'] ?>" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title text-center">
                  <?= $row['jud_prog'] ?>
                </h5>
              </div>
              <div class="card-footer text-center">
                <button type="button" class="btn btn-danger btn-sm float-start"><a
                    href="crud/hapus.php?id_prog=<?= $row['id_prog'] ?>">Hapus</a></button>
                <button type="button" class="btn btn-primary btn-sm float-end"><a
                    href="crud/ubah.php?id_prog=<?= $row['id_prog'] ?>">Ubah</a></button>
              </div>
            </div>
          </div>
        <?php endforeach;
        echo "</div>";
        ?>

        <!-- Awal Pagination -->

        <?php if ($jumlahHalaman > 1): ?>
          <div class="pagination-container">
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <?php if ($halamanAktif > 1): ?>
                  <li class="page-item">
                    <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>">&laquo;</a>
                  </li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $jumlahHalaman; $i++): ?>
                  <?php if ($i == $halamanAktif): ?>
                    <li class="page-item active">
                      <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
                    </li>
                  <?php else: ?>
                    <li class="page-item">
                      <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
                    </li>
                  <?php endif; ?>
                <?php endfor; ?>
                <?php if ($halamanAktif < $jumlahHalaman): ?>
                  <li class="page-item">
                    <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>">&raquo;</a>
                  </li>
                <?php endif; ?>
              </ul>
            </nav>
          </div>
          <br>
        <?php endif; ?>
        <!-- Akhir Pagination -->

        <div class="row mb-5">
          <div class="col text-center">
            <button type="button" class="btn btn-primary"><a href="crud/tambah.php">Tambah
                Program</a></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <p>&copy; Copyright 2023 BPP Selaawi Kabupaten Garut</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>