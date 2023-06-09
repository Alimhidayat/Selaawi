<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location:../login/login.php");
	exit;
}


require '../function/functions_indel.php';

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = '../index.php';
        </script>
        ";

        // echo tambah($_POST);
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan');
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
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets-selawi/logo-selawi.jpeg">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets-selawi/logo-selawi.jpeg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Halaman Tambah Komoditas Hasil Tani Desa Selaawi</title>
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Halaman Tambah Komoditas Hasil Tani Desa Selaawi</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                    <label class="custom-file-label" for="gambar">Pilih gambar</label>
                </div>
            </div>
            <input type="hidden" name="nama_komo_asal">
            <div class="form-group">
                <label for="nama_komo">Nama Komoditas</label>
                <input type="text" name="nama_komo" id="nama_komo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="des_komo">Deskripsi Komoditas</label>
                <textarea name="des_komo" id="des_komo" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
