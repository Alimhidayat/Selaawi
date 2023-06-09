<?php 

require '../function/functions.php';

$id_desa = intval($_GET['id_desa']);
// var_dump($id_desa);
$nama_desa = $_GET['nama_desa'];

if (hapus($id_desa) > 0) {
    // var_dump(hapus($id_desa));
    echo "
    <script>
        alert('Desa $nama_desa Berhasil dihapus');
        document.location.href = '../index.php'; 
    </script>
    ";
} else{
    // var_dump(hapus($id_desa));
    echo"
    <script>
        alert('Desa $nama_desa Gagal dihapus');
        document.location.href = '../index.php';
    </script>
    ";
}

?>