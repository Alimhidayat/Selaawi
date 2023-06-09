<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location:../../login/login.php");
	exit;
}

require '../function/functions.php';

$id_kel = $_GET['id_kel'];
// var_dump($id_kom);
// var_dump($komoditi);
$kel_tani = query("SELECT * FROM tb_keltani WHERE id_kel=$id_kel")[0];
// var_dump($kel_tani);
// exit;


if (isset($_POST['ubah'])) {
	// var_dump(tambah($_POST));
	// exit;
	if (ubah($_POST) > 0) {
		echo "
		<script>
			alert('kelompok tani berhasil diubah');
			document.location.href = '../index.php';
		</script>
		";
	} elseif (ubah($_POST) == 0) {
		echo "
		<script>
			alert('kelompok tani tidak diubah');
			document.location.href = '../index.php';
		</script>
		";
	} 
	else{
		// var_dump(tambah($_POST));
		// exit;
		echo "
		<script>
			alert('Kelompok tani gagal diubah');
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah Kelompok Hasil Tani</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h3 class="mt-4 mb-5 text-center">UBAH KELOMPOK HASIL TANI</h3>
		<form action="" method="post">
			<input type="hidden" name="id_kel" value="<?=$id_kel?>">
			<input type="hidden" name="wa_lama" value="<?=$kel_tani['no_wa']?>">
			<div class="form-group row">
				<label for="kel_tani" class="col-sm-2 col-form-label">Nama Kelompok</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="kel_tani" name="kel_tani" value="<?=$kel_tani['nama_kel']?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for="no_wa" class="col-sm-2 col-form-label">Nomor WhatsApp</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="no_wa" name="no_wa" value="<?=$kel_tani['no_wa']?>">
				</div>
			</div>
			 <div class="form-group row">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button class="btn btn-primary mr-2" name="ubah">Ubah</button>
					<button class="btn btn-secondary" style="color: white;"><a href="../index.php" style="color: white; text-decoration: none;">Kembali</a></button>
				</div>
			</div>
		</form>
	</div>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
