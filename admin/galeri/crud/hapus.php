<?php
require '../function/functions.php';
$id_album = $_GET['id_album'];
$id_gam = $_GET['id_gam'];

if (hapus($id_gam) > 0) {
    echo "
    <script>
        alert('Gambar Berhasil Dihapus');
        document.location.href = '../index.php?id_album=$id_album';
    </script>";
} else{
    echo "
    <script>
        alert('Gambar Gagal Terhapus');
        document.location.href = '../index.php?id_album=$id_album';
    </script>
    ";
}


?>