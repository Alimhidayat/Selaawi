<?php
require 'function/functions.php';

$program = query("SELECT * FROM tb_program ORDER BY id_prog DESC");
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
    a:hover{
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
        <h1 class="text-center my-5">Halaman Informasi</h1>

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

        <div class="row">
          <div class="col-lg-6 mx-auto">
            <button type="button" class="btn btn-primary btn-lg btn-block"><a href="crud/tambah.php">Tambah
                Informasi</a></button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>