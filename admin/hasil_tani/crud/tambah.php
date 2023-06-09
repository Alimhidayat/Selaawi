<?php

session_start();
if (!isset($_SESSION['login'])) {
	header("Location:../../login/login.php");
	exit;
}

require "../function/functions.php";

$jenis_komoditi = $_GET['jenis_komoditi'];
$id_kom = $_GET['id_komo'];

if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data Hasil Tani Berhasil Ditambahkan');
            document.location.href = '../index.php?id=$id_kom&komoditi=$jenis_komoditi';
        </script>
        ";
    } else {
        echo "data tidak berhasil ditambahkan";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Hasil Tani <?= $jenis_komoditi ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3 class="my-4">Tambah Hasil Tani untuk <?= $jenis_komoditi ?></h3>
        <table>
            <form action="" method="post">
                <input type="hidden" name="id_kom" value="<?= $id_kom ?>">
                <div class="form-group row">
                    <label for="ukuran" class="col-sm-2 col-form-label">Pilih Nilai</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="satuan" id="ukuran">
                            <option value="Kg">Kg</option>
                            <option value="Kwintal">Kwintal</option>
                            <option value="Ton">Ton</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                    </div>
                </div>
            </form>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
