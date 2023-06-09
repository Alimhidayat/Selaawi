<?php
require '../function/functions.php';
$id_inf = $_GET['id_inf'];

if (hapus($id_inf) > 0) {
    echo "
    <script>
        alert('Artikel Berhasil dihapus');
        document.location.href = '../index.php';
    </script>
    ";
}



?>