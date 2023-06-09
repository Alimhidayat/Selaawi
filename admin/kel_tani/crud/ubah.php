<?php
require "../../function/functions_keltani.php";


$id_hsl = $_GET['id'];
$id_desa = $_GET['id_desa'];
$tanggal = $_GET['tanggal'];
$id_kel = $_GET['id_kel'];
$satuan = $_GET['satuan'];
$id_kom = $_GET['id_kom'];
$jenis_komoditi = $_GET['jenis_komoditi'];
$id_detil = $_GET['id_detil'];


$kel_tani = query("SELECT id_kel, nama_kel FROM tb_keltani WHERE id_kel = $id_kel")[0];
$kel_tani2 = query("SELECT id_kel, nama_kel FROM tb_keltani");
$desa = query("SELECT * FROM tb_desa WHERE id_desa = $id_desa")[0];
$desa2 = query("SELECT * FROM tb_desa");

$detil_hasiltani = query("SELECT * FROM tb_detil_hasiltani WHERE id_detil = $id_detil")[0];
// var_dump($detil_hasiltani);
// exit;
// var_dump($id_desa);
// exit;
// var_dump($kel_tani);
// var_dump($desa);
// exit;

if (isset($_POST['ubah'])) {
    // var_dump($_POST);
    // exit;
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Diubah');
            document.location.href = '../index.php?id=$id_hsl&tanggal=$tanggal&id_kom=$id_kom&jenis_komoditi=$jenis_komoditi&satuan=$satuan';
        </script>
        ";
    } elseif (ubah($_POST) == 0) {
        echo "
        <script>
            alert('Data Tidak Diubah');
            document.location.href = '../index.php?id=$id_hsl&tanggal=$tanggal&id_kom=$id_kom&jenis_komoditi=$jenis_komoditi&satuan=$satuan';
        </script>
        ";
    }
    else {
        echo "
        <script>
            alert('Data Gagal Diubah');
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
    <title>Ubah Hasil tani</title>
    <!-- Menambahkan Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 ">
        <h3 class="mb-5 text-center">Halaman Ubah Kelompok Tani komoditi <?= $jenis_komoditi ?></h3>
        <form action="" method="post">
            <input type="hidden" name="id_hsl" value="<?= $id_hsl ?>">
            <input type="hidden" name="id_detil" value="<?= $id_detil?>">
            <input type="hidden" name="id_kel_awal" value="<?=$id_kel?>">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Kelompok</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kel_tani">
                        <option value="<?=$kel_tani['id_kel']?>"><?=$kel_tani['nama_kel']?></option>
                        <?php foreach ($kel_tani2 as $row) : ?>
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
                        <option value="<?=$desa['id_desa']?>"><?=$desa['nm_desa']?></option>
                        <?php foreach ($desa2 as $row) : ?>
                            <option value="<?= $row['id_desa'] ?>"><?= $row['nm_desa'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Tani (<?= $satuan ?>)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="jumlah_tani" value="<?=$detil_hasiltani['jml_tani']?>" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
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
