<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location:../../login/login.php");
	exit;
}

require "../function/functions.php";

$jenis_komoditi = $_GET['jenis_komoditi'];
$id_kom = $_GET['id_komo'];
// id hasil tani
$id = $_GET['id'];
$satuan = $_GET['satuan'];
// Memanggil nilai pada tabel hasil tani
$hasil_tani = query("SELECT * FROM tb_hasiltani WHERE id_hsl = $id")[0];


if (isset($_POST['ubah'])) {
    // karena value tidak bisa ditambah di bagian input date
    if (empty($_POST['tanggal'])) {
        $_POST['tanggal'] = $_POST['tgl'];
    }
    // var_dump(ubah($_POST));
    // var_dump($_POST['satuan']);
    if (ubah($_POST) > 0) {
        // var_dump(ubah($_POST));
        echo "
        <script>
            alert('Data Hasil Tani Berhasil Diubah');
            document.location.href = '../index.php?id=$id_kom&komoditi=$jenis_komoditi';
        </script>
        ";
    } else {
        // var_dump(ubah($_POST));
        echo "
        <script>
            alert('Data Hasil Tani Tidak Diubah');
            document.location.href = '../index.php?id=$id_kom&komoditi=$jenis_komoditi';
        </script>
        ";
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Hasil Tani <?= $jenis_komoditi ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3 class="my-5 text-center">Ubah Hasil Tani untuk <?= $jenis_komoditi ?></h3>
        <form action="" method="post">
            <input type="hidden" name="id_hsl" value="<?= $id ?>">
            <input type="hidden" name="tgl" value="<?= $hasil_tani['tanggal'] ?>">

            <div class="form-group row">
                <label for="ukuran" class="col-sm-2 col-form-label">Pilih Nilai</label>
                <div class="col-sm-10">
                    <select name="satuan" id="ukuran" class="form-control">
                        <option value="<?= $satuan ?>"><?= $satuan ?></option>
                        <option value="Kg">Kg</option>
                        <option value="Kwintal">Kwintal</option>
                        <option value="Ton">Ton</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $hasil_tani['tanggal'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
