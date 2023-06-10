<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location:../../login/login.php");
	exit;
}

require "../../function/functions_keltani.php";
$kel_tani = query("SELECT id_kel, nama_kel FROM tb_keltani");
$desa = query("SELECT * FROM tb_desa");

$id_hsl = $_GET['id_hsl'];
$tanggal = $_GET['tanggal'];
$satuan = $_GET['satuan'];
$id_kom = $_GET['id_kom'];
$jenis_komoditi = $_GET['jenis_komoditi'];

if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = '../index.php?id=$id_hsl&tanggal=$tanggal&id_kom=$id_kom&jenis_komoditi=$jenis_komoditi&satuan=$satuan';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan');
            document.location.href = '../index.php?id=$id_hsl&tanggal=$tanggal&id_kom=$id_kom&jenis_komoditi=$jenis_komoditi&satuan=$satuan';
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
    <title>Tambah Kelompok hasil tani</title>
    <!-- Menambahkan Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 ">
        <h3 class="mb-5 text-center">Halaman Tambah Kelompok Tani komoditi <?= $jenis_komoditi ?></h3>
        <form action="" method="post">
            <input type="hidden" name="id_hsl" value="<?= $id_hsl ?>">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Kelompok</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kel_tani">
                        <option value="">-- Pilih Kelompok Tani --</option>
                        <?php foreach ($kel_tani as $row) : ?>
                            <option value="<?= $row['id_kel'] ?>"><?= $row['nama_kel'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- nama desa -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Desa</label>
                <div class="col-sm-10">
                    <select class="form-control" name="desa">
                        <option value="">-- Pilih Desa --</option>
                        <?php foreach ($desa as $row) : ?>
                            <option value="<?= $row['id_desa'] ?>"><?= $row['nm_desa'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Tani (<?= $satuan ?>)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="jumlah_tani" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                    <a href="../index.php?id=<?= $id_hsl ?>&tanggal=<?= $tanggal ?>&id_kom=<?= $id_kom ?>&jenis_komoditi=<?= $jenis_komoditi ?>&satuan=<?= $satuan ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Menambahkan Bootstrap 4 JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
