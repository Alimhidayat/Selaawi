<?php
require "../function/functions.php";
$id_inf = $_GET['id_inf'];

$tb_informasi = query("SELECT * FROM tb_informasi WHERE id_inf = $id_inf")[0];


if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('Konten Informasi Berhasil Diubah');
            document.location.href = '../index.php';
        </script>
        ";
    } elseif (ubah($_POST) > 0) {
        echo "
        <script>
            alert('Tidak ada perubahan Konten Informasi');
            document.location.href = '../index.php';
        <script>
        ";
    }
    else {
        echo "
        <script>
            alert('Konten Informasi Gagal Diubah');
            document.location.href = '../index.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Ubah Artikel Informasi</title>
</head>
<body>
    <h3>Ubah Informasi Artikel</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?=$tb_informasi['gambar']?>" name="gambar_lama">
        <input type="hidden" value="<?=$tb_informasi['judul_inf']?>" name="judul_lama">
        <input type="hidden" value="<?=$tb_informasi['id_inf']?>" name="id_inf">
        <table>
            <tr>
                <td></td>
                <td></td>
                <td><img src="../assets/img/<?=$tb_informasi['gambar']?>" alt="" style="width: 500px"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td><input type="file" name="gambar" value="<?=$tb_informasi['gambar']?>"></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input type="date" name="tanggal_inf" value="<?=$tb_informasi['tanggal_inf']?>"></td>
            </tr>
            <tr>
                <td>Judul Informasi</td>
                <td>:</td>
                <td><input type="text" name="judul_inf" value="<?=$tb_informasi['judul_inf']?>"></td>
            </tr>
            <tr>
                <td>Konten Informasi</td>
                <td>:</td>
                <td><textarea id="konten_inf" name="konten_inf"><?=$tb_informasi['konten_inf']?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button name="ubah">Ubah Informasi</button></td>
            </tr>
        </table>
    </form>
    
    <script src="../../../assets/plugin/ckeditor/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('konten_inf');
	</script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

