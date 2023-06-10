<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location:../../login/login.php");
	exit;
}

require "../function/functions.php";
if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo"
        <script>
            alert('Album berhasil ditambahkan');
            document.location.href= '../index.php';
        </script>
        ";
    } else{
        echo"
        <script>
            alert('Album gagal ditambahkan');
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
    <table>
        <tr>
            <td>Nama Album</td>
            <td>:</td>
            <td><input type="text" name= "album"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button name="tambah">Tambah Album</button></td>
        </tr>
    </table>
    </form>
    
</body>
</html>