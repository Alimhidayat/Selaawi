<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location:../../login/login.php");
	exit;
}

require '../function/functions.php';


if (isset($_POST['tambah'])) {
	// var_dump(tambah($_POST));
	// exit;
	// var_dump($_POST);
	if (tambah($_POST) > 0) {
		echo "
		<script>
			alert('kelompok tani berhasil ditambahkan');
			document.location.href = '../index.php';
		</script>
		";
	} else{
		// var_dump(tambah($_POST));
		// exit;
		echo "
		<script>
			alert('Kelompok tani gagal ditambahkan');
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
	<title>Tambah Kelompok Hasil Tani</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h3 class="mt-4 mb-5 text-center">Tambah Kelompok Hasil Tani</h3>
		<form action="" method="post">
			<div class="form-group row">
				<label for="kel_tani" class="col-sm-2 col-form-label">Nama Kelompok</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="kel_tani" name="kel_tani" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="no_wa" class="col-sm-2 col-form-label">Nomor WhatsApp</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="no_wa" name="no_wa" required>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button class="btn btn-primary mr-2" name="tambah">Tambah</button>
					<button class="btn btn-secondary" style="color: white;"><a href="../index.php" style="color: white; text-decoration: none;">Kembali</a></button>
				</div>
			</div>
		</form>
	</div>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
