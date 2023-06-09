<?php
require "../function/functions.php";
$id_album = $_GET['id_album'];
$album = query("SELECT * FROM tb_album WHERE id_album = $id_album")[0];

if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo"
        <script>
            alert('Album berhasil diubah');
            document.location.href= '../index.php';
        </script>
        ";
    } elseif (ubah($_POST) == 0) {
        echo"
        <script>
            alert('Tidak ada perubahan Album');
            document.location.href= '../index.php';
        </script>
        ";
    } 
    else{
        echo"
        <script>
            alert('Album gagal diubah');
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
    <title></title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="id_album" value="<?=$album['id_album']?>">
        <input type="hidden" name="album_awal" value="<?=$album['album']?>">
    <table>
        <tr>
            <td>Nama Album</td>
            <td>:</td>
            <td><input type="text" name= "album" value="<?=$album['album']?>"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button name="ubah">Ubah</button></td>
        </tr>
    </table>
    </form>
    
</body>
</html>