<?php
require "../function/functions.php";
$id_album = $_GET['id_album'];

if (hapus($id_album) > 0) {
    echo"
        <script>
            alert('Album berhasil dihapus');
            document.location.href= '../index.php';
        </script>
        ";
} else{
    echo"
        <script>
            alert('Album gagal dihapus');
            document.location.href = '../index.php';
        </script>
        ";
}
?>