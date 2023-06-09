<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location:../login/login.php");
	exit;
}

require '../function/functions_indel.php';

// Mengambil data id
$id = $_GET['id'];

// query data komoditas berdasarkan id
$komoditas = query("SELECT * FROM tb_komoditas WHERE id_kom = $id")[0];

// cek tombol submit udah ditekan atau belum 
if (isset($_POST['submit'])) {
    // var_dump(ubah($_POST));
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Diubah');
            document.location.href = '../index.php';
        </script>
        ";
    } elseif (ubah($_POST) == 0) {
        echo "
        <script>
            alert('Tidak Ada Perubahan Data');
            document.location.href = '../index.php';
        </script>
        ";
    } 
    else {
        echo "
        <script>
            alert('Data Gagal Diubah');
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

    <title>Halaman Ubah Komoditas Hasil Tani Desa Selaawi</title>
</head>
<body>
    <div class="container mt-3 mb-5">
        <h2 class="mt-4 mb-5 text-center">Halaman Ubah Komoditas Hasil Tani Desa Selaawi</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name='id_kom' value="<?=$komoditas['id_kom']?>">
            <input type="hidden" name='gambar_lama' value="<?=$komoditas['gambar']?>">
            <input type="hidden" name='nama_komo_awal' value="<?=$komoditas['jenis_kom']?>">
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <br>
                <img src="../asset/img_komo/<?=$komoditas['gambar']?>" alt="" style="width: 120px;">
                <br>
                <input type="file" name="gambar" class="form-control-file mt-2">
            </div>
            <div class="form-group">
                <label for="nama_komo">Nama Komoditas</label>
                <input type="text" name="nama_komo" id="nama_komo" class="form-control" required value="<?=$komoditas['jenis_kom']?>">
            </div>
            <div class="form-group">
                <label for="des_komo">Deskripsi Komoditas</label>
                <textarea name="des_komo" id="des_komo" cols="30" rows="10" class="form-control"><?=$komoditas['des_kom']?></textarea>
            </div>
            <center>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </center>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
