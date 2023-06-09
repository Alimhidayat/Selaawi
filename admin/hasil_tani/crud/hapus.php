<?php
require '../function/functions.php';

$id = $_GET['id'];
$jenis_komoditi = $_GET['jenis_komoditi'];
$id_kom = $_GET['id_komo'];

if (hapus($id) > 0) {
    echo "<script>
        alert('Berhasil Dihapus');
        document.location.href='../index.php?id=$id_kom&komoditi=$jenis_komoditi';
    </script>";   
} else {
    echo "<script>
        alert('Gagal Dihapus');
        document.location.href='../index.php?id=$id_kom&komoditi=$jenis_komoditi';
    </script>";
}


?>
