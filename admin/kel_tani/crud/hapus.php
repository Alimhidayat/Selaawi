<?php
require "../../function/functions_keltani.php";

$id_hsl = $_GET['id'];
$tanggal = $_GET['tanggal'];
$id_kel = $_GET['id_kel'];
$satuan = $_GET['satuan'];
$id_kom = $_GET['id_kom'];
$jenis_komoditi = $_GET['jenis_komoditi'];

// var_dump($id_kel);
// exit;

if (hapus($id_kel) > 0) {
    echo "
    <script>
        alert('Data dengan id = $id_kel Berhasil Dihapus');
        document.location.href = '../index.php?id=$id_hsl&tanggal=$tanggal&id_kom=$id_kom&jenis_komoditi=$jenis_komoditi&satuan=$satuan';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data dengan id = $id_kel Gagal Dihapus');
        document.location.href = '../index.php?id=$id_hsl&tanggal=$tanggal&id_kom=$id_kom&jenis_komoditi=$jenis_komoditi&satuan=$satuan';
    </script>
    ";
}

?>