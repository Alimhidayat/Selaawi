<?php
require '../function/functions.php';
$id_kel = $_GET['id_kel'];
$nama_kel = $_GET['nama_kel'];
// var_dump($komoditi);
if (hapus($id_kel) > 0) {
	echo "
	<script>
		alert('Kelompok Tani $nama_kel telah dihapus');
		document.location.href = '../index.php';
	</script>
	";
} else{
	echo "
	<script>
		alert('Kelompok Tani $nama_kel gagal dihapus');
		document.location.href = '../index.php';
	</script>
	";
}



?>