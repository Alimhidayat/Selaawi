<?php 
$id_album = $_GET['id_album'];
var_dump($id_album);    

require "../function/functions.php";

if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Gambar Berhasil Ditambahkan');
            document.location.href = '../index.php?id_album=$id_album';
        </script>
        ";
    } else {
        echo"
        <script>
            alert('Gambar Gagal Ditambahkan);
            document.location.href = '../index.php?id_album=$id_album';
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
    <title>Tambah Gambar</title>
</head>
<body>
    <h2>Halaman Tambah Gambar</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_album" value="<?=$id_album?>">
        <table>
        <tr>
            <td>Gambar</td>
            <td>:</td>
            <td><input type="file" name="gambar" required></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td><input type="text" name="judul_gam"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button name="tambah">Tambah Gambar</button></td>
        </tr>
        </table>
    </form>

</body>
</html>